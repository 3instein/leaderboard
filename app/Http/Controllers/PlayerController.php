<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => ['required'],
            'poin' => ['required', 'digits_between:1,6']
        ]);
        
        Player::create($validatedData);

        return redirect()->route('home')->with('success', 'Player has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $validatedData = $request->validate([
            'nama' => ['required'],
            'poin' => ['required']
        ]);

        $player->update($validatedData);

        return redirect()->route('home')->with('success', 'Player has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->route('home')->with('success', 'Player has been deleted!');
    }

    public function reset(){
        foreach(Player::all() as $e){
            $e->delete();
        }

        return redirect()->route('home')->with('success', 'Table reset!');
    }
}
