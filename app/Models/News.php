<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'title',
        'date',
        'description',
        'status',
        'admin_id'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }


    // public function comment()
    // {
    //     return $this->morphOne(Comment::class, 'commentable');
    // }

    // public function comments()
    // {
    //     return $this->morphMany(Comment::class, 'commentable');
    // }

      /**
     * Get all of the comments for the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getActive() {

        return  $this -> active == 1 ? 'مفعل' : 'غير مفعل';
    }
}
