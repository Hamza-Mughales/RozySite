


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

<?php endif;?>

<h2 class="text-center py-3">Users </h2>
<a href='<?php echo base_url('users/register') ?>' class="btn btn-primary mb-2">Add User</a>

<table class="table table-dark text-center display"  >
	<thead>
		<tr>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $user): ?>
		<tr>
			<td><?=$user->name;?></td>
			<td><?=$user->email;?></td>
			<td>
				<a href="<?php echo base_url() . 'users/user_update/' . $user->id ?>" class="btn btn-success">Edit</a>
				<a href="<?php echo base_url() . 'users/user_delete/' . $user->id ?>" class="btn btn-danger">Delete</a>
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
