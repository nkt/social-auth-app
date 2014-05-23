<?php

namespace Nkt\UserBundle\Security;

use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\EntityUserProvider;

class OAuthUserProvider extends EntityUserProvider
{
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        throw new \Exception('It works!');
    }
}
