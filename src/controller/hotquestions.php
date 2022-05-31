<?php

//var_dump($_SERVER);
//if ($_SERVER['HTTP_ORIGIN'] !== "http://myanswers.local") {
//header('Access-Control-Allow-Origin: http://myanswers.local/*');
//echo 'wrong request';
//die;
//}

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// get keywords
//$keyword = isset($_GET["q"]) ? $_GET["q"] : "";

// select all query
/*$query = "SELECT post_id, title, views FROM posts WHERE parent_id = 0 ORDER BY views DESC LIMIT 10";*/
$query = "SELECT question_id, title, views FROM questions WHERE `active_q` = 1 ORDER BY views DESC LIMIT 10";

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
            "url_f_title" => $urlFTitle
        );

        array_push($answersArr["records"], $answerItem);
    }
    echo json_encode($answersArr);
} else {
    echo json_encode(
        array("message" => "No answers found.")
    );
}
