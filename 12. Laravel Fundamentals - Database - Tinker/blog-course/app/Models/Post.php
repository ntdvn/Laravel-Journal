<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    // protected $table = 'posts';//custom table name
    // protected $primaryKey = 'id';//custom id
    protected $date = ['deleted_at'];
    protected $fillable = [
        'title', 'body', 'is_admin'
    ];

    public function user()
    {
        return $this -> belongsTo(User::class);
    }

    public function photos()
    {
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
