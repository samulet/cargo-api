<?php
$I = new ApiGuy($scenario);
$I->am('System Moderator');
$I->wantTo('Get an information about some account');

$I->dontSeeInCollection('account', [
    'uuid' => 'a2c9c7a50e2c446e9864b29e1064ad40',
    'staff' => '93456a97789c4538ba8d0e8d7419e658',
]);

$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
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
