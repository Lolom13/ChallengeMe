<?php
/**
 * Created by PhpStorm.
 * User: querdos
 * Date: 5/22/16
 * Time: 2:24 PM
 */

namespace Querdos\ChallengeMe\AdministratorBundle\Security\Provider;


use Querdos\ChallengeMe\AdministratorBundle\Entity\Administrator;
use Querdos\ChallengeMe\AdministratorBundle\Manager\AdministratorManager;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class AdministratorProvider implements UserProviderInterface
{
    /**
     * @var AdministratorManager
     */
    private $adminManager;

    public function loadUserByUsername($username)
    {
        /** @var array $userData */
        $userData = $this->adminManager->getAdminData($username);

        if ($userData) {
            return new Administrator(
                $userData["id"],
                $userData["username"],
                $userData["email"],
                $userData["password"]
            );
        }

        return null;
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof Administrator) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === "AdminBundle\\Entity\\Administrator";
    }

    /**
     * @param AdministratorManager $adminManager
     */
    public function setAdminManager($adminManager)
    {
        $this->adminManager = $adminManager;
    }

    public function getClassName()
    {
        return $this->getClassName();
    }
}