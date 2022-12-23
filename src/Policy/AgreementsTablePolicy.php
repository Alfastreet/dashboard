<?php
declare(strict_types=1);

namespace App\Policy;

use Cake\ORM\Query;
use App\Model\Table\AgreementTable;
use Authorization\IdentityInterface;

/**
 * Agreement policy
 */
class AgreementsTablePolicy
{
    public function canIndex(IdentityInterface $user, Query $query )
    {
        return $user->rol_id === 1 || $user->rol_id === 2;
    }

    public function scopeIndex(IdentityInterface $user, Query $query)
    {
        return;
    }
}
