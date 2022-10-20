<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Busines;
use Authorization\IdentityInterface;
use Cake\Http\Exception\UnauthorizedException;

/**
 * Busines policy
 */
class BusinesPolicy
{
    /**
     * Check if $user can create Busines
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Busines $busines
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Busines $busines)
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
     * Check if $user can update Busines
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Busines $busines
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Busines $busines)
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
     * Check if $user can delete Busines
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Busines $busines
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Busines $busines)
    {
        if ($user->rol_id === 1) {
            return true;
        }
        if ($user->rol_id === 2) {
            return true;
        }

        throw new UnauthorizedException();
    }
}
