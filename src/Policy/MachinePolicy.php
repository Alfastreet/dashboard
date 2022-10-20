<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Machine;
use Authorization\IdentityInterface;
use Cake\Http\Exception\UnauthorizedException;

/**
 * Machine policy
 */
class MachinePolicy
{
    /**
     * Check if $user can create Machine
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Machine $machine
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Machine $machine)
    {
        if($user->rol_id === 1 ){
            return true;
        }

        return false;
    }

    /**
     * Check if $user can update Machine
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Machine $machine
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Machine $machine)
    {
        if($user->rol_id === 1 ){
            return true;
        }

        return false;
    }

    /**
     * Check if $user can delete Machine
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Machine $machine
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Machine $machine)
    {
    }

    /**
     * Check if $user can view Machine
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Machine $machine
     * @return bool
     */
    public function canView(IdentityInterface $user, Machine $machine)
    {
    }

    public function index(IdentityInterface $user, Machine $machine)
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
