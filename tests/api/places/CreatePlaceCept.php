<?php
$I = new ApiGuy($scenario);
$I->wantTo('create a new place via API');
$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('X-Auth-UserToken','db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2');
$record = array(
    'name' => "Веневская (Грин Трейд)",
    'address' => array(
        'country' => "Российская Федерация",
        'city' => "Москва",
        'street' => "Веневская, ул",
        'house' => "6",
    ),
    'company' => array(
        'uuid' => "c14bfc17646343b4afc037fb3c8c5391"
    ),
);
$I->sendPOST('places', $record);
$I->seeResponseCodeIs(201);
$I->seeResponseIsJson();
$record['company']['name'] = "demo56";
$record['creator'] = array('name' => 'Some User', 'uuid' => '93456a97789c4538ba8d0e8d7419e658');
$I->seeResponseContainsJson($record);
$I->seeInCollection('place', array('name' => "Веневская (Грин Трейд)"));
