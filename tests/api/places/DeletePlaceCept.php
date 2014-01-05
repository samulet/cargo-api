<?php
$I = new ApiGuy($scenario);
$I->am('Service Moderator');
$I->wantTo('Delete existed place');

$I->haveInCollection('place', [
    "uuid" => "c77884a0764e11e3ad4e080027ab4d7b",
    "name" => "Веневская (Грин Трейд)",
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
    ],
    "deleted" => null,
]);

$I->haveHttpHeader('Content-Type', 'application/json');
$I->haveHttpHeader('Accept', '*/*');
$I->haveHttpHeader('X-Auth-UserToken', 'db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2');
$I->sendDELETE('places/c77884a0764e11e3ad4e080027ab4d7b');

$I->seeResponseCodeIs(204);
$I->seeInCollection(
    'place',
    array('uuid' => 'c77884a0764e11e3ad4e080027ab4d7b', 'deleted' => array('$ne' => null))
);
