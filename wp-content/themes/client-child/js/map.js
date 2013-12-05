jQuery(document).ready(function(){
    if (document.getElementById('maps')) {
        xy = googleWidgetData.coordinats.split(',');
        var myOptions1 = { 
            center: new google.maps.LatLng(xy[0],xy[1]), 
            zoom: 15,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map1 = new google.maps.Map(document.getElementById('maps'),myOptions1);
        var marker1 = new google.maps.Marker({
            position: new google.maps.LatLng(xy[0],xy[1]),
            map: map1,
            title:googleWidgetData.text
        });
    }    
})