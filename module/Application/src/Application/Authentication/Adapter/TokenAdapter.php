<?php
namespace Application\Authentication\Adapter;

use AuthToken\Model\AuthToken;
use Phpro\MvcAuthToken\Adapter\AdapterInterface;
use Phpro\MvcAuthToken\Token;

class TokenAdapter implements AdapterInterface
{
    /**
     * @var string
     */
    protected $user;
    /**
     * @var \AuthToken\Model\AuthToken
     */
    protected $tokenModel;

    /**
     * @param AuthToken $tokenModel
     */
    public function __construct(AuthToken $tokenModel)
    {
        $this->tokenModel = $tokenModel;
    }

    /**
     * @param string $nonce
     *
     * @return bool
     */
    public function validateNonce($nonce)
    {
        return true;
    }

    /**
     * @param int $timestamp
     *
     * @return bool
     */
    public function validateTimestamp($timestamp)
    {
        return true;
    }

    /**
     * @param Token $token
     *
     * @return bool
     */
    public function validateToken(Token $token)
    {
        $tokenEntity = $this->tokenModel->fetch($token->getToken());

        if (empty($tokenEntity)) {
            return false;
        }

        $this->user = $tokenEntity->getUser()->getUuid();

        return true;
    }

    /**
     * @param Token $token
     *
     * @return string
     */
    public function getUserId(Token $token)
    {
        return $this->user;
    }
}
