<?php
$I = new ApiGuy($scenario);
$I->am('Account employee');
$I->wantTo('Get denied message when change account');

$I->seeInCollection('account', [
    "uuid" => "11c1c7a50e2c446e9864b29e1064ad30",
    "title" => "Трансэнергосбыт",
]);

$I->haveHttpHeader('Content-Type', 'application/json');
$I->haveHttpHeader('Accept', '*/*');
$I->haveHttpHeader('Authorization', 'Token token="ff3df763a0a89fc86cac89977e1f4794013265d773a2b7f9e488f14d3814bfa3"');
$I->sendPATCH(
    'accounts/11c1c7a50e2c446e9864b29e1064ad30',
    json_encode(['title' => 'Account One'])
);

$I->seeResponseCodeIs(403);
$I->seeResponseIsJson();

$I->seeInCollection('account', [
    "uuid" => "11c1c7a50e2c446e9864b29e1064ad30",
    "title" => "Трансэнергосбыт",
]);

$I->dontSeeInCollection('account', [
    "uuid" => "11c1c7a50e2c446e9864b29e1064ad30",
    "title" => "Account One",
]);

