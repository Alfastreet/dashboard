<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Agreement;
use Authorization\IdentityInterface;

/**
 * Agreement policy
 */
class AgreementPolicy
{
    /**
     * Check if $user can update Agreement
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Agreement $agreement
     * @return bool
     */

    public function canEdit(IdentityInterface $user, Agreement $agreement)
    {
        return $user->rol_id === 1 || $user->rol_id === 2;
    }

    public function canAdd(IdentityInterface $user, Agreement $agreement)
    {
        return $user->rol_id === 1 || $user->rol_id === 2;
    }

    /**
     * Check if $user can view Agreement
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Agreement $agreement
     * @return bool
     */
    public function canView(IdentityInterface $user, Agreement $agreement)
    {
    }
}
