<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produtos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_produto';
    public $timestamps = false;
    protected $fillable = ['nome_produto', 'valor_produto', 'categoria'];

    public function pedidos()
    {
        return $this->hasMany(pedidos::class, 'id_produto');
    }
}
