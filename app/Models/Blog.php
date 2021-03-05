<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['title', 'content', 'slug','logo'];


    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
