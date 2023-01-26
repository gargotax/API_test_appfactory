<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\skills;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function newSkills(Request $request)
    {
        $skills = new skills();
        $skills->fill($request->all());
        $skills->save();
        return $skills;
    }
}
