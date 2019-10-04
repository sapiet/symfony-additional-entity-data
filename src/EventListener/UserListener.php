<?php

namespace App\EventListener;

use App\Entity\User;
use App\Services\Gravatar;

class UserListener
{
    /**
     * @var Gravatar
     */
    private $gravatar;

    public function __construct(Gravatar $gravatar)
    {
        $this->gravatar = $gravatar;
    }

    public function postLoad(User $user)
    {
        return $user->setAvatar($this->gravatar->getUrl($user->getEmail()));
    }
}
