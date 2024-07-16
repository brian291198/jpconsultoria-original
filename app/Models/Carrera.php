<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    public $table='carreras';
    protected $fillable=['idcarrera','nombre','idinstitucion'];
    protected $primaryKey='idcarrera';
    public $timestamps=false;
    use HasFactory;
}
