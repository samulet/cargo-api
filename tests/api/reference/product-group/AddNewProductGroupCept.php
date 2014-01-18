<?php
$I = new ApiGuy($scenario);
$I->am('System Moderator');
$I->wantTo('Add new product group');

$I->haveHttpHeader('Content-Type', 'application/json');
$I->haveHttpHeader('Accept', '*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
$I->sendPOST(
    'ref/product-group',
    json_encode(['code' => 'milk', 'title' => 'Молочные продукты'])
);

$I->seeResponseCodeIs(201);
$I->seeResponseIsJson();
$I->seeResponseContainsJson([
    'code' => 'milk',
    'title' => 'Молочные продукты',
]);
$I->seeInCollection(
    'reference',
    ['type' => 'prodgroup', 'code' => 'milk', 'title' => 'Молочные продукты']
);
