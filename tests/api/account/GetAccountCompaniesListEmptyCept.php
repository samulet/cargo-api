<?php
$expectedLinks = array(
    '_links' => array(
        'self' => array(
            'href' => "http://cargo.dev/api/accounts/e1c9c7a50e2c446e9864b29e1064ad39/companies"
        ),
    )
);
$expectedEmbeded = array(
    '_embedded' => array(
        'companies' => array(
        ),
    )
);

$I = new ApiGuy($scenario);
$I->wantTo('Get a empty list of account companies');
$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
$I->sendGET('accounts/e1c9c7a50e2c446e9864b29e1064ad39/companies');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedLinks);
$I->seeResponseContains(trim(json_encode($expectedEmbeded),'{}'));
