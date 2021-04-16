<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Courses</title>
	<link rel="stylesheet" href="user_guide/css/style.css">
</head>
<body>
<div class='container'>
<?php 	if($this->session->flashdata('error')) {
			echo $this->session->flashdata('error');
		} else if($this->session->flashdata('deleted')){
			echo $this->session->flashdata('deleted');
		} else {
			echo $this->session->flashdata('success');
		}
?>
	<h1>Add New Course:</h1>
	<form action="courses/add" method='POST'>
		<label for="name">Name: </label>
		<input type="text" name='title' id='name'>

		<label for="description">Description: </label>
		<textarea name="description" id="description" cols="30" rows="10"></textarea>

		<input type="submit" value='Add'>
	</form>
	<h1>Courses:</h1>
	<table>
		<thead>
			<tr>
				<th>Course Name</th>
				<th>Description</th>
				<th>Date Added</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
<?php 		foreach($get_each_course as $course) { 
				$created_at = date_create($course['created_at']);
?>
			<tr>
				<td><?= $course['title'] ?></td>
				<td><?= $course['description'] ?></td>
				<td><?= date_format($created_at,"M jS Y h:iA") ?></td>
				<td><a href='/courses/delete_confirmation/<?= $course['id'] ?>'>Remove</a></td>
			</tr>
<?php } ?>
		</tbody>
	</table>
</div>
</body>
</html>