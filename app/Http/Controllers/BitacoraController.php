<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\DB;

class BitacoraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('onlyAdmi');
    }
    
    public function index()
    {   
        $id_usuario = Auth::id();
        $bitacora = new Bitacora();
        $bitacora->registrarActividad("ACCEDIO", "BITACORA", 0);
        

        /*
        $ip = request()->ip();
        activity()->useLog('BITACORRA')->log($ip)->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = NULL;
        $lastActivity->save();

        */
        // $actividades = Activity::all(); 
        // return $actividades;
        /*
        $actividades = DB::table('activity_log')
             ->join('users', 'activity_log.causer_id', '=', 'users.id')->select('activity_log.*', 'users.name')->get();
        return view('bitacora.index', compact('actividades'));
        */
        $actividades = Bitacora::all();
        return view('bitacora.index', compact('actividades'));
        
    }
}
