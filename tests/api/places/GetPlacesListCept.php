<?php
$I = new ApiGuy($scenario);
$I->wantTo('Get a list of all companies in system');

$I->haveInCollection('place', [
    "uuid" => "918a1a12d1784a4cbb2f4360cd1a4d07",
    "name" => "Веневская (Грин Трейд)",
    "company" => [
        "id" => new MongoId("52b2480f9e53462e6e8b456e"),
        "name" => "demo56",
        "uuid" => "c14bfc17646343b4afc037fb3c8c5391",
    ],
    "purpose" => [ 'ul' ],
    "address" => [
        "country" => "Российская Федерация",
        "city" => "Москва",
        "street" => "Веневская, ул",
        "house" => "6"
    ],
    "created" => new MongoDate(1388831431000),
    "creator" => [
        "id" => new MongoId("52a4b7519e534607468b456f"),
        "name" => "Some User",
        "uuid" => "93456a97789c4538ba8d0e8d7419e658"
    ]
]);

$I->haveHttpHeader('Content-Type', 'application/json');
$I->haveHttpHeader('Accept', '*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
$I->sendGET('places');

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array(
    "_embedded" => array(
        "places" => array(),
    ),
));
$I->SeeResponseContains('"uuid":"918a1a12d1784a4cbb2f4360cd1a4d07"');
