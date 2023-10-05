<?php

namespace App\Http\Controllers\Paciente;

use App\User;
use Jenssegers\Date\Date;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FichaPacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function getAge(){
        return $this->birthdate->diff(Carbon::now())
             ->format('%y years, %m months and %d days');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reporte($id)
    {
        $pacientes = User::findOrFail($id);
       // $edad = $this->$pacientes->nacimiento->diff(Carbon::now())->format('%y años, %m mes, %d dias');
       // $edad = Carbon::parse($pacientes->nacimiento)->age;
        $edad     = $pacientes->getYearsAttribute();
        $fecha = Date::now()->toFormattedDateString();
        $pdf = \PDF::loadView('pacientes.pdf_ficha', ['pacientes' => $pacientes, 'edad' => $edad, 'fecha' => $fecha]);
        return $pdf->download($pacientes->nombres ." ". $pacientes->apellidos.".pdf");
    }

    public function fichaqr($id)
    {
        $pacientes = User::findOrFail($id);
       // $edad = $this->$pacientes->nacimiento->diff(Carbon::now())->format('%y años, %m mes, %d dias');
       // $edad = Carbon::parse($pacientes->nacimiento)->age;
        $edad     = $pacientes->getYearsAttribute();
        $fecha = Date::now()->toFormattedDateString();
       // $pdf = \PDF::loadView('pacientes.pdf_ficha', ['pacientes' => $pacientes, 'edad' => $edad, 'fecha' => $fecha]);

        return view('pacientes.fichaqr', ['pacientes' => $pacientes, 'edad' => $edad, 'fecha' => $fecha]);
        //return $pdf->download($pacientes->nombres ." ". $pacientes->apellidos.".pdf");
    }

    public function show($id)
    {
        $paciente = User::findOrFail($id);
        //$edad = $this->$paciente->nacimiento->diff(Carbon::now())->format('%y años, %m mes, %d dias');
         $edad     = $paciente->getYearsAttribute();
        //$edad = $paciente->nacimiento->diffInYears(now());

        
        include(public_path('qr/phpqrcode/qrlib.php')); 
        $codesDir = "./qr/codes/";   
        $codeFile = date('d-m-Y-h-i-s').'.png';
        $host= $_SERVER["HTTP_HOST"];
        $url= $_SERVER["REQUEST_URI"];
        $str = "http://" . $host . "/vet/public/qr/ficha_qr.php?qr=".$paciente->id;
        \QRcode::png($str, $codesDir.$codeFile, "H", "2"); 
        $qr =  '<img class="img-thumbnail" src="'.$codesDir.$codeFile.'" />'; 


        return response()->json([
            'success'     => true,
            'id'          => $paciente->id,
            'avatar'      => $paciente->avatar,
            'qr'          => $qr,
            'chip'        => $paciente->chip,
            'rut'         => $paciente->rut,
            'nombres'     => $paciente->nombres . " / " . $paciente->apellidos,
            'edad'        => $edad,
            'nacimiento'  => $paciente->nacimiento,
            'email'       => $paciente->email,
            'telefono'    => $paciente->telefono,
            'genero'      => $paciente->genero,
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
