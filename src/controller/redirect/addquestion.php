<?php
$pageTitle = "Add new question - SubAns";
require_once __DIR__ . '/../../../templates/head.html.php'
?>

<?php
require_once __DIR__ . '/../../../templates/base.html.php'
?>

<div id="mainbar">
    <?php
    $errorMessage = "Wrong Credentials";
    require_once __DIR__ . '/../../../templates/partials/login-mainbar.html.php'
    ?>
</div>

<div id="sidebar" class="show-votes">
    <?php
    require_once __DIR__ . '/../../../templates/partials/hot-questions.html.php'
    ?>
</div>

<?php
require_once __DIR__ . '/../../../templates/footer.html.php'
?>

<?php
require_once __DIR__ . '/../../../templates/footer_all.html.php'
?>