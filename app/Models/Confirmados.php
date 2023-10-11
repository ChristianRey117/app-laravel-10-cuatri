<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmados extends Model
{
    use HasFactory;
    protected $table = 'confirmados';
    public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['estado_id','fecha', 'casos'];
}
