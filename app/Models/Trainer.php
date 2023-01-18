<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'last_name',
        'age',
        'birthday',
    ];
    public function team(){
        return $this->hasMany(Team::class);
    }
}
