<?php
$expectedLinks = array(
    '_links' => array(
        'self' => array(
            'href' => "http://cargo.dev/api/accounts?page=1"
        ),
        'first' => array(
            'href' => "http://cargo.dev/api/accounts"
        ),
        'last' => array(
            'href' => "http://cargo.dev/api/accounts?page=1"
        ),
    )
);
$expectedEmbeded = array(
    '_embedded' => array(
        'accounts' => array(
            array(
                'account_uuid' => "b21295c8a94c4bb0a4de07bd2d76ed38",
                'title' => 'Аккаунт нумбер ван',
                'created_at' => 1382982299,
                '_links' => array(
                    'self' => array(
                        'href' => "http://cargo.dev/api/accounts/b21295c8a94c4bb0a4de07bd2d76ed38",
                    ),
                )
            ),
            array(
                'account_uuid' => "e1c9c7a50e2c446e9864b29e1064ad39",
                'title' => 'ТЭК Продрезерв',
                'created_at' => 1383672672,
                '_links' => array(
                    'self' => array(
                        'href' => "http://cargo.dev/api/accounts/e1c9c7a50e2c446e9864b29e1064ad39",
                    ),
                )
            ),
        )
    )
);

$I = new ApiGuy($scenario);
$I->wantTo('Get a list of available accounts');
$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('X-Auth-UserToken','db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2');
$I->sendGET('accounts?page=1');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedLinks);
$I->seeResponseContainsJson($expectedEmbeded);
