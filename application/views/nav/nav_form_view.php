<div class="text-center w-100 mb-5">
    <h1 class="py-4"><?php echo $edit == '1' ? 'Edit nav Item' : 'Add nav Item' ?></h1>
</div>
<div class="w-75 m-auto">
    <?php echo form_open_multipart( $edit == 1 ? base_url('nav/edit_nav/' . $nav->nav_id . '') : base_url('nav/add_nav') );?>
        <div class="nav-form">
            <div class="form-group row">
                <label class="col-md-2 text-right " for="name">Name</label>
				<input type="text" class="form-control col-md-8" name="name" 
					value="<?php if(isset($name)){echo $name;} elseif(isset($nav)) {echo $nav->nav_name;} else {echo '';} ?>">
                <?php if (form_error('name')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('name','<p class="d-inline">','</p>') ?>                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span> 
                    </div>
                <?php } ?>
            </div>
            <div class="form-group row">
                <label class="col-md-2 text-right" for="order">Order</label>
				<input type="number" class="form-control col-md-8" name="order" 
				value="<?php if(isset($order)){echo $order;} elseif(isset($nav)) {echo $nav->nav_order;} else {echo '';} ?>">
                <?php if (form_error('order')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('order','<p class="d-inline">','</p>') ?>                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span> 
                    </div>
                <?php } ?>
			</div>

            <button type="submit" class="btn btn-primary offset-md-2"><?php if ($edit == '1') echo 'Save Changes'; else echo 'Add Nav'; ?></button>
        </div>
        <?php echo form_close();?>
    <!-- </form> -->
</div>
