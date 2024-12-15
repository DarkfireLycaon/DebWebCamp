<?php

namespace Controllers;

use MVC\Router;
use Model\Registro;
use Model\Usuario;
use Model\Evento;

class DashboardController{
    public static function index(Router $router){

        //obtener ultimos registros
         $registros = Registro::get(5);
         foreach($registros as $registro){
            $registro->usuario = Usuario::find($registro->usuario_id);
         }

         //calcular los ingresos
         $virtuales = Registro::total('paquete_id', 2);
         $presenciales = Registro::total('paquete_id', 1);

         $ingresos = ($virtuales * 46.41) + ($presenciales * 186.54);

         //obtener eventos con mas o menos lugares disponibles
         $menos_disponibles = Evento::ordenarLimite('disponibles', 'ASC', 5);
         $mas_disponibles = Evento::ordenarLimite('disponibles', 'DESC', 5);




        $router->render('admin/dashboard/index', [
            'titulo' => 'Administration Panel',
            'registros' => $registros,
            'ingresos' => $ingresos,
            'menos_disponibles' => $menos_disponibles,
            'mas_disponibles' => $mas_disponibles,
        ]);
    }
}
