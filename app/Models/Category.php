<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable =['name','slug','image','description','parent_id'];


    // Define the parent category relationship
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Define the child categories relationship
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }



}
