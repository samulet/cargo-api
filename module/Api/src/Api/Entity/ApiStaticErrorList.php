<?php
/**
 * Created by JetBrains PhpStorm.
 * User: salerat
 * Date: 11/21/13
 * Time: 12:39 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\Entity;

use ZF\ApiProblem\ApiProblem;

class ApiStaticErrorList {
    public static $errorList = array(
        200 => 'OK',
        201 => 'CREATED',
        202 =>'ACCEPTED',
        304 => 'NOT_MODIFIED',
        400 => 'BAD_REQUEST',
        401 => 'UNAUTHORIZED',
        403 => 'FORBIDDEN',
        404 => 'NOT_FOUND',
        405 => 'METHOD_NOT_ALLOWED',
        500 => 'INTERNAL_SERVER_ERROR',
    );
    public static function getError($errorNumber, $errorText) {
        return new ApiProblem($errorNumber, self::$errorList[$errorNumber].'_'.strtoupper(str_replace(' ', '_', $errorText)));
    }
}