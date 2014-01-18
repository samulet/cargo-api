<?php
$I = new ApiGuy($scenario);
$I->wantTo('create a account via API');
$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
$I->sendPOST('accounts', array('title' => 'Test account'));
$I->seeResponseCodeIs(201);
$I->seeResponseIsJson();
$I->seeResponseContains('"title":"Test account"');
$I->seeInCollection('account', array('title' => 'Test account'));
