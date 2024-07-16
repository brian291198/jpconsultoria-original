<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $table='areas';
    protected $fillable=['idarea','nombre'];
    protected $primaryKey='idarea';
    public $timestamps=false;
    use HasFactory;
}
