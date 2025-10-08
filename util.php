<?php
    function conecta($params = ""){
          if ($params == "") {
            $params = "pgsql:host=localhost; port=5432; dbname=pessoas; user=postgres; password=postgres";
        }

        try {
            $conn = new PDO($params);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn; 
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
}
?>