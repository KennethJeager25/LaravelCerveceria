<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Temperatura;


class SensorController extends Controller
{
    public function InsertInfoSensor(){
        try{
            $response = Http::get('https://thingspeak.com/channels/935349/field/1.json');
            $posts=json_decode($response->body());
            $postuser1 = array();
    
            foreach ($posts->feeds as $val)
            {
                $temp = Temperatura::create([
                    'entry_id'=>$val->entry_id,
                    'field1'=>$val->field1,
                    'created_at'=>$val->created_at,
                ]);
            }
            return response()->json(['message' => 'Se registraron correctamente'], 201);
        }
        catch(error){
            return response()->json(['message' => 'Error al insertar'],500);
        }
    }
    public function MostrarInfo(){
        try{
            $temp = Temperatura::all();
            return $temp;
        }
        catch(error){
            return response()->json(['message' => 'Error'],500);
        }
    }
    public function DeleteInfoSensor(){
        try
        {
            $temp = Temperatura::all();
            $temp->destroy();
            return response()->json(['message' => 'Se registraron correctamente']);
        }
        catch(error)
        {
            return response()->json(['message' => 'Error al eliminar'],500);
        }
    }
}
