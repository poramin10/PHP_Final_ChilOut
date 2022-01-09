<?php

if (isset($_POST['dataSelectRegisYear'])) {
    session_start();
    $_SESSION['YearRegisUser'] = $_POST['dataSelectRegisYear'];
}
