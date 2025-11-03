<!---Goals.php--->
<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);

    //include Connect.php to connect to database
    include("Connect.php");

    $userId = 'U01';
    $sql = "SELECT * FROM user WHERE User_Id = '$userId'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result) ?: [];
?>

<html>
    <head>
        <title>hello world</title>
    </head>
    <body>
        <h1>Hello World</h1>
        <?php echo 'Name: ' . htmlspecialchars($row['Name']);?>
    </body>
</html>