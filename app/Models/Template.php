<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;
use App\Models\Template;

class Template extends Model
{
    use HasFactory;

    protected $table = 'template';

    protected $fillable = [
        'name',
        // 'number_of_questions',
        // 'template_name',
    ];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Template::class, 'template_category');
    }
}