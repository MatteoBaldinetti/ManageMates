<?php
session_start();
session_destroy();
require "redirect_headers.php";
header($index_php);
?>