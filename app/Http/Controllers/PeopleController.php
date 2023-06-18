<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class PeopleController extends Controller
{
    //
    public function index()
    {
        setcookie('user_id', auth()->id(), time() +  (10 * 365 * 24 * 60 * 60), '/');      

        // ['teacher', 'student','doctor','professor',"phd",'phd-student','doctorah-student' ,'graduate-student','researcher']
        $teacher = DB::table("users")->where('status','teacher')->get()->take(20);
        $student = DB::table("users")->where('status','student')->get()->take(20);
        $doctor = DB::table("users")->where('status','doctor')->get()->take(20);
        $professor = DB::table("users")->where('status','professor')->get()->take(20);
        $phd = DB::table("users")->where('status','phd')->get()->take(20);
        $phd_student = DB::table("users")->where('status','phd-student')->get()->take(20);
        $graduate_student = DB::table("users")->where('status','graduate-student')->get()->take(20);
        $doctorah_student = DB::table("users")->where('status','doctorah-student')->get()->take(20);
        $researcher = DB::table("users")->where('status','researcher')->get()->take(20);
        $all=false;
        return view('people.people',compact('teacher', 'student','doctor','professor',"phd",'phd_student','doctorah_student' ,'graduate_student','researcher','all'));
    }

    public function fetch(Request $request){
        $all=true;
        //$users = DB::table("users")->where('status',$request->type)->orderBy("created_at", 'asc')->cursorPaginate(21);
        $users = DB::table("users")->where('status',$request->type)->latest()->cursorPaginate(21);
        return view('people.people',compact('users','all'));
    }


    public function search(Request $request){
        //  ******* صلي الله على محمد ********       
        $wilaya = $request->input('wilaya');
        $status = $request->input('status');
        $degree = $request->input('degree');
        $diploma = $request->input('diplomaField');   
        $all = true;
        $users = User::query();
        if (!is_null($wilaya)) {
            $users = $users->where('region', $wilaya);
        }
        if (!is_null($status)) {
            $users = $users->where('status', $status);
        }
        if (!is_null($degree)) {
            $users = $users->where('degree', $degree);
        }
        if (!is_null($diploma)) {
            $users = $users->where('diplomaField', $diploma);
        }
        $users = $users->oldest()->cursorPaginate(20);
        return view('people.people',compact('users','all'));    
        
        
        
    }


}
