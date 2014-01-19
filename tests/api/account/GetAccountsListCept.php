<?php
$I = new ApiGuy($scenario);
$I->am('System Moderator');
$I->wantTo('Get a list of available accounts');

$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
$I->sendGET('accounts?page=1');

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson([
    '_links' => [
        'self' => ['href' => "http://cargo.dev/api/accounts?page=1"],
        'first' => ['href' => "http://cargo.dev/api/accounts"],
        'last' => ['href' => "http://cargo.dev/api/accounts?page=1"],
    ]
]);
$I->seeResponseContainsJson([
    '_embedded' => [
        'accounts' => [
            [
                'uuid' => "b21295c8a94c4bb0a4de07bd2d76ed38",
                'title' => 'Аккаунт нумбер ван',
                'created' => 1382982299,
                '_links' => [
                    'self' => ['href' => "http://cargo.dev/api/accounts/b21295c8a94c4bb0a4de07bd2d76ed38"],
                ]
            ],
            [
                'uuid' => "e1c9c7a50e2c446e9864b29e1064ad39",
                'title' => 'ТЭК Продрезерв',
                'created' => 1383672672,
                '_links' => [
                    'self' => ['href' => "http://cargo.dev/api/accounts/e1c9c7a50e2c446e9864b29e1064ad39"],
                ]
            ],
        ]
    ]
]);
