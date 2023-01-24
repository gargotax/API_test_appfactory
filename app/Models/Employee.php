<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property integer id
 * @property string lastname
 * @property string role
 * @property integer age
 * @property string cf
 * @property integer salary
 * @property integer company_id
 */
class Employee extends Model
{
    use HasFactory;

    protected $fillable= ['name', 'lastname', 'role', 'age', 'salary', 'company_id', 'cf'];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
