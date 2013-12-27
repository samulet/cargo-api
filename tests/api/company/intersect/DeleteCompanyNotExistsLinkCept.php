<?php
$I = new ApiGuy($scenario);
$I->wantTo('Try delete not existed link between imported company and internal company');
$I->seeInCollection('externalCompany', array('source' => 'vesta', 'id' => '28', 'link' => null));
$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('X-Auth-UserToken','db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2');
$I->sendDELETE('service/import/company-intersect/vesta/28');
$I->seeResponseCodeIs(422);
