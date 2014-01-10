<?php
$I = new ApiGuy($scenario);
$I->am('System Moderator');
$I->wantTo('Get a list of non deleted companies');

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
$I->seeResponseContains('"uuid":"7e7f422230554465b121c6bb8b313554"');
$I->seeResponseContains('"uuid":"7fa1a29e95c949c8ae27ca0d6bfd0e70"');
$I->dontSeeResponseContains('"uuid":"c14bfc17646343b4afc037fb3c8c5391"');
