<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\TaggedPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Jobs\detector;
use Illuminate\Support\Facades\Queue;


//composer require laravel/ui
//php artisan ui vue --auth
//php artisan migrate
// --> A.AT

class PostController extends Controller
{

    public $stopWords = "\na\nable\nabout\nabove\nabst\naccordance\naccording\naccordingly\nacross\nact\nactually\nadded\nadj\naffected\naffecting\naffects\nafter\nafterwards\nagain\nagainst\nah\nall\nalmost\nalone\nalong\nalready\nalso\nalthough\nalways\nam\namong\namongst\nan\nand\nannounce\nanother\nany\nanybody\nanyhow\nanymore\nanyone\nanything\nanyway\nanyways\nanywhere\napparently\napproximately\nare\naren\narent\narise\naround\nas\naside\nask\nasking\nat\nauth\navailable\naway\nawfully\nb\nback\nbe\nbecame\nbecause\nbecome\nbecomes\nbecoming\nbeen\nbefore\nbeforehand\nbegin\nbeginning\nbeginnings\nbegins\nbehind\nbeing\nbelieve\nbelow\nbeside\nbesides\nbetween\nbeyond\nbiol\nboth\nbrief\nbriefly\nbut\nby\nc\nca\ncame\ncan\ncannot\ncan't\ncause\ncauses\ncertain\ncertainly\nco\ncom\ncome\ncomes\ncontain\ncontaining\ncontains\ncould\ncouldnt\nd\ndate\ndid\ndidn't\ndifferent\ndo\ndoes\ndoesn't\ndoing\ndone\ndon't\ndown\ndownwards\ndue\nduring\ne\neach\ned\nedu\neffect\neg\neight\neighty\neither\nelse\nelsewhere\nend\nending\nenough\nespecially\net\net-al\netc\neven\never\nevery\neverybody\neveryone\neverything\neverywhere\nex\nexcept\nf\nfar\nfew\nff\nfifth\nfirst\nfive\nfix\nfollowed\nfollowing\nfollows\nfor\nformer\nformerly\nforth\nfound\nfour\nfrom\nfurther\nfurthermore\ng\ngave\nget\ngets\ngetting\ngive\ngiven\ngives\ngiving\ngo\ngoes\ngone\ngot\ngotten\nh\nhad\nhappens\nhardly\nhas\nhasn't\nhave\nhaven't\nhaving\nhe\nhed\nhence\nher\nhere\nhereafter\nhereby\nherein\nheres\nhereupon\nhers\nherself\nhes\nhi\nhid\nhim\nhimself\nhis\nhither\nhome\nhow\nhowbeit\nhowever\nhundred\ni\nid\nie\nif\ni'll\nim\nimmediate\nimmediately\nimportance\nimportant\nin\ninc\nindeed\nindex\ninformation\ninstead\ninto\ninvention\ninward\nis\nisn't\nit\nitd\nit'll\nits\nitself\ni've\nj\njust\nk\nkeep\tkeeps\nkept\nkg\nkm\nknow\nknown\nknows\nl\nlargely\nlast\nlately\nlater\nlatter\nlatterly\nleast\nless\nlest\nlet\nlets\nlike\nliked\nlikely\nline\nlittle\n'll\nlook\nlooking\nlooks\nltd\nm\nmade\nmainly\nmake\nmakes\nmany\nmay\nmaybe\nme\nmean\nmeans\nmeantime\nmeanwhile\nmerely\nmg\nmight\nmillion\nmiss\nml\nmore\nmoreover\nmost\nmostly\nmr\nmrs\nmuch\nmug\nmust\nmy\nmyself\nn\nna\nname\nnamely\nnay\nnd\nnear\nnearly\nnecessarily\nnecessary\nneed\nneeds\nneither\nnever\nnevertheless\nnew\nnext\nnine\nninety\nno\nnobody\nnon\nnone\nnonetheless\nnoone\nnor\nnormally\nnos\nnot\nnoted\nnothing\nnow\nnowhere\no\nobtain\nobtained\nobviously\nof\noff\noften\noh\nok\nokay\nold\nomitted\non\nonce\none\nones\nonly\nonto\nor\nord\nother\nothers\notherwise\nought\nour\nours\nourselves\nout\noutside\nover\noverall\nowing\nown\np\npage\npages\npart\nparticular\nparticularly\npast\nper\nperhaps\nplaced\nplease\nplus\npoorly\npossible\npossibly\npotentially\npp\npredominantly\npresent\npreviously\nprimarily\nprobably\npromptly\nproud\nprovides\nput\nq\nque\nquickly\nquite\nqv\nr\nran\nrather\nrd\nre\nreadily\nreally\nrecent\nrecently\nref\nrefs\nregarding\nregardless\nregards\nrelated\nrelatively\nresearch\nrespectively\nresulted\nresulting\nresults\nright\nrun\ns\nsaid\nsame\nsaw\nsay\nsaying\nsays\nsec\nsection\nsee\nseeing\nseem\nseemed\nseeming\nseems\nseen\nself\nselves\nsent\nseven\nseveral\nshall\nshe\nshed\nshe'll\nshes\nshould\nshouldn't\nshow\nshowed\nshown\nshowns\nshows\nsignificant\nsignificantly\nsimilar\nsimilarly\nsince\nsix\nslightly\nso\nsome\nsomebody\nsomehow\nsomeone\nsomethan\nsomething\nsometime\nsometimes\nsomewhat\nsomewhere\nsoon\nsorry\nspecifically\nspecified\nspecify\nspecifying\nstill\nstop\nstrongly\nsub\nsubstantially\nsuccessfully\nsuch\nsufficiently\nsuggest\nsup\nsure\tt\ntake\ntaken\ntaking\ntell\ntends\nth\nthan\nthank\nthanks\nthanx\nthat\nthat'll\nthats\nthat've\nthe\ntheir\ntheirs\nthem\nthemselves\nthen\nthence\nthere\nthereafter\nthereby\nthered\ntherefore\ntherein\nthere'll\nthereof\ntherere\ntheres\nthereto\nthereupon\nthere've\nthese\nthey\ntheyd\nthey'll\ntheyre\nthey've\nthink\nthis\nthose\nthou\nthough\nthoughh\nthousand\nthroug\nthrough\nthroughout\nthru\nthus\ntil\ntip\nto\ntogether\ntoo\ntook\ntoward\ntowards\ntried\ntries\ntruly\ntry\ntrying\nts\ntwice\ntwo\nu\nun\nunder\nunfortunately\nunless\nunlike\nunlikely\nuntil\nunto\nup\nupon\nups\nus\nuse\nused\nuseful\nusefully\nusefulness\nuses\nusing\nusually\nv\nvalue\nvarious\n've\nvery\nvia\nviz\nvol\nvols\nvs\nw\nwant\nwants\nwas\nwasnt\nway\nwe\nwed\nwelcome\nwe'll\nwent\nwere\nwerent\nwe've\nwhat\nwhatever\nwhat'll\nwhats\nwhen\nwhence\nwhenever\nwhere\nwhereafter\nwhereas\nwhereby\nwherein\nwheres\nwhereupon\nwherever\nwhether\nwhich\nwhile\nwhim\nwhither\nwho\nwhod\nwhoever\nwhole\nwho'll\nwhom\nwhomever\nwhos\nwhose\nwhy\nwidely\nwilling\nwish\nwith\nwithin\nwithout\nwont\nwords\nworld\nwould\nwouldnt\nwww\nx\ny\nyes\nyet\nyou\nyoud\nyou'll\nyour\nyoure\nyours\nyourself\nyourselves\nyou've\nz\nzero";

    public function __construct()
	{
		$this->middleware('auth');
	}
    public function index()
    {
        $posts = Post::latest()->cursorPaginate(21);
        //$user = User::find(auth()->id());
        setcookie('user_id', auth()->id(), time() +  (10 * 365 * 24 * 60 * 60), '/');      
        return view('Forums.forum', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }   


    //php artisan queue:work


   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Post $post, Request $request)
    {
/*
        $validatedData = $request->validate([
            'image' => 'required|image|max:2048',
        ]);
        $image = file_get_contents($validatedData['image']);
        $model = new Image;
        $model->image = $image;
        $model->save();
   */

    // validate post input 
        


       $validatedData = Validator::make($request->all(),[
        'title' => 'required|string|max:255',
        'body' => 'required|string|max:10000',        
       ]); 


       if ($validatedData->fails() ) {
            return redirect()->back()->withErrors($validatedData)->withInput();
       }

/*
       $result = exec('python H:\\SeF\\SE\\app\\Http\\Controllers\\detector\\ArabDetector.py "'.request("body").'"');  
       $result = json_decode($result, true);
       Log::debug($result);
  */     

       
       //detector::dispatch($cmd)->onQueue('detectors-queue');       //        detector::dispatch($cmd);      
       //$request->session()->flash('message', $result["result"]);
       //return redirect()->back()->with('message', $result["result"]);
/*
       if($result["result"]==1){
        DB::table('table_inapropriate')->insert([
            'user_id' => auth()->id(),
            'body' => request("body"),
        ]);
  é
        // block user if he has more then 5 trys to insert iffensive content :() Allah yahdih
        if ( DB::table('table_inapropriate')->where('user_id',auth()->id())->count() >= 5 ){
            DB::table('users')
                    ->where('id', auth()->id)
                    ->update(['blocked' => true ,'blocked_at'=>now()]);
            // log out
            Auth::logout();
            return redirect('/login');
        } 
        return redirect()->back()->with('message', $result["result"]);
       }
*/
        $post = $post->addPost([
        	'title' => request('title'),
            'body' => request('body'),
        	'user_id' => auth()->id(),
            'reply_count' => 0,
            'upvotes' => 0,
        ]);
       
        
        $cmd = 'python .\\app\\Http\\Controllers\\detector\\ArabDetector.py "' . request('body') . '"';
        //$job = (new detector($cmd))->onQueue('emails');
        Queue::push(new detector($cmd,request('body'),auth()->id(),$post->id));

        $cmd = 'python .\\app\\Http\\Controllers\\detector\\ArabDetector.py  "' . request('title') . '"';
        //$job = (new detector($cmd))->onQueue('emails');
        Queue::push(new detector($cmd,request('body'),auth()->id(),$post->id));


        if ($request->hasFile('image')) {
            $validatedData =Validator::make($request->all(),[
                'image.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',        
               ]); 
               if ($validatedData->fails()) {
                return redirect()->back()->withErrors($validatedData)->withInput();
               }
        
            foreach ($request->file('image') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = public_path('uploads/images/' . $filename);
                $image->move(public_path('uploads/images'), $filename);
                $postImage = new Image;
                $postImage->post_id = $post->id;
                $postImage->image = '/uploads/images/' . $filename;
                $postImage->save();
            }
                
        }
    /*       // First, validate the uploaded file
           $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        // Save the uploaded file to a temporary location
        $imagePath = $request->file('image')->store('temp');

        // Read the contents of the file and store it as binary datause Exception;
         in the database
        $imageData = file_get_contents(storage_path('app/'.$imagePath));
        $postImage = new Image;
        $postImage->post_id = $post->id;
        $postImage->image = $imageData;
        $postImage->save(); 
                Storage::delete($imagePath);use Exception;
                
*/

        // Finally, delete the temporary file
        
        $tags = $request->input('tags');
        if (is_null($tags)) {
            $tags = ['general'];
         } 
        foreach ( $tags as $tag ){
            try{
            DB::table('tagged_posts')->insert([
                'post_id' => $post->id,
                'tag' => $tag,
            ]); 
            }catch(Exception $e){
                
            } 
        }
        
        return back();
    }

    public function upvote(Post $post,Request $request)
    {
        #add other table check if user already liked if yes display on red
  
        $id = $post->id;
        $up = $request->input('vote');
        Log::debug('Reached this point');
        Log::debug($up);   
        DB::table('posts')->where('id' ,'=', $id)->increment('upvotes', $up);
        if($up == 1 ){
            DB::table('likes')->insert([
                'user_id' => auth()->id(),
                'post_id' => $id,
            ]);
        }else{
            DB::table('likes')->where('user_id' ,'=',  auth()->id())->where('post_id'  ,'=', $id)->delete();
        }

    }
    public function show(Post $post)
    {
        /*
        $reply = $post->replies();
        $imageData = DB::table('posts_images')
                ->where('post_id', '=', $post->id)
                ->orderBy('created_at', 'desc')
                ->get("image");
*/
         // Get the binary data of the image from the database

      // Create a response with the binary data and the appropriate MIME type
        $reply = $post->replies()->latest();
        $images =  $post->images()->get(['image']);
        $tags = $post->tags->pluck('tag');
        $results = DB::select('select * from likes where user_id = ? and post_id = ?', [auth()->id(), $post->id]);
        $results = json_encode($results);
        return view('Forums.show', compact('post','reply','tags','images','results'));
    }
 
    public function showEdit(Post $post)
    {
        return view('Forums.edit', compact('post'));
    }
    public function edit(Post $post){
        $validatedData = Validator::make(request()->all(),[
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:2000',        
           ]); 
    
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }



       $cmd = 'python .\\app\\Http\\Controllers\\detector\\ArabDetector.py  "' . request('body') . '"';
       //$job = (new detector($cmd))->onQueue('emails');
       Queue::push(new detector($cmd,request('body'),auth()->id(),$post->id));
      
       $cmd = 'python .\\app\\Http\\Controllers\\detector\\ArabDetector.py  "' . request('title') . '"';
       //$job = (new detector($cmd))->onQueue('emails');
       Queue::push(new detector($cmd,request('title'),auth()->id(),$post->id));


        $post=$post->editPost([
        	'body' => request('body'),
        	'title' => request('title'),
        ]);
        return  redirect('/post/'.$post->id);
    }

    

    public function destroy(Post $post)
    {
        $post->deletePost($post);
        return redirect('/post');
 
    }

    public function search(Request $request){
 //  ******* صلي الله على محمد ********       
        
        $text = $request->input("search");

        $query = Post::query();
        $requestData = $request->except('search');
       // $checkedBoxes = array_keys(array_filter($requestData)); 
        $checkedBoxes = $request->input('tags');
    if (is_null($text)){
        $query->join('tagged_posts', 'tagged_posts.post_id', '=', 'posts.id')
           ->where(function ($query) use ($checkedBoxes) {
            foreach ($checkedBoxes as $tag) {
                Log::debug( $tag);
                $query->orWhere('tagged_posts.tag', $tag);
           }
       });
       
    }else if(is_null($checkedBoxes)){
        $words = explode("\n", $this->stopWords);       
        $pattern = '/' . implode('\b|\b', $words) . '\b/';
        $pattern = str_replace('\b ', '\b\s*', $pattern);
        $text = preg_replace($pattern, "", $text);
        $keywords = explode(' ',$text);
        /*for( $i = 0 ; $i < sizeof($keywords) ; $i++ ) {
            $keywords[$i] = '/\b' . preg_quote( $keywords[$i] , '/') . '\b/';      
        }*/        
        foreach ($keywords as $keyword) {
             $query->where(function ($q) use ($keyword) {
              $q->where('title', 'like', '%'.$keyword.'%')
                  ->orWhere('body', 'like', '%'.$keyword.'%');
        });
        }
    }else{
        $words = explode("\n", $this->stopWords);       
        $pattern = '/' . implode('\b|\b', $words) . '\b/';
        $pattern = str_replace('\b ', '\b\s*', $pattern);
        $text = preg_replace($pattern, "", $text);
        $keywords = explode(' ',$text);
        /*for( $i = 0 ; $i < sizeof($keywords) ; $i++ ) {
            $keywords[$i] = '/\b' . preg_quote( $keywords[$i] , '/') . '\b/';      
        }*/        
        foreach ($keywords as $keyword) {
             $query->where(function ($q) use ($keyword) {
              $q->where('title', 'like', '%'.$keyword.'%')
                  ->orWhere('body', 'like', '%'.$keyword.'%');
        })->join('tagged_posts', 'tagged_posts.post_id', '=', 'posts.id')
            ->where(function ($query) use ($checkedBoxes) {
            foreach ($checkedBoxes as $tag) {
                $query->orWhere('tagged_posts.tag', $tag);
            }
        });
        }
    }
        $posts = $query->orderBy('upvotes', 'asc')->cursorPaginate(21);
        return view('Forums.forum', compact('posts'));
    }

    
}




/*
public function post_search(Request $request)
    {
        $text = $request['search'];
        $from = $request['where'] == "" ? : "blog";
        $requestData = $request->except('search','where');
        $checkedBoxes = array_keys(array_filter($requestData)); 
	    $query = BlogPost::query();
        if (is_null($text)){
            $query->join('tagged_posts', 'tagged_posts.post_id', '=', 'blog_post.id')
           ->where(function ($query) use ($checkedBoxes) {
            foreach ($checkedBoxes as $tag) {
               $query->orWhere('tagged_posts.tag', $tag);
            }
           });
       
        }else if($checkedBoxes){
        $text = preg_replace($this->pattern, "", $text);
        $keywords = explode(' ',$text);
        foreach ($keywords as $keyword) {
             $query->where(function ($q) use ($keyword) {
              $q->where('title', 'like', '%'.$keyword.'%')
                  ->orWhere('description', 'like', '%'.$keyword.'%');
        })->join('tagged_posts', 'tagged_posts.post_id', '=', 'blog_post.id')
            ->where(function ($query) use ($checkedBoxes) {
            foreach ($checkedBoxes as $tag) {
                $query->orWhere('tagged_posts.tag', $tag);
            }
        });
        }
    }else{
        $text = preg_replace($this->pattern, "", $text);
        $keywords = explode(' ',$text);
        foreach ($keywords as $keyword) {
             $query->where(function ($q) use ($keyword) {
              $q->where('title', 'like', '%'.$keyword.'%')
                  ->orWhere('description', 'like', '%'.$keyword.'%');
        });        
        }
    }
        $posts = $query->orderBy('blog_post.created_at')->paginate(10);
        $recent = BlogPost::orderBy('created_at', 'desc')->limit(4)->get();
        $user = auth()->user();
        dd($posts);
        return view('blog.index', compact("posts","recent","user"));

    }
*/