<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_grupo'
    ];

    public function city()
    {
        return $this->hasMany(City::class);
    }

    public function campaign()
    {
        return $this->hasOne(Campaign::class);
    }
}
