<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Quote;
use Authorization\IdentityInterface;
use Cake\Http\Exception\UnauthorizedException;

/**
 * Quote policy
 */
class QuotePolicy
{
    /**
     * Check if $user can create Quote
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Quote $quote
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Quote $quote)
    {
        if ($user->rol_id === 1) {
            return true;
        }
        if ($user->rol_id === 2) {
            return true;
        }

        throw new UnauthorizedException();
    }

    /**
     * Check if $user can update Quote
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Quote $quote
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, Quote $quote)
    {
    }

    /**
     * Check if $user can delete Quote
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Quote $quote
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Quote $quote)
    {
    }

    /**
     * Check if $user can view Quote
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Quote $quote
     * @return bool
     */
    public function canView(IdentityInterface $user, Quote $quote)
    {
    }
}
