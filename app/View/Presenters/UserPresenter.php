<?php

namespace REBELinBLUE\Deployer\View\Presenters;

use Creativeorange\Gravatar\Gravatar;
use Illuminate\Contracts\Translation\Translator;
use REBELinBLUE\Deployer\User;

/**
 * The view presenter for a user class.
 */
class UserPresenter extends Presenter
{
    private $gravatar;

    /**
     * UserPresenter constructor.
     *
     * @param Translator $translator
     * @param Gravatar $gravatar
     * @internal param mixed $object
     */
    public function __construct(Translator $translator, Gravatar $gravatar)
    {
        $this->gravatar = $gravatar;

        parent::__construct($translator);
    }

    /**
     * Get the user avatar.
     *
     * @return string
     */
    public function presentAvatarUrl()
    {
        /** @var User $user */
        $user = $this->getWrappedObject();

        if ($user->avatar) {
            return url($user->avatar);
        }

        return $this->gravatar->get($user->email);
    }
}
