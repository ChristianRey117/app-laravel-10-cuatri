<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $table = 'estados';
    protected $primaryKeyy = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['poblacion','nombre', 'id_estado'];
}
