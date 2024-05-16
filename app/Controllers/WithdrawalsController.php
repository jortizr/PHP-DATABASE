<?php

namespace App\Controllers;
use Database\PDO\Connection;
class WithdrawalsController{
    private $connection;

    /**
     * con el constructor va a asignar a la variable connection 
     * la instancia de la base de datos
     */
    public function __construct(){
        $this->connection = Connection::getInstance()->
        get_database_instance();
    }

    /**
     * Mues una lista de los registros
     */
    public function index(){
        $stmt = $this->connection->prepare("SELECT * FROM withdrawals");
        $stmt->execute();
        $results = $stmt->fetchAll();
        //se llama el index.php de la carpeta views
        require("../resources/views/withdrawals/index.php");
    }

    /**
     * Muestra un formulario para crear un nuevo recurso en la BD
     * @return void
     */
    public function create(){
        require("../resources/views/withdrawals/create.php");
    }

    /**
     * Guarda un nuevo recurso en la BD
     * @return void
     */
    public function store($data){
       
        $stmt = $this->connection->prepare("INSERT INTO withdrawals (payment_method, type,
        date, amount, description) VALUES (
            :payment_method, :type, :date, :amount, :description)");
        $stmt->bindValue(":payment_method" , $data["payment_method"]);
        $stmt->bindValue(":type" , $data["type"]);
        $stmt->bindValue(":date" , $data["date"]);
        $stmt->bindValue(":amount" , $data["amount"]);
        $stmt->bindValue(":description" , $data["description"]);

        $data["description"] = "compre cosas para la casa";

        $stmt->execute();
    }

    /**
     * muestra un unico registro especifico
     * $id recibe el id del registro a mostrar
     */
    public function show($id){
        $stmt = $this->connection->prepare("SELECT * FROM withdrawals WHERE id_wd=:id_wd");
        $stmt->execute([":id_wd" => $id]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        echo "el $id tiene que se gasto " . $result["amount"] . " USD en: ". $result["description"] . "\n";
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
        $this->connection->beginTransaction();
        $stmt = $this->connection->prepare("UPDATE whithdrawals SET 
        payment_method=:payment_method, type=:type, date=:date,
        amount=:amount, description=:description 
        WHERE id_wd=:id_wd");
        
        $stmt->execute([
            ":id_wd" => $id,
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
        $stmt = $this->connection->prepare("DELETE FROM withdrawals WHERE id_wd=:id_wd");
        $stmt->execute([":id_wd" => $id]);
    }
}