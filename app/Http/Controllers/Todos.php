<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Lists;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Todos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('todo.index', [
            'title' => 'Todo List Page!',
            'list' => Lists::with('todo')->where('user_id', auth()->user()->id)->latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create', [
            'title' => 'Create new Todo List!',
            'list' => Lists::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'lists_id' => 'required',
            'title' => 'required|min:5|max:255',
            'desc' => 'required'
        ]);

        $validated['user_id'] = Auth::user()->id;
        $validated['slug'] = Str::slug($request->title);

        Todo::create($validated);

        return redirect('/todo')->with('msgSuccess', 'Task has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('todo.edit', [
            'todo' => Todo::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required'
        ]);

        Todo::find($id)
            ->update($validated);

        return redirect('/todo')->with('msgUpdate', 'Task has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::destroy($id);

        return redirect('/todo')->with('msgDelete', 'Task has been Deleted!');
    }

    public function updateFinish($id){
        Todo::find($id)->update([
            'finish' => true
        ]);

        return redirect('/todo')->with('msgFinish', 'Task Done!');
    }
}
