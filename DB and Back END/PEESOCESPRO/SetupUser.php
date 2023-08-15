<?php
require "db.php";
$results = [];

        
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $dataArguments = [
       
        'Examinee_ID' => $_POST['Examinee_ID']
        
    ];
   
    $status=$conn->query("SELECT status from examinees where examinees.id={$_POST['Examinee_ID']}")->fetchColumn();
        
        if($status == 'STARTED' || $status == 'FINISHED' ){
            $results['status']=$status;

        }else{
            // $queryString = "INSERT INTO examinees(firstname,lastname,middlename,barangay,School_intended,Exam_set,Course) VALUES (:firstname, :lastname, :middlename, :barangay, :school_intended,:Exam_set, :course)";
            $queryString = "UPDATE examinees set  status='STARTED' where ID=:Examinee_ID";

    try {
        $stmt = $conn->prepare($queryString);
        $stmt->execute($dataArguments);
        
        // $results['Examinee_ID'] = $conn->lastInsertId();
        
        // $results['user'] = $conn->query("SELECT * FROM examinees WHERE examinees.id={$results['Examinee_ID']}")->fetchAll(PDO::FETCH_OBJ);
        
        $results['status']="Success";
        
    } catch (PDOException $e){
        var_dump($e);
    }
    

        }
        echo json_encode($results);
       
}
?>