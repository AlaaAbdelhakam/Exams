<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\MCQ_Choice;
use App\Models\User;
use App\Models\Exam;

use App\Models\ExamAnswers;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use URL;
use Redirect;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $posts = Question::all();

    $posts = ExamAnswers::with('questions')->where('exam_id',$id)->where('candidate_answer',null)->get();

        // $posts = Question::distinct()->inRandomOrder()->latest()->latest()->limit(3)->orderBy(DB::raw('RAND()'))->distinct()->paginate(1);
       
    //    $answers=null;
       
        foreach ($posts as $post) {
            $answers=MCQ_Choice::where('question_id', $post->questions->id)->orderBy(DB::raw('RAND()'))->get();
            // Session::put('id', $post->id);
           
           
        }

        // $id=$posts->id;
        // dd($q);
        
        // if (Session::get('redirects_to')) {
        //     return Redirect::to('/posts/?page='.$post->id+1)->with('posts','answers','post');
        // }else{
        //     $post=Question::find(Session::get('id'));
            // dd(Session::get('redirects_to'));

        return view('posts.index',compact('answers','post','posts'));
        }
        // if (  location.reload() ) 
        // {
        //     alert(data['success']);
        //    ;
        // } 
        // dd($posts->count());
        // if ($posts->count() ) {
         
            // }
                // return view('posts.index',compact('posts','answers'))->withInput();

         
// }}
// else{
    // $posts = Question::limit(1)->distinct()->inRandomOrder()->get();
    // foreach ($posts as $post) {
    //     $answers=MCQ_Choice::where('question_id', $post->id)->get();
    // }
                // return redirect()->to('/');

// }
    //    Exam::
       
    
    // return view('posts.index',compact('posts','answers'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $posts = Question::limit(1)->first();

    //     return view('posts.create',compact('posts'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
            // foreach ($request as $request) {
            // dd($request);
            // $id = $request->input('id');
                $ans=ExamAnswers::findOrFail($id);
              

                // ExamAnswers::create([
                //     'question_id'=> $request->id,
                //     // 'exam_id'=> auth()->user()->id,
                //     // 'exam_id'=> $request->exam_id,

                //     'candidate_answer'=> $request->candidate_answer,
                //     'answer'=> Question::where('id', $request->id)->first()->answer ,
    
                // ]);
            
            // }
            // $posts = Question::distinct()->inRandomOrder()->limit(2)->take(1)->paginate(1);
            // foreach ($posts as $post)
            // {
                
            //     $answers=MCQ_Choice::where('question_id', $post->id)->get();
                
            // }

            $url = $request->only('redirects_to');

            // Session::put('redirects_to',URL::current());

            return redirect()->to($url['redirects_to'])->withSuccess(__('Post created successfully.'));


        return redirect()->route('posts.index')
            ->withSuccess(__('Post created successfully.'));
    }
    public function finish(Request $request, $id)
    {
            // foreach ($request as $request) {
            // dd($request);
          


            // $ans=ExamAnswers::findOrFail($id);
            // $id=$ans->questions->id;
            // $ans->update($request->only('candidate_answer'));






            

            
            $ans=ExamAnswers::findOrFail($id);
            $id=$ans->questions->id;
            $ans->update($request->only('candidate_answer'));
          
          
            $exam=Exam::where('id',$ans->exam_id)->first();
                // dd($exam->completed);
        
            $exam->update(['completed' => true]);


            
            // }
            // $posts = Question::distinct()->inRandomOrder()->limit(2)->take(1)->paginate(1);
            // foreach ($posts as $post)
            // {
                
            //     $answers=MCQ_Choice::where('question_id', $post->id)->get();
                
            // }





            
            


            
            // return redirect()->to('/');


        return redirect()->route('home.index')
            ->withSuccess(__('Post created successfully.'));
    }



    public function imageindex()
    {
        return view('posts.image');
    }




    
     public function image(Request $request)
    {
        // $this->validate($request, [
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        // ]);

        $image_path = $request->file('image')->store('image', 'public');

        $data = Question::insert([
            'image' => $image_path,
        ]);

        session()->flash('success', 'Image Upload successfully');

        return redirect()->route('image.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ans=ExamAnswers::findOrFail($id);
        $id=$ans->questions->id;
        $ans->update($request->only('candidate_answer'));




        $url = $request->only('redirects_to');

        // Session::put('redirects_to',URL::current());

        return redirect()->to($url['redirects_to'])->withSuccess(__('Post created successfully.'));




        
        // return redirect()->route('posts.index', compact('id'))
        //     ->withSuccess(__('Post stored successfully.'));
    }
    public function finished(Request $request, $id)
    {
        $ans=ExamAnswers::findOrFail($id);
        $id=$ans->questions->id;
        $ans->update($request->only('candidate_answer'));



        $exam=Exam::where('exam_id',$ans->exam_id);

        $exam->completed== true;
        return redirect()->to('/');




        
        // return redirect()->route('posts.index', compact('id'))
        //     ->withSuccess(__('Post stored successfully.'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->withSuccess(__('Post deleted successfully.'));
    }



    public function examscores() 
    {
        $users = User::where('id' , '!=' , '1')->get();
    foreach ($users as $user) {
        $exams=Exam::where('user_id', $user->id)->get();
    }
    foreach ($exams as $exam) {
        $answers=ExamAnswers::where('exam_id', $exam->id)->get();
    }
    foreach ($answers as $answer) {
        $questions=Question::where('id', $answer->question_id)->get();
        // $questions=Question::where('id', $answer->question_id)->where('type','c')->get();

    }
    foreach ($questions as $question) {
  $question=Question::where('type','c')->first();
   }
    // return view('scores', compact('users','user','exams','answers','questions'));

      
        return view('scores', compact('users','user','exams','exam','answers','answer','questions','question'));
    }











    
}