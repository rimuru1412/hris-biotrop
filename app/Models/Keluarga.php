<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function keterangankeluarga()
    {
        return $this->belongsTo(KeteranganKeluarga::class);
    }

    public function jenjangpendidikan()
    {
        return $this->belongsTo(JenjangPendidikan::class);
    }
}
