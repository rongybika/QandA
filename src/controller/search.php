<?php

if (!isset($_GET['page'])) {
    $currentPage = 1;
} else {
    $currentPage = $_GET['page'];
}

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// get keywords
$keyword = isset($_GET["qu"]) ? $_GET["qu"] : "";
$keywordOrig = isset($_GET["qu"]) ? $_GET["qu"] : "";

// sanitize
$keyword = htmlspecialchars($keyword);
$keyword = "%{$keyword}%";

$no_of_records_per_page = 20;
$offset = ($currentPage - 1) * $no_of_records_per_page;

$query = "SELECT COUNT(*) FROM questions WHERE (questions.title LIKE ? OR questions.body LIKE ?) AND `active_q` = 1;";
$stmt = $db->prepare($query);
// bind
$stmt->bindParam(1, $keyword);
$stmt->bindParam(2, $keyword);

$stmt->execute();

$totalRowsOrig = $stmt->fetch()[0];
$totalPages = ceil($totalRowsOrig / $no_of_records_per_page);

$currentPage = (int) $currentPage;
if ($currentPage > $totalPages) {
    $currentPage = $totalPages;
} // if
if ($currentPage < 1) {
    $currentPage = 1;
} // if

$limit = 'LIMIT ' . ($currentPage - 1) * $no_of_records_per_page . ',' . $no_of_records_per_page;

// select all query
//$query = "SELECT *, LEFT(body,400) AS excerpt FROM posts WHERE posts.title LIKE ? OR posts.body LIKE ?" . " " . $limit;
$query = "SELECT us.*, qu.*, (SELECT LEFT(body,400) FROM answers WHERE question_id=qu.question_id LIMIT 1) AS excerpt FROM questions qu JOIN users us ON qu.user_id=us.user_id WHERE (qu.title LIKE ? OR qu.body LIKE ?) AND `active_q` = 1" . " " . $limit;

// prepare query statement
$stmt = $db->prepare($query);

// bind
$stmt->bindParam(1, $keyword);
$stmt->bindParam(2, $keyword);

// execute query
$stmt->execute();

$totalRows = $stmt->rowCount();

// check if more than 0 record found
if ($totalRows > 0) {

    // answers array
    $answersArr = array();
    $answersArr["records"] = array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
        // extract row
        extract($row);
        
        $title = html_entity_decode($title, ENT_QUOTES, 'UTF-8');
        $title = html_entity_decode($title);
        $title = html_entity_decode($title);
        $title = html_entity_decode($title);
        $title = html_entity_decode($title);
        $title = html_entity_decode($title);
        $title = htmlspecialchars_decode($title);
        
        $body = html_entity_decode($body, ENT_QUOTES, 'UTF-8');
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        $body = html_entity_decode($body);
        
        $excerpt = html_entity_decode($excerpt, ENT_QUOTES, 'UTF-8');
        $excerpt = html_entity_decode($excerpt);
        $excerpt = html_entity_decode($excerpt);
        $excerpt = html_entity_decode($excerpt);
        $excerpt = html_entity_decode($excerpt);
        $excerpt = html_entity_decode($excerpt);
        $excerpt = html_entity_decode($excerpt);
        $excerpt = html_entity_decode($excerpt);
        
        
        $date = date_create($question_created_date);

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
            "title" => html_entity_decode($title),
            "text" => html_entity_decode($body),
            "excerpt" => html_entity_decode($excerpt),
            "views" => $views,
            "url_f_title" => $urlFTitle,
            "created_date" => date_format($date, 'M d, Y'),
            "created_time" => date_format($date, 'H:i'),
            "nickname" => $nickname
        );

        array_push($answersArr["records"], $answerItem);
    }
    $answers = $answersArr["records"];

    $pageTitle = "Search Results for " . $keywordOrig . " - SubAns";

    require_once  __DIR__ . '/../../templates/search.html.php';
} else {
    $pageTitle = "Search Results for " . $keywordOrig . " - SubAns";
    
    require_once  __DIR__ . '/../../templates/search-no-result.html.php';
}
