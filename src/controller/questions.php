<?php

//$_SESSION = array();
//var_dump($_SERVER);
//if ($_SERVER['HTTP_ORIGIN'] !== "http://myanswers.local") {
//header('Access-Control-Allow-Origin: http://myanswers.local/*');
//echo 'wrong request';
//die;
//}
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

$answersArr = array();
$answersArr['question'] = array();
$answersArr['question']['info'] = array();
$answersArr['question']['comments'] = array();
$answersArr['answers'] = array();

// select all query
//$query = "SELECT * FROM posts WHERE posts.post_id = ?";

// $query = "SELECT pt.*,u.* FROM posts pt
// JOIN usersposts up ON pt.post_id=up.post_id
// JOIN users u ON u.user_id=up.user_id
// WHERE pt.post_id = ?";

$query = "SELECT qu.*,us.* FROM questions qu
LEFT JOIN users us ON qu.user_id=us.user_id
WHERE `question_id`=:id AND `active_q` = '1';";

$stmt = $db->prepare($query);
$id = htmlspecialchars($params[2]);
// $stmt->bindParam(1, intval($id));
$idInt = intval($id);

$stmt->bindParam(':id', $idInt, PDO::PARAM_INT);
$stmt->execute();
$num = $stmt->rowCount();
// check if more than 0 record found
if ($num > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        
        $date = date_create($question_created_date);
        
        $title = html_entity_decode($title, ENT_QUOTES, 'UTF-8');
        
        $title = html_entity_decode($title);
        $title = html_entity_decode($title);
        $title = html_entity_decode($title);
        $title = html_entity_decode($title);
        $title = htmlspecialchars_decode($title);
        
        $body = html_entity_decode($body, ENT_QUOTES);
        
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);

        //var_dump(html_entity_decode($title, ENT_QUOTES));
        //die();

        $answerItem = array(
            "question_id" => $question_id,
            "title" => html_entity_decode($title, ENT_QUOTES),
            "body" => breakLongTextBody($body),
            "created_date" => date_format($date, 'M d, Y'),
            "created_time" => date_format($date, 'H:i'),
            "viewed" => $views,
            "nickname" => $nickname
        );
        array_push($answersArr['question']['info'], $answerItem);
    }
 	setcookie('question_title', $answersArr['question']['info'][0]['title'], time() + (86400 * 30), "/");
    // echo '<script type="text/javascript">';
    // echo 'let question_title="' . $answersArr['question']['info'][0]['title'] . '";';
    // echo '</script>';

    $queryUpdate = "UPDATE questions SET views = views + 1 WHERE questions.question_id=:question_id";
    $stmt = $db->prepare($queryUpdate);
    $questionId = intval($id);
    $stmt->bindParam('question_id', $questionId, PDO::PARAM_INT);
    $stmt->execute();

    // $query = "SELECT qu.*,co.* FROM questions qu
    //         JOIN questionscomments qc ON qu.question_id=qc.question_id
    //         JOIN comments co ON co.comment_id=qu.comment_id
    //         WHERE qu.question_id=?;";

    $query = "SELECT qc.*,us.* FROM questioncomments qc
            LEFT JOIN users us ON qc.user_id=us.user_id
            WHERE question_id=?";

    $stmt = $db->prepare($query);
    $id = htmlspecialchars($params[2]);
    $questionId = intval($id);
    $stmt->bindParam(1, $questionId, PDO::PARAM_INT);
    $stmt->execute();
    $num = $stmt->rowCount();
    if ($num > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            
            $comment_text = html_entity_decode($comment_text, ENT_QUOTES);
            $comment_text = html_entity_decode($comment_text);
            $comment_text = html_entity_decode($comment_text);
            $comment_text = html_entity_decode($comment_text);
            $comment_text = html_entity_decode($comment_text);
            $comment_text = html_entity_decode($comment_text);
            
            $comment_text = str_replace('? ', '?<br />', $comment_text);
            $comment_text = str_replace('! ', '?<br />', $comment_text);
            
            $questionCommentCreateDate = date_create($comment_created_date);
            $answerItem = array(
                "comment_id" => $comment_id,
                "comment_text" => breakLongTextComment($comment_text),
                "nickname" => $nickname,
                "created_date" => date_format($questionCommentCreateDate, 'M d, Y'),
                "created_time" => date_format($questionCommentCreateDate, 'H:i')
            );
            array_push($answersArr['question']['comments'], $answerItem);
        }
    }

    // $query = "SELECT pt2.*,co.* FROM posts pt
    //     INNER JOIN postsposts pp ON pt.post_id=pp.parent_id
    //     INNER JOIN posts pt2 ON pp.post_id=pt2.post_id
    //     INNER JOIN postscomments pc ON pc.post_id=pt2.post_id
    //     INNER JOIN comments co ON co.comment_id=pc.comment_id
    //     WHERE pt.post_id=?;";

    // $query = "SELECT an.*,co.* FROM answers an
    //         INNER JOIN answerscomments ac ON an.answer_id=ac.answer_id
    //         INNER JOIN comments co ON co.comment_id=ac.comment_id
    //         WHERE an.question_id=?;";

    $query = "SELECT an.*, an.user_id AS an_user_id,
                 ac.*, ac.user_id AS ac_user_id,
                 us1.*, us1.nickname AS an_nickname, us2.*, us2.nickname AS ac_nickname FROM answers an
            LEFT JOIN answercomments ac ON ac.answer_id=an.answer_id
            LEFT JOIN users us1 ON us1.user_id=an.user_id
            LEFT JOIN users us2 ON us2.user_id=ac.user_id
            WHERE an.question_id=:id";

    $stmt = $db->prepare($query);
    $id = htmlspecialchars($params[2]);
    $questionId = intval($id);
    $stmt->bindParam(':id', $questionId, PDO::PARAM_INT);
    $stmt->execute();
    $num = $stmt->rowCount();

    if ($num > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $body_text = html_entity_decode($body, ENT_QUOTES);
            $body_text = html_entity_decode($body_text);
            $body_text = html_entity_decode($body_text);
            $body_text = html_entity_decode($body_text);
            $body_text = html_entity_decode($body_text);
            $body_text = html_entity_decode($body_text);
            $body_text = html_entity_decode($body_text);
            
            //$body_text = str_replace('? ', '?<br />', $body_text);
            //$body_text = nl2br($body_text);
            //var_dump(nl2br($body_text));
            //die;
            
            $answerCreateDate = date_create($answer_created_date);
            $answerItem = array(
                "answer_id" => $answer_id,
                "body_text" => breakLongTextBody($body_text),
                "an_nickname" => $an_nickname,
                "created_date" => date_format($answerCreateDate, 'M d, Y'),
                "created_time" => date_format($answerCreateDate, 'H:i')
            );
            $answersArr['answers'][$answer_id]['info'] = array();
            $answersArr['answers'][$answer_id]['info'] = $answerItem;

            $answersArr['answers'][$answer_id]['comments'] = array();
            if ($comment_id !== null) {
                $answerCommentCreateDate = date_create($comment_created_date);
                
                $comment_text = html_entity_decode($comment_text, ENT_QUOTES);
                $comment_text = html_entity_decode($comment_text);
                $comment_text = html_entity_decode($comment_text);
                $comment_text = html_entity_decode($comment_text);
                $comment_text = html_entity_decode($comment_text);
                $comment_text = html_entity_decode($comment_text);
                
                $comment_text = str_replace('? ', '?<br />', $comment_text);
                $comment_text = str_replace('! ', '?<br />', $comment_text);
                
                
                $commentItem = array(
                    "comment_id" => $comment_id,
                    "comment_text" => $comment_text,
                    "ac_nickname" => $ac_nickname,
                    "created_date" => date_format($answerCommentCreateDate, 'M d, Y'),
                    "created_time" => date_format($answerCommentCreateDate, 'H:i')
                );
                array_push($answersArr['answers'][$answer_id]['comments'], $commentItem);
            }
        }
    }
    
     
    /*$pageTitle = mb_substr($answersArr['question']['info'][0]['title'], 0, 50) . " - SubAns";*/
    $pageTitle = $answersArr['question']['info'][0]['title'] . " - SubAns";
    $firstAnswerArray = reset($answersArr['answers']);

if (isset($firstAnswerArray['info']['body_text'])) {
    $description = htmlspecialchars(mb_substr($firstAnswerArray['info']['body_text'], 0, 155), ENT_QUOTES);
} else {
	$description = '';
}
    require_once  __DIR__ . '/../../templates/questions.html.php';
} else {
    $pageTitle = "404";
    require_once  __DIR__ . '/../../templates/404.html.php';
}
