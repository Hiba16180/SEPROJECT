<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    public function courses()
    {
        $user = Auth::user();
        $username = $user->name;
        $status = $user->status;
        $courses = Course::latest()->cursorPaginate(30);

        return view('dashboard.courses.courses', compact('username', 'status', 'courses'));
    }

    public function newcourse()
    {
        return view('dashboard.courses.newcourse');
    }

    public function store(Request $request)
    {
        Log::debug($request);
        $validatedData = Validator::make($request->all(),[
            'title' => 'required',
            'module' => 'required',
            'level' => 'required',
            'duration' => 'required',
            'place' => 'required',
            'price' => 'required',
            'description' => 'required',
            'cover' => 'image',
            'resources.*.*' => 'mimes:pdf,image|max:8448',
        ]);

       if ($validatedData->fails() ) {
        return redirect()->back()->withErrors($validatedData)->withInput();
        }
        $course = new Course();

        try {
            
            $course->price = (int) $request->input('price');
            $course->duration = (int) $request->input('duration');
        
            
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors(['price' => 'The price and the duration must be a valid number.'])->withInput();
        }
        $course->title = $request->input('title');
        $course->module = $request->input('module');
        $course->level = $request->input('level');
        $course->place = $request->input('place');
        $course->address = $request->input('address');
        $course->description = $request->input('description');
        $course->user_id = Auth::id();

        // Handle file upload for the cover image
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $filename = time() . '_' . uniqid() . '.' . $cover->getClientOriginalExtension();
 
            $path = public_path('uploads/covers/' . $filename);
            $cover->move(public_path('uploads/covers'), $filename);
            
            $coverPath = 'uploads/covers/'.$filename;
            $course->cover = $coverPath;
        }

        $course->save();

        // Handle file uploads for course resources (PDFs and images)
        if ($request->hasFile('resources')) {
            $resources = $request->file('resources');

            foreach ($resources as $resource) {
                $filename = time() . '_' . uniqid() . '.' . $resource->getClientOriginalExtension();
                $path = public_path('uploads/resources/' . $filename);
                $resource->move(public_path('uploads/resources'), $filename);
                $resourcePath = 'uploads/resources/'.$filename;
                
                // Extract the file title from the original file name
                $fileTitle = pathinfo($resource->getClientOriginalName(), PATHINFO_FILENAME);
                
                // Get the file extension
                $fileExtension = $resource->getClientOriginalExtension();
                
                $resourceModel = new Resource();
                $resourceModel->course_id = $course->id;
                $resourceModel->file_title = $fileTitle;
                $resourceModel->file_type = $fileExtension;
                $resourceModel->file_path = $resourcePath;
                $resourceModel->save();
            }
            
            
        }

        $user = Auth::user();
        $username = $user->name;
        $status = $user->status;
        $courses = Course::latest()->cursorPaginate(30);

        return view('dashboard.courses.courses', compact('username', 'status', 'courses'))->with('success', 'Course created successfully.');
    }

    public function destroy(Course $course)
    {
        // Delete the course and its associated cover image
        if ($course->cover) {
            Storage::disk('public')->delete($course->cover);
        }

        // Delete the associated resources (PDFs and images)
        foreach ($course->resources as $resource) {
            Storage::disk('public')->delete($resource->file_path);
            $resource->delete();
        }

        $course->delete();

        return redirect()->back()->with('success', 'Course deleted successfully.');
    }

    public function coursedetails($id)
{
    $course = Course::with('resources')->find($id);
    return view('dashboard.courses.coursedetails', compact('course'));
}

}
