<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function jeniscuti()
    {
        return $this->belongsTo(JenisCuti::class);
    }

    public function identity()
    {
        return $this->belongsTo(Identity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
