<?php

namespace Model;

class Usuario extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password', 'confirmado', 'token', 'admin'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $password2;
    public $confirmado;
    public $token;
    public $admin;

    public $password_actual;
    public $password_nuevo;

    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? '';
        $this->admin = $args['admin'] ?? 0;
    }

    // Validar el Login de Usuarios
    public function validarLogin() {
        if(!$this->email) {
            self::$alertas['error'][] = 'You must write the mail of the user';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Invalid Email';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'The password can not be empty';
        }
        return self::$alertas;

    }

    // Validación para cuentas nuevas
    public function validar_cuenta() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'You must write a name';
        }
        if(!$this->apellido) {
            self::$alertas['error'][] = 'You must write a surname';
        }
        if(!$this->email) {
            self::$alertas['error'][] = 'You must write a email';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'The password can not be empty';
        }
        if(strlen($this->password) < 6) {
            self::$alertas['error'][] = 'The password should contain at least six characters';
        }
        if($this->password !== $this->password2) {
            self::$alertas['error'][] = 'The passwords are different';
        }
        return self::$alertas;
    }

    // Valida un email
    public function validarEmail() {
        if(!$this->email) {
            self::$alertas['error'][] = 'You must write an email';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Invalid Email';
        }
        return self::$alertas;
    }

    // Valida el Password 
    public function validarPassword() {
        if(!$this->password) {
            self::$alertas['error'][] = 'The password can not be empty';
        }
        if(strlen($this->password) < 6) {
            self::$alertas['error'][] = 'The password should contain at least six characters';
        }
        return self::$alertas;
    }

    public function nuevo_password() : array {
        if(!$this->password_actual) {
            self::$alertas['error'][] = 'The actual password  can not be empty';
        }
        if(!$this->password_nuevo) {
            self::$alertas['error'][] = 'The new password can not be empty';
        }
        if(strlen($this->password_nuevo) < 6) {
            self::$alertas['error'][] = 'The password should contain at least six characters';
        }
        return self::$alertas;
    }

    // Comprobar el password
    public function comprobar_password() : bool {
        return password_verify($this->password_actual, $this->password );
    }

    // Hashea el password
    public function hashPassword() : void {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    // Generar un Token
    public function crearToken() : void {
        $this->token = uniqid();
    }
}