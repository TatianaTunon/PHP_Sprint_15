<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\crap;


class player extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded = [''];

    public function crap (){
        return $this->hasMany(crap::class);
    }
}
