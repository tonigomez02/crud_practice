<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $table = 'players';
    protected $primaryKey = 'player_id';
    protected $fillable = ["name", "lastname", "position", "birthdate", "description", "salary", "retired", "image" ];
    protected $casts = [
        'retired' => 'boolean',
    ];
}
