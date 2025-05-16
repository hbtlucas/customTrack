<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pedido';
    public $timestamps = false;
    protected $guarded = [];

    protected $fillable = [
        'id_cliente',
        'id_produto',
        'quantidade',
        'id_forma_pagamento',
        'status_pedido',
        'status_pagamento',
        'valor_pedido',
    ];
    
    public function clientes()
    {
        return $this->belongsTo(clientes::class, 'id_cliente');
    }

    public function produtos()
    {
        return $this->belongsTo(produtos::class, 'id_produto');
    }
}
