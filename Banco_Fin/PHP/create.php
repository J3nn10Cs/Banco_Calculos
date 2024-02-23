<?php
    $id = 0;
    $name = '';
    $lastaname = '';
    $number = '';
    $gmail = '';
    $country = '';
    $city = '';

    session_start(); //para usar ($_SESSION)

    if(isset($_SESSION) && !empty($_SESSION)){
        $id = $_SESSION["row"]["id"];
        $name = $_SESSION["row"]["names"];
        $lastaname = $_SESSION["row"]["lastName"];
        $number = $_SESSION["row"]["numbers"];
        $gmail = $_SESSION["row"]["email"];
        $country = $_SESSION["row"]["country"];
        $city = $_SESSION["row"]["city"];
    }

    if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["id"])){
        $id = $_GET["id"];
        readForUpdate($id);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        ProcessContact();
    }

    function ProcessContact(){
        require_once "configuration.php";
        $name = $_POST["Name"]; //post formulario
        $lastaname = $_POST["FirstName"];
        $number = $_POST["Number"];
        $gmail = $_POST["Email"];
        $country = $_POST["Country"];
        $city = $_POST["City"];

        session_start();
        $id = $_SESSION["row"]["id"];

        if(!empty($id)){
            $sql = "UPDATE contacts SET names = :names,lastName = :lastname,numbers =:numbers,email =:gmail,country =:country,city=:city
                WHERE id = :id";
        if($stmt = $pdo -> prepare($sql)){
            $stmt -> bindParam("names",$name);
            $stmt -> bindParam("lastname",$lastaname);
            $stmt -> bindParam("numbers",$number);
            $stmt -> bindParam("gmail",$gmail);
            $stmt -> bindParam("country",$country);
            $stmt -> bindParam("city",$city);
            $stmt -> bindParam("id",$id);
            if($stmt -> execute()){
                header("location: contact.php");
                limpiarformulario();
                exit();
            }else{
                echo "Lo siento se produjo un error";
            }
        }
        }else{
        $sql = "INSERT INTO contacts (names,lastName,numbers,email,country,city) VALUES (?,?,?,?,?,?)";

        if($stmt = $pdo -> prepare($sql)){ //para acceder a la bd se usa la variable $pdo con eso definimos $smt para ña ejecucion de comandos
            if($stmt -> execute([$name,$lastaname,$number,$gmail,$country,$city])){ //si es correcto nos dirige a la pagina
                header("location: contact.php");
                limpiarformulario();
                exit();
            }else{
                echo "Se produjo un error";
            }
        }
    }
        unset($smt); //cerrar variable 
        unset($pdo); //cerrar la conexion   
    }


    function readForUpdate($id){
        require_once "configuration.php";

        $sql = "SELECT * FROM contacts WHERE id= :id";
        if($stmt = $pdo -> prepare($sql)){
            if($stmt -> execute([$id])){
                if($stmt -> rowCount() == 1){
                    $row = $stmt -> fetch();
                    $_SESSION["row"] = $row;
                    header("location: contact.php");
                    unset($stmt);
                    exit();
                }else{
                    header("location: error.php");
                    exit();
                }
            }else{
                echo "Lo siento hubo un error";
            }
        }
        unset($pdo);
    }

    function limpiarformulario(){
        unset($_SESSION["row"]);
        $id = 0;
        $name= '';
        $lastaname = '';
        $number = '';
        $gmail = '';
        $country = '';
        $city = '';
    }
?>