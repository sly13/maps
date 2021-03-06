ymaps.ready(init);

function init() {
    var geolocation = ymaps.geolocation,
        myMap = new ymaps.Map('map', {
            center: [55, 34],
            zoom: 10,
            controls: []
        }, {
            searchControlProvider: 'yandex#search'
        });

    // Сравним положение, вычисленное по ip пользователя и
    // положение, вычисленное средствами браузера.
/*    geolocation.get({
        provider: 'yandex',
        mapStateAutoApply: true
    }).then(function (result) {
        latitude = result.geoObjects.position[0];
        longitude = result.geoObjects.position[1];

        console.log(result.geoObjects);

        // Красным цветом пометим положение, вычисленное через ip.
        result.geoObjects.options.set('preset', 'islands#redCircleIcon');
        result.geoObjects.get(0).properties.set({
            balloonContentBody: 'Мое местоположение'
        });
        myMap.geoObjects.add(result.geoObjects);
    });*/

    geolocation.get({
        provider: 'browser',
        mapStateAutoApply: true,
    }).then(function (result) {
        latitude = result.geoObjects.position[0];
        longitude = result.geoObjects.position[1];
        // Синим цветом пометим положение, полученное через браузер.
        // Если браузер не поддерживает эту функциональность, метка не будет добавлена на карту.
        result.geoObjects.options.set('preset', 'islands#blueCircleIcon');
        result.geoObjects.options.set('iconLayout', 'default#image');
        result.geoObjects.options.set('iconImageHref', '/images/location.gif');
        result.geoObjects.options.set('iconImageSize', [30, 42]);

        myMap.geoObjects.add(result.geoObjects);
    });

    $('.js-location').on('click', function(){
        $( "input[name='MapForm[latitude]']" ).val(latitude);
        $( "input[name='MapForm[longitude]']" ).val(longitude);
    });

}