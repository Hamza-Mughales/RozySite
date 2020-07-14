

<div class="text-center w-100 mb-5">
    <h1 class="py-4"><?php echo $edit == '1' ? 'Edit User ' : 'Add User ' ?></h1>
</div>
<div class="w-75 m-auto">
    <?php echo form_open_multipart( $edit == 1 ? base_url('users/user_update/'.$user->id) : base_url('users/register') );?>
        <div class="nav-form">
            <div class="form-group row">
                <label class="col-md-2 text-right " for="name">Name</label>
				<input type="text" class="form-control col-md-8" name="name" 
					value="<?php if(isset($user)) {echo $user->name;} elseif(isset($name)){echo $name;} else {echo '';} ?>">
                <?php if (form_error('name')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('name','<p class="d-inline">','</p>') ?>                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span> 
                    </div>
                <?php } ?>
            </div>
            <div class="form-group row">
                <label class="col-md-2 text-right " for="password">Password</label>
				<input type="password" class="form-control col-md-8" name="password" 
					value="<?php if(isset($user)) {echo $user->password;} elseif(isset($password)){echo $password;} else {echo '';} ?>">
                <?php if (form_error('password')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('password','<p class="d-inline">','</p>') ?>                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span> 
                    </div>
                <?php } ?>
            </div>
            <div class="form-group row">
                <label class="col-md-2 text-right " for="email">Email</label>
				<input type="email" class="form-control col-md-8" name="email" 
					value="<?php if(isset($user)) {echo $user->email;} elseif(isset($email)){echo $email;} else {echo '';} ?>">
                <?php if (form_error('email')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('email','<p class="d-inline">','</p>') ?>                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span> 
                    </div>
                <?php } ?>
            </div>

            <button type="submit" class="btn btn-primary offset-md-2"><?php if ($edit == '1') echo 'Save Changes'; else echo 'Add New'; ?></button>
        </div>
        <?php echo form_close();?>
    <!-- </form> -->
</div>
