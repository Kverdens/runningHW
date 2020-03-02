<html>
    <head><title></title>
    <link rel="stylesheet" type="text/css" href="../src/style/style.css"> 
</head>
    <body> 

<?php

if(!empty($_POST["username"]) || !empty($_POST["password"]));    //divu || vietā biju ielicis &&
{
$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "root";
$DBNAME = "to-do-list";

$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if($conn->connect_error) 
{

die("Connection failed!". $conn->connect_error);


$username = $_POST["username"];
$statement = "SELECT * FROM user WHERE username=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows>=1)
{
    $row = $result->fetch_assoc();
    $hash = $row["password"];

    if(password_verify($_POST["password"], $hash))
{
        session_start();

        $_SESSION["username"] = $_post["username"];
        $_SESSION["user_id"] = $row["user_id"];
        $conn->close();
        header("Location:display_task.php");
           
    }

else {
    $password = "wrong";
    header("Location:login.php?password=$password");
}
}

else {
    $user = "wrong";
    header("Location: login.php?user=$user");
}
}

else {
    $user = "none";
    header("Location:login.php?user=$user");
 }
}  

{
header("Location: login.php"); 
}   

?>
 </body>

</html>