<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = "tipo_carta";
    protected $guarded = [];

    public function tipoCarta(){
        return $this->hasMany(Motorista::class);
    }
}
