<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="../src/style/style.css"> 
</head>
<body>

<?php

session_start();

if(isset($_POST["task"]) && $_POST["task"] !="" && isset($_SESSION["username"]) && isset($_POST["month"]) && isset($_POST["day"]) && isset($_POST["year"]))
{
$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "root";
$DBNAME = "to-do-list";

$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);
if($conn->connect_error) 
{
die("Connection failed!". $conn->connect_error);
}

$username = $_SESSION["username"];
$user_id = $_SESSION["user_id"];
$task = $_POST["task"];
$date = $_POST["day"]."&nbsp".$_POST["month"]."&nbsp". $_POST["year"];
$time = $_POST["hour"].":".$_POST["minute"]."&nbsp". $_POST["am"];

$statement = "INSERT INTO task (user_id, task, date, time) VALUES(?, ?, ?, ?)";
$stmt = $conn->prepare($statement);
$stmt->bind_param("ssss", $user_id, $task, $date, $time);
$stmt->execute();
$stmt->close();
$conn->close();

header("Location:display_task.php");
}

    else if($_POST["task"] == "")
    {
        $field = "incomplete";
        header("Location:display_task.php?field=$field");
    } else if($_POST["day"] == "")
    {
        $field = "incomplete";
        header("Location:display_task.php?field=$field");
    } else {
        header("Location:display_task.php");
    }

?>
</body>
</html>