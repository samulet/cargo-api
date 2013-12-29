<?php
return array(
    'service_manager' => array(
        'aliases' => array(
            'PlaceModel' => 'Place\\Model\\PlaceModel',
        ),
        'factories' => array(
            'Place\\Model\\PlaceModel' => 'Place\\Factory\\PlaceModelFactory',
        ),
    ),
);
