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

<h2 class="text-center py-3">Skills </h2>
<a href='<?php echo base_url('skills/add_skill') ?>' class="btn btn-primary mb-2">Add new</a>
<small> <big>4</big> skills</small> is good

<table class="table table-dark text-center">
<thead>
	<tr>
		<th scope="col">Title</th>
		<th scope="col">Percent</th>
		<th scope="col">Order</th>
		<th scope="col">Color</th>
	</tr>
</thead>
<tbody>
	<?php foreach($skills as $skill) :?>
	<tr>
	<td><?= $skill->title; ?></td>
	<td><?= $skill->percent; ?></td>
	<td><?= $skill->order; ?></td>
	<td style="background-color:<?= $skill->color; ?>"><?= $skill->color; ?></td>
	<td>
		<a href="<?php echo base_url().'skills/edit_skill/'. $skill->id?>" class="btn btn-success">Edit</a>
		<a href="<?php echo base_url().'skills/delete_skill/'. $skill->id ?>" class="btn btn-danger">Delete</a>
	</td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>
