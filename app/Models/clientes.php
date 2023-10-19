<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_cliente';
    public $timestamps = false;
    protected $fillable = ['nome_cliente', 'telefone', 'email','cpf'];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_cliente');
    }
}
