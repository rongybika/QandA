<!--<script src="/public/../../js/jquery-3.4.1.min.js"></script>
<script src="/public/../../js/script.js"></script>-->

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<!--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script>-->

<?php
require __DIR__ . '/../src/utils/loader.php';
?>
<script defer type="text/javascript" src="/public/../../js/cookie-consent3-0-0.js"></script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        cookieconsent.run({
            "notice_banner_type": "interstitial",
            "consent_type": "express",
            "palette": "light",
            "change_preferences_selector": "#changePreferences",
            "language": "en",
            "website_name": "<?php echo $siteName ?>",
            "cookies_policy_url": "/privacy-policy"
        });
    });
</script>

<script type="text/plain" cookie-consent="tracking"></script>
</body>

</html>
<?php
ob_end_flush();
?>