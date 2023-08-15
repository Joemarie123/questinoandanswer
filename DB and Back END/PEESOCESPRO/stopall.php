<?php
require "db.php";
$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    
    // $dataArguments = [
       
    //     'Examinee_ID' => $_POST['Examinee_ID']
        
    // ];

   
    //     $queryString = "SELECT * from examinees where ID=:Examinee_ID";
    

    try {
    //     $stmt = $conn->prepare($queryString);
    //     $stmt->execute($dataArguments);
        
        // $results['Examinee_ID'] = $conn->lastInsertId();
     
        $results['answer']=$conn->query("UPDATE exam_stop set stop=1")->fetchAll(PDO::FETCH_ASSOC);
    
        echo json_encode($results);
    } catch (PDOException $e){
        var_dump($e);
    }
    
}
?>