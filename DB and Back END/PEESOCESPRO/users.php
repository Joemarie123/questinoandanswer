<?php
require "db.php";
$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    
    
   

   
        // $queryString = "SELECT * from examinees";
    

    try {
        // $stmt = $conn->prepare($queryString);
        // $stmt->execute($dataArguments);
        
        // $results['Examinee_ID'] = $conn->lastInsertId();
        
        $results['users'] = $conn->query("SELECT ID as Examinee_ID, CONCAT(firstname, ' ', middlename, ' ', lastname) as fullname, examinees.* FROM examinees")->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($results);
    } catch (PDOException $e){
        var_dump($e);
    }
    
}
?>