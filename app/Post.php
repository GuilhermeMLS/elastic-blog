<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Searchable;

    protected $fillable = [
        'title',
        'body',
        'tags',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
