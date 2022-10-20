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
     * Check if $user can create Agreement
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Agreement $agreement
     * @return bool
     */
    public function canCreate(IdentityInterface $user, Agreement $agreement)
    {
    }

    /**
     * Check if $user can update Agreement
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Agreement $agreement
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, Agreement $agreement)
    {
    }

    /**
     * Check if $user can delete Agreement
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Agreement $agreement
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Agreement $agreement)
    {
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

    public function canIndex(IdentityInterface $user, Agreement $agreement )
    {
        return true;
    }
}
