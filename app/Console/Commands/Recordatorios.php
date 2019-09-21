<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\Avisos;

class Recordatorios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recordatorio:activa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $fecha_actual = date("d-m-Y", time());
        $fecha_menos_uno = date("d-m-Y",strtotime($fecha_actual."- 1 days")); 
        $fecha_mas_uno = date("d-m-Y",strtotime($fecha_actual."+ 1 days"));
        $boletosRevisar = DB::table('queries as que')
        ->join('users as usr', function ($join) 
        {
            $join->on('usr.id', '=', 'que.paciente_id');
        })
        ->where('que.fechasiguientecita', '=', $fecha_mas_uno)
        ->orWhere('que.fechavacunasiguiente','=', $fecha_mas_uno)
        ->orWhere('que.fechasigueintedesparasitacion','=', $fecha_mas_uno)
        ->select("que.fechasiguientecita","que.fechavacunasiguiente","que.fechasigueintedesparasitacion","usr.nombres","usr.email","usr.apellidos")
        ->get();
     
       
        
        if($boletosRevisar){
            foreach($boletosRevisar as $vas){
               // Log::info($vas->fechasiguientecita);
               // Log::info($vas->apellidos);
               // Log::info($vas->email);
                $objDemo = new \stdClass();
                $objDemo->propietario = $vas->apellidos;
                $objDemo->paciente = $vas->nombres;
                $objDemo->fecha_cita = $vas->fechasiguientecita ? $vas->fechasiguientecita : $vas->fechavacunasiguiente ;
                $objDemo->subject = "Aviso nueva cita ". $vas->fechasiguientecita ? $vas->fechasiguientecita : $vas->fechavacunasiguiente ;
                Mail::to("javicohalster@gmail.com")->send(new Avisos($objDemo));
             
            }
        }
        Log::info($boletosRevisar);

    }
}
