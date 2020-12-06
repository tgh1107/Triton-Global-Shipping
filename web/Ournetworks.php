<!DOCTYPE html>
<html class="js cssmask" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<title>TRITON GLOBAL SHIPPING</title>
	<link rel="stylesheet" href="./vendor.css">
	<link rel="stylesheet" href="./main.css">
	<link rel="stylesheet" href="./style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet"> 
    <title>Google Maps Multiple Markers</title>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJYjmTFKo21igdDqgNXOb171mXQzn3hnk&sensor=false&libraries=visualization"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<!--NAVIGATION-->
    <div class="header-main bg-white">
    	<div class="container">
    		<div class="row">
    			<nav class="navbar navbar-expand-lg navbar-light w-100" id="header-navbar">
					<img src="./images/logo.png">
    				<a class="navbar-brand font-weight-bold">TRITON GLOBAL </br> &nbsp; &nbsp; SHIPPING</a> 
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    					<ul class="navbar-nav ml-auto">
    						<li class="nav-item">
    							<a class="nav-link text-uppercase" data-toggle="none" href="index.html">HOME</a></li>
    						<li class="nav-item">
    							<a class="nav-link text-uppercase" data-toggle="none" href="AboutUs.html">ABOUT US</a>
    						</li>
    						<li class="nav-item">
    							<a class="nav-link text-uppercase" data-toggle="none" href="ContactUs.html">CONTACT US</a>
    						</li>
    						<li class="nav-item">
    							<a class="nav-link text-uppercase" data-toggle="none" href="Ournetworks.html">OUR NETWORKS</a>
    						</li>
    						<li class="nav-item"><a class="nav-link text-uppercase" data-toggle="none" href="Order.html">ORDER</a>
    						</li>
    						<li class="nav-item"><a class="nav-link text-uppercase" data-toggle="none" href="Login.html">LOGIN</a>
    						</li>
    					</ul>
    				</div>
    			</nav>
    		</div>
    	</div>
    </div>
      
    </section>
    <div class="header-spacing-helper" style="height: 90px;">
    </div>
    
    <div class="network">
        <h1>OUR NETWORKS</h1>
    </div>
    <div id="map" style="width: 100%; height: 700px;"></div>

    <!--FOOTER-->
    <div class="container-fluid padding">	
        <div class="row text-center">
            <div class="col-md-4">
                <img src="./images/logo1.png">
            </div>
            <div class="col-md-4">				
                <hr class="light">
                <h5>ADDRESS</h5>
                <hr class="light">
                <p>Level 36, The Riparian Plaza</p>
                <p>71 Eagle Street </p>
                <p>BRISBANE, QLD, 4000 AUSTRALIA</p>
            </div>
            <div class="col-md-4">				
                <hr class="light">
                <h5>CONTACT</h5>
                <hr class="light">
                <p>Email: info@tritonglobalshipping.com.au</p>
                <p>Website: wwww.tritonglobalshipping.com.au</p>
                <p>Sri Lanka: +94 11 252 1394</p>
                <p>Australia: +61 41725 4352</p>
                
            </div>
            <div class="col-12">
                <hr class="light-100">
                <h5>&copy; Group 14 - ICT</h5>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var bounds = new google.maps.LatLngBounds();
        var locations = [
            ['Brisbane', -27.469236, 153.025079, 1],
            ['Columbo', 6.942127, 79.867008, 2],
            ['Singapore', 1.347861, 103.852873, 3],
            ['DaNang', 16.110019, 108.035042, 4],
            ['HoChiMinh', 10.826164, 106.651240, 5],
            ['Chittagong', 22.346878, 91.795489, 6],
            ['JebelAli', 24.982159, 55.025310, 7],
            ['Cirebon', -6.749692, 108.547303, 8],
            ['Jakarta', -6.213346, 106.819208, 9],
            ['Surabaya', -7.256542, 112.739804, 10],
            ['Tuticorin', 8.790521, 78.126488, 11],
            ['Cochin', 9.949205, 76.257665, 12],
            ['Chennai', 13.060866, 80.227541, 13],
            ['NhavaShiva', 18.949570, 72.951431, 14],
            ['Delhi', 28.626901, 77.203190, 15],
            ['Kandla', 23.004613, 70.188953, 16],
            ['Mumbai', 19.090634, 72.850964, 17],
            ['PortKelang', 2.998873, 101.399034, 18]
        ];
        var servicelocations = [
            ['Columbo', 6.942127, 79.867008, 1],
            ['Singapore', 1.347861, 103.852873, 1],
            ['DaNang', 16.110019, 108.035042, 1],
            ['HoChiMinh', 10.826164, 106.651240, 1],
            ['Chittagong', 22.346878, 91.795489, 1],
            ['JebelAli', 24.982159, 55.025310, 1],
            ['Cirebon', -6.749692, 108.547303, 1],
            ['Jakarta', -6.213346, 106.819208, 1],
            ['Surabaya', -7.256542, 112.739804, 1],
            ['Tuticorin', 8.790521, 78.126488, 1],
            ['Cochin', 9.949205, 76.257665, 1],
            ['Chennai', 13.060866, 80.227541, 1],
            ['NhavaShiva', 18.949570, 72.951431, 1],
            ['Delhi', 28.626901, 77.203190, 1],
            ['Kandla', 23.004613, 70.188953, 1],
            ['Mumbai', 19.090634, 72.850964, 1],

            ['Brisbane', -27.469236, 153.025079, 2],
            ['Singapore', 1.347861, 103.852873, 2],
            ['DaNang', 16.110019, 108.035042, 2],
            ['HoChiMinh', 10.826164, 106.651240, 2],
            ['Chittagong', 22.346878, 91.795489, 2],
            ['JebelAli', 24.982159, 55.025310, 2],
            ['Cirebon', -6.749692, 108.547303, 2],
            ['Jakarta', -6.213346, 106.819208, 2],
            ['Surabaya', -7.256542, 112.739804, 2],
            ['Tuticorin', 8.790521, 78.126488, 2],
            ['Cochin', 9.949205, 76.257665, 2],
            ['Chennai', 13.060866, 80.227541, 2],
            ['NhavaShiva', 18.949570, 72.951431, 2],
            ['Delhi', 28.626901, 77.203190, 2],
            ['Kandla', 23.004613, 70.188953, 2],
            ['Mumbai', 19.090634, 72.850964, 2],

            ['Brisbane', -27.469236, 153.025079, 3],
            ['Columbo', 6.942127, 79.867008, 3],
            ['DaNang', 16.110019, 108.035042, 3],
            ['HoChiMinh', 10.826164, 106.651240, 3],
            ['Chittagong', 22.346878, 91.795489, 3],
            ['JebelAli', 24.982159, 55.025310, 3],
            ['Cirebon', -6.749692, 108.547303, 3],
            ['Jakarta', -6.213346, 106.819208, 3],
            ['Surabaya', -7.256542, 112.739804, 3],
            ['Tuticorin', 8.790521, 78.126488, 3],
            ['Cochin', 9.949205, 76.257665, 3],
            ['Chennai', 13.060866, 80.227541, 3],
            ['NhavaShiva', 18.949570, 72.951431, 3],
            ['Delhi', 28.626901, 77.203190, 3],
            ['Kandla', 23.004613, 70.188953, 3],
            ['Mumbai', 19.090634, 72.850964, 3],

            ['Brisbane', -27.469236, 153.025079, 4],
            ['Columbo', 6.942127, 79.867008, 4],
            ['Singapore', 1.347861, 103.852873, 4],
            ['Chittagong', 22.346878, 91.795489, 4],
            ['JebelAli', 24.982159, 55.025310, 4],
            ['Cirebon', -6.749692, 108.547303, 4],
            ['Jakarta', -6.213346, 106.819208, 4],
            ['Surabaya', -7.256542, 112.739804, 4],
            ['Tuticorin', 8.790521, 78.126488, 4],
            ['Cochin', 9.949205, 76.257665, 4],
            ['Chennai', 13.060866, 80.227541, 4],
            ['NhavaShiva', 18.949570, 72.951431, 4],
            ['Delhi', 28.626901, 77.203190, 4],
            ['Kandla', 23.004613, 70.188953, 4],
            ['Mumbai', 19.090634, 72.850964, 4],

            ['Brisbane', -27.469236, 153.025079, 5],
            ['Columbo', 6.942127, 79.867008, 5],
            ['Singapore', 1.347861, 103.852873, 5],
            ['Chittagong', 22.346878, 91.795489, 5],
            ['JebelAli', 24.982159, 55.025310, 5],
            ['Cirebon', -6.749692, 108.547303, 5],
            ['Jakarta', -6.213346, 106.819208, 5],
            ['Surabaya', -7.256542, 112.739804, 5],
            ['Tuticorin', 8.790521, 78.126488, 5],
            ['Cochin', 9.949205, 76.257665, 5],
            ['Chennai', 13.060866, 80.227541, 5],
            ['NhavaShiva', 18.949570, 72.951431, 5],
            ['Delhi', 28.626901, 77.203190, 5],
            ['Kandla', 23.004613, 70.188953, 5],
            ['Mumbai', 19.090634, 72.850964, 5],

            ['Brisbane', -27.469236, 153.025079, 6],
            ['Columbo', 6.942127, 79.867008, 6],
            ['Singapore', 1.347861, 103.852873, 6],
            ['DaNang', 16.110019, 108.035042, 6],
            ['HoChiMinh', 10.826164, 106.651240, 6],
            ['JebelAli', 24.982159, 55.025310, 6],
            ['Cirebon', -6.749692, 108.547303, 6],
            ['Jakarta', -6.213346, 106.819208, 6],
            ['Surabaya', -7.256542, 112.739804, 6],
            ['Tuticorin', 8.790521, 78.126488, 6],
            ['Cochin', 9.949205, 76.257665, 6],
            ['Chennai', 13.060866, 80.227541, 6],
            ['NhavaShiva', 18.949570, 72.951431, 6],
            ['Delhi', 28.626901, 77.203190, 6],
            ['Kandla', 23.004613, 70.188953, 6],
            ['Mumbai', 19.090634, 72.850964, 6],

            ['Brisbane', -27.469236, 153.025079, 8],
            ['Columbo', 6.942127, 79.867008, 8],
            ['Singapore', 1.347861, 103.852873, 8],
            ['DaNang', 16.110019, 108.035042, 8],
            ['HoChiMinh', 10.826164, 106.651240, 8],
            ['Chittagong', 22.346878, 91.795489, 8],
            ['JebelAli', 24.982159, 55.025310, 8],
            ['Tuticorin', 8.790521, 78.126488, 8],
            ['Cochin', 9.949205, 76.257665, 8],
            ['Chennai', 13.060866, 80.227541, 8],
            ['NhavaShiva', 18.949570, 72.951431, 8],
            ['Delhi', 28.626901, 77.203190, 8],
            ['Kandla', 23.004613, 70.188953, 8],
            ['Mumbai', 19.090634, 72.850964, 8],
           
            ['Brisbane', -27.469236, 153.025079, 9],
            ['Columbo', 6.942127, 79.867008, 9],
            ['Singapore', 1.347861, 103.852873, 9],
            ['DaNang', 16.110019, 108.035042, 9],
            ['HoChiMinh', 10.826164, 106.651240, 9],
            ['Chittagong', 22.346878, 91.795489, 9],
            ['JebelAli', 24.982159, 55.025310, 9],
            ['Tuticorin', 8.790521, 78.126488, 9],
            ['Cochin', 9.949205, 76.257665, 9],
            ['Chennai', 13.060866, 80.227541, 9],
            ['NhavaShiva', 18.949570, 72.951431, 9],
            ['Delhi', 28.626901, 77.203190, 9],
            ['Kandla', 23.004613, 70.188953, 9],
            ['Mumbai', 19.090634, 72.850964, 9],
           

            ['Colombo', 6.928309, 79.861352, 9],
            ['Bangladesh', 23.744153, 90.394815, 9],
            ['Dubai', 25.221773, 55.274388, 9],
            ['Bandarabbas', 27.189253, 56.266038, 9],

            ['Brisbane', -27.469236, 153.025079, 10],
            ['Columbo', 6.942127, 79.867008, 10],
            ['Singapore', 1.347861, 103.852873, 10],
            ['DaNang', 16.110019, 108.035042, 10],
            ['HoChiMinh', 10.826164, 106.651240, 10],
            ['Chittagong', 22.346878, 91.795489, 10],
            ['JebelAli', 24.982159, 55.025310, 10],
            ['Tuticorin', 8.790521, 78.126488, 10],
            ['Cochin', 9.949205, 76.257665, 10],
            ['Chennai', 13.060866, 80.227541, 10],
            ['NhavaShiva', 18.949570, 72.951431, 10],
            ['Delhi', 28.626901, 77.203190, 10],
            ['Kandla', 23.004613, 70.188953, 10],
            ['Mumbai', 19.090634, 72.850964, 10],
      

            ['Brisbane', -27.469236, 153.025079, 11],
            ['Columbo', 6.942127, 79.867008, 11],
            ['Singapore', 1.347861, 103.852873, 11],
            ['DaNang', 16.110019, 108.035042, 11],
            ['HoChiMinh', 10.826164, 106.651240, 11],
            ['Chittagong', 22.346878, 91.795489, 11],
            ['JebelAli', 24.982159, 55.025310, 11],
            ['Cirebon', -6.749692, 108.547303, 11],
            ['Jakarta', -6.213346, 106.819208, 11],
            ['Surabaya', -7.256542, 112.739804, 11],
            

            ['Brisbane', -27.469236, 153.025079, 12],
            ['Columbo', 6.942127, 79.867008, 12],
            ['Singapore', 1.347861, 103.852873, 12],
            ['DaNang', 16.110019, 108.035042, 12],
            ['HoChiMinh', 10.826164, 106.651240, 12],
            ['Chittagong', 22.346878, 91.795489, 12],
            ['JebelAli', 24.982159, 55.025310, 12],
            ['Cirebon', -6.749692, 108.547303, 12],
            ['Jakarta', -6.213346, 106.819208, 12],
            ['Surabaya', -7.256542, 112.739804, 12],

            ['Brisbane', -27.469236, 153.025079, 13],
            ['Columbo', 6.942127, 79.867008, 13],
            ['Singapore', 1.347861, 103.852873, 13],
            ['DaNang', 16.110019, 108.035042, 13],
            ['HoChiMinh', 10.826164, 106.651240, 13],
            ['Chittagong', 22.346878, 91.795489, 13],
            ['JebelAli', 24.982159, 55.025310, 13],
            ['Cirebon', -6.749692, 108.547303, 13],
            ['Jakarta', -6.213346, 106.819208, 13],
            ['Surabaya', -7.256542, 112.739804, 13],

            ['Brisbane', -27.469236, 153.025079, 14],
            ['Columbo', 6.942127, 79.867008, 14],
            ['Singapore', 1.347861, 103.852873, 14],
            ['DaNang', 16.110019, 108.035042, 14],
            ['HoChiMinh', 10.826164, 106.651240, 14],
            ['Chittagong', 22.346878, 91.795489, 14],
            ['JebelAli', 24.982159, 55.025310, 14],
            ['Cirebon', -6.749692, 108.547303, 14],
            ['Jakarta', -6.213346, 106.819208, 14],
            ['Surabaya', -7.256542, 112.739804, 14],

            ['Brisbane', -27.469236, 153.025079, 15],
            ['Columbo', 6.942127, 79.867008, 15],
            ['Singapore', 1.347861, 103.852873, 15],
            ['DaNang', 16.110019, 108.035042, 15],
            ['HoChiMinh', 10.826164, 106.651240, 15],
            ['Chittagong', 22.346878, 91.795489, 15],
            ['JebelAli', 24.982159, 55.025310, 15],
            ['Cirebon', -6.749692, 108.547303, 15],
            ['Jakarta', -6.213346, 106.819208, 15],
            ['Surabaya', -7.256542, 112.739804, 15],

            ['Brisbane', -27.469236, 153.025079, 16],
            ['Columbo', 6.942127, 79.867008, 16],
            ['Singapore', 1.347861, 103.852873, 16],
            ['DaNang', 16.110019, 108.035042, 16],
            ['HoChiMinh', 10.826164, 106.651240, 16],
            ['Chittagong', 22.346878, 91.795489, 16],
            ['JebelAli', 24.982159, 55.025310, 16],
            ['Cirebon', -6.749692, 108.547303, 16],
            ['Jakarta', -6.213346, 106.819208, 16],
            ['Surabaya', -7.256542, 112.739804, 16],

            ['Brisbane', -27.469236, 153.025079, 17],
            ['Columbo', 6.942127, 79.867008, 17],
            ['Singapore', 1.347861, 103.852873, 17],
            ['DaNang', 16.110019, 108.035042, 17],
            ['HoChiMinh', 10.826164, 106.651240, 17],
            ['Chittagong', 22.346878, 91.795489, 17],
            ['JebelAli', 24.982159, 55.025310, 17],
            ['Cirebon', -6.749692, 108.547303, 17],
            ['Jakarta', -6.213346, 106.819208, 17],
            ['Surabaya', -7.256542, 112.739804, 17],

            ['Brisbane', -27.469236, 153.025079, 18],
            ['Columbo', 6.942127, 79.867008, 18],
            ['Singapore', 1.347861, 103.852873, 18],
            ['DaNang', 16.110019, 108.035042, 18],
            ['HoChiMinh', 10.826164, 106.651240, 18],
            ['Chittagong', 22.346878, 91.795489, 18],
            ['JebelAli', 24.982159, 55.025310, 18],
            ['Cirebon', -6.749692, 108.547303, 18],
            ['Jakarta', -6.213346, 106.819208, 18],
            ['Surabaya', -7.256542, 112.739804, 18],
            ['Tuticorin', 8.790521, 78.126488, 18],
            ['Cochin', 9.949205, 76.257665, 18],
            ['Chennai', 13.060866, 80.227541, 18],
            ['NhavaShiva', 18.949570, 72.951431, 18],
            ['Delhi', 28.626901, 77.203190, 18],
            ['Kandla', 23.004613, 70.188953, 18],
            ['Mumbai', 19.090634, 72.850964, 18],
            
        ];

        var map = new google.maps.Map(document.getElementById('map'), {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        

        var uniqid = 1;
        var marker, i;
        var markers = new Array();
        var cnt = 1;
        
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                title: locations[i][0],
                icon: 'map2.png'
            });
            bounds.extend(marker.position);
            marker.id = uniqid;
            markers.push(marker);
            uniqid++;

            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    for (var i = 0; i < markers.length; i++) {
                        if (marker.id != locations[i][3]) {
                            markers[i].setMap(null);
                        }
                        else {
                            
                            markers[i].setMap(map); 
                            if (cnt == 1) {

                                var centerControlDiv = document.createElement('div');
                                var centerControl = new CenterControl(centerControlDiv, map);
                                centerControlDiv.index = 1;
                                map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
                                //map.panTo(this.getPosition()); 
                                //map.setZoom(5);
                                placeMarker(locations[i][3]);
                            }
                            else {
                                location.reload(true);
                            }
                        }
                    }
                }
            })(marker, i));
        }

        function animateCircle(line) {
            var count = 0;
            window.setInterval(function () {
                count = (count + 1) % 200;

                var icons = line.get('icons');
                icons[0].offset = (count / 2) + '%';
                line.set('icons', icons);
            }, 20);
        }

        function calcRoute(source, destination) {
            var polyline = new google.maps.Polyline({
                path: [source, destination],
                strokeColor: 'red',
                strokeWeight: 2,
                icons: [{
                    icon: { path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW }, 
                    offset: '100%'
                }],
                strokeOpacity: 1
            });

            polyline.setMap(map);

            animateCircle(polyline);
        }

        function CenterControl(controlDiv, map) {

            // Set CSS for the control border.
            var controlUI = document.createElement('div');
            controlUI.style.backgroundColor = '#fff';
            controlUI.style.border = '2px solid #fff';
            controlUI.style.borderRadius = '3px';
            controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
            controlUI.style.cursor = 'pointer';
            controlUI.style.marginBottom = '22px';
            controlUI.style.textAlign = 'center';
            controlDiv.appendChild(controlUI);

            // Set CSS for the control interior.
            var controlText = document.createElement('div');
            controlText.style.color = 'rgb(25,25,25)';
            controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
            controlText.style.fontSize = '16px';
            controlText.style.lineHeight = '38px';
            controlText.style.paddingLeft = '5px';
            controlText.style.paddingRight = '5px';
            controlText.innerHTML = 'Go Back';
            controlUI.appendChild(controlText);

            // Setup the click event listeners: simply set the map to Chicago.
            controlUI.addEventListener('click', function () {
                location.reload(true);
            });

        }

        function placeMarker(locid) {
            var mkr;
            cnt++;
            for (i = 0; i < servicelocations.length; i++) {
                if (locid == servicelocations[i][3]) {
                    
                    mkr = new google.maps.Marker({
                        position: new google.maps.LatLng(servicelocations[i][1], servicelocations[i][2]),
                        map: map,
                        title: servicelocations[i][0],
                        icon: 'map1.png'
                    });

                    var startPt = new google.maps.LatLng(locations[locid - 1][1], locations[locid-1][2]);
                    var endPt = new google.maps.LatLng(servicelocations[i][1], servicelocations[i][2]);
                    calcRoute(startPt, endPt);
                    bounds.extend(startPt);
                    bounds.extend(endPt);

                    mkr.setAnimation(google.maps.Animation.BOUNCE);
                    mkr.setMap(map);
                }
            }
            
        }

        

        map.fitBounds(bounds);
        var listener = google.maps.event.addListener(map, "idle", function () {
            map.setZoom(4);
            google.maps.event.removeListener(listener);
        });
        
    </script>
</body>
</html>
