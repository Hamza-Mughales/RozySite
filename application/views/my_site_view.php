<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>روزي - رسامة - مصممة جرافكس</title>
    <link rel="icon" href="<?=base_url('files/imgs/' . $about[0]->img . '')?>">
    <link rel="stylesheet" href="<?=base_url() . 'asset/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?=base_url() . 'asset/css/thumb-gallery.css'?>">
    <link rel="stylesheet" href="<?=base_url() . 'asset/css/thumbnail-gallery.css'?>">
    <link rel="stylesheet" href="<?=base_url() . 'asset/css/fontawesome.min.css'?>">
    <link rel="stylesheet" href="<?=base_url() . 'asset/css/animate.css'?>">
    <link rel="stylesheet" href="<?=base_url() . 'asset/css/hover-min.css'?>">
    <link rel="stylesheet" href="<?=base_url() . 'asset/css/main.css'?>">
    
    <style>
        .roz-home {
	    background:<?= 'url("'. base_url() . 'files/imgs/' . $home[0]->img . '")' ?>;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
	    }
        .roz-home .overlay {
                min-height: 100vh;
                width: 100%;
                position: absolute;
                background-color: #0000009e;
                left:0;
                top:0;
        }
        .services {
                background:<?= 'url("'. base_url() . 'files/imgs/' . $settings[0]->value . '")' ?>;
                background-size: cover;
                background-attachment: fixed;
                background-position: center;
		}
    </style>
</head>

<body>
	<?php //var_dump($settings) ?>

    <!-- Navbar Section -->
    <section class="roz-nav">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                        <?php foreach ($navs as $nav): ?>
                                <li class="nav-item wow animate__animated animate__backInUp">
                                        <a class="nav-link" href="#roz-<?=$nav->nav_name?>">
                                                <?= $nav->nav_name?>
                                        </a>
                                </li>
                        <?php endforeach;?>
                </ul>
            </div>
        </nav>
    </section>

    <!-- Home Section -->
    <section id="roz-home" class="roz-home">
    <div class="overlay"></div>
        <div class="home-content">
            <div class="home-text">
                <h1 class="wow animate__animated animate__backInDown">
                        <?=$home[0]->text . '<span>' . $home[0]->colored_word . '</span>'?>
                </h1>
                <div class="btn-home mt-4">
                    <a href="#roz-contact" class="btn hvr-shutter-out-horizontal btn-conc-home wow animate__animated animate__lightSpeedInLeft">Contact</a>
                    <a href="#roz-myworks" class="btn btn-conc-works hvr-shutter-out-horizontal wow animate__animated animate__lightSpeedInRight">Works</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id='roz-about' class="roz-about">
        <div class="container">
			<div class="heading">
				<h2 class="wow animate__animated animate__flipInY"><span>About</span></h2>
			</div>
            <div class="row">
                <div class="col-md-6">
                    <img class="img wow animate__animated animate__rollIn" src="<?=base_url('files/imgs/' . $about[0]->img . '')?>" alt="">
                </div>
                <div class="col-md-6">
                    <h2  class="img wow animate__animated animate__zoomInLeft"><?='<span>' . $about[0]->colored_head . '</span>' . $about[0]->headline?>  </h2>
                    <p class="img wow animate__animated animate__slideInRight"><?=$about[0]->text?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
	<section id="roz-services"  class="services">
            <div class="services_overlay"></div>
		<div class="mid-level-padding">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 wow slideInLeft animated"
						style="visibility: visible; animation-name: slideInLeft;">
						<div class="top-section vertical-heading">
							<h2>
								 Expect<br>
								<strong>Excellence</strong> Services
							</h2>
						</div>
					</div>
				</div>
				<div class="row wow fadeInUp animated" data-wow-duration="2s"
					style="visibility: visible; animation-duration: 2s;">
					<div class="col-sm-12">
						<div class="bottom-section text-center">
							<div class="row">
								<div class="col-md-3 col-6">
									<div class="left-section section one wow animate__animated animate__jello">
										<h2><i class="fa fa-edit hvr-icon-up" aria-hidden="true"></i>
										</h2>
										<h3>+<?=$services[0]->number?></h3>
										<p><?=$services[0]->title?></p>
									</div>
								</div>
								<div class="col-md-3 col-6 ">
									<div class="section three section one wow animate__animated animate__jello">
										<h2><i class="fa fa-heart " aria-hidden="true"></i><span class="sr-only">icon</span>
										</h2>
										<h3>+<?=$services[1]->number?></h3>
										<p><?=$services[1]->title?></p>
									</div>
								</div>
								<div class="col-md-3 col-6">
									<div class="left-section section two section one wow animate__animated animate__jello">
										<h2><i class="fa fa-camera-retro" aria-hidden="true"></i><span class="sr-only">icon</span>
										</h2>
										<h3>+<?=$services[2]->number?></h3>
										<p><?=$services[2]->title?></p>
									</div>
								</div>
								<div class="col-md-3 col-6">
									<div class="section four section one wow animate__animated animate__jello">
										<h2><i class="fa fa-laptop" aria-hidden="true"></i><span class="sr-only">icon</span>
										</h2>
										<h3>+<?=$services[3]->number?></h3>
										<p><?=$services[3]->title?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!-- Slills Section -->
    <div id="roz-skills" class="skills">
        <div class="container">
            <div class="heading">
                <h2 class="wow animate__animated animate__flipInY"><span>skills</span></h2>
            </div>
            <div class="row  wow fadeInUp animated" style="visibility: visible;">
				<?php foreach ($skills as $skill): ?>
                <div class="col-sm-6">
                    <div class="first">
                        <p><?=$skill->title?></p>
                        <div class="progress wow animate__animated animate__fadeInUp">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                aria-valuemax="100" <?='style="width: ' . $skill->percent . '%; background:' . $skill->color . '"'?> >
                                <span><?=$skill->percent?>%</span>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endforeach;?>
            </div>
        </div>
    </div>

    <!-- Quate Section  -->
    <div id="about-us-4" class="big-padding text-center">
        <div class="container">
            <div class="col-xs-12 " style="visibility: visible;">
                <div class="section">
                    <h3 class=" wow animate__animated animate__pulse"><i class="fa fa-quote-left" aria-hidden="true"></i>
                        Creativity is allowing yourself to make mistakes<br>
                        Art is knowing which ones to keep <i class="fa fa-quote-right" aria-hidden="true"></i>
                    </h3>
                    <p>- Alice Johnson -</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <section id="roz-myworks" class=" works gallery-block compact-gallery">
        <div class="heading">
            <h2 class="wow animate__animated animate__flipInY"><span> My Works</span></h2>
        </div>
        
        <div id='myworks' class="row no-gutters">
          <?php foreach ($works as $work): ?>
            <div class=" col-sm-6 col-lg-4  item zoom-on-hover wow animate__animated animate__fadeInUp ">
                <a class="lightbox" href="<?=base_url() . 'files/imgs/works images/' . $work->img . ''?>">
                    <img class="img-fluid image" src="<?=base_url() . 'files/imgs/works images/' . $work->img . ''?>">
                </a>
			</div>
			<?php endforeach;?>
        </div>
		<!-- See More Works -->
		<div class="seemore-div col-12 text-center">
			<button id="see-more" class="see-more btn hvr-float-shadow ">Click to See More <i class="fa  fa-arrow-left"></i></button>
			<input id='limit' type="hidden" name="limit" value ='<?= $limit?>' >
			<input id="offset" type="hidden" name="offset" value ='<?= $offset?>' >
		</div>
    </section>

     <!-- Contact Me Section -->
    <section id="roz-contact" class="roz-contact">
        <div class="container">
            <div class="heading">
                <h2  class="wow animate__animated animate__flipInY" ><span>Contact Me</span></h2>
			</div>

            <div class="card wow animate__animated animate__headShake">
                <div class="row">
                    <div class="col-lg-8">
                    
                        <div id="sendMailStatus"></div>
                        
                        <form id="emailForm" action="">
                                <div class="card-body form">
                                <h3 class="mt-4"><i class="fas fa-envelope pr-2"></i>Write to me:</h3>
                                <div class="row">
                                        <div class="col-md-6 mb-2">
                                                <div class="md-form">
                                                        <label for="form-contact-name" class="">Your name</label>
                                                        <input type="text" name="name" id="form-contact-name" class="form-control" required>
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="md-form">
                                                        <label for="form-contact-email" class="">Your email</label>
                                                        <input type="text" name="email" id="form-contact-email" class="form-control" required>
                                                </div>
                                        </div>
                                </div>
                                <div class="row mt-3">
                                        <div class="col-md-12">
                                                <div class="md-form">
                                                        <label for="form-contact-message ">Your message</label>
                                                        <textarea  name="message" id="form-contact-message" class="form-control md-textarea" rows="7"  required></textarea>
                                                        <button type="submit" name="send" id="btn_send" class="btn send-contact hvr-float-shadow" >Send Message</button>
                                                        
                                                </div>
                                        </div>
                                        </div>
                                </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-body contact text-center h-100 white-text">
                            <h3 class="my-4 pb-2">Contact information</h3>
                            <ul class="text-lg-left list-unstyled ml-4">
                                <li>
                                    <p><i class="fas fa-map-marker-alt pr-2"></i><?=$about[0]->location?></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone pr-2"></i><?= $about[0]->phone?></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope pr-2"></i><?=$about[0]->email?></p>
                                </li>
                            </ul>
                            <hr class="hr-light my-4">
                            <div class="roz-socila-media">
                                <ul class=" text-center">
                                    <li>
                                        <a target="_blank" href="https://www.facebook.com/rozyy9">
                                            <i class="fab fa-facebook-f icon"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter icon"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-linkedin-in icon"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="roz-footer">
        <div class="row">
                <div class="text-center col-md-4 ">© 2020 Copyright:
                    <a href="#"> Amt-Addali</a>
                </div>
                <div class="col-md-4 xs-hide"></div>
                <div class="col-md-4 ">Design & Prog:
                    <a href="http://hamza-mughales.myartsonline.com/" class="hamza-design"  target="_blank">Hamza Mughales</a>
                </div>
            </div>
	</footer>


    <script src="<?=base_url('asset/js/jquery-3.2.1.min.js')?>"></script>
    <script src="<?=base_url('asset/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('asset/js/popper.min.js.js')?>"></script>
    <script src="<?=base_url('asset/js/thumbnail-galllery.js')?>"></script>
    <script src="<?=base_url('asset/js/fontawesome.min.js')?>"></script>
    <script src="<?=base_url('asset/js/wow.min.js')?>"></script>
    <script src="<?=base_url('asset/js/main.js')?>"></script>
    <script>
		baguetteBox.run('.compact-gallery', { animation: 'slideIn' });
		new WOW().init();

		//******** Sending Email **************
        $(document).ready(function(){

                $("#emailForm").submit(function(event){
                event.preventDefault();
        
                $('#btn_send').html('sending ...');
                $('#btn_send').prop('disabled',true);
        
                        var e_name = $("#form-contact-name").val();
                        var e_email = $("#form-contact-email").val();
                        var e_message = $("#form-contact-message").val();
        
                $.ajax({
                        dataType:'html',
                        url: "<?= base_url('Sendemail/sendemail') ?>",
                        data:{name:e_name, email:e_email, message:e_message},
                        type: "POST",
        
                        success:function(returnedData){
                                $("#sendMailStatus").html(returnedData);
                                $('#btn_send').html('Send Message');
                                $('#btn_send').prop('disabled',false);
                        },
        
                error:function (){
                        $('#btn_send').html('Send Message');
                        $('#btn_send').prop('disabled',false);
                        }
                        });
                });

			// ********* See More Projects *******
			$("#see-more").click(function(){

			$('#see-more').html('loading <i class="fa  fa-arrow-down"></i>');
			$('#see-more').prop('disabled',true);

			var limit = $('#limit').val(),
				offset = $('#offset').val();
				offset = parseInt( offset) + parseInt(limit);

			$.ajax({
				dataType:'html',
				url: "<?= base_url('Site/get_works')?>",
				data:{limit:limit, offset:offset},
				type: "GET",

				success:function(data){
					if(data == false){
						$('#see-more').hide();
					}
					else{
						$('#myworks').append(data)
						$('#see-more').prop('disabled',false);
						$('#see-more').html('Click To see More <i class="fa  fa-arrow-left"></i>');
                                                baguetteBox.run('.compact-gallery', { animation: 'slideIn' });
					}
					$('#offset').val(offset);
				},
			});
		});

});


	</script>

</body>

</html>
