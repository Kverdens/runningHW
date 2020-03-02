<html>
<head><title></title>

    <link rel="stylesheet" type="text/css" href="style.css">
 
</head>
<body>
<?php

echo "<img src='../pictures/moving.gif' id='logo'>";
echo "<br>";


echo "<form action='check_login.php' class='form' method='POST'>";


if(isset($_GET["user"]))
{
if($_GET["user"]=="none")
{
echo "<b>No such user</b>";	
echo "<br>";
echo "<br>";
}
}

if(isset($_GET["password"]))
{
if($_GET["password"]=="wrong")
{
echo "<b>Wrong password </b>";	
echo "<br>";
echo "<br>";
}
}


if(isset($_GET["user"]))
{
if($_GET["user"]=="successful")
{
echo "<b>Successfully added user</b>";	
echo "<br>";
echo "<br>";
}
}

echo "<h4> Please login</h4>";
echo "<label for='username' class='label'> Username:</label>";
echo "<input class='text' type='text' name='username' placeholder='Username'>";
echo "<br>";
echo "<label for='password' class='label'>Password:</label>";
echo "<input  class='text' type='password' name='password' placeholder='Password'>";
echo "<br>";
echo "<input class='submit' type='submit' value='Sign In'/>";	
echo "</form>";
?>
</body>
</html>


