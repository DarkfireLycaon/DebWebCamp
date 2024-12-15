<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Ponente;
use MVC\Router;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PonentesController{
    public static function index(Router $router){
        if(!is_admin()){
            header('Location: /login' );
            return;
        }
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
          
        if(!$pagina_actual || $pagina_actual < 1){
            header('Location: /admin/ponentes?page=1');
            exit;
        }
        
        $registros_por_pagina = 8;
       
       $total =  Ponente::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);
        if($paginacion->totalPaginas() < $pagina_actual){
            header('Location: /admin/ponentes?page=1');

        }
        $ponentes = Ponente::paginar($registros_por_pagina, $paginacion->offset());

      
        $router->render('admin/ponentes/index', [
            'titulo' => 'Speakers/Conferences',
            'ponentes' => $ponentes,
            'paginacion' => $paginacion->paginacion(),
        ]);
    }
    public static function crear(Router $router){
        if(!is_admin()){
            header('Location: /login' );
        }
        $alertas = [];
        $ponente = new Ponente;
        
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_admin()){
                header('Location: /login' );
            }

            //leer imagen
            if(!empty($_FILES['imagen']['tmp_name'])){
            $carpeta_imagenes = '../public/img/speakers';
            //crea la carpeta si no existe
           

            if(!is_dir($carpeta_imagenes)){
                mkdir($carpeta_imagenes, 0755, true);
            }
            $nombre_imagen = md5(uniqid(rand(), true));
            $manager = new ImageManager((new Driver()));

            $imagen_png = $manager->read($_FILES['imagen']['tmp_name']);
            $imagen_png->scale(800, 800);
            
        
            $imagen_webp = $manager->read($_FILES['imagen']['tmp_name']);
            $imagen_webp->scale(800, 800);
            

           
            $_POST['imagen'] = $nombre_imagen;
        }
      
            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            
            $ponente->sincronizar($_POST);

            //validar
            $alertas = $ponente->validar();
            //guardar el registro
            if(empty($alertas)){
                $manager = new Image(Driver::class);
                $tmpFile = $_FILES['imagen']['tmp_name'];                
                $image = $manager->read($tmpFile);     
                $image->toPng()->save($carpeta_imagenes . "/" . $ponente->imagen . '.png');
                $image->toWebp()->save($carpeta_imagenes . "/" . $ponente->imagen . '.webp');
                //guardar en la base de datos

                $resultado = $ponente->guardar();
                if($resultado){
                    header('Location: /admin/ponentes');
                }

            }
        
    }
        $router->render('admin/ponentes/crear', [
            'titulo' => 'Register Speaker',
            'alertas' => $alertas,
            'ponente' => $ponente,
             'redes' => json_decode($ponente->redes),
        ]);
    }
    public static function editar(Router $router){
        if(!is_admin()){
            header('Location: /login' );
        }
        
        $alertas = [];
        //validar id
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id){
            header('Location: /admin/ponentes');
        }

        //obtener ponente para editar
        $ponente = Ponente::find($id);
        if(!$ponente){
            header ('Location: /admin/ponentes');
        }
        $ponente->imagen_actual = $ponente->imagen;

        $redes = json_decode($ponente->redes);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!empty($_FILES['imagen']['tmp_name'])){
                $carpeta_imagenes = '../public/img/speakers';
                //crea la carpeta si no existe
               
    
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0755, true);
                }
                $nombre_imagen = md5(uniqid(rand(), true));
                $manager = new ImageManager((new Driver()));
    
                $imagen_png = $manager->read($_FILES['imagen']['tmp_name']);
                $imagen_png->scale(800, 800);
                
            
                $imagen_webp = $manager->read($_FILES['imagen']['tmp_name']);
                $imagen_webp->scale(800, 800);
                
    
               
                $_POST['imagen'] = $nombre_imagen;
            } else{
                $_POST['imagen'] = $ponente->imagen_actual;
            }
            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            $ponente->sincronizar($_POST);
            
            $alertas = $ponente->validar();

            if(empty($alertas)){
                if(isset ($nombre_imagen)){
                    $manager = new Image(Driver::class);
                  $tmpFile = $_FILES['imagen']['tmp_name']; 
                    $image = $manager->read($tmpFile); 
                    $image->toPng()->save($carpeta_imagenes . "/" . $ponente->imagen . '.png');
                    $image->toWebp()->save($carpeta_imagenes . "/" . $ponente->imagen . '.webp');
                }
                $resultado = $ponente->guardar();
                if($resultado){
                    header('Location: /admin/ponentes');
                }
            }

        }
        $router->render('admin/ponentes/editar', [
          'titulo' => 'Update Speaker',
          'alertas' => $alertas,
          'ponente' => $ponente,
          'redes' => json_decode($ponente->redes),
        ]);
    }
    public static function eliminar(){
        if(!is_admin()){
            header('Location: /login' );
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $ponente = Ponente::find($id);

            if(!isset($ponente) ){
            header('Location: /admin/ponentes');
            }

            $resultado = $ponente->eliminar();

            if($resultado){
                header('Location: /admin/ponentes');
            }
        }
        
    }
}
