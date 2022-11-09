<?php
declare(strict_types=1);

namespace App\Policy;

use Cake\ORM\Query;
use Authorization\IdentityInterface;

/**
 * Orders policy
 */
class OrdersTablePolicy
{
    public function canIndex(IdentityInterface $user, Query $query)
    {
        return true;
    }

    public function scopeIndex(IdentityInterface $user, Query $query)
    {
        if($user->rol_id === 1){
            return;
        }
        return $query->matching('Users', function (Query $q) use ($user) {
            return $q->where(['Orders.user_id' => $user->id, 'Orders.orderstatus_id' => 2]);
        } );
    }
}
