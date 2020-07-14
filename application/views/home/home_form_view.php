
<?php if (null !== $this->session->flashdata('success_add')): ?>
	<div class="alert alert-success  offset-md-2 col-md-10" role="alert">
		<?php echo $this->session->flashdata('success_add'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</div>
<?php elseif (null !== $this->session->flashdata('error_add')): ?>
	<div class="alert alert-warning  offset-md-2 col-md-10" role="alert">
		<?php echo $this->session->flashdata('error_add'); ?>
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

<!-- <?php  //var_dump($home);exit;?> -->
<div class="text-center w-100 mb-5">
    <h1 class="py-4"><?php echo $edit == '1' ? 'Edit home ' : 'Add home ' ?></h1>
</div>
<div class="w-75 m-auto">
    <?php echo form_open_multipart( $edit == 1 ? base_url('home/edit_home') : base_url('home/add_home') );?>
        <div class="nav-form">
            <div class="form-group row">
                <label class="col-md-2 text-right " for="img">Img</label>
				<input type="file" class="form-control col-md-8" name="img" 
					value="<?php if(isset($home)){ echo  $home->img;} elseif(isset($img)){echo $img;} ?>"> 
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
                <label class="col-md-2 text-right " for="name">Text</label>
				<input type="text" class="form-control col-md-8" name="text" 
					value="<?php if(isset($text)){echo $text;} elseif(isset($home)) {echo $home->text;} else {echo '';} ?>">
                <?php if (form_error('text')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('text','<p class="d-inline">','</p>') ?>                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span> 
                    </div>
                <?php } ?>
            </div>
            <div class="form-group row">
                <label class="col-md-2 text-right" for="colored_word">Colored Word</label>
				<input type="text" class="form-control col-md-8" name="colored_word" 
					value="<?php if(isset($colored_word)){echo $colored_word;} elseif(isset($home)) {echo $home->colored_word;} else {echo '';} ?>">
                <?php if (form_error('colored_word')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('colored_word','<p class="d-inline">','</p>') ?>                        
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
