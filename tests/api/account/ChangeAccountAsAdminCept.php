<?php
$I = new ApiGuy($scenario);
$I->am('Account administrator');
$I->wantTo('Change existed account');

$I->seeInCollection('account', [
    "uuid" => "b21295c8a94c4bb0a4de07bd2d76ed38",
    "title" => "Аккаунт нумбер ван",
    "creator.uuid"  => "93456a97789c4538ba8d0e8d7419e658",
]);

$I->haveHttpHeader('Content-Type', 'application/json');
$I->haveHttpHeader('Accept', '*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
$I->sendPATCH(
    'accounts/b21295c8a94c4bb0a4de07bd2d76ed38',
    json_encode(['title' => 'Account One'])
);

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson([
    "uuid" => "b21295c8a94c4bb0a4de07bd2d76ed38",
    "title" => "Account One",
    '_links' => [
        'self' => [
            'href' => 'http://cargo.dev/api/accounts/b21295c8a94c4bb0a4de07bd2d76ed38',
        ],
    ],
]);
$I->seeInCollection(
    'account',
    [
        'uuid' => 'b21295c8a94c4bb0a4de07bd2d76ed38',
        'title' => 'Аккаунт нумбер ван',
        'deleted' => ['$ne' => null],
        'v' => 0
    ]
);
$I->seeInCollection(
    'account',
    [
        'uuid' => 'b21295c8a94c4bb0a4de07bd2d76ed38',
        'title' => 'Account One',
        'deleted' => null,
        'v' => 1
    ]
);
