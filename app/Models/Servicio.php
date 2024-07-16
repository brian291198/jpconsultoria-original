<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    public $table='servicios';
    protected $fillable=['idservicio','denominacion'];
    protected $primaryKey='idservicio';
    public $timestamps=false;
    use HasFactory;
}
