<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lists;

class IndexController extends Controller
{
    public function index(){
        return view('index', [
            'list' => Lists::with('todo')->where('user_id', auth()->user()->id)->latest()->paginate(4)
        ]);
    }
}
