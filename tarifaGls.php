<?php 
require_once 'Conexion.php'; // Incluye la clase de conexión

class TarifasGls
{
    private $pdo;
    
    public function __construct() {
        $conexion = new Conexion();
        $this->pdo = $conexion->conectar();
    }

    public function obtenerTarifaOchoService($peso,$zona){
       
        // Construir la consulta SQL con el nombre de la zona dinámicamente
        $sql = "SELECT $zona FROM ochoservice WHERE peso >= $peso";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            return $resultado[$zona]; // Devolver el valor correspondiente a la zona
        } else {
            return "No se encontraron tarifas para los datos proporcionados"; // Si no se encuentra ningún resultado
        }
    }

    public function obtenerTarifaDiezService($peso, $zona){
        $zona = strtolower(trim($zona));
        $zonasValidas = ['provincia','peninsula','baleares','canarias'];

        if (!in_array($zona, $zonasValidas)) {
            throw new Exception("Zona inválida : $zona");
        }

        // Construir la consulta SQL con el nombre de la zona dinámicamente
        $sql = "SELECT $zona FROM diezservice WHERE peso >= $peso";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            return $resultado[$zona]; // Devolver el valor correspondiente a la zona
        } else {
            return null; // Si no se encuentra ningún resultado
        }
    }

    public function obtenerTarifaDosService($peso,$zona){
        $zona = strtolower(trim($zona));
        $zonasValidas = ['provincia','peninsula','baleares','canarias','baleares_menor','canarias_menor'];

        if (!in_array($zona, $zonasValidas)) {
            throw new Exception("Zona inválida : $zona");
        }

        // Construir la consulta SQL con el nombre de la zona dinámicamente
        $sql = "SELECT $zona FROM dosservice WHERE peso >= $peso";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            return $resultado[$zona]; // Devolver el valor correspondiente a la zona
        } else {
            return null; // Si no se encuentra ningún resultado
        }
    }

    public function obtenerTarifaBusinessParcel($peso,$zona){
        $zona = strtolower(trim($zona));
        $zonasValidas = ['provincia','peninsula','baleares','canarias','baleares_menor','canarias_menor'];

        if (!in_array($zona, $zonasValidas)) {
            throw new Exception("Zona inválida : $zona");
        }

        // Construir la consulta SQL con el nombre de la zona dinámicamente
        $sql = "SELECT $zona FROM businessparcel WHERE peso >= $peso";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            return $resultado[$zona]; // Devolver el valor correspondiente a la zona
        } else {
            return null; // Si no se encuentra ningún resultado
        }
       
    }
 
    public function obtenerTarifaPesoExtraBusiness($zona){
    
        $sql = "SELECT $zona FROM businessparcel WHERE id = 6";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return $resultado[$zona];
        } else {
            return null;
        }
        
    }
    public function obtenerTarifaPesoExtraDiez($zona){
    
        $sql = "SELECT $zona FROM diezservice WHERE id = 6";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return $resultado[$zona];
        } else {
            return null;
        }
        
    }
    public function obtenerTarifaPesoExtraOcho($zona){
    
        $sql = "SELECT $zona FROM ochoservice WHERE id = 6";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return $resultado[$zona];
        } else {
            return null;
        }
        
    }
    public function obtenerTarifaPesoExtraDos($zona){
    
        $sql = "SELECT $zona FROM dosservice WHERE id = 6";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return $resultado[$zona];
        } else {
            return null;
        }
        
    }
   
}


?>