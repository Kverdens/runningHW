<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="../src/style/style.css"> 
</head>
<body>

<?php

session_start();

if(isset($_SESSION["username"]))
{
    $_SESSION = array();
    session_destroy();

    echo "<h1 id='exit_title'>Thanks For Logging In! Bye Now!</h1>";
}

?>

</body>
</html>