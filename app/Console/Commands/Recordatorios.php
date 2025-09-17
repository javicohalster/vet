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
    $fecha_actual = date("Y-m-d");
    $fecha_mas_uno = date("Y-m-d", strtotime("+1 days"));

    Log::info("🔔 Recordatorio ejecutado a las " . now());

    $boletosRevisar = DB::table('queries as que')
        ->join('users as usr', function ($join) {
            $join->on('usr.id', '=', 'que.paciente_id');
        })
        ->where('que.fechasiguientecita', '=', $fecha_mas_uno)
        ->orWhere('que.fechavacunasiguiente', '=', $fecha_mas_uno)
        ->orWhere('que.fechasigueintedesparasitacion', '=', $fecha_mas_uno)
        ->select(
            "que.fechasiguientecita",
            "que.fechavacunasiguiente",
            "que.fechasigueintedesparasitacion",
            "usr.nombres",
            "usr.email",
            "usr.apellidos"
        )
        ->get();

    if ($boletosRevisar->count() > 0) {
        foreach ($boletosRevisar as $vas) {
            Log::info("📧 Enviando a: " . $vas->email);

            $objDemo = new \stdClass();
            $objDemo->propietario = $vas->apellidos;
            $objDemo->paciente = $vas->nombres;
            $objDemo->fecha_cita = $vas->fechasiguientecita ? $vas->fechasiguientecita : $vas->fechavacunasiguiente;
            $objDemo->subject = "Aviso nueva cita " . ($vas->fechasiguientecita ? $vas->fechasiguientecita : $vas->fechavacunasiguiente);

            Mail::to($vas->email)->send(new Avisos($objDemo));
        }
    } else {
        Log::info("❌ No se encontraron citas para la fecha: " . $fecha_mas_uno);
    }
}

}
