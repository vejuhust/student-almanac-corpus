<?php

session_start();
unset($_SESSION['loggedIn']);
unset($_SESSION['author']);
unset($_SESSION['password']);
unset($_SESSION['id']);
unset($_SESSION['ip_login']);
unset($_SESSION['date_login']);

header('Location: ../.');
exit();
