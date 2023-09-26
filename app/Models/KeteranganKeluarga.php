<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganKeluarga extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function keluarga()
    {
        return $this->hasMany(Keluarga::class);
    }
}
