<?php
declare(strict_types=1);

namespace App\Policy;

use Cake\ORM\Query;
use App\Model\Table\installmentsTable;
use Authorization\IdentityInterface;
use Cake\Http\Exception\UnauthorizedException;

/**
 * installments policy
 */
class installmentsTablePolicy
{
    public function canIndex(IdentityInterface $user, Query $query)
    {
        return $user->rol_id === 1 || $user->rol_id ===2 || $user->rol_id === 3;

        if($user->rol_id !== 1 || $user->rol_id !== 2 || $user->rol_id !== 3) {
            throw new UnauthorizedException();
        }
    }
}
