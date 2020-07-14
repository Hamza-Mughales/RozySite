
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
<?php elseif (null !== $this->session->flashdata('deleted')): ?>
	<div class="alert alert-danger  offset-md-2 col-md-10" role="alert">
		<?php echo $this->session->flashdata('deleted'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</div>
<?php endif;?>

<h2 class="text-center py-3">Navbar </h2>
<a href='<?php echo base_url('nav/add_nav') ?>' class="btn btn-primary mb-2">Add new</a>

<table class="table table-dark text-center">
<thead>
	<tr>
		<th scope="col">Name</th>
		<th scope="col">Order</th>
		<th scope="col">Action</th>
	</tr>
</thead>
<tbody>
	<?php foreach($nav_data as $nav): ?>
	<tr>
	<td><?= $nav->nav_name; ?></td>
	<td><?= $nav->nav_order; ?></td>
	<td>
		<a href="<?php echo base_url().'nav/edit_nav/'. $nav->nav_id ?>" class="btn btn-success">Edit</a>
		<a href="<?php echo base_url().'nav/delete_nav/'. $nav->nav_id ?>" class="btn btn-danger">Delete</a>
	</td>
	</tr>
	<?php endforeach;?>
</tbody>
</table>
