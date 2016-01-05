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
        controls: ['zoomControl', 'typeSelector', 'fullscreenControl']
    }, {
        searchControlProvider: 'yandex#search'
    });

    /*ButtonLayout = ymaps.templateLayoutFactory.createClass(
        "<button class='showLeft'>" + "<img src='/images/filter2.png'>" +
        "</button>"
    ),

    button = new ymaps.control.Button({
        options: {
            layout: ButtonLayout
        }
    });

    myMap.controls.add(button, {
        float: 'right'
    });*/

    myGeoObject = new ymaps.GeoObject();
    for (var i = 0; i < groups.length; i++) {
        console.log(groups[i]);
        placeMarker = new ymaps.Placemark(groups[i].center, {
            balloonContent: groups[i].balloonContent
        }, {
            preset: groups[i].preset,
            iconColor: groups[i].color,
                iconLayout: 'default#image',
                // Своё изображение иконки метки.
                iconImageHref: groups[i].image,
                // Размеры метки.
                iconImageSize: [30, 42],
                // Смещение левого верхнего угла иконки относительно
                // её "ножки" (точки привязки).
                //iconImageOffset: [-3, -42]
        });

        myMap.geoObjects.add(placeMarker);
    }
}
