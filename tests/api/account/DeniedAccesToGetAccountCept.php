<?php
$I = new ApiGuy($scenario);
$I->am('Common user');
$I->wantTo('Get a denied access message');

$I->haveInCollection('auth_token', [
    "token" => "be52190f7300076467",
    "user" => new MongoId("52b010469e53462e6e8b456c"),
    "createdAt" => new MongoDate()
]);

$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('Authorization', 'Token token="be52190f7300076467"');
$I->sendGET('accounts/b21295c8a94c4bb0a4de07bd2d76ed38');

$I->seeResponseCodeIs(403);
$I->seeResponseIsJson();
