<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'user_id',
        // 'commentable_id',
        // 'commentable_type',
        // 'supadmin_id'
    ];


    // public function commentable()
    // {
    //     return $this->morphTo();
    // }

    /**
     * Get the user that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function news()
    {
        return $this->belongsTo(News::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // public function news()
    // {
    //     return $this->belongsTo(News::class);
    // }
}
