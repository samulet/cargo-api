<?php
$I = new ApiGuy($scenario);
$I->wantTo('create a user profile via API');
$I->haveHttpHeader('Content-Type', 'application/json');
$I->haveHttpHeader('Accept', '*/*');
$I->haveHttpHeader('X-Auth-UserToken', 'db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2');
$I->sendPOST('profiles', array(
    "email" => "test@mail.ru",
    "displayName" => "Test User",
    "password" => "password",
    "roles" => ["user"],
));
$I->seeResponseCodeIs(201);
$I->seeResponseIsJson();
$I->seeResponseContains('"email":"test@mail.ru"');
$I->seeInCollection('user', array(
    "email" => "test@mail.ru",
    "displayName" => "Test User",
    "password" => "password",
    "roles" => "user",
    "created" => ['$ne' => null],
    "uuid" => ['$ne' => null],
));
