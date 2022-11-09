<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\UsersTable;
use Authorization\IdentityInterface;
use Cake\ORM\Query;

/**
 * Users policy
 */
class UsersTablePolicy
{
    public function canIndex(IdentityInterface $user, Query $query)
    {
        return $user->rol_id === 1 || $user->rol_id === 2;
    }

    public function canView(IdentityInterface $user, Query $query)
    {
        if($user->rol_id === 1 || $user->rol_id === 2 ){
            return;
        }
        return $query->matching('Users', function(Query $q) use ($user) {
            $q->where(['Users.id' => $user->id]);
        });
    }
}
