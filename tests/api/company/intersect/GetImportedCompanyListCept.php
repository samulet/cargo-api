<?php
$I = new ApiGuy($scenario);
$I->wantTo('Get a list of companies imported from external services');
$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
$I->sendGET('service/import/company-intersect');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array(
    "_embedded" => array(
        "companies" => array(
        ),
    ),
));
$I->seeResponseContains(json_encode(
    array(
        'code' => 'vesta-9',
        'id' => '9',
        'source' => 'vesta',
        'name' => 'Перевозчик Вася',
        'link' => 'afc66c7dd6234e568317e4799068a03b',
        '_links' => array(
            'self' => array(
                'href' => 'http://cargo.dev/api/service/import/company-intersect/vesta-9',
            ),
        ),
    )
));
