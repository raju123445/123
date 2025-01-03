<?php 
$conn = new mysqli("localhost", "root", "", "student", "3311");

if($conn -> connect_error){
die($conn -> connect_error);
}

$result = $conn -> query("Select * from students");

$student = [];
if($result -> num_rows > 0){
	while($row = $result->fetch_assoc()){
		$student[] = $row;
	}
}

function selectionsort(&$arr, $key){
	$n = count($arr);
	for($i = 0 ; $i < $n-1; $i++ ){
		$minindex = $i;
		for($j = $i + 1 ; $j < $n; $j++){
			if($arr[$minindex][$key] > $arr[$j][$key]){
				$minindex = $j;
			}
		}
		$temp = $arr[$minindex];
		$arr[$minindex] = $arr[$i];
		$arr[$i] = $temp;
	}
}

selectionsort($student, "name");
?>

<!doctype>
<html>
	<head> 
		<title>sorting</title>
	</head>
	<body>
		<table> 
			<thead> 
				<tr> 
					<th>ID</th>
					<th>Name</th>
					<th>usn</th>
					<th>Branch</th>
					<th>Email</th>
					<th>Adrdess</th>
				</tr>
			</thead>
			<tbody> 
				<?php foreach($student as $std):?>
				<tr> 
					<td><?php echo($std["id"])?></td>
					<td><?php echo($std["name"])?></td>
					<td><?php echo($std["usn"])?></td>
					<td><?php echo($std["branch"])?></td>
					<td><?php echo($std["email"])?></td>
					<td><?php echo($std["address"])?></td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</body>
</html>