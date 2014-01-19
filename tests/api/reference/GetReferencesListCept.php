<?php
$I = new ApiGuy($scenario);
$I->am('Service Moderator');
$I->wantTo('Get a list of all references');

$I->haveHttpHeader('Content-Type', 'application/json');
$I->haveHttpHeader('Accept', '*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
$I->sendGET('ref');

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array(
    '_links' => [
        "self" => [
            "href" => "http://cargo.dev/api/ref"
        ]
    ],
    "_embedded" => [
        "references" => [
            [
                'code' => 'product-group',
                'title' => 'Продуктовые группы',
                '_links' => [
                    "self" => [
                        "href" => "http://cargo.dev/api/ref/product-group"
                    ]
                ],
            ],
        ],
    ],
));
