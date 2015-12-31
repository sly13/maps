// Группы объектов

var groups;

$.ajax({
    'type' : 'GET',
    'url' : 'get-dots',
    'success' : function (responce) {
        groups = JSON.parse(responce);
        ymaps.ready(init);
    }
});



var latitude,longitude;
function init () {

    var myMap = new ymaps.Map('map', {
        center: [55.188977 , 30.247075],
        zoom: 12,
        controls: ['zoomControl', 'geolocationControl', 'typeSelector', 'fullscreenControl']
    }, {
        searchControlProvider: 'yandex#search'
    });

    /*firstButton = new ymaps.control.Button("<img id ='showLeft' src='/images/filter2.png'>");

    myMap.controls.add(firstButton, {float: 'right'});*/

    ButtonLayout = ymaps.templateLayoutFactory.createClass(
        "<button id='showLeft'>" + "<img src='/images/filter2.png'>" +
        "{{data.content}}" +
        "</button>"
    ),

        button = new ymaps.control.Button({
            options: {
                layout: ButtonLayout
            }
        });

    myMap.controls.add(button, {
        float: 'right'
    });


    myGeoObject = new ymaps.GeoObject();
    for (var i = 0; i < groups.length; i++) {
        console.log(groups[i].items);
        myMap.geoObjects.add(new ymaps.Placemark(groups[i].items.center, {
            balloonContent: groups[i].items.balloonContent
        }, {
            preset: groups[i].items.preset,
            iconColor: groups[i].items.color
        }));
    }
}
