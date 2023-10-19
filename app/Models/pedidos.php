<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pedidos';
    public $timestamps = false;
    protected $guarded = [];
}
