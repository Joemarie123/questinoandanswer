<?php
require "db.php";
$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    
    
   

   
        // $queryString = "SELECT * from examinees";
    

    try {
        // $stmt = $conn->prepare($queryString);
        // $stmt->execute($dataArguments);
        
        // $results['Examinee_ID'] = $conn->lastInsertId();
        
        $results['stop'] = $conn->query("SELECT stop  FROM exam_stop")->fetchAll(PDO::FETCH_OBJ);
       
        echo json_encode($results);
    } catch (PDOException $e){
        var_dump($e);
    }
    
}
?>