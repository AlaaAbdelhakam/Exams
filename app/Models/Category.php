<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Category;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';

    protected $fillable = [
        'name',
       
    ];
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function templates()
    {
        return $this->belongsToMany(Category::class, 'template_category');
    }
}