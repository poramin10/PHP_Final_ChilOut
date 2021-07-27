<?php

if (!isset($_COOKIE[$_GET['id']])) {

    $cookie = 1;
    setcookie($_GET['id'], $cookie);


?>
    เข้าชมแล้วครั้งที่ <?php echo 1 ?>
<?php } else {
    $cookie = ++$_COOKIE[$_GET['id']];
    setcookie($_GET['id'], $cookie);
?>
    เข้าชมแล้วครั้งที่ <?php echo $_COOKIE[$_GET['id']] ?>

<?php } ?>