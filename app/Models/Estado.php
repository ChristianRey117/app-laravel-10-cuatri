<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Confirmados;
use App\Models\Defunciones;
use App\Models\Negativos;
use App\Models\Sospechosos;
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

    public function sospechosos():HasMany{
        return $this->hasMany(Sospechosos::class);
    }
    
    public function negativos():HasMany{
        return $this->hasMany(Negativos::class);
    }
}
