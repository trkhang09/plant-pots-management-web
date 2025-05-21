<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'price',
        'description',
        'image',
        'plant',
        'pot',
        'status'
    ];

    // Mối quan hệ với Plant
    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant');
    }

    // Mối quan hệ với Pot
    public function pot()
    {
        return $this->belongsTo(Pot::class, 'pot');
    }

    // Mối quan hệ với Status
    public function status()
    {
        return $this->belongsTo(Status::class, 'status');
    }
}
