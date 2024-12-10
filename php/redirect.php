<?php
    session_start();
    require "redirect_headers.php";

    if (!isset($_SESSION["user_id"])) {
        header($index_php);
    }
?>