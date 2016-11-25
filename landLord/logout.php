<?php
session_start();
unset($_SESSION['landLord_is_login']);
unset($_SESSION['landLord_id']);
unset($_SESSION['landLord_name']);
unset($_SESSION['landLord_phone']);
echo '<script>location.replace(document.referrer);</script>';
?>
