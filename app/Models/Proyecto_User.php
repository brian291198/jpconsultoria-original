<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proyecto;
use App\Models\User;

class Proyecto_User extends Model
{
    public $table='proyecto_user';
    protected $fillable=['idinstitucion','idusuario'];
    protected $primaryKey='idinstitucion';
    public $timestamps=false;
    use HasFactory;

    /* public function Proyecto() {
        return $this->belongsTo(Proyecto::class);
    }

    public function User() {
        return $this->belongsTo(User::class);
    } */
}
