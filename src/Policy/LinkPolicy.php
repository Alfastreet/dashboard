<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\link;
use Authorization\IdentityInterface;
use Cake\Http\Exception\UnauthorizedException;

/**
 * links policy
 */
class linkPolicy
{
    /**
     * Check if $user can create links
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\links $links
     * @return bool
     */
    public function canAdd(IdentityInterface $user, link $links)
    {
        if($user->rol_id === 1 || $user->rol_id === 2) {
            return true;
        }

        throw new UnauthorizedException();
    }

    /**
     * Check if $user can update links
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\links $links
     * @return bool
     */
    public function canEdit(IdentityInterface $user, link $links)
    {
        if($user->rol_id === 1 || $user->rol_id === 2) {
            return true ;
        }

        throw new UnauthorizedException();
    }

    /**
     * Check if $user can delete links
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\links $links
     * @return bool
     */
    public function canDelete(IdentityInterface $user, link $links)
    {
        throw new UnauthorizedException();
    }

}
