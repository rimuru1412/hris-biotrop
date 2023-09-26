<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function cuti()
    {
        return $this->belongsTo(Cuti::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
