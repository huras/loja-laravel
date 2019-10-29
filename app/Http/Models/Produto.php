<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['cover', 'nome', 'descricao', 'preco', 'peso_gramas'];

}
