<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateCategory extends Model
{
    use HasFactory;
    protected $table = 'template_category';

    protected $fillable = [
        'number_of_questions',
        'category_id',
        'template_id',
    ];

}