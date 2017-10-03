<!DOCTYPE html>
<html>
<head>
	<title>Grading System Example</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">	
	GRADES
	<table class="table table-hover">
		  <thead>
		    <tr>
		      <th>ID</th>
		      <th>First Name</th>
		      <th>Middle Name</th>
		      <th>Last Name</th>
		      <th>Grade</th>
		      <th>Action</th>

		    </tr>
		  </thead>
		  <?php if(isset($students)) : ?>
		  	<?php foreach ($students as $student) : ?>
		  <tbody>
		    <tr>
		      <td><?php echo $student->id; ?></td>
		      <td><?php echo $student->first_name; ?></td>
		      <td><?php echo $student->middle_name; ?></td>
		      <td><?php echo $student->last_name; ?></td>
		      <td><?php echo $student->grade; ?></td>
		      <td>
		      	<input type="button" class="btn btn-info grades" data-id="<?php echo $student->id; ?>" value="View">
		      	<input type="button" class="btn btn-info edit" data-id="<?php echo $student->id; ?>" value="Grades">
		      </td>
		    </tr>
		  </tbody>
		  	<?php endforeach; ?>
		  <?php endif; ?>	
	</table>

	<table class="table table-hover">
		<thead>
	    <tr>
	      <th>Subject</th>
	      <th>1st Quarter</th>
	      <th>2nd Quarter</th>
	      <th>3rd Quarter</th>
	      <th>4th Quarter</th>
	      <th>Average</th>
	    </tr>
	  </thead>
	  <tbody id="subjectsTable"></tbody>
	</table>
	
</div>

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('.grades').on('click', function(){
			var gradesId = $(this).data('id');
			
			$.ajax({
				url: 'http://localhost/gradingsystem/index.php/student/get_student/' + gradesId,
          dataType: 'json',
          type: 'post',
          success: function(data) {
          	//$.each(data, function (i){
          		$('#subjectsTable').html('');
          		$.each(data, function(key, data){
          			//console.log(key + ": " + data);
          				$('#subjectsTable').append(`
			        			<tr>
			        				<td>` + `<input type="text" value="` + data.subjects_name + `" name="subjects">` + `</td>
			        				<td>` + `<input type="text" value="` + data.grades_1st_quarter + `" name="1st_quarter">` + `</td>
			        				<td>` + `<input type="text" value="` + data.grades_2nd_quarter + `" name="2nd_quarter">` + `</td>
			        				<td>` + `<input type="text" value="` + data.grades_3rd_quarter + `" name="3rd_quarter">` + `</td>
			        				<td>` + `<input type="text" value="` + data.grades_4th_quarter + `" name="4th_quarter">` + `</td>
			        				<td>` + `<input type="text" value="` + data.grades_average + `" name="average">` + `</td>
			        				<td>` + `<input type="submit" value="submit"` + `</td> 
			        			</tr>
			        		`);
          	//	});
          	});

          }
			});
		});
	});
</script>