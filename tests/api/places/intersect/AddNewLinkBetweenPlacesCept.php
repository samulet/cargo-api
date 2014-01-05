<?php
$I = new ApiGuy($scenario);
$I->am('Service Moderator');
$I->wantTo('Add link between imported place and existed place');

$I->haveInCollection('externalPlace',
    array(
        'source' => 'vesta',
        'id' => '29',
        'type' => 'dp',
        'link' => null
    )
);
$I->haveInCollection('place',
    array(
        'uuid' => 'ec4d945a763f11e39fe6080027ab4d7b',
    )
);

$I->haveHttpHeader('Content-Type', 'application/json');
$I->haveHttpHeader('Accept', '*/*');
$I->haveHttpHeader('X-Auth-UserToken', 'db057553f1a4989210ae84a2825982e1d04d6879a2690365e1fcecb619fb77e2');
$I->sendPOST(
    'service/import/place-intersect',
    json_encode(array('source' => 'vesta', 'id' => '29', 'type' => 'dp', 'place' => 'ec4d945a763f11e39fe6080027ab4d7b'))
);

$I->seeResponseCodeIs(201);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(
    array(
        'code' => 'vesta-dp-29',
        'source' => 'vesta',
        'id' => '29',
        'type' => 'dp',
        'link' => 'ec4d945a763f11e39fe6080027ab4d7b',
        '_links' => array(
            'self' => array(
                'href' => 'http://cargo.dev/api/service/import/place-intersect/vesta-dp-29',
            ),
        ),
    )
);
$I->seeInCollection(
    'externalPlace',
    array('source' => 'vesta', 'id' => '29', 'type' => 'dp', 'link' => 'ec4d945a763f11e39fe6080027ab4d7b')
);
