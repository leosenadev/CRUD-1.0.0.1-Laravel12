<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listaContatos extends Model
{
    protected $table = 'contatos';

    protected $fillable =[
        'name','email','contato','status','capa','password'
    ];

}
