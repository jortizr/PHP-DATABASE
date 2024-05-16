<?php
namespace Database\MySQLi;
//clase singleton
class Connection{
    private static $instance;
    private $connection;
/**
 * el constructor es privado para que no se pueda instanciar la clase
 * y solo se pueda acceder a la instancia de la clase mediante el metodo
 */    private function __construct(){
        //cuando el objeto es instanciado se conecta a la base de datos con el metodo
        $this->make_connection();
    }


    /**
     * la funcion instacia la clase si no ha sido instanciada.
     * el metodo statico no necesita una instancia de la clase para ser llamado
     * retorna la instancia de la clase si ya esta instanciado
     */
    public static function getInstance(){
        if(!self::$instance instanceof self){
            //self reemplaza el nombre de la clase
            self::$instance = new self(); //se instancia la clase
            return self::$instance;
        }
    }
    /**
     *que para obtener la instancia de la base de datos se debe llamar a este metodo
     *connecion lo que hace es retornar la conexion a la base de datos de mysqli
     */
    public function get_database_instance(){
        return $this->connection;
    }

    /**
     * la funcion se encarga de hacer la conexion a la base de datos
     */
    private function make_connection(){
        $server ="localhost";
        $database = "finanzas_personales";
        $username = "root";
        $password = "";

        //forma orientada a objetos, se le pone \ a la clase para que no la defina como si fuera una clase global
        $mysqli = new \mysqli($server, $username, $password, $database);
        //comprobar la conexion orientada a objetos
        if($mysqli->connect_errno)
        die("Error en la conexion: {$mysqli->connect_error}");

        //esto nos ayuda a poder usar cualquier caracter en las consultas
        $setnames = $mysqli->prepare("SET NAMES 'utf8'");
        $setnames->execute();
        //guardamos la conexion en la variable de la clase
        $this->connection = $mysqli;
    }
}
