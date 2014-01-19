<?php
$I = new ApiGuy($scenario);
$I->wantTo('change a user profile via API');

$I->haveInCollection('user', array(
    "uuid" => "e35cdcdacd6c46c9a3fb2f58f2ae1e33",
    "email" => "test@mail.ru",
    "displayName" => "Test User",
    "password" => "password",
    "created" => new MongoDate(),
    "updated" => null,
    "roles" => array("user"),
));

$I->haveHttpHeader('Content-Type', 'application/json');
$I->haveHttpHeader('Accept', '*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
$I->sendPATCH('profiles/e35cdcdacd6c46c9a3fb2f58f2ae1e33', array(
    "uuid" => "e35cdcdacd6c46c9a3fb2f58f2ae1e33",
    "email" => "newtest@mail.ru",
    "displayName" => "New Test User",
));

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('"email":"newtest@mail.ru"');
$I->seeInCollection('user', array(
    "uuid" => "e35cdcdacd6c46c9a3fb2f58f2ae1e33",
    "email" => "newtest@mail.ru",
    "displayName" => "New Test User",
    "password" => "password",
    "created" => ['$ne' => null],
    "updated" => ['$ne' => null],
    "roles" => array("user"),
));
