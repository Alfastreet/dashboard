<?php
declare(strict_types=1);

namespace App\Policy;

use Cake\ORM\Query;
use App\Model\Table\linksTable;
use Authorization\IdentityInterface;

/**
 * links policy
 */
class linksTablePolicy
{
    public function canIndex(IdentityInterface $user, Query $query)
    {
        return $user->rol_id === 1 || $user->rol_id ===2;
    }

    public function canView(IdentityInterface $user, Query $query)
    {
        return $user->rol_id === 1 || $user->rol_id ===2;
    }
}
