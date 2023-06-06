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
      

    $posts = ExamAnswers::with('questions')->where('exam_id',$id)->where('candidate_answer',null)->get();

      
       
        foreach ($posts as $post) {
            $answers=MCQ_Choice::where('question_id', $post->questions->id)->orderBy(DB::raw('RAND()'))->get();
           
           
        }

        return view('posts.index',compact('answers','post','posts'));
        }
       

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
           
                $ans=ExamAnswers::findOrFail($id);
              

            $url = $request->only('redirects_to');


            return redirect()->to($url['redirects_to'])->withSuccess(__('Post created successfully.'));


        return redirect()->route('posts.index')
            ->withSuccess(__('Post created successfully.'));
    }
    public function finish(Request $request, $id)
    {
          
            
            $ans=ExamAnswers::findOrFail($id);
            $id=$ans->questions->id;
            $ans->update($request->only('candidate_answer'));
          
          
            $exam=Exam::where('id',$ans->exam_id)->first();
        
            $exam->update(['completed' => true]);


       
            Auth::logout();

        return redirect()->route('home.index')
            ->withSuccess(__('Exam Submitted Successfully'));
    }



    public function imageindex()
    {
        return view('posts.image');
    }




    
     public function image(Request $request)
    {
       
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


        return redirect()->to($url['redirects_to'])->withSuccess(__('Post created successfully.'));


    }
    public function finished(Request $request, $id)
    {
        $ans=ExamAnswers::findOrFail($id);
        $id=$ans->questions->id;
        $ans->update($request->only('candidate_answer'));



        $exam=Exam::where('exam_id',$ans->exam_id);

        $exam->completed== true;
        return redirect()->to('/');


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

    }
    foreach ($questions as $question) {
  $question=Question::where('type','c')->first();
   }

      
        return view('scores', compact('users','user','exams','exam','answers','answer','questions','question'));
    }











    
}