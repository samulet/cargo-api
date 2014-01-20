<?php
$I = new ApiGuy($scenario);
$I->am('Common user');
$I->wantTo('create a account via API');

$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('Authorization', 'Token token="ff3df763a0a89fc86cac89977e1f4794013265d773a2b7f9e488f14d3814bfa3"');
$I->sendPOST('accounts', array('title' => 'Test account'));

$I->seeResponseCodeIs(201);
$I->seeResponseIsJson();
$I->seeResponseContains('"title":"Test account"');

$I->seeInCollection('account', [
    'title' => 'Test account',
    'creator.name' => "Алексей Попов" ,
    'creator.uuid' => "c9579582de5940b0853c7b07c1112576",
    'staff' => 'c9579582de5940b0853c7b07c1112576',
]);
