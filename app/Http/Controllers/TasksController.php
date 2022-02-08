<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function new(Request $request){
        var_dump($request->all());
    }
}
