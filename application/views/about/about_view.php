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

<h2 class="text-center py-3">About </h2>

<table class="table table-dark text-center">
<thead>
	<tr>
		<th scope="col">Image</th>
		<th scope="col">Name</th>
		<th scope="col">Colored Head</th>
		<th scope="col">Headline</th>
		<th scope="col">Text</th>
		<th scope="col">Phone</th>
		<th scope="col">Email</th>
		<th scope="col">Location</th>
	</tr>
</thead>
<tbody>
	<!-- <?php //var_dump($about);exit;?> -->
	<tr>
	<td> <img src="<?= base_url('files/imgs/' . $about->img )?>" alt=""> </td>
	<td><?= $about->name; ?></td>
	<td><?= $about->colored_head; ?></td>
	<td><?= $about->headline; ?></td>
	<td><?= $about->text; ?></td>
	<td><?= $about->phone; ?></td>
	<td><?= $about->email; ?></td>
	<td><?= $about->location; ?></td>
	<td>
		<a href="<?php echo base_url().'about/edit_about/'?>" class="btn btn-success">Edit</a>
	</td>
	</tr>
</tbody>
</table>
