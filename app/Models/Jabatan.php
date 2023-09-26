<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function identity()
    {
        return $this->hasMany(Identity::class);
    }

    public function cuti(){
        return $this->hasMany(Cuti::class);
    }
}
