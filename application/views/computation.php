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
	<a class="btn btn-info" href="<?php echo base_url(); ?>student/index">Back</a>
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
		      	<input type="button" class="btn btn-info grades" data-id="<?php echo $student->id; ?>" value="GRADES">
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
	  <tbody id="subjectsTable">
	  	<tr>
	  		<td><input type="text" name=""></td>
	  		<td><input type="text" name="" id="1st"></td>
	  		<td><input type="text" name="" id="2nd"></td>
	  		<td><input type="text" name="" id="3rd"></td>
	  		<td><input type="text" name="" id="4th"></td>
	  		<td><input type="text" name="" class="average"></td>
	  	</tr>
	  </tbody>
	</table>
	
</div>

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#4th').on('blur', function(){
			var compute = $(this).val();
			var one = $('#1st').val();
			var two = $('#2nd').val();
			var three = $('#3rd').val();

			total = (parseInt(compute) + parseInt(one) + parseInt(two) + parseInt(three)) / 4;

			$('.average').val(total); 




		});
	});
</script>