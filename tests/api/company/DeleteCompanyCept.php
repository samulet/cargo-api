<?php
$I = new ApiGuy($scenario);
$I->wantTo('Delete company');

$I->haveInCollection('company', [
    "uuid" => "e1c9c7a50e2c446e9864b29e1064ad39",
    "created" => new MongoDate(strtotime("2013-12-11T20:58:51.0Z")),
    "short" => "ООО Рога и Ко",
    "inn" => "1231231234",
    "deleted" => null,
]);

$I->haveHttpHeader('Content-Type', 'application/json');
$I->haveHttpHeader('Accept', '*/*');
$I->haveHttpHeader('X-Auth-UserToken', 'db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2');
$I->sendDELETE('companies/e1c9c7a50e2c446e9864b29e1064ad39');

$I->seeResponseCodeIs(204);
$I->seeInCollection(
    'company',
    array('uuid' => 'e1c9c7a50e2c446e9864b29e1064ad39', 'deleted' => array('$ne' => null))
);
