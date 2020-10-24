function initMap () {
    var selectedAddress = document.getElementById("address").value;
    var selectedOption = [];
    var arr = [];
    if ( selectedAddress != "" ) {
        $.ajax({
            type: "POST",
            url: '/addressesExcludingInputedValue',
            data: {selectedAddress},
            success: function(data) {
                if (data.length > 1) {
                    var len = data.length;
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode( { 'address': selectedAddress}, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            var latitude = results[0].geometry.location.lat();
                            var longitude = results[0].geometry.location.lng();
                            selectedOption.push({'latitude': latitude, 'longitude': longitude});
                            for (var i = 0; i < len; i ++) {
                                var options = {
                                    'id': data[i].id,
                                    'address': data[i].address,
                                    'distance': calcurateDistance(selectedOption, data[i]),
                                    'email': data[i].email,
                                }                            
                                arr.push(options);
                            }
                            var realLen = arraySort(arr).length;
                            var realArr = arraySort(arr);
                            document.getElementById('tutorList').innerHTML = "";
                            for (var j = 0; j < realLen; j ++) {
                                document.getElementById('tutorList').innerHTML += "<li>";
                                document.getElementById('tutorList').innerHTML += realArr[j].email;
                                document.getElementById('tutorList').innerHTML += "(";
                                document.getElementById('tutorList').innerHTML += realArr[j].address;
                                document.getElementById('tutorList').innerHTML += ")";
                                document.getElementById('tutorList').innerHTML += "</li>";
                            }
                        } 
                    });
                    
                } else if (data.length == 1) {
                } else if (data.length == 0) {
                    $('#tutorList').html("Not found");
                }
            }
        });
    }
}

function calcurateDistance (mk1, mk2) {
    var R = 3958.8; // Radius of the Earth in miles
    var rlat1 = mk1[0].latitude * (Math.PI / 180);
    var rlat2 = mk2.latitude * (Math.PI / 180);
    var difflat = rlat2 - rlat1; // Radian difference (latitudes)
    var difflon = (mk2.longitude - mk1[0].longitude) * (Math.PI / 180); // Radian difference (longitudes)
    var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat / 2) * Math.sin(difflat / 2) + Math.cos(rlat1) * Math.cos(rlat2) * Math.sin(difflon / 2) * Math.sin(difflon / 2)));
    return d;
}
/* Distance calcuration with two array */ 

function arraySort ( array ) {
    var done = false;
    while (!done) {
        done = true;
        for (var i = 1; i < array.length; i += 1) {
            if (array[i - 1].distance > array[i].distance) {
                done = false;
                var tmp = array[i - 1];
                array[i - 1] = array[i];
                array[i] = tmp;
            }
        }
    }
    return array;
}/* Sorting array from nearest to farest */
