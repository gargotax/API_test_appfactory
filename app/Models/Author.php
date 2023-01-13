<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property string name
 * @property string lastname
 * @property string birthday
 */
class Author extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'surname', 'birthday'];
}
