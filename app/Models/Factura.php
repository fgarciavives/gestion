<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Linea;

class Factura extends Model
{
    use HasFactory;


    protected $primaryKey='numero';

    public function lineas(){
        return $this->hasMany('App\Models\Linea');
    }

    public function total(){
        $lineas = $this->lineas();
        $suma = 0;
        
        foreach($lineas->get() as $linea){
            $suma+=($linea->precio*$linea->cantidad);
        }

        return $suma;
    }
    
}
