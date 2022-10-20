<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Client;
use Authorization\IdentityInterface;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Exception\UnauthorizedException;

/**
 * Client policy
 */
class ClientPolicy
{
    /**
     * Check if $user can create Client
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Client $client
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Client $client)
    {
        if ($user->rol_id === 1) {
            return true;
        }

        throw new UnauthorizedException();
    }

    /**
     * Check if $user can update Client
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Client $client
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Client $client)
    {
        if ($user->rol_id === 1) {
            return true;
        }

        throw new UnauthorizedException();
    }

    /**
     * Check if $user can delete Client
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Client $client
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Client $client)
    {
        if ($user->rol_id === 1) {
            return true;
        }

        throw new UnauthorizedException();
    }

    /**
     * Check if $user can view Client
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Client $client
     * @return bool
     */
    public function canView(IdentityInterface $user, Client $client)
    {
        return true;
    }
}
