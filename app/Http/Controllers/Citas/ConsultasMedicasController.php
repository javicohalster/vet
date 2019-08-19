<?php

namespace App\Http\Controllers\Citas;

use App\User;
use App\Query;
use App\Speciality;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarAtenderRequest;
use App\Http\Requests\ValidarHospitalizarRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class ConsultasMedicasController extends Controller
{
    public function index()
    {
        $doctores = User::select(['id', 'nombres', 'apellidos'])->withRole('doctor')->orderBy('apellidos', 'asc')->get();
        $pacientes = User::select(['id', 'nombres', 'apellidos'])->withRole('paciente')->orderBy('apellidos', 'asc')->get();
        $especialidades = Speciality::select(['id', 'nombre'])->orderBy('nombre', 'asc')->get();
        $cantidad_pacientes = User::withRole('paciente')->count();
        $reservas = Query::where('estado', 'pendiente')->count();
        return view('consultas_medicas.index',compact('doctores', 'pacientes', 'cantidad_pacientes', 'reservas', 'especialidades'));
    }

    public function show()
    {
        if (Auth::user()->hasRole('doctor')) {
       $consultas = Query::join('users as paciente', 'queries.paciente_id', '=', 'paciente.id')
        ->join('users as doctor', 'queries.doctor_id', '=', 'doctor.id')
        ->join('specialities as especialidad', 'queries.speciality_id', '=', 'especialidad.id')
        ->select(['queries.id as id', 'queries.fecha_inicio', 'paciente.nombres as paciente', 'paciente.apellidos as apellidos', 'doctor.apellidos as doctor', 'especialidad.nombre as especialidad', 'queries.estado as estado'])->where('queries.estado', '=' , 'pendiente')
        ->where('doctor_id', Auth::user()->id)->get();
    }else{
        $consultas = Query::join('users as paciente', 'queries.paciente_id', '=', 'paciente.id')
        ->join('users as doctor', 'queries.doctor_id', '=', 'doctor.id')
        ->join('specialities as especialidad', 'queries.speciality_id', '=', 'especialidad.id')
        ->select(['queries.id as id', 'queries.fecha_inicio', 'paciente.nombres as paciente', 'paciente.apellidos as apellidos', 'doctor.apellidos as doctor', 'especialidad.nombre as especialidad', 'queries.estado as estado'])->where('queries.estado', '=' , 'pendiente');
    }
        return  datatables()->of($consultas)
            ->editColumn('paciente', function ($consulta) {
                return ucwords($consulta->apellidos. ' ' .$consulta->paciente);
            })
            ->editColumn('doctor', function ($consulta) {
                return ucwords('Dr. '.$consulta->doctor);
            })
            ->editColumn('fecha_inicio', function ($consulta) {
                return $consulta->getYearsAttribute();
            })
            ->addColumn('action', function ($consulta) {
                 $atender ="";
                 $vacunar ="";
                 $editar ="";
                 $eliminar = "";
                 $hospitalizar = "";
                 $cirugia = "";
                 $pagar = '<a href="#" onclick="atender('.$consulta->id.')" data-toggle="modal" data-target="#modal_pago" rel="tooltip" title="Pagar" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">attach_money</i></a>';
                 if (Auth::user()->can('editar-atender')) {
                   $atender = '<a href="#" onclick="atender('.$consulta->id.')" data-toggle="modal" data-target="#modal_atender" rel="tooltip" title="Atender" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">done_all</i></a>';
                }
               /*  if (Auth::user()->can('editar-atender')) {
                    $vacunar = '<a href="#" onclick="vacunar('.$consulta->id.')" data-toggle="modal" data-target="#modal_vacunar" rel="tooltip" title="Vacunar" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">add_location</i></a>';
                 }
                 if (Auth::user()->can('editar-atender')) {
                    $hospitalizar = '<a href="#" onclick="hospitalizar('.$consulta->id.')" data-toggle="modal" data-target="#modal_hospitalizar" rel="tooltip" title="Hospitalizar" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">local_hospital</i></a>';
                 }
                 if (Auth::user()->can('editar-atender')) {
                    $cirugia = '<a href="#" onclick="cirugia('.$consulta->id.')" data-toggle="modal" data-target="#modal_cirugia" rel="tooltip" title="Cirugía" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">colorize</i></a>';
                 }*/
                if (Auth::user()->can('editar-citas')) {
                $editar = '<a href="#" onclick="update_cita_pendiente('.$consulta->id.')" data-toggle="modal" data-target="#modal_update_cita" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                }
                if (Auth::user()->can('eliminar-citas')) {
                $eliminar = '<a href="#" onclick="delete_cita_pendiente('.$consulta->id.')" data-toggle="modal" data-target="#eliminar_paciente" rel="tooltip" title="Eliminar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';
                }

                return $pagar.$atender.$editar.$eliminar;
            })->make(true);
    }
    

    public function carga_atendidos()
    {
        if (Auth::user()->hasRole('doctor')) {
       $consultas = Query::join('users as paciente', 'queries.paciente_id', '=', 'paciente.id')
        ->join('users as doctor', 'queries.doctor_id', '=', 'doctor.id')
        ->join('specialities as especialidad', 'queries.speciality_id', '=', 'especialidad.id')
        ->select(['queries.id as id', 'queries.fecha_inicio', 'paciente.nombres as paciente', 'paciente.apellidos as apellidos', 'doctor.apellidos as doctor', 'especialidad.nombre as especialidad'])->where('queries.estado', '=' , 'atendido')->where('doctor_id', Auth::user()->id)->get();
    }else{
        $consultas = Query::join('users as paciente', 'queries.paciente_id', '=', 'paciente.id')
        ->join('users as doctor', 'queries.doctor_id', '=', 'doctor.id')
        ->join('specialities as especialidad', 'queries.speciality_id', '=', 'especialidad.id')
        ->select(['queries.id as id', 'queries.fecha_inicio', 'paciente.nombres as paciente', 'paciente.apellidos as apellidos', 'doctor.apellidos as doctor', 'especialidad.nombre as especialidad'])->where('queries.estado', '=' , 'atendido');
    }
        return  datatables()->of($consultas)
            ->editColumn('paciente', function ($consulta) {
                return ucwords($consulta->apellidos. ' ' .$consulta->paciente);
            })
            ->editColumn('doctor', function ($consulta) {
                return ucwords('Dr. '.$consulta->doctor);
            })
            ->editColumn('fecha_inicio', function ($consulta) {
                return $consulta->getYearsAttribute();
            })
            ->addColumn('action', function ($consulta) {
                $ver ="";
                $editar ="";
                $eliminar ="";
                $vacunar ="";
                $hospitalizar ="";
                if (Auth::user()->can('leer-citas')) {
                $ver = '<a href="#" onclick="ver_atencion('.$consulta->id.')" data-toggle="modal" data-target="#modal_ver" rel="tooltip" title="Ver consulta" class="btn btn-simple btn-primary btn-icon edit"><i class="material-icons">remove_red_eye</i></a>';
            }
            if (Auth::user()->can('editar-atender')) {
                $editar = '<a href="#" onclick="atender('.$consulta->id.')" data-toggle="modal" data-target="#modal_atender" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
            }
            
            
            if (Auth::user()->can('eliminar-consultas')) {
                $eliminar = '<a href="#" onclick="delete_cita_pendiente('.$consulta->id.')" data-toggle="modal" data-target="#eliminar_paciente" rel="tooltip" title="Eliminar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';
            }
                return $ver.$editar.$eliminar;
            })->make(true);
    }
    

    public function atender(ValidarAtenderRequest $request, Query $queries, User $users, $id)
    {
        $atender =   $queries->findOrFail($id);
        $paciente =  $users->findOrFail($atender->paciente_id);
        $visitas =   $queries->all()->where('paciente_id', '=', $atender->paciente_id)->where('estado', '=', 'atendido')->count();
        return response()->json([
                'success' => true,
                "paciente"=> $paciente->nombres . ' '. $paciente->apellidos,
                "edad"    => $paciente->getYearsAttribute(),
                "visitas" => $visitas,
                "id"      => $atender->id
            ]);
    }

    public function ver_atencion(ValidarHospitalizarRequest $request, Query $queries, User $users, $id)
    {
        $atender =   $queries->findOrFail($id);
        $paciente =  $users->findOrFail($atender->paciente_id);
        $visitas =   $queries->all()->where('paciente_id', '=', $atender->paciente_id)->where('estado', '=', 'atendido')->count();
        return response()->json([
                'success' => true,
                "paciente"=> $paciente->nombres . ' '. $paciente->apellidos,
                "edad"    => $paciente->getYearsAttribute(),
                "visitas" => $visitas,
                "id"      => $atender->id
            ]);
    }

    public function cirugia(ValidarHospitalizarRequest $request, Query $queries, User $users, $id)
    {
        $atender =   $queries->findOrFail($id);
        $paciente =  $users->findOrFail($atender->paciente_id);
        $visitas =   $queries->all()->where('paciente_id', '=', $atender->paciente_id)->where('estado', '=', 'atendido')->count();
        return response()->json([
                'success' => true,
                "paciente3"=> $paciente->nombres . ' '. $paciente->apellidos,
                "edad3"    => $paciente->getYearsAttribute(),
                "visitas3" => $visitas,
                "id3"      => $atender->id
            ]);
    }

    public function vacunar(ValidarAtenderRequest $request, Query $queries, User $users, $id)
    {

        $atender =   $queries->findOrFail($id);
        $paciente =  $users->findOrFail($atender->paciente_id);
        $visitas =   $queries->all()->where('paciente_id', '=', $atender->paciente_id)->where('estado', '=', 'atendido')->count();
       
        return response()->json([
                'success' => true,
                "paciente1"=> $paciente->nombres . ' '. $paciente->apellidos,
                "edad1"    => $paciente->getYearsAttribute(),
                "visitas1" => $visitas,
                "id1"      => $atender->id
            ]);
    }

    public function edit(Query $queries, User $users, $id) //carga los datos al formulario modal de citas pendientes en el modulo "consultas medicas"
    {
       // var_dump($queries); exit;
        $cita_atendida = $queries->findOrFail($id);
        $paciente =  $users->findOrFail($cita_atendida->paciente_id);
        $visitas =   $queries->all()->where('paciente_id', '=', $cita_atendida->paciente_id)->where('estado', '=', 'atendido')->count();
           return response()->json([
            'success'      => true,
            'id'           => $cita_atendida->id,
            'paciente'     => $paciente->nombres . ' / '. $paciente->apellidos,
            'edad'         => $paciente->getYearsAttribute(),
            'visitas'      => $visitas,
            'sintomas'     => $cita_atendida->sintomas,
            'examenes'     => $cita_atendida->examenes,
            'tratamiento'  => $cita_atendida->tratamiento,
            'observacion'  => $cita_atendida->observaciones,
            'temperatura'  => $cita_atendida->temperatura,
            'peso'         => $cita_atendida->peso,
            'tipo'         => $cita_atendida->tipo,
            'diagnostico'  => $cita_atendida->diagnostico,
            'receta'       => $cita_atendida->receta,
            'fechavacuna'           => $cita_atendida->fechavacuna,
            'tipovacuna'            => $cita_atendida->tipovacuna,
            'diasrevacuna'          => $cita_atendida->diasrevacuna,
            'fechavacunasiguiente'  => $cita_atendida->fechavacunasiguiente,
            'pesodesparasitacion'            => $cita_atendida->pesodesparasitacion,
            'descripciondesparacitacion'     => $cita_atendida->descripciondesparacitacion,
            'posologia'                      => $cita_atendida->posologia,
            'dosis'                          => $cita_atendida->dosis,
            'diasdesparacitar'               => $cita_atendida->diasdesparacitar,
            'fechasigueintedesparasitacion'  => $cita_atendida->fechasigueintedesparasitacion,            
            'fechacirugia'          => $cita_atendida->fechacirugia,
            'pesocirugia'           => $cita_atendida->pesocirugia,
            'procedimientocirugia'  => $cita_atendida->procedimientocirugia,
            'recetacirugia'         => $cita_atendida->recetacirugia,

            'fechahospitalizacion'     => $cita_atendida->fechahospitalizacion,
            'pesohospitalizar'         => $cita_atendida->pesohospitalizar,
            'temperaturahospitalizar'  => $cita_atendida->temperaturahospitalizar,
            'diagnosticohospitalizar'  => $cita_atendida->diagnosticohospitalizar,
            'tratamientohotpitalizar'  => $cita_atendida->tratamientohotpitalizar,
            'recetahospitalizar'       => $cita_atendida->recetahospitalizar,
            'doctorConsulta'            => $cita_atendida->doctorConsulta,
            'fecharegistra'            => $cita_atendida->fecharegistra,
            
            
            
        ]);
    }

    public function update(ValidarAtenderRequest $request, Query $queries,$id)
    {
       
        if($request->ajax()){
            $consulta = $queries->findOrFail($id);
            $consulta->color         = '#1a4483';
            $consulta->estado        = 'atendido';
            $consulta->sintomas      = $request->sintomas;
            $consulta->examenes      = $request->examenes;
            $consulta->tratamiento   = $request->tratamiento;
            $consulta->observaciones = $request->observacion;
            $consulta->temperatura   = $request->temperatura;
            $consulta->peso          = $request->peso;
            $consulta->tipo          = $request->tipo;
            $consulta->diagnostico   = $request->diagnostico;
            $consulta->receta        = $request->receta;
            $consulta->fechavacuna            = $request->fechavacuna;
            $consulta->tipovacuna             = $request->tipovacuna;
            $consulta->diasrevacuna           = $request->diasrevacuna;
            $consulta->fechavacunasiguiente   = $request->fechavacunasiguiente;
            $consulta->pesodesparasitacion            = $request->pesodesparasitacion;
            $consulta->descripciondesparacitacion     = $request->descripciondesparacitacion;
            $consulta->posologia                      = $request->posologia;
            $consulta->dosis                          = $request->dosis;
            $consulta->diasdesparacitar               = $request->diasdesparacitar;
            $consulta->fechasigueintedesparasitacion  = $request->fechasigueintedesparasitacion;
            $consulta->fechacirugia          = $request->fechacirugia;
            $consulta->pesocirugia           = $request->pesocirugia;
            $consulta->procedimientocirugia  = $request->procedimientocirugia;
            $consulta->recetacirugia         = $request->recetacirugia;

            $consulta->fechahospitalizacion     = $request->fechahospitalizacion;
            $consulta->pesohospitalizar         = $request->pesohospitalizar;
            $consulta->temperaturahospitalizar  = $request->temperaturahospitalizar;
            $consulta->diagnosticohospitalizar  = $request->diagnosticohospitalizar;
            $consulta->tratamientohotpitalizar  = $request->tratamientohotpitalizar;
            $consulta->recetahospitalizar       = $request->recetahospitalizar;
            $consulta->doctorConsulta           = $request->doctorConsulta;
            $consulta->fecharegistra           = $request->fecharegistra;
            
            

            $consulta->save();
            return response()->json([
             "message" => "La consulta médica se ha guardado exitosamente!"
            ]);
        }
    }

}
