<div id="privacy-policy-tabs">
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'public-network-terms-of-service')" id="defaultOpen">Public Network Terms of Service</button>
        <button class="tablinks" onclick="openCity(event, 'for-teams-terms-of-service')">For Teams Terms of Service</button>
        <button class="tablinks" onclick="openCity(event, 'business-terms-of-service')">Business Terms of Service</button>
        <button class="tablinks" onclick="openCity(event, 'api-terms-of-use')">API Terms of Use</button>
        <button class="tablinks" onclick="openCity(event, 'privacy-policy')">Privacy Policy</button>
        <button class="tablinks" onclick="openCity(event, 'data-security-and-due-process')">Data Security and Due Process</button>
        <button class="tablinks" onclick="openCity(event, 'cookie-policy')">Cookie Policy</button>
        <button class="tablinks" onclick="openCity(event, 'acceptable-use-policy')">Acceptable Use Policy</button>
    </div>

    <div id="public-network-terms-of-service" class="tabcontent">
        <?php require_once('privacy-policy/public-network-terms-of-service.html.php'); ?>
    </div>

    <div id="for-teams-terms-of-service" class="tabcontent">
        <?php require_once('privacy-policy/for-teams-terms-of-service.html.php'); ?>
    </div>

    <div id="business-terms-of-service" class="tabcontent">
        <?php require_once('privacy-policy/business-terms-of-service.html.php'); ?>
    </div>

    <div id="api-terms-of-use" class="tabcontent">
        <?php require_once('privacy-policy/api-terms-of-use.html.php'); ?>
    </div>

    <div id="privacy-policy" class="tabcontent">
        <?php require_once('privacy-policy/privacy-policy.html.php'); ?>
    </div>

    <div id="data-security-and-due-process" class="tabcontent">
        <?php require_once('privacy-policy/data-security-and-due-process.html.php'); ?>
    </div>

    <div id="cookie-policy" class="tabcontent">
        <?php require_once('privacy-policy/cookie-policy.html.php'); ?>
    </div>

    <div id="acceptable-use-policy" class="tabcontent">
        <?php require_once('privacy-policy/acceptable-use-policy.html.php'); ?>
    </div>
</div>