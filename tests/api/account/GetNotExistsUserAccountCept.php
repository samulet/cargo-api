<?php
$I = new ApiGuy($scenario);
$I->am('Common user');
$I->wantTo('Get a empty response for non exists account');

$I->haveInCollection('auth_token', [
    "token" => "be52190f7300076467",
    "user" => new MongoId("52b010469e53462e6e8b456c"),
    "createdAt" => new MongoDate()
]);
$I->dontSeeInCollection('account', ['uuid' => 'a2c9c7a50e2c446e9864b29e1064ad99']);

$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('Authorization', 'Token token="be52190f7300076467"');
$I->sendGET('accounts/a2c9c7a50e2c446e9864b29e1064ad99');

$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
