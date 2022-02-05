<?php

namespace App\Http\Controllers;

use App\Models\Lists as ModelsLists;
use App\Models\Todo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Lists extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('list.create', [
            'title' => 'Create List!',
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
            'name_list' => 'required|unique:lists|min:3'
        ]);

        $validated['slug'] = Str::slug($request->name_list);
        $validated['user_id'] = Auth::user()->id;
        $request->session()->put('name_list', $request->name_list);

        ModelsLists::create($validated);

        return redirect('/todo/create')->with('successList', 'List anda saat ini : ' . $request->name_list);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelsLists::destroy($id);
        Todo::where('lists_id', $id)->delete();
        
        return redirect('/todo')->with('msgDeleteList', 'List has been deleted!');
    }
}
