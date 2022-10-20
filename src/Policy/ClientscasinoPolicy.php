<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Clientscasino;
use Authorization\IdentityInterface;

/**
 * Clientscasino policy
 */
class ClientscasinoPolicy
{
    /**
     * Check if $user can create Clientscasino
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Clientscasino $clientscasino
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Clientscasino $clientscasino)
    {
        if($user->rol_id === 1 || $user->rol_id === 2 ){
            return true;
        }
        return false;
    }

    /**
     * Check if $user can update Clientscasino
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Clientscasino $clientscasino
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Clientscasino $clientscasino)
    {
        if($user->rol_id === 1 || $user->rol_id === 2 ){
            return true;
        }
        return false;
    }

    /**
     * Check if $user can delete Clientscasino
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Clientscasino $clientscasino
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Clientscasino $clientscasino)
    {
    }

    /**
     * Check if $user can view Clientscasino
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Clientscasino $clientscasino
     * @return bool
     */
    public function canView(IdentityInterface $user, Clientscasino $clientscasino)
    {
    }
}
