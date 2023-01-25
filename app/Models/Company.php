<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property string field
 * @property string city
 * @property string state
 *
 */
class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'field', 'city', 'city'];

    public function employees()
    {
     return $this->hasMany(Employee::class);
    }




}
