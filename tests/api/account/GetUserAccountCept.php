<?php
$I = new ApiGuy($scenario);
$I->am('Common user');
$I->wantTo('Get a information about account');

$I->haveInCollection('auth_token', [
    "token" => "be52190f7300076467",
    "user" => new MongoId("52b010469e53462e6e8b456c"),
    "createdAt" => new MongoDate()
]);

$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('Authorization', 'Token token="be52190f7300076467"');
$I->sendGET('accounts/a2c9c7a50e2c446e9864b29e1064ad40');

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson([
    'uuid' => "a2c9c7a50e2c446e9864b29e1064ad40",
    'title' => 'Рога и Ко',
    'created' => 1383672672,
    '_links' => [
        'self' => ['href' => "http://cargo.dev/api/accounts/a2c9c7a50e2c446e9864b29e1064ad40"],
    ]
]);
