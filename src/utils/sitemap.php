<?php

include_once __DIR__ . "/sitemap/src/sitemapgenerator.php";
include_once __DIR__ . '/../../config/config.php';

//$outputDir = getcwd();
$outputDir = __DIR__ . '/../../public';
//var_dump($outputDir);

$generator = new \Icamys\SitemapGenerator\SitemapGenerator('https://subans.com', $outputDir);

// will create also compressed (gzipped) sitemap
//$generator->createGZipFile = true;
$generator->toggleGZipFileCreation();

// determine how many urls should be put into one file
// according to standard protocol 50000 is maximum value (see http://www.sitemaps.org/protocol.html)
//$generator->maxURLsPerSitemap = 50000;
$generator->setMaxURLsPerSitemap(50000);

// sitemap file name
//$generator->sitemapFileName = "sitemap.xml";
$generator->setSitemapFileName("sitemap.xml");

// sitemap index file name
//$generator->sitemapIndexFileName = "sitemap-index.xml";
$generator->setSitemapIndexFileName("sitemap-index.xml");

// alternate languages
$alternates = [];



// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

$query = "SELECT question_id,title,question_created_date FROM questions WHERE `active_q` = 1;";

// prepare query statement
$stmt = $db->prepare($query);

// execute query
$stmt->execute();
//var_dump($stmt);
//die;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    
    $title = html_entity_decode($title, ENT_QUOTES, 'UTF-8');
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
    
    $fullUrl = '/q/' . $question_id . '/'. $urlFTitle;
    
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $question_created_date);
    
    //$generator->addUrl('/q/' . $question_id . '/'. $urlFTitle, new DateTime(), 'weekly', '0.5', $alternates);
    $generator->addUrl($fullUrl, $date, 'weekly', '0.5', $alternates);
}


// adding url `loc`, `lastmodified`, `changefreq`, `priority`, `alternates`
//$generator->addUrl('http://example.com/url/path/', new DateTime(), 'always', '0.5', $alternates);

// generating internally a sitemap
$generator->createSitemap();

// writing early generated sitemap to file
$generator->writeSitemap();

$generator->updateRobots();



$dirName = dirname(__DIR__, 2) . "/logs/";
$myfile = fopen($dirName . "log.txt", "a");
$txt = date('Y-m-d H:i:s') . " => generate-sitemap" . "\n";
fwrite($myfile, $txt);
fclose($myfile);