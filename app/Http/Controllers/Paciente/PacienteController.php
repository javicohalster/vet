<?php

namespace App\Http\Controllers\Paciente;

use App\User;
use App\Role;
use App\Query;
use App\Razas;
use Jenssegers\Date\Date;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ValidatePacienteRequest;
use App\Http\Requests\ValidateAddPacienteRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PacienteController extends Controller
{
    public function index()
    {
        $razas = Razas::select(['id', 'nombre'])->orderBy('nombre', 'asc')->get();
        return view('pacientes.index',compact('razas'));
    }

    public function store(ValidateAddPacienteRequest $request)
    {
        if($request->ajax()){
            $paciente = new User();
            $paciente->rut                = $request->rut_add;
            $paciente->nombres            = $request->nombres_add;
            $paciente->apellidos          = $request->apellidos_add;
            $paciente->nacimiento         = Carbon::parse($request->nacimiento_add)->format('Y-m-d');
            $paciente->email              = $request->email_add;
            $paciente->telefono           = $request->telefono_add;
            $paciente->direccion          = $request->direccion_add;
            $paciente->genero             = $request->genero_add;
            $paciente->sangre             = $request->sangre_add;
            $paciente->vih                = $request->vih_add;
            $paciente->peso               = $request->peso_add;
            $paciente->altura             = $request->altura_add;
            $paciente->alergia            = $request->alergia_add;
            $paciente->medicamento_actual = $request->medicamento_add;
            $paciente->enfermedad         = $request->enfermedad_add;
            $paciente->avatar             = "default.jpg";
            $paciente->save();
            $paciente->attachRole(4); //4 es el numero id del rol paciente
            return response()->json([
                "message" => "El paciente ".$paciente->nombres." ha sido guardado exitosamente !"
                ]); 
        }
    }

    public function show()
    {
        $users = User::select(['id', 'rut', 'nombres', 'apellidos', 'telefono', 'sangre','vih','nacimiento','nacimiento as edad','fecha_ult_atencion'])->withRole('paciente');
        
        //$fecha = collect($arreglo);

        return  datatables()->of($users)
                ->editColumn('edad', function ($user) {
                 return $user->getYearsAttribute();
                    })    
                   ->editColumn('fecha_ult_atencion', function ($user) {
                        return str_replace("-","/",substr($user->fecha_ult_atencion,0,10)); 
                        
                        // Carbon::parse($queriesq[intval($num_fecha - 1)]->fecha)->format('d/m/Y'); 
                      /* $queriesq = Query::join('users as paciente', 'queries.paciente_id', '=', 'paciente.id')
                        ->join('users as doctor', 'queries.doctor_id', '=', 'doctor.id')
                        ->join('specialities as especialidad', 'queries.speciality_id', '=', 'especialidad.id')
                        ->select(['queries.*','queries.id as id', 'queries.fecha_inicio as fecha', 'queries.sintomas as sintomas', 'queries.examenes as examenes', 'queries.tratamiento as tratamiento', 'queries.observaciones as observaciones', 'paciente.nombres as nombres_paciente', 'paciente.apellidos as apellidos_paciente', 'doctor.nombres as nombres_doctor', 'doctor.apellidos as apellidos_doctor', 'especialidad.nombre as especialidad'])
                        ->where('queries.paciente_id', '=',  $user->id)->where('queries.estado', '=', 'atendido')->orderBy('queries.fecha_inicio', 'asc')->get();
                        $fecha_ultima = "9999/99/99";
                        $num_fecha = count($queriesq);
                        if($num_fecha > 0)
                        {
                          return str_replace("-","/",substr($queriesq[intval($num_fecha - 1)]->fecha,0,10)); // Carbon::parse($queriesq[intval($num_fecha - 1)]->fecha)->format('d/m/Y'); 
                        } else {
                           return $fecha_ultima;
                        }*/
                           })             
                    ->addColumn('action', function ($user) {
                        $ficha = '<a href="#" onclick="ficha_paciente('.$user->id.')" data-toggle="modal" data-target="#modal_ficha" rel="tooltip" title="Ficha del paciente" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">folder_shared</i></a>';
                        $expediente = '<a href="#" onclick="expediente_paciente('.$user->id.')" data-toggle="modal" data-target="#modal_expediente" rel="tooltip" title="Expediente" class="btn btn-simple btn-info btn-icon"><i class="material-icons">content_paste</i></a>';
                        $editar = '<a href="#" onclick="carga_paciente('.$user->id.')" data-toggle="modal" data-target="#modal_editar_paciente" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                        $eliminar = '<a href="#" onclick="delete_paciente('.$user->id.')" data-toggle="modal" data-target="#eliminar_paciente" rel="tooltip" title="Editar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';

                        return $ficha.$expediente.$editar.$eliminar;
                       
                    })->make(true);
    }

    public function edit($id)
    {
        $paciente = User::findOrFail($id);
        return response()->json([
            'success'     => true,
            'id'          => $paciente->id,
            'avatar'      => $paciente->avatar,
            'rut'         => $paciente->rut,
            'nombres'     => $paciente->nombres,
            'apellidos'   => $paciente->apellidos,
            'nacimiento'  => Carbon::parse($paciente->nacimiento)->format('Y-m-d'),
            'genero'      => $paciente->genero,
            'email'       => $paciente->email,
            'telefono'    => $paciente->telefono,
            'direccion'   => $paciente->direccion,
            'sangre'      => $paciente->sangre,
            'vih'         => $paciente->vih,
            'peso'        => $paciente->peso,
            'altura'      => $paciente->altura,
            'alergia'     => $paciente->alergia,
            'medicamento' => $paciente->medicamento_actual,
            'enfermedad'  => $paciente->enfermedad,
        ]);
    }

     public function update(ValidatePacienteRequest $request, $id)
    {
        if($request->ajax()){
            $user = User::findOrFail($id);
            $user->nombres            = $request->nombres_e;
            $user->apellidos          = $request->apellidos_e;
            $user->nacimiento         = Carbon::parse($request->nacimiento_e)->format('Y-m-d');
            $user->email              = $request->email_e;
            $user->telefono           = $request->telefono_e;
            $user->direccion          = $request->direccion_e;
            $user->genero             = $request->genero_e;
            $user->sangre             = $request->sangre_e;
            $user->vih                = $request->vih_e;
            $user->peso               = $request->peso_e;
            $user->altura             = $request->altura_e;
            $user->alergia            = $request->alergia_e;
            $user->medicamento_actual = $request->medicamento_e;
            $user->enfermedad         = $request->enfermedad_e;
            $user->save();
            return response()->json([
             "apellidos" => $user->apellidos,
             "message" => "El paciente ".$user->nombres." ha sido actualizado correctamente !"
            ]);
        }
    }

    public function destroy($id)
    {
        $query  =  Query::where('paciente_id', $id)->count();
        if ($query > 0) {
           return response()->json([
                'success' => false,
                "message" => "Lo sentimos, pero el paciente que desea eliminar cuenta con historial clínico!",
                "type"    => 'warning'
            ]);
        }else{
            $user = User::findOrFail($id);
            User::destroy($id);
            return response()->json([
                'success' => true,
                "message" => "los registros del paciente ".$user->nombres." han sido eliminados correctamente !",
                "type"    => 'success'

            ]);
        }
        
    }
}
