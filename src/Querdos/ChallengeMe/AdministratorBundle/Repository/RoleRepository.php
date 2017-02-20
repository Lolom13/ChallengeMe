<?php
/**
 * Created by Hamza ESSAYEGH.
 * Date: 6/5/16
 * Time: 12:18 PM
 */

namespace Querdos\ChallengeMe\AdministratorBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Querdos\ChallengeMe\AdministratorBundle\Entity\Role;

/**
 * RoleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RoleRepository extends EntityRepository
{
    /**
     * Get the ROLE_ADMIN value
     *
     * @return Role
     */
    public function getAdminRole()
    {
        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()

            ->select("role")
            ->from("AdminBundle:Role", "role")
            ->where("role.value = :rolename")

            ->setParameter("rolename", Role::ROLE_ADMIN)
        ;

        return $query
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * Get the ROLE_MODERATOR value
     *
     * @return Role
     */
    public function getModeratorRole()
    {
        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()

            ->select("role")
            ->from("AdminBundle:Role", "role")
            ->where("role.value = :rolename")

            ->setParameter("rolename", Role::ROLE_MODERATOR)
        ;

        return $query
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * Get the ROLE_REDACTOR value
     *
     * @return Role
     */
    public function getRedactorRole()
    {
        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()

            ->select("role")
            ->from("AdminBundle:Role", "role")
            ->where("role.value = :rolename")

            ->setParameter("rolename", Role::ROLE_REDACTOR)
        ;

        return $query
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * Get the ROLE_USER value
     *
     * @return Role
     */
    public function getUserRole()
    {
        $query = $this
            ->getEntityManager()
            ->createQueryBuilder()

            ->select("role")
            ->from("AdminBundle:Role", "role")
            ->where("role.value = :rolename")

            ->setParameter("rolename", Role::ROLE_USER)
        ;

        return $query
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
