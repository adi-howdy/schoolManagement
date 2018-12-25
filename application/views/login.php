<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>

<link rel="stylesheet" type="text/css" href=" <?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href=" <?php echo base_url('custom/css/custom.css') ?>">

<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>



</head>
<body>

<div class="col-md-6 col-md-offset-3 vertical-off-4">
	<div class="panel panel-default login-form">
	  	<div class="panel-body">
              <form action=" <?php echo base_url('Users/login') ?>" method="post" id="loginform">
              <fieldset>
              <legend> Login </legend>
              <div id="message"></div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" placeholder="Name" name = "name" id="name" class="form-control" autofocus></input>

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" id="password" name="password" placeholder="Password" autofocus></input>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </fieldset>  
            </form>
	  	</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('custom/js/login.js') ?>"></script>
  
</body>
</html>