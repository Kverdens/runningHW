<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="../src/style/style.css"> 
</head>
<body>
<?php


echo "<img id=logo src='../pictures/moving.gif'/>";
echo "<br>";
echo "<form class='form' action='check_login.php' method='POST'>";

echo "<h4>LOGIN<h4>";
echo "<label class='label' for='username'>Username: </label>";
echo "<input class='text' type='text' name='username' placeholder='Username'>";

echo "<label class='label' for='password'> Password: </label>";
echo "<input class='text' type='password' name='password' placeholder='Password'>";
echo "<input class='submit' type='submit' value='Sign Up'/>";


echo"</form>";

?>

</body>


</html>