<?php

namespace CodePress\CodeCategory\Models;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "codepress_posts";

    protected $fillable = [
        'title',
        'content',
        'slug'
    ];

    public function categories(){
        return $this->morphToMany('CodePress\CodeCategory\Models\Category','categorizable','codepress_categorizables');
    }

}