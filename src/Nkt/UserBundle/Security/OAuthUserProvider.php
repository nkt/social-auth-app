<?php

namespace Nkt\UserBundle\Security;

use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\EntityUserProvider;
use Nkt\UserBundle\Entity\User;

class OAuthUserProvider extends EntityUserProvider
{
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $resource = $response->getResourceOwner()->getName();
        if ($resource == 'vk') {
            $vkId = $response->getUsername();
            $user = $this->repository->findOneBy(['vkId' => $vkId]);
            if ($user === null) {
                $user = new User();
                $user->setVkId($vkId);
                $user->setUsername($response->getRealName());
                $this->em->persist($user);
                $this->em->flush();
            }

            return $user;
        }

        return parent::loadUserByOAuthUserResponse($response);
    }
}
