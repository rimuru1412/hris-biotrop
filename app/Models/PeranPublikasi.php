<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeranPublikasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function publikasi()
    {
        return $this->hasMany(Publikasi::class);
    }
}
