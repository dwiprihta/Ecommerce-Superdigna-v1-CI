<!-- Start Contact Area -->
        <section class="wn_contact_area bg--red pt--80 pb--80">
			<div class="google__map pb--80">
				<div class="container">
					<nav  aria-label="breadcrumb">
					<ol style="background-color:white;" class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Contact</a></li>
					</ol>
					</nav>     
					<div class="row">
						<div class="col-md-12">
							<div ><iframe style="width:100%; margin-bottom:50px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.9091227667536!2d110.91130261440065!3d-7.584870494530409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a19ad7f93d949%3A0x7d6fe1eefb946dad!2ssuperdigna!5e0!3m2!1sid!2sid!4v1568258611690!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
					</div>
				</div>
        	</div>
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-8 col-12">
        				<div class="contact-form-wrap">
        					<h2 class="contact__title">Get in touch With Superdigna</h2>
        					<p>Mari Ngobrol dengan superdigna via email, cukup isi form dibawah ini untuk dapat berkomunikasi dengan superdigna, nice to meet you friend :) </p>
                            <form action="" method="post">
                                <div class="single-contact-form space-between">
                                    <input type="text" name="firstname" placeholder="Nama Awal*">
                                    <input type="text" name="lastname" placeholder="Nama Akhir*">
                                </div>
                                <div class="single-contact-form space-between">
                                    <input type="email" name="email" placeholder="Email*">
                                    <input type="text" name="subject" placeholder="Subject Email*">
                                </div>
                                <div class="single-contact-form message">
                                    <textarea name="message" placeholder="Tullis Pesan Anda Disini..."></textarea>
                                </div>
                                <div class="contact-btn">
                                    <button id="tombol_show">Kirim Email</button>
								</div>
                            </form>
                        </div> 
                        <div class="form-output">
                            <p class="form-messege">
                        </div>
        			</div>
        			<div class="col-lg-4 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__address">
        					<h2 class="contact__title">Superdigna Office</h2>
        					<p>Kami akan sangat merasa senang jika anda berkuncung ke kantor dan produksi kami </p>
        					<div class="wn__addres__wreapper">

        						<div class="single__address">
        							<i class="icon-location-pin icons"></i>
        							<div class="content">
        								<span>alamat:</span>
        								<p>Jl. Raya Solo Tawangmangu Km 10.5, Jaten, Karanganyar, Jawa Tengah, Indonesia</p>
        							</div>
        						</div>

        						<div class="single__address">
        							<i class="fa fa-whatsapp"></i>
        							<div class="content">
        								<span>Whatsapp 1:</span>
        								<p>081567906875</p>
        							</div>
        						</div>

								<div class="single__address">
								<i class="fa fa-whatsapp"></i>
        							<div class="content">
        								<span>Whatsapp 2:</span>
        								<p>081327485680</p>
        							</div>
        						</div>

								
								<div class="single__address">
								<i class="fa fa-facebook"></i>
        							<div class="content">
        								<span>Facebook:</span>
        								<p>superdigna</p>
        							</div>
        						</div>


								<div class="single__address">
								<i class="fa fa-instagram"></i>
        							<div class="content">
        								<span>Instagram:</span>
        								<p>@super_digna</p>
        							</div>
        						</div>

								<div class="single__address">
								<i class="fa fa-youtube"></i>
        							<div class="content">
        								<span>youtube:</span>
        								<p>superdigna</p>
        							</div>
        						</div>

        						<div class="single__address">
        							<i class="icon-envelope icons"></i>
        							<div class="content">
        								<span>Email address:</span>
        								<p>superdigna.cloth@gmail.com</p>
        							</div>
        						</div>

        						<div class="single__address">
        							<i class="icon-globe icons"></i>
        							<div class="content">
        								<span>Website:</span>
        								<p><a href="www.superdigna.com">www.superdigna.com</p>
        							</div>
        						</div>

        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!-- End Contact Area -->
		<script>
			$(document).ready(function() {
			
				$("#tombol_hide").click(function() {
				$("#box").hide();
				})
			
				$("#tombol_show").click(function() {
				$("#box").show();
				})
			
			});
		</script>



	    <!-- Google Map js -->
	    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmGmeot5jcjdaJTvfCmQPfzeoG_pABeWo"></script>
	    <script>
	        // When the window has finished loading create our google map below
	        google.maps.event.addDomListener(window, 'load', init);

	        function init() {
	            // Basic options for a simple Google Map
	            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
	            var mapOptions = {
	                // How zoomed in you want the map to start at (always required)
	                zoom: 12,

	                scrollwheel: false,

	                // The latitude and longitude to center the map (always required)
	                center: new google.maps.LatLng(23.7286, 90.3854), // New York

	                // How you would like to style the map. 
	                // This is where you would paste any style found on Snazzy Maps.
	                 styles:
					[

					    {
					        "featureType": "administrative",
					        "elementType": "labels.text.fill",
					        "stylers": [
					            {
					                "color": "#444444"
					            }
					        ]
					    },
					    {
					        "featureType": "landscape",
					        "elementType": "all",
					        "stylers": [
					            {
					                "color": "#f2f2f2"
					            }
					        ]
					    },
					    {
					        "featureType": "poi",
					        "elementType": "all",
					        "stylers": [
					            {
					                "visibility": "off"
					            }
					        ]
					    },
					    {
					        "featureType": "road",
					        "elementType": "all",
					        "stylers": [
					            {
					                "saturation": -100
					            },
					            {
					                "lightness": 45
					            }
					        ]
					    },
					    {
					        "featureType": "road.highway",
					        "elementType": "all",
					        "stylers": [
					            {
					                "visibility": "simplified"
					            }
					        ]
					    },
					    {
					        "featureType": "road.arterial",
					        "elementType": "labels.icon",
					        "stylers": [
					            {
					                "visibility": "off"
					            }
					        ]
					    },
					    {
					        "featureType": "transit",
					        "elementType": "all",
					        "stylers": [
					            {
					                "visibility": "off"
					            }
					        ]
					    },
					    {
					        "featureType": "transit.station.bus",
					        "elementType": "labels.icon",
					        "stylers": [
					            {
					                "saturation": "-16"
					            }
					        ]
					    },
					    {
					        "featureType": "water",
					        "elementType": "all",
					        "stylers": [
					            {
					                "color": "#04b7ff"
					            },
					            {
					                "visibility": "on"
					            }
					        ]
					    }
					]
	            };

	            // Get the HTML DOM element that will contain your map 
	            // We are using a div with id="map" seen below in the <body>
	            var mapElement = document.getElementById('googleMap');

	            // Create the Google Map using our element and options defined above
	            var map = new google.maps.Map(mapElement, mapOptions);

	            // Let's also add a marker while we're at it
	            var marker = new google.maps.Marker({
	                position: new google.maps.LatLng(23.7286, 90.3854),
	                map: map,
	                title: 'Dcare!',
	                icon: 'images/icons/map.png',
	                animation:google.maps.Animation.BOUNCE

	            });
	        }
	    </script>

	<script src="js/active.js"></script>
	
</body>
</html>