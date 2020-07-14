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

<h2 class="text-center py-3">Services </h2>
<a href='<?php echo base_url('services/add_service') ?>' class="btn btn-primary mb-2">Add new</a>
<small>You must have only <big>4</big> services</small>

<table class="table table-dark text-center">
<thead>
	<tr>
		<th scope="col">Title</th>
		<th scope="col">Number</th>
		<th scope="col">Order</th>
	</tr>
</thead>
<tbody>
	<?php foreach($services as $serv) :?>
	<tr>
	<td><?= $serv->title; ?></td>
	<td><?= $serv->number; ?></td>
	<td><?= $serv->order; ?></td>
	<td>
		<a href="<?php echo base_url().'services/edit_service/'. $serv->id?>" class="btn btn-success">Edit</a>
		<a href="<?php echo base_url().'services/delete_service/'. $serv->id ?>" class="btn btn-danger">Delete</a>
	</td>
	</tr>
	<?php endforeach; ?>  
        <tr>
    <td>صورة الخلفية</td>
    <td><img src="<?=base_url('files/imgs/') . $settings->value?>" alt="" id="img"></td>
		<td></td>
		<td>
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
				Edit
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">تغيير صورة خلفية فسم services</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="post" enctype="multipart/form-data" id='change_img_form'>
								<img src="<?=base_url('files/imgs/') . $settings->value?>" alt="" id="img2" >
								<input type="file" name="services_img" id="services_img">
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<input type="submit" class="btn btn-success" id="btn_upload" value="Save changes">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</td>
	</tr>

</tbody>
</table>


	<script src="<?=base_url('asset/js/jquery-3.2.1.min.js')?>"></script>
	<script>
		
		//******** Change Services Background	 **************
		$(document).ready(function()
		{
			$('#change_img_form').on('submit',function(e) {
				e.preventDefault();

				if ($('#services_img').val() == '') {
					alert('الرجاء اختيار صورة');
				}
				else {
					$.ajax({
						url: "<?= base_url('Settings/edit_settings')?>",
						type: 'POST',
						// data: { services_img:  files},
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,

						success: function(data){
							$('#img').attr('src', data);
							$('#img2').attr('src', data);
						}
					});
				}
			});
		});
	</script>

