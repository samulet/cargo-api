<?php
$I = new ApiGuy($scenario);
$I->wantTo('Check that the error is returned if the user does not have permission');
$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('Authorization', 'Token token="e7ef06c7e36e304be52190f73000764670d1ed4e5a25b06"');
$I->sendGET('accounts');
$I->seeResponseCodeIs(403);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(
    array(
        "type" => "http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html",
        "title" => "Forbidden",
        "status" => 403,
        "detail" => "Forbidden"
    )
);
