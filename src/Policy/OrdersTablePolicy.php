<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\OrdersTable;
use Authorization\IdentityInterface;

/**
 * Orders policy
 */
class OrdersTablePolicy
{
    public function canIndex(IdentityInterface $identity)
    {
    // here you can resolve true or false depending of the identity required characteristics
        $identity['can_index']=true;
        return $identity['can_index'];
    }

    public function scopeIndex($user, $query)
    {
        return $query->where(['Orders.user_id' => $user->id]);
    }
}
