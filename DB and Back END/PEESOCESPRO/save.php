<?php
require "db.php";
$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $dataArguments = [
        ':Examinee_ID' => $_POST['Examinee_ID'],
        ':Question1' => $_POST['Question1'],
        ':Question2' => $_POST['Question2'],
        ':Question3' => $_POST['Question3'],
        ':Question4' => $_POST['Question4'],
        ':Question5' => $_POST['Question5'],
        ':Question6' => $_POST['Question6'],
        ':Question7' => $_POST['Question7'],
        ':Question8' => $_POST['Question8'],
        ':Question9' => $_POST['Question9'],
        ':Question10' => $_POST['Question10'],
        ':Question11' => $_POST['Question11'],
        ':Question12' => $_POST['Question12'],
        ':Question13' => $_POST['Question13'],
        ':Question14' => $_POST['Question14'],
        ':Question15' => $_POST['Question15'],
        ':Question16' => $_POST['Question16'],
        ':Question17' => $_POST['Question17'],
        ':Question18' => $_POST['Question18'],
        ':Question19' => $_POST['Question19'],
        ':Question20' => $_POST['Question20'],
        ':Question21' => $_POST['Question21'],
        ':Question22' => $_POST['Question22'],
        ':Question23' => $_POST['Question23'],
        ':Question24' => $_POST['Question24'],
        ':Question25' => $_POST['Question25'],
        ':Question26' => $_POST['Question26'],
        ':Question27' => $_POST['Question27'],
        ':Question28' => $_POST['Question28'],
        ':Question29' => $_POST['Question29'],
        ':Question30' => $_POST['Question30'],
        ':Question31' => $_POST['Question31'],
        ':Question32' => $_POST['Question32'],
        ':Question33' => $_POST['Question33'],
        ':Question34' => $_POST['Question34'],
        ':Question35' => $_POST['Question35'],
        ':Question36' => $_POST['Question36'],
        ':Question37' => $_POST['Question37'],
        ':Question38' => $_POST['Question38'],
        ':Question39' => $_POST['Question39'],
        ':Question40' => $_POST['Question40'],
        ':Question41' => $_POST['Question41'],
        ':Question42' => $_POST['Question42'],
        ':Question43' => $_POST['Question43'],
        ':Question44' => $_POST['Question44'],
        ':Question45' => $_POST['Question45'],
        ':Question46' => $_POST['Question46'],
        ':Question47' => $_POST['Question47'],
        ':Question48' => $_POST['Question48'],
        ':Question49' => $_POST['Question49'],
        ':Question50' => $_POST['Question50'],
        ':Question51' => $_POST['Question51'],
        ':Question52' => $_POST['Question52'],
        ':Question53' => $_POST['Question53'],
        ':Question54' => $_POST['Question54'],
        ':Question55' => $_POST['Question55'],
        ':Question56' => $_POST['Question56'],
        ':Question57' => $_POST['Question57'],
        ':Question58' => $_POST['Question58'],
        ':Question59' => $_POST['Question59'],
        ':Question60' => $_POST['Question60'],
        ':Question61' => $_POST['Question61'],
        ':Question62' => $_POST['Question62'],
        ':Question63' => $_POST['Question63'],
        ':Question64' => $_POST['Question64']
        
    ];
   
    $scoreargument=['Examinee_ID'=>$_POST['Examinee_ID'],
        ':score'=>$_POST['score']
    ];
    $updatestatusargument=['Examinee_ID'=>$_POST['Examinee_ID']];
   
        $queryString = "INSERT INTO exam_answer(Examinee_ID,question1, question2, question3, question4, question5, question6, question7, question8, question9, question10, question11, question12, question13, question14, question15, question16, question17, question18, question19, question20, question21, question22, question23, question24, question25, question26, question27, question28, question29, question30, question31, question32, question33, question34, question35, question36, question37, question38, question39, question40, question41, question42, question43, question44, question45, question46, question47, question48, question49, question50, question51, question52, question53, question54, question55, question56, question57, question58, question59, question60, question61, question62, question63, question64) VALUES (:Examinee_ID,:Question1, :Question2, :Question3, :Question4, :Question5, :Question6, :Question7, :Question8, :Question9, :Question10, :Question11, :Question12, :Question13, :Question14, :Question15, :Question16, :Question17, :Question18, :Question19, :Question20, :Question21, :Question22, :Question23, :Question24, :Question25, :Question26, :Question27, :Question28, :Question29, :Question30, :Question31, :Question32, :Question33, :Question34, :Question35, :Question36, :Question37, :Question38, :Question39, :Question40, :Question41, :Question42, :Question43, :Question44, :Question45, :Question46, :Question47, :Question48, :Question49, :Question50, :Question51, :Question52, :Question53, :Question54, :Question55, :Question56, :Question57, :Question58, :Question59, :Question60, :Question61, :Question62, :Question63, :Question64)";
        $queryscore="INSERT INTO examinee_score(Examinee_ID,score) values(:Examinee_ID, :score)";
        $queryupdateexaminees=("UPDATE examinees set status='FINISHED' where ID=:Examinee_ID");

    try {
        $stmt = $conn->prepare($queryString);
        $stmt->execute($dataArguments);

        $scorestmt = $conn->prepare($queryscore);
        $scorestmt->execute($scoreargument);
       
        $statusstmt = $conn->prepare($queryupdateexaminees);
        $statusstmt->execute($updatestatusargument);
        
        // $results['Examinee_ID'] = $conn->lastInsertId();
        
        $results['message'] = "SUCCESS!";
        
        echo json_encode($results);
    } catch (PDOException $e){
        var_dump($e);
    }
    
}
?>