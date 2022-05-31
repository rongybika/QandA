<?php

$titleCookie = $_POST['data'];

$database = new Database();
$db = $database->getConnection();

$stopWords = ["a", "about", "above", "after", "again", "against", "ain", "all", "am", "an", "and", "any", "are", "aren", "as", "at", "be", "because", "been", "before", "being", "below", "between", "both", "but", "by", "can", "couldn", "d", "did", "didn", "do", "does", "doesn", "doing", "don", "don't", "down", "during", "each", "few", "for", "from", "further", "had", "hadn", "has", "hasn", "have", "haven", "having", "he", "her", "here", "hers", "herself", "him", "himself", "his", "how", "i", "if", "in", "into", "is", "isn", "it", "its", "itself", "just", "ll", "m", "ma", "me", "mightn", "more", "most", "mustn", "my", "myself", "needn", "no", "nor", "not", "now", "o", "of", "off", "on", "once", "only", "or", "other", "our", "ours", "ourselves", "out", "over", "own", "re", "s", "same", "shan", "she", "should", "shouldn", "so", "some", "such", "t", "than", "that", "the", "their", "theirs", "them", "themselves", "then", "there", "these", "they", "this", "those", "through", "to", "too", "under", "until", "up", "ve", "very", "was", "wasn", "we", "were", "weren", "what", "when", "where", "which", "while", "who", "whom", "why", "will", "with", "won", "wouldn", "y", "you", "your", "yours", "yourself", "yourselves", "could", "let", "ought", "would"];

$related = strtolower(preg_replace('/[^a-zA-Z0-9]/', ' ', $titleCookie));
while (strpos($related, '  ') === true) {
    $related = str_replace('  ', ' ', $related);
}
$relatedExplode = explode(' ', $related);

$lessRelated = array_filter($relatedExplode, function($value) use ($stopWords){

                   if (strlen($value) > 2  && !in_array(mb_strtolower($value), $stopWords))
                   {
                      return true;
                   }
                   return false;
                });

$likePart = implode('|', $lessRelated);

$answersArr["records"] = array();

$query = "SELECT `question_id`, `title`, `views` FROM `questions` WHERE (questions.body REGEXP '" . $likePart . "' OR questions.title REGEXP '" . $likePart . "') AND `active_q` = 1 LIMIT 20;";

$stmt = $db->prepare($query);
$stmt->execute();
$num = $stmt->rowCount();

if ($num > 0) {

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        
        $title = html_entity_decode($title, ENT_QUOTES);
        $title = html_entity_decode($title);
        $title = html_entity_decode($title);
        $title = html_entity_decode($title);
        $title = html_entity_decode($title);
        $title = htmlspecialchars_decode($title);
        $title = html_entity_decode($title, ENT_QUOTES);
        
        $urlFTitle = strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', $title));
        while (strpos($urlFTitle, '--') === true) {

            $urlFTitle = str_replace('  ', ' ', $urlFTitle);
        }

        $urlFTitle = mb_substr($urlFTitle, 0, 80);

        if (mb_substr($urlFTitle, -1) == '-') {
            $urlFTitle = mb_substr($urlFTitle, 0, -1);
        }

        $answerItem = array(
            "id" => $question_id,
            "title" => html_entity_decode($title),
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


// $database = new Database();
// $db = $database->getConnection();

// $query = "SELECT question_id, title, views FROM questions WHERE `active_q` = 1 ORDER BY views DESC LIMIT 10";

// $stmt = $db->prepare($query);

// $stmt->execute();

// $num = $stmt->rowCount();

// if ($num > 0) {
//     $answersArr = array();
//     $answersArr["records"] = array();

//     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         extract($row);
        
//         $title = html_entity_decode($title, ENT_QUOTES);
//         $title = html_entity_decode($title);
//         $title = html_entity_decode($title);
//         $title = html_entity_decode($title);
//         $title = html_entity_decode($title);
//         $title = html_entity_decode($title);
//         $title = html_entity_decode($title);
        
//         $urlFTitle = strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', html_entity_decode($title, ENT_QUOTES)));

//         while (strpos($urlFTitle, '--') !== false) {
//             $urlFTitle = strtolower(preg_replace('/--/', '-', $urlFTitle));
//         }

//         $urlFTitle = mb_substr($urlFTitle, 0, 80);

//         if (mb_substr($urlFTitle, -1) == '-') {
//             $urlFTitle = mb_substr($urlFTitle, 0, -1);
//         }

//         $answerItem = array(
//             "id" => $question_id,
//             "title" => html_entity_decode($title, ENT_QUOTES),
//             "views" => $views,
//             "url_f_title" => $urlFTitle
//         );

//         array_push($answersArr["records"], $answerItem);
//     }
//     echo json_encode($answersArr);
// } else {
//     echo json_encode(
//         array("message" => "No answers found.")
//     );
// }
