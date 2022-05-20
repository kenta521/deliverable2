<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    'title',
    'body',
    ];

    public function getBylimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at','DESC')->limit($limit_count)->get();
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
