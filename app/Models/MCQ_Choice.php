<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class MCQ_Choice extends Model
{
    use HasFactory;
    protected $table = 'mcq_choices';

    protected $fillable = [
        'question_id',
        'question',
        'possible_answer',
    ];

    public function questions()
    {
        return $this->belongsTo(Question::class,'question_id');
    }
    public function scopeAnswer() {
        return $this->question_id;
    }
}