<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Institucion;
use App\Models\Proyecto_User;


class Proyecto extends Model
{
    public $table='proyectos';
    protected $fillable=['idproyecto','idinstitucion','idcliente','idservicio','idarea','plan','estado_pago','estado_trabajo','fechacontacto_ultima','link_drive','observaciones','fecha_inicio','fecha_fin','idcarrera'];
    protected $primaryKey='idproyecto';
    public $timestamps=false;
    use HasFactory;

    /* public function Institucion() {
        return $this->belongsTo(Institucion::class);
    }
    
    public function Proyecto_usuario() {
        return $this->belongsToMany(Proyecto_User::class);
    } */
    
}
