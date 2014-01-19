<?php
$I = new ApiGuy($scenario);
$I->am('System Moderator');
$I->wantTo('Delete product group');

$entities = [
    [
        'type' => 'prodgroup',
        'code' => 'milk',
        'title' => 'Молочные продукты'
    ],
    [
        'type' => 'prodgroup',
        'code' => 'frozen',
        'title' => 'Замороженные продукты'
    ],
];
foreach ($entities as $entity) {
    $I->haveInCollection('reference', $entity);
}

$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
$I->sendDELETE('ref/product-group/milk');

$I->seeResponseCodeIs(204);
$I->seeInCollection(
    'reference',
    $entities[0] + ['deleted' => ['$ne' => null]]
);
