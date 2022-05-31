<?php

/*include_once __DIR__ . '/../src/firewall/firewall.php';*/
require __DIR__ . '/../src/Shieldon/autoload.php';
//new \Shieldon\Integration\Bootstrapper();
$writable = __DIR__ . '/../shieldon';
$firewall = new \Shieldon\Firewall($writable);
$firewall->run();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//include config information for database
include_once __DIR__ . '/../config/config.php';
include_once __DIR__ . '/../src/utils/cleanurl.php';
include_once __DIR__ . '/../src/utils/splitlongtext.php';

//$dbh = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
//$redirect = $_SERVER['REQUEST_URI']; // You can also use $_SERVER['REDIRECT_URL'];
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$cleanUrl = __get_clean_url($_SERVER['REQUEST_URI']);
//var_dump($uri_parts);
//var_dump($cleanUrl);
$params = $cleanUrl = explode('/', $cleanUrl);

$siteName = "Site Name";
$siteNameTwitter = "@SiteName";
$fullUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//var_dump($params[2]);
//die;

//if (isset($_GET['url'])) {
switch ('/' . $params[1]) {
    case '/':
        require_once __DIR__ . '/../src/controller/home.php';
        break;
    case '/home':
        require __DIR__ . '/../src/controller/home.php';
        break;
    case '/contact':
        require __DIR__ . '/../src/controller/contact.php';
        break;
    case '/contact-submit':
        require __DIR__ . '/../src/controller/contact-submit.php';
        break;
    case '/about':
        require __DIR__ . '/../src/controller/about.php';
        break;
    case '/login':
        require __DIR__ . '/../src/controller/auth/login.php';
        break;
    case '/register':
        //require __DIR__ . '/../src/controller/auth/register.php';
        break;
    case '/search':
        require __DIR__ . '/../src/controller/search.php';
        break;
    case '/q':
        require_once __DIR__ . '/../src/controller/questions.php';
        break;
    case '/logout':
        //require __DIR__ . '/../src/controller/logout.php';
        break;
    case '/hotquestions':
        require __DIR__ . '/../src/controller/hotquestions.php';
        break;
    case '/relatedquestions':
        require __DIR__ . '/../src/controller/relatedquestions.php';
        break;
    case '/random':
        require __DIR__ . '/../src/controller/random.php';
        break;
    case '/randombottom':
        require __DIR__ . '/../src/controller/randombottom.php';
        break;
    case '/privacy-policy':
        require __DIR__ . '/../src/controller/privacypolicy.php';
        break;
    case '/login-page':
        require __DIR__ . '/../templates/login-page.html.php';
        break;
    case '/add-answer':
        require __DIR__ . '/../src/controller/redirect/add-answer.php';
        break;
    case '/add-answer-comment':
        require __DIR__ . '/../src/controller/redirect/add-answer-comment.php';
        break;
    case '/add-question-comment':
        require __DIR__ . '/../src/controller/redirect/add-question-comment.php';
        break;
    case '/addquestion':
        require __DIR__ . '/../src/controller/redirect/addquestion.php';
        break;
    case '/user-details':
        require __DIR__ . '/../src/controller/redirect/user-details.php';
        break;
    case '/add-new-active':
        require __DIR__ . '/../src/controller/add-new-active.php';
        break;
    case '/control-panel-firewall-login-admin':
            $firewall = \Shieldon\Container::get('firewall');
            $controlPanel = new \Shieldon\FirewallPanel($firewall);
            $controlPanel->entry();
            exit;
    default:
        require __DIR__ . '/../src/controller/404.php';
}
