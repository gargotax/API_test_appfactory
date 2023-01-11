<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property integer id
 * @property string body
 * @property string title
 */
class Post extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'body'];
}
