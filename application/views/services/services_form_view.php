

<div class="text-center w-100 mb-5">
    <h1 class="py-4"><?php echo $edit == '1' ? 'Edit Service ' : 'Add Service ' ?></h1>
</div>
<div class="w-75 m-auto">
    <?php echo form_open_multipart( $edit == 1 ? base_url('services/edit_service/'. $service->id) : base_url('services/add_service') );?>
        <div class="nav-form">
            <div class="form-group row">
                <label class="col-md-2 text-right " for="title">Title</label>
				<input type="text" class="form-control col-md-8" name="title" 
					value="<?php if(isset($service)) {echo $service->title;} elseif(isset($title)){echo $title;} else {echo '';} ?>">
                <?php if (form_error('title')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('title','<p class="d-inline">','</p>') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span> 
                    </div>
                <?php } ?>
            </div>
            <div class="form-group row">
                <label class="col-md-2 text-right " for="number">Number</label>
				<input type="number" class="form-control col-md-8" name="number" 
					value="<?php if(isset($service)) {echo $service->number;} elseif(isset($number)){echo $number;} else {echo '';} ?>">
                <?php if (form_error('number')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('number','<p class="d-inline">','</p>') ?>                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span> 
                    </div>
                <?php } ?>
            </div>
            <div class="form-group row">
                <label class="col-md-2 text-right " for="order">Order</label>
				<input type="number" class="form-control col-md-8" name="order" 
					value="<?php if(isset($service)) {echo $service->order;} elseif(isset($order)){echo $order;} else {echo '';} ?>">
                <?php if (form_error('order')) { ?>
                    <div class="alert alert-danger  offset-md-2 col-md-8" role="alert">
                        <?= form_error('order','<p class="d-inline">','</p>') ?>                        
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
