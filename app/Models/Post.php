<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property integer id
 * @property string body
 * @property string title
 * @property integer owner_id
 */
class Post extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'body', 'owner_id'];

    public function author()
    {
        return $this->belongsTo(Author::class, 'owner_id', 'id');
    }
}
