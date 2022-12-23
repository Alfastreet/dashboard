<?php
declare(strict_types=1);

namespace App\Policy;

use Cake\ORM\Query;
use Authorization\IdentityInterface;
use App\Model\Table\AccountantsTable;
use Cake\Http\Exception\UnauthorizedException;

/**
 * Accountants policy
 */
class AccountantsTablePolicy
{
    public function canGeneral(IdentityInterface $user, Query $query)
    {
        if($user->rol_id === 1 || $user->rol_id === 2){
            return true;
        }
        
        throw new UnauthorizedException();
    }

    public function scopeGeneral(IdentityInterface $user, Query $query)
    {
        return;
    }
}
