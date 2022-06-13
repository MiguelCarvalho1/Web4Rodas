<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carros extends Model
{
    use HasFactory;
    protected $table = "table_carro";
    protected $guarded = [];

    public function tipo() {
        return $this->hasOne('App\Models\Veiculo', 'id');
    }
    
}
