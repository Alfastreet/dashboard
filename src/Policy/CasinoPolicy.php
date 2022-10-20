<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Casino;
use Authorization\IdentityInterface;
use Cake\Http\Exception\UnauthorizedException;

/**
 * Casino policy
 */
class CasinoPolicy
{
    /**
     * Check if $user can create Casino
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Casino $casino
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Casino $casino)
    {
        if ($user->rol_id === 1) {
            return true;
        }

        throw new UnauthorizedException();
    }

    /**
     * Check if $user can update Casino
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Casino $casino
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Casino $casino)
    {
        if ($user->rol_id === 1) {
            return true;
        }

        throw new UnauthorizedException();
    }
}
