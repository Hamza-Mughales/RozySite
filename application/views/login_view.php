<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="<?=base_url() . 'asset/css/bootstrap.min.css'?>">
	<link rel="stylesheet" href="<?=base_url() . 'asset/css/login.css'?>">
</head>
<body>

<!-- LogIn -->
<div class="login" style="background-image: <?="url('" . base_url('files/imgs/login.jpg') . "')"?>">
    <div class="overlay">
	<?php if (null !== $this->session->flashdata('success_add')): ?>
	<div class="alert alert-success  offset-md-2 col-md-10" role="alert">
		<?php echo $this->session->flashdata('success_add'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</div>
<?php elseif (null !== $this->session->flashdata('error')): ?>
	<div class="alert alert-warning  offset-md-2 col-md-10" role="alert">
		<?php echo $this->session->flashdata('error'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</div>
<?php elseif (null !== $this->session->flashdata('updated')): ?>
	<div class="alert alert-success  offset-md-2 col-md-10" role="alert">
	<?php echo $this->session->flashdata('updated'); ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
</div>
<?php endif;?>
<div class="container">
<div class="row">
            <div class="mt-5 pt-3 col-12">
                <div class="form-content col-md-8 col-lg-6">
                    <div class="logo text-center">
                        <h3>Login</h3>
                    </div>
                    <h4 class="text-center">Amat Portfolio</h4>
					<!-- Login form  -->
                    <form class="" method="POST" action=<?='"' . base_url('login/login') . '"'?>>
                        <div class="form-group">
                            <label class="form-control-label" for="name">Name or Email</label>
                            <input id="email" type="name" class="form-control"
                                name="name" value="<?php if (isset($name)) {echo $name;} else {echo '';}?>">
								<?php if (form_error('name')) {?>
									<div class="alert alert-danger" role="alert">
										<?=form_error('name', '<p class="d-inline">', '</p>')?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</div>
								<?php }?>
                        </div>
						<div class="form-group">
                            <label class="form-control-label" for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password"
								value="<?php if (isset($password)) {echo $password;} else {echo '';}?>">
								<?php if (form_error('password')) {?>
									<div class="alert alert-danger" role="alert">
										<?=form_error('password', '<p class="d-inline">', '</p>')?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</div>
								<?php }?>
                        </div>
                        <div class="btn-form w-100">
                        <button type="submit" class="btn btn-primary btn-log">Log in</button>
                        <a href="{{ route('password.request') }}" style="color:red;" class=" text-right">forget Password?</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</div>

<script src="<?=base_url() . 'asset/js/jquery-3.2.1.min.js'?>"></script>
<script src="<?=base_url() . 'asset/js/bootstrap.min.js'?>"></script>
</body>
</html>

