<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_fr', 
        'title_en',
        'body_fr',
        'body_en',
        'category_id',
        'user_id'
    ];

    public function ForumHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function ForumHasCategory(){
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
}
