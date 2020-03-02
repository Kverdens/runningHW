<html>
<head><title></title>

    <link rel="stylesheet" type="text/css" href="style.css">
	<?php
		session_start();
	?>

	<script>
 function date()
	 {


	 var month = document.getElementById("month");
	 var day = document.getElementById("day");
	 var year = document.getElementById("year");
	 if(day.selectedIndex == -1)
	 {
	 
	 if(month.selectedIndex == "3" || month.selectedIndex == "5" || month.selectedIndex == "8" || month.selectedIndex == "10")
	 {
	 	while(day.firstChild)

	 		{
	 			day.removeChild(day.firstChild);	
			
	 		}
	 
	 		for(i=0; i<30; i++)		
	 		{
	 			j=i+1;
	 			var option = document.createElement("option");
	 			option.setAttribute("value", j);
	 			option.innerHTML = j;			
	 			day.appendChild(option);	
			
	 		}
		
	 	}
	 	if(month.selectedIndex == "0" || month.selectedIndex == "2" || month.selectedIndex == "4" || month.selectedIndex == "6" || month.selectedIndex == "7" || month.selectedIndex == "9" || month.selectedIndex == "11")
	 	{
	 		while(day.firstChild)

	 			{
	 				day.removeChild(day.firstChild);	
			
	 			}
	 
	 			for(i=0; i<31; i++)		
	 			{
	 				j=i+1;
	 				var option = document.createElement("option");
	 				option.setAttribute("value", j);
	 				option.innerHTML = j;			
	 				day.appendChild(option);	
			
	 			}
		
	 		}
		
	 		if(month.selectedIndex == "1")
	 		{
	 			while(day.firstChild)

	 				{
	 					day.removeChild(day.firstChild);	
			
	 				}
	 
	 				for(i=0; i<28; i++)		
	 				{
	 					j=i+1;
	 					var option = document.createElement("option");
	 					option.setAttribute("value", j);
	 					option.innerHTML = j;			
	 					day.appendChild(option);	
			
	 				}
		
	 			}
				if(month.selectedIndex == "1" && year.selectedIndex == "1")
	 			{
	 				while(day.firstChild)

	 					{
	 						day.removeChild(day.firstChild);	
			
	 					}
	 
	 					for(i=0; i<29; i++)		
	 					{
	 						j=i+1;
	 						var option = document.createElement("option");
	 						option.setAttribute("value", j);
	 						option.innerHTML = j;			
	 						day.appendChild(option);	
			
	 					}
					
	 				}
	
	 			}	
	 			else
	 				{
					
				 
					
	 var d =					day.selectedIndex;
	 					if(month.selectedIndex == "3" || month.selectedIndex == "5" || month.selectedIndex == "8" || month.selectedIndex == "10")
	 					{
	 						while(day.firstChild)

	 							{
	 								day.removeChild(day.firstChild);	
			
	 							}
	 
	 							for(i=0; i<30; i++)		
	 							{
	 								j=i+1;
	 								var option = document.createElement("option");
	 								option.setAttribute("value", j);
	 								option.innerHTML = j;			
	 								day.appendChild(option);	
			
	 							}
	 							day.selectedIndex = d;
							
	 						}
	 						else		if(month.selectedIndex == "0" || month.selectedIndex == "2" || month.selectedIndex == "4" || month.selectedIndex == "6" || month.selectedIndex == "7" || month.selectedIndex == "9" || month.selectedIndex == "11")
	 						{
	 							while(day.firstChild)

	 								{
	 									day.removeChild(day.firstChild);	
			
	 								}
	 
	 								for(i=0; i<31; i++)		
	 								{
	 									j=i+1;
	 									var option = document.createElement("option");
	 									option.setAttribute("value", j);
	 									option.innerHTML = j;			
	 									day.appendChild(option);	
			
	 								}
	 		day.selectedIndex = d;
	 							}
		
	 							else			if(month.selectedIndex == "1" && year.selectedIndex != "1")
	 							{
	 								while(day.firstChild)

	 									{
	 										day.removeChild(day.firstChild);	
			
	 									}
	 
	 									for(i=0; i<28; i++)		
	 									{
	 										j=i+1;
	 										var option = document.createElement("option");
	 										option.setAttribute("value", j);
	 										option.innerHTML = j;			
	 										day.appendChild(option);	
			
	 									}
	 		day.selectedIndex = d;
	 								}
	 								else 				if(month.selectedIndex == "1" && year.selectedIndex == "1")
	 								{
	 									while(day.firstChild)

	 										{
	 											day.removeChild(day.firstChild);	
			
	 										}
	 
	 										for(i=0; i<29; i++)		
	 										{
	 											j=i+1;
	 											var option = document.createElement("option");
	 											option.setAttribute("value", j);
	 											option.innerHTML = j;			
	 											day.appendChild(option);	
			
	 										}
					
	 									}
					
	 					day.selectedIndex = d;
	 				}	
	 }	
	
	 </script>
 
</head>
<body>
<?php
if(isset($_SESSION["username"]))
{

$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "root";
$DBNAME = "to-do-list";
$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);	

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "<img src='todo_list_logo.png' id='logo'>";



if(isset($_GET["field"]))
{
if($_GET["field"] =="incomplete")
{
echo "<b>Please fill in all fields</b>";
echo "<br>";
echo "<br>";
}
}/*displays text if entered incomplete post */



$statement = "SELECT * FROM task WHERE user_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $_SESSION["user_id"]);
$stmt->execute();
$result = $stmt->get_result();

 
echo "<div>";
echo "<span class='task_cell'>";
echo "<b>Task</b>";
echo "</span>";
echo "<span class='task_cell'>";
echo "<b>Completion Date</b>";
echo "</span>";
echo "<span class='task_cell'>";
echo "<b>Completion Time</b>";
echo "</span>";
echo "</div>";

/*selects the data from the To Do List table */
while($row = $result->fetch_assoc())
{
 
  
	echo "<div>";
	echo "<span class='task_cell'>";
		echo $row["task"]; 
	echo "</span>";
 
	echo "<span class='task_cell'>";
	echo $row["date"];	
	echo "</span>";
 
	echo "<span class='task_cell'>";
	echo $row["time"];	
	echo "</span>";
 
	
$delete_task = "task_deleted.php?task_id=";
$task_id = $row["task_id"];
$delete_task.=$task_id;
echo "<span class='options'>";
echo "<a class='delete_task'   href='$delete_task'>Delete Task</a>";
		echo "&nbsp &nbsp &nbsp";

$update_task = "update_task.php?task_id=";
$task_id = $row["task_id"];
$update_task .=$task_id;

echo "<a class='update_task' href='$update_task'>Update Task</a>";
echo "</span>";
 
echo "</div>";

}


$conn->close();	
/*displays the results you queried */
 


	echo "<form class='dform' action='task_added.php' method='POST'>";	
	echo "<h4 id='dtitle'>Add A Task </h4>";
	echo "<label for='task'>Add Task: </label>";
	echo "<input type='text' id='task' name='task'/>";
	echo " Complete By:";
	echo "<select id='month' name='month' onchange='date()'>";
	echo "<option value='January'>January </option>"; 
	echo "<option value='February'>February </option>"; 
	echo "<option value='March'>March </option>"; 
	echo "<option value='April'>April </option>"; 
	echo "<option value='May'>May </option>"; 
	echo "<option value='June'>June </option>"; 
	echo "<option value='July'>July</option>"; 
	echo "<option value='August'>August </option>"; 
	echo "<option value='September'>September </option>"; 
	echo "<option value='October'>October </option>"; 
	echo "<option value='November'>November </option>"; 
	echo "<option value='December'>December </option>"; 
	echo "</select>";

	echo "<select id='day' name='day'>"; 
	echo "</select>";

	echo "<select id='year' name='year' onchange='date()'>";
	echo "<option value='2019'>2019 </option>"; 
	echo "<option value='2020'>2020 </option>"; 
	echo "<option value='2021'>2021 </option>"; 
	echo "<option value='2022'>2022 </option>"; 
	echo "</select>";
 
	echo "<select id='hour' name='hour'>";
	for($i=0; $i<12;$i++)
	{
		$j = $i+1;
		 
		if($j<10)
		{
		$j = "0".$j;	
		}
	 
		echo "<option value='$j'>$j</option>";
		
	}
	echo "</select>";
	
	echo "<select id='minute' name='minute'>";
	for($i=0; $i<60;$i++)
	{
		if($i<10)
				{
				$i ="0".$i;		
				}
		echo "<option value='$i'>$i</option>";
		
	}
	echo "</select>";
	
	echo "<select id='am' name='am'>";
		echo "<option value='am'>am</option>";
			echo "<option value='pm'>pm</option>";
	
	echo "</select>";
	
 
	echo "<input type='submit' class='submit' value='Add Task'>";
 
	echo "</form>";
	
	echo "<a href='logout.php'><button id='exit'>Logout </button></a>";	
  
}
else
{
echo"<script>location.href='login.php'</script>";	
}

?>	
	
	
	
</body>
</html>