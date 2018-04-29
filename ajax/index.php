<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
test
    <?php
    include("response.php");
    $newObj = new Employee();
    $emps = $newObj->getEmployees();
    ?>

    <table id="employee_grid" class="table" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Name</th>
			<th>Salary</th>
			<th>Age</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($emps as $key => $emp) :?>
		<tr>
			<td><?php echo $emp['employee_name'] ?></td>
			<td><?php echo $emp['employee_salary'] ?></td>
			<td><?php echo $emp['employee_age'] ?></td>
		</tr>
	<?php endforeach;?>
	</tbody>
    </table>
</body>
</html>