<?php

namespace App\Solos\Modules\Comment\Model;

use App\Solos\Modules\User\Model\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'commenter',
        'comment',
        'comment_pictures',
        'likes'
    ];

    public function commentee()
    {
        return $this->belongsTo(User::class, 'commenter');
    }
}
