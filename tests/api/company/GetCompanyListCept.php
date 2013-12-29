<?php
$I = new ApiGuy($scenario);
$I->wantTo('Get a list of all companies in system');
$I->haveHttpHeader('Content-Type', 'application/json');
$I->haveHttpHeader('Accept', '*/*');
$I->haveHttpHeader('X-Auth-UserToken', 'db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2');
$I->sendGET('companies');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array(
    "_embedded" => array(
        "companies" => array(),
    ),
));
$I->SeeResponseContains('"uuid":"afc66c7dd6234e568317e4799068a03b"');
