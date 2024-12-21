<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student";
$port = "3311";

$conn = new mysqli($servername, $username, $password, $database, $port);

if($conn -> connect_error)
	{
		die("Connection Failed".conn -> connect_error);
	}
$student = [];
$query = "select * from students";

$result = $conn->query($query);

if($result->num_rows > 0){
	while($row=$result->fetch_assoc()){
		$student[] = $row;
	}
}

function sel_sort(&$arr, $key){
	$n = count($arr);
	for($i = 0; $i<$n-1; $i++){
		$minindex = $i;
		for($j = $i+1; $j<$n; $j++){
			if($arr[$j][$key] < $arr[$minindex][$key]){
				$minindex = $j;
			}	
		}
		$temp = $arr[$i];
		$arr[$i] = $arr[$minindex];
		$arr[$minindex] = $temp;
	}
}

sel_sort($student, 'name');
?>


<!DOCTYPE html>
<html>
<head>
	<title>SeclSort</title>
<style>
body{
text-align : center;
background-color: #f3f3f3;
}

h2{
test-align : center; 	
}

table{
width : 100%;
text-align : center:
align-item :center;
padding : 20px;
}

td{
padding : 5px 30px;
border-collapse : collapse;
}

thead{
background-color : lightblue;
font-size : 1.2em;
border-radius : 5px;
}
tr td{

background-color : #fff;
}


</style>
</head>
<body>
	<h2>Selection sort for students</h2>
	<table>
		<thead>
			<tr> 
				<th>ID</th>
				<th>Name</th>
				<th>Usn</th>
				<th>Branch</th>
				<th>Email</th>
				<th>Address</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($student as $students): ?>
			<tr>
				<td data-label = "ID"><?php echo htmlspecialchars($students['id']) ?></td>
				<td data-label = "Name"><?php echo htmlspecialchars($students['name']) ?></td>
				<td data-label = "Usn"><?php echo htmlspecialchars($students['usn']) ?></td>
				<td data-label = "Branch"><?php echo htmlspecialchars($students['branch']) ?></td>
				<td data-label = "Email"><?php echo htmlspecialchars($students['email']) ?></td>
				<td data-label = "Address"><?php echo htmlspecialchars($students['address']) ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>