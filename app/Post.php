<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;


class Post extends Model
{
    protected $table = "posts";

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public static function boot ()
    {
        parent::boot();

        self::deleting(function (Post $post) {

            foreach ($post->comments as $comment) {
                Storage::disk('public')->delete($comment->path);
                $comment->delete();
            }
        });
    }
}
