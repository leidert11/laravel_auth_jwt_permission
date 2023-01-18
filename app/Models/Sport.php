<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description'
    ];
    public function position(){
        return $this->hasMany(Position::class);
    }
    public function team(){
        return $this->hasMany(Team::class);
    }
}
