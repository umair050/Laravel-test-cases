<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index()
{
    $response = [
        "status"=>"success",
        "data"=>[]
    ];
    return $response;
    
    // return view('tasks.index', compact('tasks'));
}
}
