<?php
$I = new ApiGuy($scenario);
$I->am('Common user');
$I->wantTo('Get a list of available accounts');

$I->haveInCollection('auth_token', [
    "token" => "be52190f7300076467",
    "user" => new MongoId("52b010469e53462e6e8b456c"),
    "createdAt" => new MongoDate()
]);

$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('Authorization', 'Token token="be52190f7300076467"');
$I->sendGET('accounts');

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson([
    '_links' => [
        'self' => ['href' => "http://cargo.dev/api/accounts"],
    ]
]);
$I->seeResponseContainsJson([
    '_embedded' => [
        'accounts' => [
            [
                'uuid' => "a2c9c7a50e2c446e9864b29e1064ad40",
                'title' => 'Рога и Ко',
                'created' => 1383672672,
                '_links' => [
                    'self' => ['href' => "http://cargo.dev/api/accounts/a2c9c7a50e2c446e9864b29e1064ad40"],
                ]
            ],
            [
                'uuid' => "11c1c7a50e2c446e9864b29e1064ad30",
                'title' => 'Трансэнергосбыт',
                'created' => 1383672672,
                '_links' => [
                    'self' => ['href' => "http://cargo.dev/api/accounts/11c1c7a50e2c446e9864b29e1064ad30"],
                ]
            ],
        ]
    ]
]);
