

<div class="text-center w-100 mb-5">
    <h1 class="py-4"><?php echo $edit == '1' ? 'Edit about ' : 'Add about ' ?></h1>
</div>
<div class="w-75 m-auto">
    <?php echo form_open_multipart( $edit == 1 ? base_url('about/edit_about') : base_url('about/add_about') );?>
        <div class="nav-form">
            <div class="form-group row">
                <label class="col-md-2 text-right " for="name">Name</label>
				<input type="text" class="form-control col-md-8" name="name" 
					value="<?php if(isset($about)) {echo $about->name;} elseif(isset($name)){echo $name;} else {echo '';} ?>">
                <?php if (form_error('name')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('name','<p class="d-inline">','</p>') ?>                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span> 
                    </div>
                <?php } ?>
            </div>
            <div class="form-group row">
                <label class="col-md-2 text-right" for="colored_head">Colored Head</label>
				<input type="text" class="form-control col-md-8" name="colored_head" 
				value="<?php if(isset($about)) {echo $about->colored_head;} elseif(isset($colored_head)){echo $colored_head;} else {echo '';} ?>">
                <?php if (form_error('colored_head')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('colored_head','<p class="d-inline">','</p>') ?>                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span> 
                    </div>
                <?php } ?>
			</div>
            <div class="form-group row">
                <label class="col-md-2 text-right " for="headline">Headline</label>
				<input type="text" class="form-control col-md-8" name="headline" 
					value="<?php if(isset($about)) {echo $about->headline;} elseif(isset($headline)){echo $headline;} else {echo '';} ?>">
                <?php if (form_error('headline')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('headline','<p class="d-inline">','</p>') ?>                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span> 
                    </div>
                <?php } ?>
            </div>
            <div class="form-group row">
				<label class="col-md-2 text-right " for="text">Text</label>
				<textarea name="text" id="text" class="form-control col-md-8" rows="7" >
				<?php if(isset($about)) {echo $about->text;} elseif(isset($text)){echo $text;} else {echo '';} ?>
				</textarea>
                <?php if (form_error('text')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('text','<p class="d-inline">','</p>') ?>                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span> 
                    </div>
                <?php } ?>
            </div>
            <div class="form-group row">
                        <p class="col-12 offset-md-2">width-height: 3000*3000 and max-size:3MB</p>
                <label class="col-md-2 text-right " for="img">Img</label>
				<input type="file" class="form-control col-md-8" name="img" 
					value="<?php if(isset($about)){ echo  $about->img;} elseif(isset($img)){echo $img;} ?>"> 
					<?php if (form_error('img') || isset($img_err)) :?>
				<div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
						<?=form_error('img', '<p class="d-inline">', '</p>')?>
						<?= isset($img_err)? $img_err: ""; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </div>
                <?php endif;?>
            </div>
            <div class="form-group row">
                <label class="col-md-2 text-right " for="phone">Phone</label>
				<input type="text" class="form-control col-md-8" name="phone" 
					value="<?php if(isset($about)) {echo $about->phone;} elseif(isset($phone)){echo $phone;} else {echo '';} ?>">
                <?php if (form_error('phone')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('phone','<p class="d-inline">','</p>') ?>                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span> 
                    </div>
                <?php } ?>
            </div>
            <div class="form-group row">
                <label class="col-md-2 text-right " for="email">Email</label>
				<input type="email" class="form-control col-md-8" name="email" 
					value="<?php if(isset($about)) {echo $about->email;} elseif(isset($email)){echo $email;} else {echo '';} ?>">
                <?php if (form_error('email')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('email','<p class="d-inline">','</p>') ?>                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span> 
                    </div>
                <?php } ?>
            </div>
            <div class="form-group row">
                <label class="col-md-2 text-right " for="location">location</label>
				<input type="location" class="form-control col-md-8" name="location" 
					value="<?php if(isset($about)) {echo $about->location;} elseif(isset($location)){echo $location;} else {echo '';} ?>">
                <?php if (form_error('location')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('location','<p class="d-inline">','</p>') ?>                        
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
