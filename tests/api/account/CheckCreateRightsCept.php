<?php
$I = new ApiGuy($scenario);
$I->wantTo('Check that the error is returned if the user does not have permission');
$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('X-Auth-UserToken','db057553f1a4989210ae84a2825982e1d04d65e1fcecb619fb77e26879a26903');
$I->sendPOST('accounts', array('title' => 'Test account'));
$I->seeResponseCodeIs(403);
$I->seeResponseIsJson();
$I->seeResponseContains('{"problemType":"http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html","title":"Forbidden","httpStatus":403,"detail":"Insufficient permissions to perform the account creation"}');
$I->dontSeeInCollection('account', array('title' => 'Test account'));
