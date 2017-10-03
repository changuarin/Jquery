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
	<a class="btn btn-info" href="<?php echo base_url(); ?>student/add">ADD</a>
	<a class="btn btn-info" href="<?php echo base_url(); ?>student/computation">Computation</a>
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
		      	<a class="btn btn-info" href="<?php echo base_url(); ?>student/grades">Grades</a>
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
			        				<td>` + data.subjects_name + `</td>
			        				<td>` + data.grades_1st_quarter + `</td>
			        				<td>` + data.grades_2nd_quarter + `</td>
			        				<td>` + data.grades_3rd_quarter + `</td>
			        				<td>` + data.grades_4th_quarter + `</td>
			        				<td>` + data.grades_average + `</td>
			        			</tr>
			        		`);
          	//	});
          	});

          }
			});
		});

		$('.edit').on('click', function(){
			$('#subjectsTable').html('');
			$('#subjectsTable').append(`
  			<tr>
  				<td>` + `<input type="text"> ` + `</td>
  				<td>` + `<input type="text"> ` + `</td>
  				<td>` + `<input type="text"> ` + `</td>
  				<td>` + `<input type="text"> ` + `</td>
  				<td>` + `<input type="text"> ` + `</td>
  				<td>` + `<input type="text"> ` + `</td>
  			</tr>
  		`);
		});
	});
</script>