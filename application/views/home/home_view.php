
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
	<div class="alert alert-danget  offset-md-2 col-md-10" role="alert">
		<?php echo $this->session->flashdata('deleted'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</div>
<?php endif;?>

<h2 class="text-center py-3">Home </h2>

<table class="table table-dark text-center">
<thead>
	<tr>
		<th scope="col">Img</th>
		<th scope="col">Text</th>
		<th scope="col">Colored Word</th>
	</tr>
</thead>
<tbody>
	<tr>
	<td> <img src="<?= base_url('files/imgs/' . $home->img )?>" alt=""> </td>
	<td><?= $home->text; ?></td>
	<td><?= $home->colored_word; ?></td>
	<td>
		<a href="<?php echo base_url().'home/edit_home/' ?>" class="btn btn-success">Edit</a>
	</td>
	</tr>
</tbody>
</table>
