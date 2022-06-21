<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'nome_campanha'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
