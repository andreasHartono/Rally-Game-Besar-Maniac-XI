<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    protected $table = 'pos';

    //many to many dengan player
    public function players() {
        return $this->belongsToMany("App\Player", "poins", "pos_id", "player_id")->withPivot("poin");
    }
}
