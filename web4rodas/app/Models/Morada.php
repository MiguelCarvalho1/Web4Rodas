<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morada extends Model
{
    use HasFactory;
    protected $table = "table__morada";
    protected $guarded = [];

    public function tipoCarta(){
        return $this->hasMany(Motorista::class);
    }
}
