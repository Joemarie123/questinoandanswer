<?php
require "db.php";
$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    
    
   

   
        // $queryString = "SELECT * from examinees";
    

    try {
        // $stmt = $conn->prepare($queryString);
        // $stmt->execute($dataArguments);
        
        // $results['Examinee_ID'] = $conn->lastInsertId();
        
        $results['users'] = $conn->query("SELECT examinees.*,examinee_score.score  FROM examinees left outer join examinee_score on examinees.ID=examinee_score.Examinee_ID")->fetchAll(PDO::FETCH_OBJ);
        $results['exam_started']=$conn->query("SELECT count(id) as count from examinees where status='STARTED'")->fetchAll(PDO::FETCH_OBJ);
        $results['exam_finish']=$conn->query("SELECT count(id) as count from examinees where status='FINISHED'")->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($results);
    } catch (PDOException $e){
        var_dump($e);
    }
    
}
?>