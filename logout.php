//Abdallah Abada, 04/21/2023, It202-006, unit 3 assignemnt, aa2972@njit.edu
<?php
    session_start();
    $_SESSION = [];
    session_destroy();     // the session ends
        $message = 'Logged out.';
        include('login.php');
?>