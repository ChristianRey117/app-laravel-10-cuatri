<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estado;

class Confirmados extends Model
{
    use HasFactory;
    protected $table = 'confirmados';
    protected $primaryKeyy = 'my_row_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['estado_id','fecha', 'casos'];

    public function estado():BelongsTo{
        return $this->belongsTo(Estado::class);
    }
}
