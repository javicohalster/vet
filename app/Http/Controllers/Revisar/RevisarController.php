<?php

namespace App\Http\Controllers\Revisar;

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

class RevisarController extends Controller
{
    public function index()
    {
        $razas = Razas::select(['id', 'nombre'])->orderBy('nombre', 'asc')->get();
        return view('revisar.index',compact('razas'));
    }

    public function store(ValidateAddPacienteRequest $request)
    {
        if($request->ajax()){
            $paciente = new User();
            $paciente->rut                = $request->rut_add;
            $paciente->chip               = $request->chip_add;
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
        $now = Carbon::now(); // Or whatever date you want to use as the start date.
        $then = $now->addDays(10);
       // $Finicio = Date::parse($fechabuscada)->format('Y-m-d');
      // echo  substr($fechabuscada,0,7) ;
     // die();
        $queriesq = Query::join('users as paciente', 'queries.paciente_id', '=', 'paciente.id')
        ->select(['paciente.id', 'paciente.rut', 'paciente.nombres', 'paciente.apellidos', 'paciente.telefono', 'paciente.sangre', 'paciente.vih', 'paciente.nacimiento', 'paciente.nacimiento as edad', 'paciente.fecha_ult_atencion as fecha_ult_atencion', "queries.fechasiguientecita  as fechasiguientecita"])
        ->where('queries.fechasiguientecita', '!=',  null)
            ->where('queries.fechasiguientecita', '!=', "")  
            
          // ->where('queries.fechasiguientecita', '>=', Carbon::now())    
           ->whereBetween('queries.fechasiguientecita', array(Carbon::now(), Carbon::now()->addWeek()))    
         //   ->whereDate('queries.fechasiguientecita', '<=', $then)
           
           //->where("queries.fechasiguientecita",'<',$fechabuscada)
          // ->where("queries.fechasiguientecita",'>',$fechaactual)
          //  ->where('queries.fechasiguientecita', '<=', "07-07-2024")
          //  ->where('queries.fechasiguientecita BETWEEN "'. date('Y-m-d H:i:s', strtotime($dateHoy.' 00:00:00')). '" and "'. date('Y-m-d H:i:s', strtotime($dateHoy.' 23:59:59')).'"')
           // ->where("queries.fechasiguientecita BETWEEN '{Carbon::parse($dateHoy)->format('d-m-Y')}' AND '{Carbon::parse($fechabuscada)->format('d-m-Y')}'")
            //->where('queries.fechasiguientecita <= date("'.$fechabuscada.'")')
          //  ->where('sell_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"')
         //   ->where("DATE_FORMAT(date,'%Y-%m-%d') > '2024-07-30'",NULL,FALSE)
         //   ->where('queries.fechasiguientecita', '>',  Carbon::parse($dateHoy)->format('d-m-Y') )
         //   ->where('queries.fechasiguientecita', '<',  Carbon::parse($fechabuscada)->format('d-m-Y'))


            // ->where('fecha_ult_atencion', '!=',  "") 
            // ->where('fecha_ult_atencion', '!=', null) 
            ->orderBy('queries.fechasiguientecita', 'DESC')->get();
        
          //  $this->db->like('queries.fechasiguientecita',  substr($fechabuscada,0,7)); 
        return datatables()->of($queriesq)
            ->editColumn('edad', function ($queriesq) {
                return $this->getYearsAttribute($queriesq->nacimiento);
            })
            ->editColumn('fecha_ult_atencion', function ($queriesq) {
                return $queriesq->fecha_ult_atencion ? Carbon::parse($queriesq->fecha_ult_atencion)->format('Y-m-d') : null;
            })
            ->editColumn('fechasiguientecita', function ($queriesq) {
             //   echo  $queriesq->fechasiguientecita;
               // die();
                return $queriesq->fechasiguientecita ? Carbon::parse($queriesq->fechasiguientecita)->format('Y-m-d') : null;
            })
            ->make(true);
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

    private function getEdad($nacimiento){
        return $nacimiento->diffInDays(now());
    }

    private function getYearsAttribute($nacimiento)
    {
        return Carbon::parse($nacimiento)->diff(Carbon::parse(Carbon::now()))->format('%y años, %m mes, %d días');
        //return $this->nacimiento->diff(Carbon::now())->format('%y años, %m mes and %d dias');
      //  return Date::parse($this->nacimiento)->toFormattedDateString();
       // return Carbon::parse($this->nacimiento)->age;
    }
     public function update(ValidatePacienteRequest $request, $id)
    {
        if($request->ajax()){
            $user = User::findOrFail($id);
            $user->nombres            = $request->nombres_e;
            $user->chip               = $request->chip_e;
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

    public function proximo()
    {
        

       $queriesq = Query::join('users as paciente', 'queries.paciente_id', '=', 'paciente.id')
                        ->select(['paciente.id', 'paciente.rut', 'paciente.nombres', 'paciente.apellidos', 'paciente.telefono', 'paciente.sangre','paciente.vih','paciente.nacimiento','paciente.nacimiento as edad','paciente.fecha_ult_atencion as fecha_ult_atencion', 'queries.fechasiguientecita as fechasiguientecita'])
                        ->where('queries.fechasiguientecita', '!=',  null)
                        ->where('queries.fechasiguientecita', '!=',  "")->orderBy('queries.fechasiguientecita', 'desc')->get();
                        
        
     

        return  datatables()->of($queriesq)
                ->editColumn('edad', function ($queriesq) {
                 return $this->getYearsAttribute($queriesq->nacimiento);
                    })  
                    ->editColumn('years', function ($queriesq) {
                        return $this->getYearsAttribute($queriesq->nacimiento);
                           })  
                   ->editColumn('fecha_ult_atencion', function ($queriesq) {
                        return str_replace("-","/",substr($queriesq->fecha_ult_atencion,0,10)); 
                        
                       
                           })  
                           ->editColumn('fechasiguientecita', function ($queriesq) {
                            return str_replace("-","/",substr($queriesq->fechasiguientecita,0,10)); 
                            
                           
                               })            
                    ->make(true);
    }
}
