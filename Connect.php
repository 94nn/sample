<?php
    $HosName="sql112.infinityfree.com";

    $User_mysql="if0_40257186";

    $password_mysql="ctrlALTachieve";

    $Database_mysql="if0_40257186_webctrlaltachieve";

    $connect = mysqli_connect($HosName, $User_mysql, $password_mysql, $Database_mysql);

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($connect, 'utf8mb4');
?>
