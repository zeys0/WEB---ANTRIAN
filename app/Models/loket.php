<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loket extends Model
{
    use HasFactory;
    public function antrians()
    {
        return $this->hasMany(Antrian::class);
    }
}
