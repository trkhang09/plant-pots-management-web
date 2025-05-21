<?php

namespace App\Services;

use App\Models\Pot;

class PotService {
    public function all(){
        return Pot::all();
    }
    public function createIfNeeded(?String $name): ?int {
        if(!$name) return null;
        else{
            $pot = Pot::firstOrCreate(['name' => $name]);
            return $pot->id;
        }
    }
}
    