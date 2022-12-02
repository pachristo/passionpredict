<?php

namespace App\Solos\Modules\Story\Model;

use App\Solos\Modules\Comment\Model\Comment;
use App\Solos\Modules\User\Model\User;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = [
        'user_id',
        'content',
        'pictures',
        'likes',
        'shares',
        'comments',
        'shared',
        'sharer_id',
        'share_comment',
        'post_date',
        'status'
    ];

    public function poster()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sharer()
    {
        return $this->belongsTo(User::class, 'sharer_id');
    }

    public function inline_comments()
    {
        return $this->hasMany(Comment::class, 'post_id')->latest()->take(2);
    }

    public function all_comments()
    {
        return $this->hasMany(Comment::class, 'post_id')->latest();
    }
}
