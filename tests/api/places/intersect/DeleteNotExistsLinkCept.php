<?php
$I = new ApiGuy($scenario);
$I->am('Service Moderator');
$I->wantTo('Try delete not existed link between imported place and internal place');

$I->haveInCollection(
    'externalPlace',
    array('source' => 'vesta', 'id' => '4567', 'link' => null)
);

$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('X-Auth-UserToken','db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2');
$I->sendDELETE('service/import/place-intersect/vesta-4567');

$I->seeResponseCodeIs(422);
