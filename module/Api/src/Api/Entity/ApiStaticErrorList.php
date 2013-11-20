<?php
/**
 * Created by JetBrains PhpStorm.
 * User: salerat
 * Date: 11/21/13
 * Time: 12:39 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\Entity;


class ApiStaticErrorList {
    public static $errorLost = array(
        'OK' => 200,
        'CREATED' => 201,
        'ACCEPTED' => 202,
        'NOT_MODIFIED' => 304,
        'BAD_REQUEST' => 400,
        'UNAUTHORIZED' => 401,
        'FORBIDDEN' => 403,
        'NOT_FOUND' => 404,
        'METHOD_NOT_ALLOWED' => 405,
        'INTERNAL_SERVER_ERROR' => 500
    );
}