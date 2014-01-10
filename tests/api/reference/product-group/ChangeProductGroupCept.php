<?php
$I = new ApiGuy($scenario);
$I->am('System Moderator');
$I->wantTo('Change existed product group');

$entities = [
    [
        'type' => 'prodgroup',
        'code' => 'milk',
        'title' => 'Молочные продукты',
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

$I->haveHttpHeader('Content-Type', 'application/json');
$I->haveHttpHeader('Accept', '*/*');
$I->haveHttpHeader('X-Auth-UserToken', 'db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2');
$I->sendPATCH(
    'ref/product-group/milk',
    json_encode(['title' => 'Промышленное обородувание'])
);

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson([
    'code' => 'milk',
    'title' => 'Промышленное обородувание',
    '_links' => [
        'self' => [
            'href' => 'http://cargo.dev/api/ref/product-group/milk',
        ],
    ],
]);
$I->seeInCollection(
    'reference',
    ['type' => 'prodgroup', 'code' => 'milk', 'title' => 'Молочные продукты', 'deleted' => ['$ne' => null]]
);
$I->seeInCollection(
    'reference',
    ['type' => 'prodgroup', 'code' => 'milk', 'title' => 'Промышленное обородувание', 'deleted' => null]
);
