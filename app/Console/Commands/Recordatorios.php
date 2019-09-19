<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Log;

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
        $boletosRevisar = DB::table('queries as que')
        ->select("que.estado")
        ->get();
        Log::info("Envio alertas para notificar users " . $fecha_actual);
        Log::info("Envio alertas para notificar users dia antes " . $fecha_menos_uno);
        Log::info($boletosRevisar);

    }
}
