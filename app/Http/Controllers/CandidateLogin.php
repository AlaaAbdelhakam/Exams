<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use Carbon\Carbon;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Template;
use App\Models\TemplateCategory;

use App\Models\ExamAnswers;
use DB;
class CandidateLogin extends Controller
{
    public function show()
    {
        $templates=Template::all();
        return view('login', compact('templates'));
    }

    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::guard('web')->attempt(['password' => $request->password, 'national_id' => $request->input('national_id')], $request->remember)) {
            // return redirect()->intended(route('posts.index'));


            // dd($request);
            $exams=Exam::where('user_id',Auth::user()->id)->where('completed',false)->first();
            if(!$exams){
                $exam=Exam::create([
                    'user_id'=> Auth::user()->id,
                    // 'exam_id'=> auth()->user()->id,
                    // 'exam_id'=> $request->exam_id,
    
                    'date'=> Carbon::now(),
                    'completed'=> false,
                    'template_id'=>$request->template,
                ]);
                $id=$exam->id;
                $templatecategory=TemplateCategory::where('template_id',$request->template)->orderBy('id', 'DESC')->get();


                
                        foreach ($templatecategory as $tempcat) {

                            $questions=Question::orderBy(DB::raw('RAND()'))->distinct()->where('category_id',$tempcat->category_id)->take(1)->limit($tempcat->number_of_questions)->get();
                
                
                
                            foreach ($questions as $post) {
                            
            
            
            
                                
                                // $answers=MCQ_Choice::where('question_id', $post->id)->get();
                                // Session::put('id', $post->id);
                                ExamAnswers::create([
                                   'question_id'=> $post->id,
                                   // 'exam_id'=> auth()->user()->id,
                                   'exam_id'=> $exam->id,
                       
                                   'candidate_answer'=> null,
                                   'answer'=> $post->answer,
                       
                               ]);


                            
                    }
              
                   
                   
                }
                
            }else{
                $id=$exams->id;


                
            }


// dd($id);

            
          
            
                return redirect()->route('posts.index', compact('id'));
                        //    return redirect()->to('/posts')->with($exam->id,'id');
            
        }
    }
}