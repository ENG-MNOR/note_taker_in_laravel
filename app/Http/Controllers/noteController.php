<?php

namespace App\Http\Controllers;

use App\Models\note;
use Illuminate\Http\Request;

class noteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = note::query()->orderBy('created_at', 'desc')->get();
        // dd($notes);
        return view('note.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'note' => ['required', 'string']
        ]);
        $data['user_id'] = 1;
        $note = note::create($data);
        return to_route('note.show', $note)->with('message', "note created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(note $note)
    {
        return view('note.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(note $note)
    {
        return view('note.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, note $note)
    {
        $data = $request->validate([
            'note' => ['required', 'string']
        ]);
        $note->update($data);
        return to_route('note.show', $note)->with('message', 'note updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(note $note)
    {
        return 'destroy';
    }
}
