<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Confirmados;
use App\Models\Defunciones;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estado extends Model
{
    use HasFactory;
    protected $table = 'estados';
    protected $primaryKeyy = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['poblacion','nombre', 'id_estado'];

    public function confirmados():HasMany{
        return $this->hasMany(Confirmados::class);
    }

    public function defunciones():HasMany{
        return $this->hasMany(Defunciones::class);
    }
}
