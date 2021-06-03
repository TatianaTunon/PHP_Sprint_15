<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\player;

class crap extends Model
{
    public $timestamps = false; 

    use HasFactory;
    
    protected $primaryKey = 'id';
    protected $guarded = [''];

    public function player (){
        return $this->belongsTo(player::class, 'player_id');
    }
    public function mig(){
        return $this->$players->percentatge_mig=$players->total_percentatge/$players->count();
    }
}
