<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MCQ_Choice;
use App\Models\Category;
use App\Models\ExamAnswers;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';

    protected $fillable = [
        'type',
        'question',
        'answer',
        'category',
        'image',
        'category_id',
    ];
    public function mcq_choices()
    {
        return $this->hasMany(MCQ_Choice::class);
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
    // public function next()
    // {
    //     return static::where($this->getKeyName(), '>', $this->getKey())->first();
    // }
    public function examanswers()
    {
        return $this->hasMany(ExamAnswers::class);
    }
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}