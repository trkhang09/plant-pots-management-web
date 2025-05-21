<?php

namespace App\Services;

use App\Models\Plant;

class PlantService {
    public function all(){
        return Plant::all();
    }
    public function createIfNeeded(?String $name): ?int{
        if(!$name) return null;
        else{
            $plant = Plant::firstOrCreate(['name' => $name]);
            return $plant->id;
        }
    }
}
    