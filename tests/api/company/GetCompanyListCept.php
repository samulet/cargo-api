<?php
$I = new ApiGuy($scenario);
$I->wantTo('Get a list of all companies in system');

$I->haveHttpHeader('Content-Type', 'application/json');
$I->haveHttpHeader('Accept', '*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
$I->sendGET('companies');

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array(
    "_embedded" => array(
        "companies" => array(),
    ),
));
$I->SeeResponseContains('"uuid":"7e7f422230554465b121c6bb8b313554"');
