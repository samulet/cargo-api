<?php
namespace Application\Authentication\Adapter;

use Phpro\MvcAuthToken\Adapter\AdapterInterface;
use Phpro\MvcAuthToken\Token;

class TokenAdapter implements AdapterInterface
{
    /**
     * @param $nonce
     *
     * @return mixed
     */
    public function validateNonce($nonce)
    {
        return true;
    }

    /**
     * @param $timestamp
     *
     * @return mixed
     */
    public function validateTimestamp($timestamp)
    {
        return true;
    }

    /**
     * @param Token $token
     *
     * @return mixed
     */
    public function validateToken(Token $token)
    {
        return true;
    }

    /**
     * @param Token $token
     *
     * @return string|\Zf\MvcAuth\Identity\IdentityInterface
     */
    public function getUserId(Token $token)
    {
        return 'admin';
    }
}
