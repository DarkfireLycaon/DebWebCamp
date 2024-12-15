<?php
namespace Model;

class Ponente extends ActiveRecord{
    protected static $tabla = 'ponentes';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'ciudad', 'pais', 'imagen', 'tags', 'redes'];

    public $id;
    public $nombre;
    public $apellido;
    public $ciudad;
    public $pais;
    public $imagen;
    public $tags;
    public $redes;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->pais = $args['pais'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->tags = $args['tags'] ?? '';
        $this->redes = $args['redes'] ?? '';
        
    }
    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'You must write a name';
        }
        if(!$this->apellido) {
            self::$alertas['error'][] = 'You must write a surname';
        }
        if(!$this->ciudad) {
            self::$alertas['error'][] = 'You must write a city';
        }
        if(!$this->pais) {
            self::$alertas['error'][] = 'You must write a country';
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = 'You must add an image';
        }
        if(!$this->tags) {
            self::$alertas['error'][] = 'You must write some experienced areas';
        }
    
        return self::$alertas;
    }
}