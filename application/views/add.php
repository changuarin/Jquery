<!DOCTYPE html>
<html>
<head>
	<title>Add student</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style type="text/css">
		form
		{
			margin-left: 300px;
			margin-top: 100px;
		}
		h2
		{
			margin-left: 220px;
			padding: 20px;
		}
	</style>
</head>
<body>
<div class="container">	
	<?php echo form_open('student/add'); ?>
		<h2>Add</h2>
		<div class="form-group row">
      <label class="col-sm-2 col-form-label">First Name</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="first_name" >
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Middle Name</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="middle_name" >
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Last Name</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="last_name" >
      </div>
    </div>

   	<div class="form-group">
      <label class="control-label col-md-2">Grade</label>
        <select class="form-control-10"  name="grade">
          <option value="0">-SELECT-</option>
          <option value="11">11</option>
          <option value="12">12</option>
        </select>
 		</div>

 		<div class="form-group">
 			<input class="btn btn-info" type="submit" value="Submit">
 		</div>
		
	<?php echo form_close(); ?>	
</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		
	});
	

</script>