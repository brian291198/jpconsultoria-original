<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proyecto;
class Institucion extends Model
{
    public $table='instituciones';
    protected $fillable=['idinstitucion','nombre','abreviatura','idtipo'];
    protected $primaryKey='idinstitucion';
    public $timestamps=false;
    use HasFactory;

    /* public function Proyecto() {
        return $this->belongsToMany(Proyecto::class);
    } */
}
