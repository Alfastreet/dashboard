<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\installment;
use Authorization\IdentityInterface;
use Cake\Http\Exception\UnauthorizedException;

/**
 * installment policy
 */
class installmentPolicy
{
    /**
     * Check if $user can create installment
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\installment $installment
     * @return bool
     */
    public function canAdd(IdentityInterface $user, installment $installment)
    {
        return $user->rol_id === 1 || $user->rol_id === 2;

        if($user->rol_id !== 1 || $user->rol_id !== 2 ) {
            throw new UnauthorizedException();
        }
    }

    /**
     * Check if $user can update installment
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\installment $installment
     * @return bool
     */
    public function canEdit(IdentityInterface $user, installment $installment)
    {
        return $user->rol_id === 1 || $user->rol_id === 2;

        if($user->rol_id !== 1 || $user->rol_id !== 2 ) {
            throw new UnauthorizedException();
        }
    }

    /**
     * Check if $user can delete installment
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\installment $installment
     * @return bool
     */
    public function canDelete(IdentityInterface $user, installment $installment)
    {
    }

    /**
     * Check if $user can view installment
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\installment $installment
     * @return bool
     */
    public function canView(IdentityInterface $user, installment $installment)
    {
    }
}
