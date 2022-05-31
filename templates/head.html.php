<?php
// ob_start("ob_gzhandler");

if (!isset($_SERVER['HTTP_ACCEPT_ENCODING'])) {
    ob_start();
} elseif (strpos(' ' . $_SERVER['HTTP_ACCEPT_ENCODING'], 'x-gzip') == false) {
    if (strpos(' ' . $_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') == false) {
        ob_start();
    } elseif (!ob_start("ob_gzhandler")) {
        ob_start();
    }
} elseif (!ob_start("ob_gzhandler")) {
    ob_start();
}
?>
<!DOCTYPE html>
<html class="html__responsive" lang="en">

<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    if (isset($noIndex)) {
        echo $noIndex;
    } else {
        echo '<meta name="robots" content="index, follow">';
    }
    ?>
    <meta http-equiv="Cache-control" content="public">

    <?php
    /*header('Cache-Control: max-age=1000');*/
    header("Content-Encoding: gzip");
    ?>

    <meta name="description" content="<?php echo isset($description) ? strip_tags($description) : '' ?>">
    <meta name="author" content="">

    <link rel="icon" type="image/png" sizes="32x32" href="/img//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">

    <meta property="og:url" content="<?php echo $fullUrl ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $pageTitle ?>">
    <meta property="og:description" content="<?php echo isset($description) ? strip_tags($description) : '' ?>" />
    <meta property="og:image" content="https://www.your-domain.com/path/image.jpg" />
    <meta property="og:site_name" content="<?php echo $siteName ?>">

    <meta property="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php echo $pageTitle ?>" />
    <meta name="twitter:description" content="<?php echo isset($description) ? strip_tags($description) : '' ?>" />
    <meta name="twitter:url" content="http://www.yourdomain.com" />
    <meta name="twitter:site" content="<?php echo $siteNameTwitter ?>" />
    <title><?php echo $pageTitle ?></title>

    <!--<link rel="stylesheet" type="text/css" href="/public/../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/public/../../css/stacks.css">
    <link rel="stylesheet" type="text/css" href="/public/../../css/primary.css">
    <link rel="stylesheet" type="text/css" href="/public/../../css/secondary.css">-->
    <style type="text/css">
        .searchbox input[type=text] {
            width: 130px;
            box-sizing: border-box;
            /*border: 2px solid #ccc;*/
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-image: url('../img/searchicon.png');
            background-position: 10px 7px;
            background-repeat: no-repeat;
            padding: 6px 20px 6px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        .wmd-button>span {
            background-image: url("/img/wmd-buttons.png");
            background-image: url("/img/wmd-buttons.svg"), none;
        }

        #content {
        	max-width: 1100px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="/public/../../css/base.css">
    <link href="/public/../../css/all.css" rel="stylesheet" rel="preload" as="style">
</head>