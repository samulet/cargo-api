<?php
$I = new ApiGuy($scenario);
$I->wantTo('Add link between imported company and internal company');
$I->seeInCollection('externalCompany', array('source' => 'vesta', 'id' => '29', 'link' => null));
$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
$I->sendPOST('service/import/company-intersect', json_encode(array('source'=>'vesta', 'id' => '29', 'company' => 'afc66c7dd6234e568317e4799068a03b')));
$I->seeResponseCodeIs(201);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(
    array(
        'code' => 'vesta-29',
        'source' => 'vesta',
        'id' => '29',
        'link' => 'afc66c7dd6234e568317e4799068a03b',
        '_links' => array(
            'self' => array(
                'href' => 'http://cargo.dev/api/service/import/company-intersect/vesta-29',
            ),
        ),
    )
);
$I->seeInCollection('externalCompany', array('source' => 'vesta', 'id' => '29', 'link' => 'afc66c7dd6234e568317e4799068a03b'));
