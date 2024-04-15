<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $todos = todo::all();
        return view('welcome', [
            'todos' => $todos
        ]);
    }
    public function store(){
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);
        todo::create($attributes);
        return redirect('/');
    }

    public function update(todo $todo){
        $todo->update(['isDone' => true]);
        return redirect('/');
    }
    public function destroy(todo $todo){
        $todo->delete();
        return redirect('/');
    }

    
}
