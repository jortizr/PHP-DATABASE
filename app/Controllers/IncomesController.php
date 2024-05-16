<?php

namespace App\Controllers;

use Database\PDO\Connection;

class IncomesController{
    private $connection;
    public function __construct(){
        $this->connection = Connection::getInstance()->get_database_instance();
    }
    /**
     * Mues una lista de los registros
     */
    public function index(){
        $stmt = $this->connection->prepare("SELECT * FROM incomes");
        $stmt->execute();

        $results = $stmt->fetchAll();
        //se llama el index.php de la carpeta views
        require("../resources/views/incomes/index.php");
    }

    /**
     * Muestra un formulario para crear un nuevo recurso en la BD
     * @return void
     */
    public function create(){
        require("../resources/views/incomes/create.php");
    }

/**
 * Metodo para guardar un registro en la BD
 * @param [array] $data recibe todos los campos a insertar en la base de datos
 */
    public function store($data){
        $stmt = $this->connection->prepare("INSERT INTO incomes (payment_method, type, date, amount, description)
        VALUES(:payment_method, :type, :date, :amount, :description)");
        $stmt->execute(
            [
                ":payment_method" => $data["payment_method"],
                ":type" => $data["type"],
                ":date" => $data["date"], // "2021-09-01 00:00:00
                ":amount" => $data["amount"],
                ":description" => $data["description"]
            ]
        );
        //redireccionar a la lista de registros
        header("location: incomes");
    }


    /**
     * muestra un unico registro especifico
     * @return void
     */
    public function show($id){
        $stmt = $this->connection->prepare("SELECT * FROM incomes WHERE id_income=:id_income");
        $stmt->execute([":id_income" => $id]);
        // $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        // echo "el $id tiene que se gasto " . $result["amount"] . " USD en: ". $result["description"] . "\n";
 
    }
   /**
     * muestra el formulario para editar un recurso
     * @return void
     */
    public function edit(){}

    /**
     * actualiza un recurso especifico en la BD
     * @return void
     */
    public function update($data, $id){
        $stmt = $this->connection->prepare("UPDATE incomes SET 
        payment_method=:payment_method, type=:type, date=:date,
        amount=:amount, description=:description 
        WHERE id_income=:id_income");
        
        $stmt->execute([
            ":id_income" => $id,
            ":payment_method" => $data["payment_method"],
            ":type" => $data["type"],
            ":date" => $data["date"], // "2021-09-01 00:00:00
            ":amount" => $data["amount"],
            ":description" => $data["description"]
        ]);
    }

    /**
     * Elimina un recurso especifico de la BD
     *
     * @return void
     */
    public function destroy($id){
        $stmt = $this->connection->prepare("DELETE FROM incomes WHERE id_income=:id_income");
        $stmt->execute([":id_income" => $id]);
    }
}
