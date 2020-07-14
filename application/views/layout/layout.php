<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo isset($page_title) ? $page_title : 'Roz'; ?></title>
        
    <!-- DataTable css -->
    <link rel="stylesheet" href="<?=base_url() . 'asset/css/datatable.min.css'?>">
    <link rel="stylesheet" href="<?=base_url() . 'asset/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?=base_url() . 'asset/css/fontawesome.min.css'?>">
    <link rel="stylesheet" href="<?=base_url() . 'asset/css/animate.css'?>">
    <link rel="stylesheet" href="<?=base_url() . 'asset/css/hover-min.css'?>">
    <link rel="stylesheet" href="<?=base_url() . 'asset/css/layout.css'?>">
    <link rel="stylesheet" href="<?=base_url() . 'asset/css/dashboard.css'?>">
</head>

<body>

<nav
    class="navbar navbar-expand-lg navbar-dark bg-mattBlackLight">
    <button class="navbar-toggler sideMenuToggler" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>

	<a class="navbar-brand" href="<?= base_url('Site')?>">الموقع الرئيسي</a>
		<button
			class="navbar-toggler float-right"
			type="button"
			data-toggle="collapse"
			data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent"
			aria-expanded="false"
			aria-label="Toggle navigation"
		>
        <span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto float-right">
		<li class="nav-item dropdown">
            <a
			class="nav-link dropdown-toggle p-0"
			href="#"
			id="navbarDropdown"
			role="button"
			data-toggle="dropdown"
			aria-haspopup="true"
			aria-expanded="false"
            >
			<i class="fa fa-user"></i>
			<span class="text">الاعدادات</span>
            </a>
            <div
			class="dropdown-menu dropdown-menu-right"
			aria-labelledby="navbarDropdown"
            >
			<a class="dropdown-item" href="<?= base_url('users/user_update/'). this_user()?>"> تعديل الحساب</a>
			<a class="dropdown-item" href="<?= base_url('users/index')?>">عرض المستخدمين</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="<?= base_url('login/logout')?>">تسجيل الخروج</a>
            </div>
		</li>
        </ul>
	</div>
    </nav>
    <div class="wrapper d-flex">
	<div class="sideMenu bg-mattBlackLight">
        <div class="sidebar">
		<ul class="navbar-nav">
            <li class="nav-item">
			<a href="<?php echo base_url().'nav/index'?>" class="nav-link px-2">
			<i class="fa  fa-share-square"></i>
                <span class="text">Navbar</span>
			</a>
            </li>
            <li class="nav-item">
			<a href="<?php echo base_url().'home/index'?>" class="nav-link px-2">
			<i class="fa  fa-smile"></i>
                <span class="text">Home</span>
			</a>
            </li>
            <li class="nav-item">
			<a href="<?php echo base_url().'about/index'?>" class="nav-link px-2">
			<i class="fa fa-heart"></i>
			<span class="text">About</span></a
			>
            </li>
            <li class="nav-item">
			<a href="<?php echo base_url().'services/index'?>" class="nav-link px-2">
			<i class="fa  fa-star"></i>
                <span class="text">Services</span>
			</a>
            </li>
            <li class="nav-item">
			<a href="<?php echo base_url().'skills/index'?>" class="nav-link px-2">
			<i class="fa fa-puzzle-piece"></i>
                <span class="text">Skills</span>
			</a>
            </li>
            <li class="nav-item">
			<a href="<?php echo base_url().'works/index'?>" class="nav-link px-2">
			<i class="fa fa-camera-retro"></i>
                <span class="text">Works</span>
			</a>
            </li>
            <li class="nav-item">
			<a href="#" class="nav-link px-2 sideMenuToggler">
			<i class="fa fa-retweet"></i>
                <span class="text">Resize</span>
			</a>
			</li>
		</ul>
		</div>
    </div>
    <div class="content">
        <main>
        <div class="container-fluid">
            <div class="row">
			<div class="col">
                <div class="bg-mattBlackLight my-2 p-3">
				<?php $this->load->view($view)  ?>
                </div>
			</div>
            </div>
		</div>
        </main>
	</div>
    </div>

<script src="<?=base_url('asset/js/jquery-3.2.1.min.js')?>"></script>
    <script src="<?=base_url('asset/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('asset/js/popper.min.js.js')?>"></script>
    <script src="<?=base_url('asset/js/fontawesome.min.js')?>"></script>
    <script src="<?=base_url('asset/js/wow.min.js')?>"></script>
    <script src="<?=base_url('asset/js/layout.js')?>"></script>

<!-- Datatable js -->
<script  src="<?=base_url('asset/js/datatable.min.js')?>"></script>

<script>
	$(document).ready(function(){

		//******** DataTable  **************
		$('#datatable_tbl').DataTable();
	});
</script>

</body>


