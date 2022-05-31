<?php

//var_dump($_SERVER);
//if ($_SERVER['HTTP_ORIGIN'] !== "http://myanswers.local") {
//header('Access-Control-Allow-Origin: http://myanswers.local/*');
//echo 'wrong request';
//die;
//}

if (!isset($_GET['page'])) {
    $currentPage = 1;
} else {
    $currentPage = $_GET['page'];
}

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// get keywords
//$keyword = isset($_GET["q"]) ? $_GET["q"] : "";

$no_of_records_per_page = 20;
$offset = ($currentPage - 1) * $no_of_records_per_page;

$query = "SELECT COUNT(*) FROM questions WHERE `active_q` = 1";
$stmt = $db->prepare($query);
$stmt->execute();
$totalRows = $stmt->fetch()[0];
$totalPages = ceil($totalRows / $no_of_records_per_page);

$currentPage = (int) $currentPage;
if ($currentPage > $totalPages) {
    $currentPage = $totalPages;
} // if
if ($currentPage < 1) {
    $currentPage = 1;
} // if

$limit = 'LIMIT ' . ($currentPage - 1) * $no_of_records_per_page . ',' . $no_of_records_per_page;

// select all query
//$query = "SELECT *, LEFT(body,400) AS excerpt FROM posts WHERE parent_id = 0 " . $limit;

// $query = "SELECT pt.*,LEFT(body,400) AS excerpt,u.* FROM posts pt
// JOIN usersposts up ON pt.post_id=up.post_id
// JOIN users u ON u.user_id=up.user_id
// WHERE pt.parent_id = 0 " . $limit;

// $query = "SELECT qu.*, us.*,(SELECT LEFT(body,400) FROM answers WHERE question_id=qu.question_id LIMIT 1) AS excerpt FROM questions qu 
// JOIN users us ON qu.user_id=us.user_id " . $limit;

$query = "SELECT qu.*, (SELECT LEFT(body,400) FROM answers WHERE question_id=qu.question_id LIMIT 1) AS excerpt FROM questions qu WHERE `active_q` = 1 " . $limit;
// prepare query statement
$stmt = $db->prepare($query);

// execute query
$stmt->execute();

$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {
    // answers array
    $answers = array();
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
        $title = htmlspecialchars_decode($title);
        
        
        /*$body = html_entity_decode($body, ENT_QUOTES);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        
        $body = str_replace('? ', '?<br />', $body);
        $body = str_replace('! ', '?<br />', $body);*/
        
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

        $date = date_create($question_created_date);
        $answerItem = array(
            "id" => $question_id,
            "title" => html_entity_decode($title, ENT_QUOTES),
            /*"text" => html_entity_decode($body, ENT_QUOTES),*/
            "excerpt" => html_entity_decode($excerpt, ENT_QUOTES),
            "created_date" => date_format($date, 'F d, Y'),
            "created_time" => date_format($date, 'H:i'),
            "viewed" => $views,
            "url_f_title" => $urlFTitle,
            /*"nickname" => $nickname*/
        );

        array_push($answersArr["records"], $answerItem);
    }

    $answers = $answersArr["records"];

    $pageTitle = 'SubAns - Find Answer for mAny Questions';

    require_once  __DIR__ . '/../../templates/home.html.php';
} else {
}
