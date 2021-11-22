<?php
    require_once('../authen_frontend.php');
    
    $sql = "SELECT * FROM `place`";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        echo $row['id_place'].'<br>';
    }

?>