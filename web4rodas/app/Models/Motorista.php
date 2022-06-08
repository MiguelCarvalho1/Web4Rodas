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

    public function tipo() {
        return $this->BelongsTo('App\Models\Veiculo', 'id');
    }


}
