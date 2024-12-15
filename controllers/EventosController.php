<?php

namespace Controllers;

use MVC\Router;
use Model\Categoria;
use Model\Dia;
use Model\Hora;
use Model\Evento;
use Classes\Paginacion;
use Model\Ponente;

class EventosController{
    public static function index(Router $router){
        if(!is_admin()){
            header('Location: /login' );
        }
        $paginaActual = $_GET['page'];
        $paginaActual = filter_var($paginaActual, FILTER_VALIDATE_INT);

        if(!$paginaActual || $paginaActual < 1){
            header('Location: /admin/eventos?page=1');
        }
        $por_pagina = 10;
        $total = Evento::total();
        $paginacion = new Paginacion($paginaActual, $por_pagina, $total);

        $eventos = Evento::paginar($por_pagina, $paginacion->offset());

        foreach($eventos as $evento){
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);

        }




        $router->render('admin/eventos/index', [
            'titulo' => 'Conferences & Workshop',
            'eventos' => $eventos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router){
     $alertas = [];
     $categorias = Categoria::all('ASC');
     $dias = Dia::all('ASC');
     $hora = Hora::all('ASC');

     $evento = new Evento;

     if($_SERVER ['REQUEST_METHOD'] === 'POST'){
        if(!is_admin()){
            header('Location: /login' );
        }
      $evento->sincronizar($_POST);
      $alertas = $evento->validar();

      if(empty($alertas)){
        $resultado = $evento->guardar();

        if($resultado){
            header('Location: /admin/eventos');
        }
      }
     }


 


        $router->render('admin/eventos/crear', [

            'titulo'=> 'Register Event',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $hora,
            'evento' => $evento,
        ]);
    }
    public static function editar(Router $router){
      
            $alertas = [];
            $id = $_GET['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if(!$id){
                header('Location: /admin/eventos');
            }
            $categorias = Categoria::all('ASC');
            $dias = Dia::all('ASC');
            $hora = Hora::all('ASC');
       
            $evento = Evento::find($id);
            if(!$evento){
                header('Location: /admin/eventos');
            }
       
            if($_SERVER ['REQUEST_METHOD'] === 'POST'){
                if(!is_admin()){
                    header('Location: /login' );
                }
             $evento->sincronizar($_POST);
             $alertas = $evento->validar();
       
             if(empty($alertas)){
               $resultado = $evento->guardar();
       
               if($resultado){
                   header('Location: /admin/eventos');
               }
             }
            }
       
       
        
       
       
               $router->render('admin/eventos/editar', [
       
                   'titulo'=> 'Update  Event',
                   'alertas' => $alertas,
                   'categorias' => $categorias,
                   'dias' => $dias,
                   'horas' => $hora,
                   'evento' => $evento,
               ]);
           }
           public static function eliminar(){
           
    
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if(!is_admin()){
                    header('Location: /login' );
                }

                $id = $_POST['id'];
                $evento = Evento::find($id);
    
                if(!isset($evento) ){
                header('Location: /admin/ponentes');
                }
    
                $resultado = $evento->eliminar();
    
                if($resultado){
                    header('Location: /admin/ponentes');
                }
            }
            
        }
    }

