<html>
    <head><Signup>
    <link rel="stylesheet" type="text/css" href="../src/style/style.css"> 

    </head>
    <body>


<?php

session_start();

echo "<img id=logo src='../pictures/moving.gif'/>";
echo "<br>";
echo "<form class='form' action='check_signup.php' method='POST'>";

echo "<h4>Sign up<h4>";
echo "<label class='label' for='Username'> Username:</label>";
echo "<input class='text' type='text' name='username' placeholder='Username'>";

echo "<label class='label' for='Password'> Password:</label>";
echo "<input class='text' type='password' name='password' placeholder='Password'>";
echo "<input class='submit' type='submit' value='Sign Up'/>";


echo"</form>";


?>
<body>
    </html>