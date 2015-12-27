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
        //controls: ['geolocationControl']
    }, {
        searchControlProvider: 'yandex#search'
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
