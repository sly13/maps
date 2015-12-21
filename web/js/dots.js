// Группы объектов
var groups = [
    {
        name: "Известные памятники",
        style: "islands#redIcon",
        items: [
            {
                center: [50.426472, 30.563022],
                name: "Монумент &quot;Родина-Мать&quot;"
            },
            {
                center: [50.45351, 30.516489],
                name: "Памятник &quot;Богдану Хмельницкому&quot;"
            },
            {
                center: [50.454433, 30.529874],
                name: "Арка Дружбы народов"
            }
        ]},
    {
        name: "Покушайки",
        style: "islands#greenIcon",
        items: [
            {
                center: [50.50955, 30.60791],
                name: "Ресторан &quot;Калинка-Малинка&quot;"
            },
            {
                center: [50.429083, 30.521708],
                name: "Бар &quot;Сало-бар&quot;"
            },
            {
                center: [50.450843, 30.498271],
                name: "Абсент-бар &quot;Палата №6&quot;"
            },
            {
                center: [50.454834, 30.516498],
                name: "Ресторан &quot;Спотыкач&quot;"
            }
        ]},
    {
        name: "Оригинальные музейчики",
        style: "islands#orangeIcon",
        items: [
            {
                center: [50.443334, 30.520163],
                name: "Музей грамзаписи и старинных музыкальных инструментов"
            },
            {
                center: [50.446977, 30.505269],
                name: "Музей истории медицины или Анатомический театр"
            },
            {
                center: [50.452512, 30.530889],
                name: "Музей воды. Водно-информационный центр"
            }
        ]},
    {
        name: "Красивости",
        style: "islands#blueIcon",
        items: [
            {
                center: [50.45987, 30.516174],
                name: "Замок Ричарда-Львиное сердце"
            },
            {
                center: [50.445049, 30.528598],
                name: "&quot;Дом с химерами&quot;"
            },
            {
                center: [50.449156, 30.511809],
                name: "Дом Рыцаря"
            }
        ]}
];

ymaps.ready(init);

function init() {

    // Создание экземпляра карты.
    var myMap = new ymaps.Map('map', {
            center: [50.443705, 30.530946],
            zoom: 14
        }, {
            searchControlProvider: 'yandex#search'
        }),
    // Контейнер для меню.
        menu = $('<ul class="menu"></ul>');

    for (var i = 0, l = groups.length; i < l; i++) {
        createMenuGroup(groups[i]);
    }

    function createMenuGroup (group) {
        // Пункт меню.
        var menuItem = $('<li><a href="#">' + group.name + '</a></li>'),
        // Коллекция для геообъектов группы.
            collection = new ymaps.GeoObjectCollection(null, { preset: group.style }),
        // Контейнер для подменю.
            submenu = $('<ul class="submenu"></ul>');

        // Добавляем коллекцию на карту.
        myMap.geoObjects.add(collection);

        // Добавляем подменю.
        menuItem
            .append(submenu)
            // Добавляем пункт в меню.
            .appendTo(menu)
            // По клику удаляем/добавляем коллекцию на карту и скрываем/отображаем подменю.
            .find('a')
            .toggle(function () {
                myMap.geoObjects.remove(collection);
                submenu.hide();
            }, function () {
                myMap.geoObjects.add(collection);
                submenu.show();
            });
        for (var j = 0, m = group.items.length; j < m; j++) {
            createSubMenu(group.items[j], collection, submenu);
        }
    }

    function createSubMenu (item, collection, submenu) {
        // Пункт подменю.
        var submenuItem = $('<li><a href="#">' + item.name + '</a></li>'),
        // Создаем метку.
            placemark = new ymaps.Placemark(item.center, { balloonContent: item.name });

        // Добавляем метку в коллекцию.
        collection.add(placemark);
        // Добавляем пункт в подменю.
        submenuItem
            .appendTo(submenu)
            // При клике по пункту подменю открываем/закрываем баллун у метки.
            .find('a')
            .toggle(function () {
                placemark.balloon.open();
            }, function () {
                placemark.balloon.close();
            });
    }

    // Добавляем меню в тэг BODY.
    menu.appendTo($('body'));
    // Выставляем масштаб карты чтобы были видны все группы.
    myMap.setBounds(myMap.geoObjects.getBounds());
}