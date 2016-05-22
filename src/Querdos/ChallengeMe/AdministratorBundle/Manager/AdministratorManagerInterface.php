<?php
/**
 * Created by PhpStorm.
 * User: querdos
 * Date: 5/21/16
 * Time: 5:20 PM
 */

namespace Querdos\ChallengeMe\AdministratorBundle\Manager;


use Querdos\ChallengeMe\AdministratorBundle\Entity\Administrator;

interface AdministratorManagerInterface
{
    public function create(Administrator $admin);

    public function update(Administrator $admin);

    public function delete(Administrator $admin);

    public function adminExists(Administrator $admin);

    public function getAdminData($username);
}