<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="../src/style/style.css"> 
</head>
<body>

<?php

session_start();

if(isset($_SESSION["username"]) && isset($_GET["task_id"]))
{
$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "root";
$DBNAME = "to-do-list";

$task_id = $_GET["task_id"];

$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);
if($conn->connect_error) 
{
    die("Connection failed!". $conn->connect_error);
}

echo "<img id=ulogo src='../pictures/moving.gif'/>";

$statement = "SELECT * FROM task WHERE task_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("i", $task_id);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows<=0) 
{
    echo "script>location.href='login.php'</script>";
}
$stmt->close();

$task_id = $_GET["task_id"];
echo "<div id='utitle'>Update Your Message </div>";

if(isset($_GET["field"])) {
    if($_GET["field"] == "incomplete") {
        echo "<b class='error'>Please fill in both fields to update</b>";
        echo "<br>";
        echo "<br>";
    }
}


echo "<form class='uform' action='task_updated.php' method='POST'>";
echo "<input type='hidden' value='$task_id'>";
echo "<label class='ulabel' for='task'>Update Task:</label>";
echo "<input id='task' type='text' name='task'/>";
echo "Update Completion Time:";
echo "<select id='month' name='month'>";
echo "<option value='January'>January </option>";
echo "<option value='February'>February </option>";
echo "<option value='March'>March </option>";
echo "<option value='April'>April </option>";
echo "<option value='May'>May </option>";
echo "<option value='June'>June </option>";
echo "<option value='July'>July </option>";
echo "<option value='August'>August </option>";
echo "<option value='September'>September </option>";
echo "<option value='October'>October </option>";
echo "<option value='November'>November </option>";
echo "<option value='December'>December </option>";
echo "</secelt>";

echo "<select id='day' name='day'>";
echo "</select>";

echo "<select id='year' name='year' onchange='a()'>";
echo "<option value='2019'>2019 </option>";
echo "<option value='2020'>2020 </option>";
echo "<option value='2021'>2021 </option>";
echo "<option value='2022'>2022 </option>";
echo "</select>";



echo "<select id='hour' name='hour'>";

for($i=0; $i<12; $i++)
{
    $j = $i +1;
    if($j<10);
    {
        $j = "0".$j;
    }
echo "<option value='$j'>$j</option>";

}


echo "</select>";

echo "<select id='minute' name='minute'>";

for($i=0; $i<31; $i++)
{
    if($i<10);
    {
        $i = "0".$i;
    }
echo "<option value='$i'>$i</option>";
}


echo "</select>";

echo "<select id='am' name='am'>";
    echo "<option value='am'>am</option>";
echo "<option value='pm'>pm</option>";


echo "</select>";

echo "<input type='submit' class='submit' value='Update Task'>";



echo "</form>";

echo "<a href='logout.php'><button id='exit'>Logout </button></a>";
}
else {
    echo "<script>location.href='display_task.php'</script>";
}



?>

</body>
</html>