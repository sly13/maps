$(document).ready(function(){

    /*ymaps.ready(function () {
        var map;
        ymaps.geolocation.get().then(function (res) {
            console.log(res);
            var mapContainer = $('#map'),
                bounds = res.geoObjects.get(0).properties.get('boundedBy'),
            // Рассчитываем видимую область для текущей положения пользователя.
                mapState = ymaps.util.bounds.getCenterAndZoom(
                    bounds,
                    [mapContainer.width(), mapContainer.height()]
                );
            createMap(mapState);
        }, function (e) {
            // Если место положение невозможно получить, то просто создаем карту.
            createMap({
                center: [55.751574, 37.573856],
                zoom: 2
            });
        });

        function createMap (state) {
            map = new ymaps.Map('map', state);
        }
    });*/

    ymaps.ready(init);

    function init() {
        var geolocation = ymaps.geolocation,
            myMap = new ymaps.Map('map', {
                center: [55, 34],
                zoom: 10,
                //controls: []
            }, {
                searchControlProvider: 'yandex#search'
            });

        geolocation.get({
            provider: 'browser',
            mapStateAutoApply: true,
        }).then(function (result) {
            latitude = result.geoObjects.position[0];
            longitude = result.geoObjects.position[1];
            console.log(latitude, longitude);
            // Синим цветом пометим положение, полученное через браузер.
            // Если браузер не поддерживает эту функциональность, метка не будет добавлена на карту.
            result.geoObjects.options.set('preset', 'islands#blueCircleIcon');
            result.geoObjects.options.set('iconLayout', 'default#image');
            result.geoObjects.options.set('iconImageHref', '/images/location.gif');
            result.geoObjects.options.set('iconImageSize', [30, 42]);

            myMap.geoObjects.add(result.geoObjects);
        });

        $('.js-flat-location').on('click', function(){
            $( "input[name='FlatForm[latitude]']" ).val(latitude);
            $( "input[name='FlatForm[longitude]']" ).val(longitude);
        });

    }
});