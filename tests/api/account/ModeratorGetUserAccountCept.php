<?php
$I = new ApiGuy($scenario);
$I->am('System Moderator');
$I->wantTo('Get an information about some account');

$I->dontSeeInCollection('account', [
    'uuid' => '11c1c7a50e2c446e9864b29e1064ad30',
    'staff' => '93456a97789c4538ba8d0e8d7419e658',
]);

$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
$I->sendGET('accounts/11c1c7a50e2c446e9864b29e1064ad30');

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson([
    'uuid' => "11c1c7a50e2c446e9864b29e1064ad30",
    'title' => 'Трансэнергосбыт',
    'created' => 1383672672,
    '_links' => [
        'self' => ['href' => "http://cargo.dev/api/accounts/11c1c7a50e2c446e9864b29e1064ad30"],
    ]
]);
