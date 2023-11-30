<?php
session_start();
unset($_SESSION);
session_destroy();
setcookie("PHPSESSID", 0, time() - 10000, "/");