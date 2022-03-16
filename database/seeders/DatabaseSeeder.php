<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Factura;
use App\Models\Linea;
use App\Models\Cliente;
use App\Models\Familia;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Factura::factory(20)->create();
        $facturas=Factura::all('numero');
        Familia::factory(20)->create();
        Cliente::factory(10)->create();
        for ($i=0;$i<50;$i++){
            Linea::factory(1)->create(['factura_numero'=>$facturas[random_int(0,19)]]);
        }

        // for ($i=0;$i<20;$i++){
        //     Familia::factory(1)->create(['familia_id'=>0]);
        // }
        
      
    }
}
