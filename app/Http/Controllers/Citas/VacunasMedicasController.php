<?php

namespace App\Http\Controllers\Citas;

use App\User;
use App\Vacunas;
use App\Speciality;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarAtenderRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class VacunasMedicasController extends Controller
{
    public function index()
    {
        $doctores = User::select(['id', 'nombres', 'apellidos'])->withRole('doctor')->orderBy('apellidos', 'asc')->get();
        $pacientes = User::select(['id', 'nombres', 'apellidos'])->withRole('paciente')->orderBy('apellidos', 'asc')->get();
        $especialidades = Speciality::select(['id', 'nombre'])->orderBy('nombre', 'asc')->get();
        $cantidad_pacientes = User::withRole('paciente')->count();
        $reservas = Vacunas::where('estado', 'pendiente')->count();
        return view('consultas_medicas.index',compact('doctores', 'pacientes', 'cantidad_pacientes', 'reservas', 'especialidades'));
    }

    public function show()
    {
        if (Auth::user()->hasRole('doctor')) {
       $consultas = Vacunas::join('users as paciente', 'vacunas.paciente_id', '=', 'paciente.id')
        ->join('users as doctor', 'vacunas.doctor_id', '=', 'doctor.id')
        ->join('specialities as especialidad', 'vacunas.speciality_id', '=', 'especialidad.id')
        ->select(['vacunas.id as id', 'vacunas.fecha_inicio', 'paciente.nombres as paciente', 'paciente.apellidos as apellidos', 'doctor.apellidos as doctor', 'especialidad.nombre as especialidad', 'vacunas.estado as estado'])->where('vacunas.estado', '=' , 'pendiente')
        ->where('doctor_id', Auth::user()->id)->get();
    }else{
        $consultas = Vacunas::join('users as paciente', 'vacunas.paciente_id', '=', 'paciente.id')
        ->join('users as doctor', 'vacunas.doctor_id', '=', 'doctor.id')
        ->join('specialities as especialidad', 'vacunas.speciality_id', '=', 'especialidad.id')
        ->select(['vacunas.id as id', 'vacunas.fecha_inicio', 'paciente.nombres as paciente', 'paciente.apellidos as apellidos', 'doctor.apellidos as doctor', 'especialidad.nombre as especialidad', 'vacunas.estado as estado'])->where('vacunas.estado', '=' , 'pendiente');
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
                 $editar ="";
                 $eliminar = "";
                 $pagar = '<a href="#" onclick="atender('.$consulta->id.')" data-toggle="modal" data-target="#modal_pago" rel="tooltip" title="Pagar" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">attach_money</i></a>';
                 if (Auth::user()->can('editar-atender')) {
                   $atender = '<a href="#" onclick="atender('.$consulta->id.')" data-toggle="modal" data-target="#modal_atender" rel="tooltip" title="Atender" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">done_all</i></a>';
                }
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
       $consultas = Vacunas::join('users as paciente', 'vacunas.paciente_id', '=', 'paciente.id')
        ->join('users as doctor', 'vacunas.doctor_id', '=', 'doctor.id')
        ->join('specialities as especialidad', 'vacunas.speciality_id', '=', 'especialidad.id')
        ->select(['vacunas.id as id', 'vacunas.fecha_inicio', 'paciente.nombres as paciente', 'paciente.apellidos as apellidos', 'doctor.apellidos as doctor', 'especialidad.nombre as especialidad'])->where('vacunas.estado', '=' , 'atendido')->where('doctor_id', Auth::user()->id)->get();
    }else{
        $consultas = Vacunas::join('users as paciente', 'vacunas.paciente_id', '=', 'paciente.id')
        ->join('users as doctor', 'vacunas.doctor_id', '=', 'doctor.id')
        ->join('specialities as especialidad', 'vacunas.speciality_id', '=', 'especialidad.id')
        ->select(['vacunas.id as id', 'vacunas.fecha_inicio', 'paciente.nombres as paciente', 'paciente.apellidos as apellidos', 'doctor.apellidos as doctor', 'especialidad.nombre as especialidad'])->where('vacunas.estado', '=' , 'atendido');
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
                if (Auth::user()->can('leer-citas')) {
                    $receta = '<a href="/qr/receta.php?qr='.$consulta->id.'"    rel="tooltip" title="Receta" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">medication</i></a>';
                
                $ver = '<a href="#" onclick="ver_cita('.$consulta->id.')" data-toggle="modal" data-target="#modal_ver" rel="tooltip" title="Ver consulta" class="btn btn-simple btn-primary btn-icon edit"><i class="material-icons">remove_red_eye</i></a>';
            }
            if (Auth::user()->can('editar-atender')) {
                $editar = '<a href="#" onclick="atender('.$consulta->id.')" data-toggle="modal" data-target="#modal_atender" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
            }
            if (Auth::user()->can('eliminar-consultas')) {
                $eliminar = '<a href="#" onclick="delete_cita_pendiente('.$consulta->id.')" data-toggle="modal" data-target="#eliminar_paciente" rel="tooltip" title="Eliminar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';
            }
                return $ver.$receta.$editar.$eliminar;
            })->make(true);
    }
    

    public function atender(ValidarAtenderRequest $request, Vacunas $vacunas, User $users, $id)
    {
        $atender =   $vacunas->findOrFail($id);
        $paciente =  $users->findOrFail($atender->paciente_id);
        $visitas =   $vacunas->all()->where('paciente_id', '=', $atender->paciente_id)->where('estado', '=', 'atendido')->count();
        return response()->json([
                'success' => true,
                "paciente"=> $paciente->nombres . ' '. $paciente->apellidos,
                "edad"    => $paciente->getYearsAttribute(),
                "visitas" => $visitas,
                "id"      => $atender->id
            ]);
    }

    public function edit(Vacunas $vacunas, User $users, $id) //carga los datos al formulario modal de citas pendientes en el modulo "consultas medicas"
    {

        $cita_atendida = $vacunas->findOrFail($id);
        $paciente =  $users->findOrFail($cita_atendida->paciente_id);
        $visitas =   $vacunas->all()->where('paciente_id', '=', $cita_atendida->paciente_id)->where('estado', '=', 'atendido')->count();
           return response()->json([
            'success'      => true,
            'id'           => $cita_atendida->id,
            'paciente'     => $paciente->nombres . ' '. $paciente->apellidos,
            'edad'         => $paciente->getYearsAttribute(),
            'visitas'      => $visitas,
            'diasrevacuna' => $cita_atendida->diasrevacuna,
            'tipo'         => $cita_atendida->tipo,
            'tratamiento'  => $cita_atendida->tratamiento,
            'observacion'  => $cita_atendida->observaciones,
        ]);
    }

    public function update(ValidarAtenderRequest $request, Vacunas $vacunas,$id)
    {
        if($request->ajax()){
            $consulta = $vacunas->findOrFail($id);
            $consulta->color         = '#1a4483';
            $consulta->estado        = 'atendido';
            $consulta->diasrevacuna      = $request->diasrevacuna;
            $consulta->tipo      = $request->tipo;
            $consulta->tratamiento   = $request->tratamiento;
            $consulta->observaciones = $request->observacion;
            $consulta->save();
            return response()->json([
             "message" => "La consulta médica se ha guardado exitosamente!"
            ]);
        }
    }

}
