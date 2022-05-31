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
/*$query = "SELECT *, LEFT(body,400) AS excerpt FROM (SELECT * FROM posts WHERE parent_id = 0 ORDER BY rand() LIMIT 20) T1 ORDER BY views DESC;";*/

// $query = "SELECT pt.*,LEFT(body,400) AS excerpt,u.* FROM (SELECT * FROM posts WHERE parent_id = 0 ORDER BY rand() LIMIT 20) pt
// JOIN usersposts up ON pt.post_id=up.post_id
// JOIN users u ON u.user_id=up.user_id
// ORDER BY pt.views DESC";

$query = "SELECT qu.*, (SELECT LEFT(body,400) FROM answers WHERE question_id=qu.question_id LIMIT 1) AS excerpt 
            FROM (SELECT * FROM questions WHERE `active_q` = 1 ORDER BY rand() LIMIT 20) qu ORDER BY qu.views DESC";

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
        
        $body = html_entity_decode($body, ENT_QUOTES);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        
        $excerpt = html_entity_decode($excerpt, ENT_QUOTES);
        $excerpt = html_entity_decode($excerpt);
        $excerpt = html_entity_decode($excerpt);
        $excerpt = html_entity_decode($excerpt);
        $excerpt = html_entity_decode($excerpt);
        $excerpt = html_entity_decode($excerpt);

        $urlFTitle = strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', $title));
        while (strpos($urlFTitle, '--') === true) {
            //$urlFTitle = preg_replace('--', '-', $urlFTitle);
            $urlFTitle = str_replace('  ', ' ', $urlFTitle);
        }

        $urlFTitle = mb_substr($urlFTitle, 0, 80);

        if (mb_substr($urlFTitle, -1) == '-') {
            $urlFTitle = mb_substr($urlFTitle, 0, -1);
        }

        $date = date_create($question_created_date);

        $answerItem = array(
            "id" => $question_id,
            "title" => html_entity_decode($title, ENT_QUOTES),
            "text" => html_entity_decode($body),
            "excerpt" => html_entity_decode($excerpt),
            "created_date" => date_format($date, 'F d, Y'),
            "views" => $views,
            "url_f_title" => $urlFTitle,
            /*nickname" => $nickname*/
        );

        array_push($answersArr["records"], $answerItem);
    }
    $pageTitle = 'Random Questions - SubAns';

    require_once  __DIR__ . '/../../templates/random.html.php';
} else {
}
