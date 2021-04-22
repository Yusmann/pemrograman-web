<?php
session_start();

unset($_SESSION['MEMBER']);

header('Location: http://localhost/pemrograman-web-main/UTS_PWL/index.php?hal=home');