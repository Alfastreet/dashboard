<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Accountant;
use Authorization\IdentityInterface;
use Cake\Http\Exception\UnauthorizedException;

/**
 * Accountants policy
 */
class AccountantPolicy
{
    /**
     * Check if $user can create Accountants
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Accountants $accountants
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Accountant $accountants)
    {
        if ($user->rol_id === 1) {
            return true;
        }
        if ($user->rol_id === 2) {
            return true;
        }

        throw new UnauthorizedException();
    }

    /**
     * Check if $user can update Accountants
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Accountants $accountants
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, Accountant $accountants)
    {
    }

    /**
     * Check if $user can delete Accountants
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Accountants $accountants
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Accountant $accountants)
    {
    }

    /**
     * Check if $user can view Accountants
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Accountants $accountants
     * @return bool
     */
    public function canView(IdentityInterface $user, Accountant $accountants)
    {
    }
}
