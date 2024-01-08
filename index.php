<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Education</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
	  <?php if (!empty($_POST)) :?>
		<div style="color: green; background-color: black">
			   Ви намагаєтесь залогінитись з Email:  <?php echo $_POST['email']; ?>
		</div>
		<?php endif; ?>
		<br>
		<br>

		<form method="post">
			<div class="mb-3">
    			<label for="exampleInputEmail1" class="form-label">Email address</label>
    			<input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
   	 		</div>
   	 		<div class="mb-3">
    			<label for="exampleInputPassword1" class="form-label">Password</label>
    			<input type="password" class="form-control" id="exampleInputPassword1">
  			</div>
   	 		<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>