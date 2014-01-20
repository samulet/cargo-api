<?php
$I = new ApiGuy($scenario);
$I->am('System Moderator');
$I->wantTo('Change existed account');

$I->seeInCollection('account', [
    "uuid" => "11c1c7a50e2c446e9864b29e1064ad30",
    "title" => "Трансэнергосбыт",
    "creator.uuid"  => "7e64b31bc7874340bb6ed61cd4735eb3",
]);

$I->haveHttpHeader('Content-Type', 'application/json');
$I->haveHttpHeader('Accept', '*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
$I->sendPATCH(
    'accounts/11c1c7a50e2c446e9864b29e1064ad30',
    json_encode(['title' => 'Account One'])
);

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson([
    "uuid" => "11c1c7a50e2c446e9864b29e1064ad30",
    "title" => "Account One",
    '_links' => [
        'self' => [
            'href' => 'http://cargo.dev/api/accounts/11c1c7a50e2c446e9864b29e1064ad30',
        ],
    ],
]);
$I->seeInCollection(
    'account',
    [
        'uuid' => '11c1c7a50e2c446e9864b29e1064ad30',
        'title' => 'Трансэнергосбыт',
        'deleted' => ['$ne' => null],
        'v' => 0
    ]
);
$I->seeInCollection(
    'account',
    [
        'uuid' => '11c1c7a50e2c446e9864b29e1064ad30',
        'title' => 'Account One',
        'deleted' => null,
        'v' => 1
    ]
);
