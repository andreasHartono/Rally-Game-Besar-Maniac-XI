<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Player extends Authenticatable
{
    protected $table = 'players';

    protected $fillable = [
        'email', 'password','username'
    ];

    protected $hidden = [
        'password',
    ];

    //many to many dengan pos
    public function pos() {
        return $this->belongsToMany("App\Pos", "poins", "player_id", "pos_id")->withPivot("poin");
    }
    //many to many dengan pos
    public function artifact() {
        return $this->belongsToMany("App\Artifact", "player_artifacts", "player_id", "artifact_id");
    }
}
