<?php

$database = new Database();
$db = $database->getConnection();

/*$query = "SELECT qu.*, (SELECT LEFT(body,400) FROM answers WHERE question_id=qu.question_id LIMIT 1) AS excerpt 
            FROM (SELECT * FROM questions WHERE free > 0 ORDER BY rand() LIMIT 20) qu ORDER BY qu.views DESC";*/
            
// $query = "SELECT qu.*, (SELECT LEFT(body,400) FROM `answers` WHERE `answers`.`question_id`=qu.question_id LIMIT 1) AS excerpt FROM (SELECT qu1.views, qu1.question_id,qu1.title FROM questions qu1 LEFT JOIN `answers` an1 ON qu1.question_id=an1.question_id WHERE LENGTH(an1.`body`) > 5 ORDER BY rand() LIMIT 10) qu WHERE `active_q` = 1 ORDER BY qu.views DESC;";

$query = "SELECT qu.*, (SELECT LEFT(body,400) FROM `answers` WHERE `answers`.`question_id`=qu.question_id LIMIT 1) AS excerpt FROM (SELECT qu1.views, qu1.question_id,qu1.title, qu1.active_q FROM questions qu1 LEFT JOIN `answers` an1 ON qu1.question_id=an1.question_id WHERE (LENGTH(an1.`body`) > 5) AND (qu1.active_q = 1) ORDER BY rand() LIMIT 10) qu WHERE `active_q` = 1 ORDER BY qu.views DESC;";
            
// prepare query statement
$stmt = $db->prepare($query);

// execute query
$stmt->execute();

$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {
        // answers array
    $answersArr = array();
    $answersArr["records"] = array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        
        $title = html_entity_decode($title, ENT_QUOTES);
        $title = html_entity_decode($title);
        $title = html_entity_decode($title);
        $title = html_entity_decode($title);
        $title = html_entity_decode($title);
        $title = html_entity_decode($title);
        $title = htmlspecialchars_decode($title);
        
        $excerpt = html_entity_decode($excerpt, ENT_QUOTES);
        $excerpt = html_entity_decode($excerpt);
        $excerpt = html_entity_decode($excerpt);
        $excerpt = html_entity_decode($excerpt);
        $excerpt = html_entity_decode($excerpt);
        $excerpt = html_entity_decode($excerpt);
        $excerpt = html_entity_decode($excerpt);
        $excerpt = html_entity_decode($excerpt);
        
        $excerpt = str_replace('? ', '?<br />', $excerpt);
        $excerpt = str_replace('! ', '?<br />', $excerpt);
        

        $urlFTitle = strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', html_entity_decode($title, ENT_QUOTES)));

        while (strpos($urlFTitle, '--') !== false) {
            $urlFTitle = strtolower(preg_replace('/--/', '-', $urlFTitle));
        }

        $urlFTitle = mb_substr($urlFTitle, 0, 80);

        if (mb_substr($urlFTitle, -1) == '-') {
            $urlFTitle = mb_substr($urlFTitle, 0, -1);
        }
        
        $answerItem = array(
            "id" => $question_id,
            "title" => html_entity_decode($title, ENT_QUOTES),
            "views" => $views,
            "url_f_title" => $urlFTitle,
            "excerpt" => $excerpt = html_entity_decode($excerpt) . "...",
        );

        array_push($answersArr["records"], $answerItem);
    }
    echo json_encode($answersArr);
} else {
    echo json_encode(
        array("message" => "No answers found.")
    );
}