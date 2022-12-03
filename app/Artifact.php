<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artifact extends Model
{
    //many to many dengan player
    public function players() {
        return $this->belongsToMany("App\Player", "player_artifacts", "artifact_id", "player_id");
    }
}
