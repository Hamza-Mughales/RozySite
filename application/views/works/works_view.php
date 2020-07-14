


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
<?php elseif (null !== $this->session->flashdata('deleted')): ?>
	<div class="alert alert-danger  offset-md-2 col-md-10" role="alert">
	<?php echo $this->session->flashdata('deleted'); ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</div>
<?php elseif (null !== $this->session->flashdata('logeding')): ?>
	<div class="alert alert-success  offset-md-2 col-md-10" role="alert">
	<?php echo $this->session->flashdata('logeding'); ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</div>
<?php elseif (null !== $this->session->flashdata('registerd')): ?>
	<div class="alert alert-success  offset-md-2 col-md-10" role="alert">
	<?php echo $this->session->flashdata('registerd'); ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</div>
<?php endif;?>

<h2 class="text-center py-3">Works </h2>
<a href='<?php echo base_url('works/add_work') ?>' class="btn btn-primary mb-2">Add new</a>

<table id="datatable_tbl" class="table table-dark text-center display"  >
	<thead>
		<tr>
			<th scope="col">view</th>
			<th scope="col">Image</th>
			<th scope="col">Title</th>
			<th scope="col">Description</th>
			<th scope="col">Order</th>
			<th scope="col">Action</th>
			
		</tr>
	</thead>
	<tbody>
		<?php foreach ($works as $work): ?>
		<tr>
			<td>
				<input class="form-check-input" type="checkbox" value="<?=$work->view;?>" 
				id="view" data-workID = '<?=$work->id;?>' name='viewOnSite'
				<?= ($work->view == 1) ? "checked" : "" ?> >
			</td>
			<td> <img src="<?= base_url('files/imgs/works images/' . $work->img )?>" alt=""> </td>
			<td><?=$work->title;?></td>
			<td><?=$work->description;?></td>
			<td><?=$work->order;?></td>
			<td>
				<a href="<?php echo base_url() . 'works/edit_work/' . $work->id ?>" class="btn btn-success">Edit</a>
				<a href="<?php echo base_url() . 'works/delete_work/' . $work->id ?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>


<script src="<?=base_url('asset/js/jquery-3.2.1.min.js')?>"></script>

<script>
//******** View work on website	 **************
$(document).ready(function(){
	$("input:checkbox").on('change',function() { 
		
		$workID = $(this).attr('data-workID');
		//console.log($workID);

            if($(this).is(":checked")) { 
                $.ajax({
                    url: '<?= base_url('Works/view_onsite')?>',
                    type: 'POST',
                    data: { workID: $workID, view : 1 }
                });
            } else {
                $.ajax({
                    url: '<?= base_url('Works/view_onsite')?>',
                    type: 'POST',
                    data: { workID: $workID, view : 0 }
                });
            }
        }); 
});
</script>
