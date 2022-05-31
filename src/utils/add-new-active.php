<?php

include_once __DIR__ . '/../../config/config.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM `questions` WHERE `active_q`=0 LIMIT 500;";
//echo $query;

$stmt = $db->prepare($query);

$stmt->execute();

$num = $stmt->rowCount();

if ($num > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        
        $userId = rand(1,977102);
        $randomHour = rand (0,23);
        $randomMinute = rand (0,59);
        $randomSecond = rand (0,59);
        //$questionCreatedDate = date("Y-m-d H:i:s");
        $questionCreatedDate = date("Y-m-d", strtotime( '-1 days' )) . " " . $randomHour . ":" . $randomMinute . ":" . $randomSecond;
        
        $queryUpdate = "UPDATE `questions` SET `user_id` = {$userId}, `question_created_date` = '{$questionCreatedDate}', `active_q` = 1 WHERE `question_id` = {$question_id};";
        
        //echo $queryUpdate;
        
        $stmtUpdate = $db->prepare($queryUpdate);

        $stmtUpdate->execute();
    }
}

$query = "SELECT * FROM `questions` WHERE `active_q`=1 AND `question_created_date`='0000-00-00';";
$stmt = $db->prepare($query);
$stmt->execute();
$num = $stmt->rowCount();

if ($num > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        
        $userId = rand(1,977102);
        $randomHour = rand (0,23);
        $randomMinute = rand (0,59);
        $randomSecond = rand (0,59);
        
        $questionCreatedDate = date("Y-m-d", strtotime( '-1 days' )) . " " . $randomHour . ":" . $randomMinute . ":" . $randomSecond;
        
        if ($user_id == 0){
            $queryUpdate2 = "UPDATE `questions` SET `user_id` = {$userId}, `question_created_date` = '{$questionCreatedDate}' WHERE `question_id` = {$question_id};";
        } else {
                $queryUpdate2 = "UPDATE `questions` SET `question_created_date` = '{$questionCreatedDate}' WHERE `question_id` = {$question_id};";
        }
        
        $stmtUpdate2 = $db->prepare($queryUpdate2);
        $stmtUpdate2->execute();
    }
}


$dirName = dirname(__DIR__, 2) . "/logs/";
$myfile = fopen($dirName . "log.txt", "a");
$txt = date('Y-m-d H:i:s') . " => add-new-active" . "\n";
fwrite($myfile, $txt);
fclose($myfile);