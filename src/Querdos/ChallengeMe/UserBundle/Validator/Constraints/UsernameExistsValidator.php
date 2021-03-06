<?php
/**
 * Created by Hamza ESSAYEGH.
 * Date: 6/26/16
 * Time: 7:46 PM
 */

namespace Querdos\ChallengeMe\UserBundle\Validator\Constraints;


use Querdos\ChallengeMe\UserBundle\Manager\AdministratorManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UsernameExistsValidator extends ConstraintValidator
{
    /**
     * @var AdministratorManager $adminManager
     */
    private $adminManager;

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     */
    public function validate($value, Constraint $constraint)
    {
        if (
            // Check from admin repository
            null !== $this->adminManager->checkUsername($value)
        ) {
            $this
                ->context
                ->buildViolation($constraint->message)
                ->addViolation()
            ;
        }
    }

    /**
     * @param AdministratorManager $adminManager
     */
    public function setAdminManager($adminManager)
    {
        $this->adminManager = $adminManager;
    }
}