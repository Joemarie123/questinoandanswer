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
        $results['examineeID']=$_POST['Examinee_ID'];
        $results['user'] = $conn->query("SELECT examinees.*, examinee_score.Score FROM examinees left outer join examinee_score on examinees.ID=examinee_score.Examinee_id where examinees.ID={$_POST['Examinee_ID']}")->fetchAll(PDO::FETCH_ASSOC);
        $results['answer']=$conn->query("SELECT * from exam_answer where Examinee_ID={$_POST['Examinee_ID']}")->fetchAll(PDO::FETCH_ASSOC);
    
        echo json_encode($results);
    } catch (PDOException $e){
        var_dump($e);
    }
    
}
?>