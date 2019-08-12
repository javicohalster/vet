<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Razas extends Model
{
	protected $table = "razas";

     protected $fillable = [
        'id', 'nombre', 'url', 'descripcion', 'estado'
    ];

    public static function razas($id) //obtiene las razas del paciente en session.
    {
        $razas = User::findOrFail($id)->razas; //lista las razas del paciente en sesión.
        return $razas;
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
     public function setNombreAttribute($valor)
    {
        $this->attributes['nombre'] = strtolower($valor);
    }
    public function getNombreAttribute($valor)
    {
        return ucwords($valor);
    }
}
