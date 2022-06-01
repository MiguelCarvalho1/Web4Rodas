<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamentos extends Model
{
    use HasFactory;
    protected $table = "agendamentos";
    protected $guarded = [];

    
    protected $fillable = [
        'descricao', 'data_incio', 'data_fim'
    ];
   
}
