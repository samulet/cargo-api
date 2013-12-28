<?php
$I = new ApiGuy($scenario);
$I->wantTo('Delete link between imported company and internal company');
$I->seeInCollection('externalCompany', array('source' => 'vesta', 'id' => '9', 'link' => 'afc66c7dd6234e568317e4799068a03b'));
$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('X-Auth-UserToken','db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2');
$I->sendDELETE('service/import/company-intersect/vesta-9');
$I->seeResponseCodeIs(204);
$I->seeInCollection('externalCompany', array('source' => 'vesta', 'id' => '9', 'link' => null));
