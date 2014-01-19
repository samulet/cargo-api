<?php
$I = new ApiGuy($scenario);
$I->am('Admin');
$I->wantTo('Create internal company from external company data');
$I->seeInCollection('externalCompany', array('source' => 'vesta', 'id' => '29', 'link' => null));
$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('Authorization', 'Token token="db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2"');
$I->sendPOST('service/import/company-intersect', json_encode(array('source'=>'vesta', 'id' => '29', 'company' => null)));
$I->seeResponseCodeIs(201);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(
    array(
        'code' => 'vesta-29',
        'source' => 'vesta',
        'id' => '29',
        '_links' => array(
            'self' => array(
                'href' => 'http://cargo.dev/api/service/import/company-intersect/vesta-29',
            ),
        ),
    )
);
$I->seeInCollection('company', array(
    "short" => "ООО Джонсон & Джонсон",
    "name" => "Общество с отграниченной ответственностью Джонсон & Джонсон",
    "inn" => "7725216105",
    "kpp" => "773101001",
));
$I->seeInCollection('externalCompany', array('source' => 'vesta', 'id' => '29', ));
