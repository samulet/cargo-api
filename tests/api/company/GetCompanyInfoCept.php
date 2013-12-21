<?php
$I = new ApiGuy($scenario);
$I->wantTo('Get a company by UUID');
$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('X-Auth-UserToken','db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2');
$I->sendGET('companies/7e7f422230554465b121c6bb8b313554');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array("short" => "ООО Рога и Ко"));
