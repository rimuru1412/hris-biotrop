<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jenispublikasi()
    {
        return $this->belongsTo(JenisPublikasi::class);
    }

    public function identifier()
    {
        return $this->belongsTo(Identifier::class);
    }
}
