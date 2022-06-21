<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'nome_produto',
        'descricao_produto',
        'preco_produto'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
