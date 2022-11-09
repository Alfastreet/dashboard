<?php
declare(strict_types=1);

namespace App\Policy;

use Cake\ORM\Query;
use App\Model\Entity\Order;
use Authorization\IdentityInterface;

/**
 * Order policy
 */
class OrderPolicy
{
    /**
     * Check if $user can create Order
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Order $order
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Order $order)
    {
        if($user->rol_id === 1 || $user->rol_id === 2 || $user->rol_id === 3){
            return (true);
        }

        return false;
    }

    /**
     * Check if $user can update Order
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Order $order
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, Order $order)
    {
    }
    /**
     * Check if $user can view Order
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Order $order
     * @return bool
     */
    public function canView(IdentityInterface $user, Order $order)
    {
        if($user->rol_id === 1 || $user->rol_id === 2 || $user->rol_id === 3 || $user->rol_id === 4){
            return true;
        }

        return false;
    }

    public function canGetpdf(IdentityInterface $user, Order $order)
    {
        if($user->rol_id === 1 || $user->rol_id === 2 || $user->rol_id === 3 || $user->rol_id === 4){
            return true;
        }

        return false;
    }
}
