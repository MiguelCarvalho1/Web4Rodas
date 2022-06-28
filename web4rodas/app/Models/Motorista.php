<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = "table_motorista";
    protected $guarded = [];

    public function tipoCarta() {
        return $this->BelongsTo('App\Models\Carta', 'id');
    }

    
    public function morada() {
        return $this->BelongsTo('App\Models\Morada', 'id, rua, n_porta, andar, codigoPostal, localidade ');
    }


}
