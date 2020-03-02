<html>
    <head><title></title>
    <link rel="stylesheet" type="text/css" href="../src/style/style.css"> 
</head>
    <body>    
    
<?php

session_start();

if(!empty($_POST["username"]) && !empty($_POST["password"]));
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

$username = $_POST["username"];
$password = $_POST["password"];
$hashed = password_hash($password, PASSWORD_DEFAULT);

$statement = "SELECT * FROM user WHERE username=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();



if($result->num_rows>=1)
{
    $row = $result->fetch_assoc();
    $hash = $row["password"];
    $value = "duplicate";
    header("Location:signup.php?user=$value");
if(password_verify($_POST["password"], $hash))
{
        session_start();
        $_SESSION["username"] = $_post["username"];
        $_SESSION["user_id"] = $row["user_id"];
        $conn->close();
        header("Location: display_task.php");
}

else {
$password ="wrong";
header("Location:login.php?password=$password");
}
}

else {

$user ="none";
header("Location: login.php?user=$user");
}

}

    $statement = "INSERT INTO user(username, password) VALUES(?,?)";
    $stmt = $conn->prepare($statement);
    $stmt->bind_param("ss", $username, $hashed);
    $stmt->execute();


$value = "successfull";
header("Location:login.php?user=$value");


if(isset($_GET["user"]))
{
if($_GET["user"] == "successful")
{
        echo "<h4>Successfully Added User!</h4>";
    }
    else if($_GET["user"] == "duplicate")
    {
        echo "<h4> User Already Exists </h4>";
        echo "<h4> Please Enter Another Username And Password";
    }
}

else{
    echo "<h4> Sign up </h4>";
}

$conn->close();

?>
 </body>

</html>
