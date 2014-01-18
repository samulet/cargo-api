<?php
$I = new ApiGuy($scenario);
$I->am('System Moderator');
$I->wantTo('Get a list of product groups');

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
    [
        'type' => 'prodgroup',
        'code' => 'test',
        'title' => 'TEST',
        'deleted' => new MongoDate(),
    ],
];
foreach ($entities as $entity) {
    $I->haveInCollection('reference', $entity);
}

$I->haveHttpHeader('Content-Type', 'application/json');
$I->haveHttpHeader('Accept', '*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
$I->sendGET('ref/product-group');

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(
    array(
        '_links' => array(
            'self' => array(
                'href' => 'http://cargo.dev/api/ref/product-group'
            )
        ),
        '_embedded' => array(
            'items' => [
                array(
                    'code' => 'milk',
                    'title' => 'Молочные продукты',
                    '_links' => array(
                        'self' => array(
                            'href' => 'http://cargo.dev/api/ref/product-group/milk',
                        ),
                    ),
                ),
                array(
                    'code' => 'frozen',
                    'title' => 'Замороженные продукты',
                    '_links' => array(
                        'self' => array(
                            'href' => 'http://cargo.dev/api/ref/product-group/frozen',
                        ),
                    ),
                ),
            ]
        )
    )
);
