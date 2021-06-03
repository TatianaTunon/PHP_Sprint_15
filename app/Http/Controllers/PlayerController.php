<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\player;
use App\Models\crap;
use App\Http\Requests\playersRequest;


class PlayerController extends Controller
{

    public function index(Request $request) {  
        $players = player::all(); 
        return view('index', compact ('players'));
     }

    public function create() { 
        //$players = player::all(); 
        return view('create');
     }

     public function show(player $player) { 
        $players = player::find($player); 
        //return view('show', compact ('players'));
        return view ('show')
                 ->with('player', $player)
                 ->with('crap', $player->crap);
     }
     
    public function store(playersRequest $request) { 
        $players = player::create($request->all());
        return redirect()->route('index');
        }   

    public function edit(player $player) { 
        return view('edit', compact('player'));
        }

    public function update(Request $request, player $player) { 
        $request->validate([ 
            'name' => 'nullable|unique:players',
        ]);
        
        $player->update($request->all());
        return redirect()->route('index');
    }

    public function percentatge (player $player) {
        $players = player::all(); 
      
        $total_percentatge = player::all()->sum('total_percentatge')/$players->count();
       
        return view ('llist', compact ('players', 'total_percentatge'));
    }

    public function winner (player $player) { 

       $player = player::orderBy('total_percentatge', 'desc')->first(); 
       $maxValue = $player->name;

       return view ('winner', compact ('maxValue', 'player'));
    }


    public function loser(player $player) { 

        $player = player::orderBy('total_percentatge', 'asc')->first(); 
        $maxValue = $player->name;
 
        return view ('loser', compact ('maxValue', 'player'));
     }
}
