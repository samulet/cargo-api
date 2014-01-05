<?php
$I = new ApiGuy($scenario);
$I->wantTo('Get a list of places imported from external services');

$entities = [
    [
        "source" => "vesta",
        "id" => "6",
        "city" => [
            "id" => "5",
            "name" => "Батайск",
            "daysForReturn" => "7",
            "timezone" => "0",
            "forwarderTariff" => "0",
            "resalerName" => "",
            "resalerPhone" => "",
            "activity" => "0",
            "coordinates" => ""
        ],
        "net" => ["id" => "29", "name" => "Орел"],
        "type" => "dp",
        "legal" => ["id" => "0", "name" => ""],
        "stId" => "1",
        "name" => "Сити Филион",
        "adress" => "Москва, Багратионовский проезд, д.5",
        "phone" => "",
        "consigneeName" => "",
        "consignee" => "",
        "activity" => "0",
        "isLocal" => "0",
        "localTypeId" => "0",
        "id1s" => "384",
        "directDelivery" => "0",
        "unloadingTime" => "00:00:00",
        "isConsolidating" => "0",
        "code1c" => "",
        "coordinates" => ""
    ],
    [
        "source" => "vesta",
        "id" => "216",
        "city" => [
            "id" => "49",
            "name" => "Череповец",
            "daysForReturn" => "3",
            "timezone" => "0",
            "forwarderTariff" => "0",
            "resalerName" => "",
            "resalerPhone" => "",
            "activity" => "0",
            "coordinates" => ""
        ],
        "net" => ["id" => "18", "name" => "Кемерово"],
        "type" => "dp",
        "legal" => ["id" => "0", "name" => ""],
        "stId" => "1",
        "name" => "Иремель",
        "adress" => "Уфа, ул. Менделеева, д.137\r\nКруглосуточно",
        "phone" => "7 (347) 226-72-79\r\n",
        "consigneeName" => "",
        "consignee" => "",
        "activity" => "1",
        "isLocal" => "0",
        "localTypeId" => "0",
        "id1s" => "433",
        "directDelivery" => "0",
        "unloadingTime" => "00:00:00",
        "isConsolidating" => "0",
        "code1c" => "",
        "coordinates" => ""
    ],
    [
        "source" => "prodrezerv",
        "id" => "10",
        "city" => [
            "id" => "0",
            "name" => "",
            "daysForReturn" => "0",
            "timezone" => "0",
            "forwarderTariff" => "0",
            "resalerName" => "",
            "resalerPhone" => "",
            "activity" => "0",
            "coordinates" => ""
        ],
        "net" => ["id" => "0", "name" => ""],
        "type" => "wh",
        "legal" => ["id" => "218", "name" => "ООО \"Аппетит\""],
        "stId" => "0",
        "name" => "Склад Продрезерв СПб Аппетит",
        "adress" => "г. Санкт-Петербург, ул. Октябрьская наб., 104",
        "phone" => "",
        "consigneeName" => "",
        "consignee" => "",
        "activity" => "0",
        "isLocal" => "0",
        "localTypeId" => "0",
        "id1s" => "0",
        "directDelivery" => "0",
        "unloadingTime" => "",
        "isConsolidating" => "0",
        "code1c" => "",
        "coordinates" => ""
    ]
];
foreach ($entities as $entity) {
    $I->haveInCollection('externalPlace', $entity);
}

$I->haveHttpHeader('Content-Type', 'application/json');
$I->haveHttpHeader('Accept', '*/*');
$I->haveHttpHeader('X-Auth-UserToken', 'db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2');
$I->sendGET('service/import/place-intersect');

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(
    array(
        '_links' => array(
            'self' => array(
                'href' => 'http://cargo.dev/api/service/import/place-intersect'
            )
        ),
        '_embedded' => array(
            'places' => [
                $entities[0] + array(
                    'code' => 'vesta-6',
                    '_links' => array(
                        'self' => array(
                            'href' => 'http://cargo.dev/api/service/import/place-intersect/vesta-6',
                        ),
                    ),
                ),
                $entities[1] + array(
                    'code' => 'vesta-216',
                    '_links' => array(
                        'self' => array(
                            'href' => 'http://cargo.dev/api/service/import/place-intersect/vesta-216',
                        ),
                    ),
                ),
                $entities[2] + array(
                    'code' => 'prodrezerv-10',
                    '_links' => array(
                        'self' => array(
                            'href' => 'http://cargo.dev/api/service/import/place-intersect/prodrezerv-10',
                        ),
                    ),
                ),
            ]
        )
    )
);
