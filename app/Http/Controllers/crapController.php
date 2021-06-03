<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\player;
use App\Models\crap;
use App\Http\Requests\crapsRequest;

class crapController extends Controller
{

public function create(player $player, Request $request) { 

    $crap1=rand(1,6);
    $crap2=rand(1,6);

    if ($crap1+$crap2==7) ($res="Exit");
    else ($res="Failure");
 
    //arreglo para enviar la tirada
    $crap = crap::create(['crap1'=>$crap1, 'crap2'=>$crap2, 'res' => $res, 'player_id'=>$player->id]);
    
    //% éxitos de cada player (sube datos a la tabla players)
    $player->total_tiradas++;
    if ($res=="Exit") ($player->total_exitos++);
    else ($player->total_exitos=$player->total_exitos+0);

    if($player->total_exitos>0)
      ($player->total_percentatge=$player->total_exitos/$player->total_tiradas);
    else ($player->total_percentatge=0);
    $player->update (['player'=>$request['total_tiradas'. 'total_exitos']]);
    
    return view ('games', compact ('crap'));  
}

public function destroy(crap $crap, player $player) {
    $player->crap->each->delete();
    return redirect()->route('index');
}

}
