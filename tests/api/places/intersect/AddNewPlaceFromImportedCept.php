<?php
$I = new ApiGuy($scenario);
$I->am('Service Moderator');
$I->wantTo('Create internal place from external place data');

$I->haveInCollection('externalPlace',
    [
        'source' => 'vesta',
        'id' => '29',
        'type' => 'dp',
        'link' => null,
        "name" => "Веневская (Грин Трейд)",
        "address" => "г.Тольятти Автозаводский район ул. Борковская д.81",
    ]
);

$I->haveHttpHeader('Content-Type','application/json');
$I->haveHttpHeader('Accept','*/*');
$I->haveHttpHeader('X-Auth-UserToken','db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2');
$I->sendPOST(
    'service/import/place-intersect',
    json_encode(array('source'=>'vesta', 'type' => 'dp', 'id' => '29', 'place' => null))
);

$I->seeResponseCodeIs(201);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(
    array(
        'code' => 'vesta-dp-29',
        'source' => 'vesta',
        'id' => '29',
        'type' => 'dp',
        '_links' => array(
            'self' => array(
                'href' => 'http://cargo.dev/api/service/import/place-intersect/vesta-dp-29',
            ),
        ),
    )
);
$I->seeInCollection('place', array(
    "name" => "Веневская (Грин Трейд)",
));
$I->seeInCollection(
    'externalPlace',
    array('source' => 'vesta', 'id' => '29', 'type' => 'dp', 'link' => array('$ne' => null))
);
