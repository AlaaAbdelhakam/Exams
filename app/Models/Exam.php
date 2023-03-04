<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ExamAnswers;
use App\Models\Template;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exam';

    protected $fillable = [
        'user_id',
        'score',
        'date',
        'completed',
        'template_id',

    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function examanswers()
    {
        return $this->hasMany(ExamAnswers::class);
    }
    public function templates()
    {
        return $this->belongsTo(Template::class,'template_id');
    }
}