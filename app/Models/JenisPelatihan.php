<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPelatihan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pelatihan()
    {
        return $this->hasMany(Pelatihan::class);
    }
}
