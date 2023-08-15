<?php
require "db.php";
$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $dataArguments = [
        ':firstname' => $_POST['firstname'],
        ':lastname' => $_POST['lastname'],
        ':middlename' => $_POST['lastname'],
        ':barangay' => $_POST['barangay'],
        ':school_intended' => $_POST['school_intended'],
        ':Exam_set' => $_POST['Exam_set'],
        ':course' => $_POST['course']
        
    ];
   

   
        $queryString = "INSERT INTO examinees(firstname,lastname,middlename,barangay,School_intended,Exam_set,Course) VALUES (:firstname, :lastname, :middlename, :barangay, :school_intended,:Exam_set, :course)";
    

    try {
        $stmt = $conn->prepare($queryString);
        $stmt->execute($dataArguments);
        
        $results['Examinee_ID'] = $conn->lastInsertId();
        
        $results['user'] = $conn->query("SELECT * FROM examinees WHERE examinees.id={$results['Examinee_ID']}")->fetchAll(PDO::FETCH_OBJ);
        
        echo json_encode($results);
    } catch (PDOException $e){
        var_dump($e);
    }
    
}
?>