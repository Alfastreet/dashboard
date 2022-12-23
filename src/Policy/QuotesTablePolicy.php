<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\QuotesTable;
use Authorization\IdentityInterface;
use Cake\Http\Exception\UnauthorizedException;
use Cake\ORM\Query;

/**
 * Quotes policy
 */
class QuotesTablePolicy
{
    public function canIndex(IdentityInterface $user, Query $query)
    {
        if($user->rol_id === 1 || $user->rol_id === 2){
            return true;
        }

        throw new UnauthorizedException();
    }

    public function scopeIndex(IdentityInterface $user, Query $query)
    {
        return;
    }
}
