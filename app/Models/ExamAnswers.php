<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Exam;

class ExamAnswers extends Model
{
    use HasFactory;
    protected $table = 'exam_answers';

    protected $fillable = [
        'question_id',
        'answer',
        'candidate_answer',
        'exam_id',

    ];

    public function questions()
    {
        return $this->belongsTo(Question::class,'question_id');
    }
   
    public function isTrueorFalse() {
        return $this->type === 't';
     }
     public function isComplete() {
    return $this->type === 'c';
    }  
    public function isMultipleChoice() {
        return $this->type === 'm';
    }
    public function examAnswer() {
        return $this->answer;
    }
    public function exams()
    {
        return $this->belongsTo(Exam::class,'exam_id');
    }
}