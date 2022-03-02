<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>css/style_map_view.css"  id="css1">
    <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>css/style_map_popup.css" id="css2">

    <title>Document</title>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
</head>

<body>
    <container>
    <div id="navbar">
        <form>
            <label>FILTER BY</label><br>
            <hr>
            <label>SEARCH</label><br>
            <input list="browsers"><br>
            <datalist style="max-height:100px;" id="browsers"></datalist>
            <hr>
            <!--<label>No.of Signage:</label><br>
            <input type="number"><br>
            <hr>-->
            <input type="checkbox" id="promo" name="promo" value="promo">
            <label for="promo">Apply Default Base Price</label><br>
        </form>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <?php $this->load->view('map/calendarview3') ?>

            </div>
        </div>
    </div>
    <!--<div style="margin:auto; font-size:42px;">
        </div>-->
    <div id="map"></div>
</container>
    <!--<div class="container">
                <table id="userTable" border="1" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>longitude</th>
                            <th>latitude</th>
                            <th>signage name</th>
                            <th>signage location</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>-->
    <script>
        function mapView() {
            console.log(1);
            //post请求
            $.ajax({
                type: 'POST',
                url: 'http://178.128.48.225:60/pricing_decision/signages',
                dataType: 'json',
                //data: JSON.parse({ signage_id: data[0].signage_id }),
                success: function(response) {
                    console.log(response);
                    //alert('AJAX call was successful!');
                    var len = response.data.length;
                    var data = response.data;
                    var names = [];
                    var locations = [];
                    //console.log(locations)
                    for (var i = 0; i < len; i++) {
                        var id = data[i].signage_id;
                        var longitude = data[i].longitude;
                        var latitude = data[i].latitude;
                        var name = data[i].name;
                        var location = data[i].location;

                        /**var tr_str = "<tr>" +
                            "<td align='center'>" + (i+1) + "</td>" +
                            "<td align='center'>" + longitude + "</td>" +
                            "<td align='center'>" + latitude + "</td>" +
                            "<td align='center'>" + name + "</td>" +
                            "<td align='center'>" + location + "</td>" +
                            "</tr>";

                        $("#userTable tbody").append(tr_str);**/
                        //document.getElementById('name').innerHTML = name;
                        //document.getElementById('location').innerHTML = location;
                        names.push(name);
                        locations.push(location);
                        var combinedNamesLocations = names.concat(locations);

                        var options = '';

                        for (var i = 0; i < combinedNamesLocations.length; i++) {
                            options += '<option value="' + combinedNamesLocations[i] + '" />';
                        }

                        document.getElementById('browsers').innerHTML = options;
                        //console.log(options);

                        /**var tr_str = "<option>" + name + "</option>" +
                            "<option value=location>" + location + "</option>";**/
                        //console.log(tr_str);
                        //$("#browsers option_1").append(tr_str);
                        /**var locations = [{
                            title: location,
                            info: name,
                            customBase: '0.9',
                            LatLng: [{
                                lat: latitude,
                                lng: longitude
                            }],
                        }]
                        console.log(locations);
                        addMarker(locations);**/

                    }

                    console.log(combinedNamesLocations);
                    addMarker(data, len);
                },

                error: function(err) {
                    console.log(err)
                    alert('There was some error performing the AJAX call!');
                }
            })


        }
        //map
        var Info_Obj = [];
        var centerLocation = {
            lat: 3.839808306619613,
            lng: 102.01325427875862
        };

        /**window.onload = function () {
            initMap();
        };**/

        function addMarker(data, len) {
            var markers = [];
            for (var i = 0; i < len; i++) {
                var contentString =
                    '<div id="pop-up">' +
                    '<p><b>Signage name: </b>' + data[i].name + '</p>' +
                    '<p><b>Location name: </b>' + data[i].location + '</p>' +
                    '<p><b>Custom Base Price: </b>' + data[i].CustomPrice +
                    '<span style="float:right;"><button>Edit</button></span>' + '</p>' +
                    '<button id="myBtn" onclick="popUp();">View Slot</button>' +
                    '</div>';
                //(locations[i]);
                var lat_Int = parseFloat(data[i].latitude);
                var lng_Int = parseFloat(data[i].longitude);
                var combinedLocation = {
                    lat: lat_Int,
                    lng: lng_Int
                };
                //console.log(combinedLocation);

                const marker = new google.maps.Marker({
                    position: combinedLocation,
                    map: map,
                });
                markers.push(marker)

                const infoWindow = new google.maps.InfoWindow({
                    content: contentString,
                });

                marker.addListener('mouseover', function() {

                    closeOtherInfo();
                    infoWindow.open(map, marker);
                    Info_Obj[0] = infoWindow;
                });

            }
            var markerCluster = new MarkerClusterer(map, markers, {
                imagePath: "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
            });

        }

        function closeOtherInfo() {
            if (Info_Obj.length > 0) {
                Info_Obj[0].set("marker", null);
                Info_Obj[0].close();
                Info_Obj[0].length = 0;
            }
        }

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: centerLocation,
                mapId: 'a37cb40a7e8a6a0a', //get it from map styling
            });
            addMarker();
            mapView();
        }
    </script>
    <script>
        function popUp() {
            loadcalendar('1037', '01', '2020', '12');
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            //Get the css for map
            var cssformap1 = document.getElementById("css1");
            var cssformap2 = document.getElementById("css2");
            
            /* When the user clicks the button, open the modal 
            btn.onclick = function() {
                cssformap1.disabled = true;
                cssformap2.disabled = false;
                modal.style.display = "block";
            }*/
            cssformap1.disabled = true;
            cssformap2.disabled = false;
            modal.style.display = "block";

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                cssformap1.disabled = false;
                cssformap2.disabled = true;
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    cssformap1.disabled = false;
                    cssformap2.disabled = true;
                    modal.style.display = "none";
                }
            }

        }
        // Get the modal
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMaBET1XD9xsqpYS05m93XF1xWwTGj1Co&map_ids=a37cb40a7e8a6a0a&callback=initMap&libraries=&v=weekly" async></script>
</body>

</html>