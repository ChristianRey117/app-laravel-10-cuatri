<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estado;

class Defunciones extends Model
{
    use HasFactory;
    protected $table = 'defunciones';
    public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['estado_id','fecha', 'casos'];

    public function estado():BelongsTo{
        return $this->belongsTo(Estado::class);
    }
}
