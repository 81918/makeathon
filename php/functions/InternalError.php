<?php
function InternalError ($path, $ErrorCode){
    $contact = "<a href='" . $path . "?error=" . $ErrorCode . "'>hier</a>";
    $title = "<h1 class='error'>Error code: $ErrorCode!</h1>";
    $message =  "<p class='error'>Maak contact met ons om dit probleem op te lossen. Klik " . $contact . " om naar contact te gaan.</p>";
    return $InternalError = $title . $message;
}

