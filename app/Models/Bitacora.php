<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Bitacora extends Model
{
    use HasFactory;
    protected $table = 'bitacoras';
    protected $fillable = ['id_usuario', 'accion', 'gestion', 'id_implicado', 'ip_usuario', 'fecha', 'hora'];


    public function registrarActividad($accion, $gestion, $id_implicado)
    {
        $ip = request()->ip();
        $id_usuario = Auth::id();
        return $this->create([
            'id_usuario' => $id_usuario,
            'accion' => $accion,
            'gestion' => $gestion,
            'id_implicado' => $id_implicado,
            'ip_usuario' => $ip,
            'fecha' => Carbon::now()->format('d-m-Y'),
            'hora' => Carbon::now()->format('H:i:s')
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
