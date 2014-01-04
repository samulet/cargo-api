<?php
$expectedLinks = array(
    '_links' => array(
        'self' => array(
            'href' => "http://cargo.dev/api/accounts/b21295c8a94c4bb0a4de07bd2d76ed38/companies?page=1"
        ),
        'first' => array(
            'href' => "http://cargo.dev/api/accounts/b21295c8a94c4bb0a4de07bd2d76ed38/companies"
        ),
        'last' => array(
            'href' => "http://cargo.dev/api/accounts/b21295c8a94c4bb0a4de07bd2d76ed38/companies?page=1"
        ),
    )
);
$expectedEmbeded = array(
    '_embedded' => array(
        'companies' => array(
            "uuid" => "c14bfc17646343b4afc037fb3c8c5391",
        ),
    )
);

$I = new ApiGuy($scenario);
$I->wantTo('Get a list of account companies');
$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('X-Auth-UserToken','db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2');
$I->sendGET('accounts/b21295c8a94c4bb0a4de07bd2d76ed38/companies?page=1');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedLinks);
$I->seeResponseContainsJson($expectedEmbeded);
