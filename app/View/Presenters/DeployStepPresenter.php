<?php

namespace REBELinBLUE\Deployer\View\Presenters;

use REBELinBLUE\Deployer\Command;
use REBELinBLUE\Deployer\DeployStep;

/**
 * The view presenter for a deploy step class.
 */
class DeployStepPresenter extends Presenter
{
    /**
     * Gets the deployment stage label from the numeric representation.
     *
     * @return string
     */
    public function presentName()
    {
        /** @var DeployStep $model */
        $model = $this->getWrappedObject();

        if (!is_null($model->command_id)) {
            return $model->command->name;
        } elseif ($model->stage === Command::DO_INSTALL) {
            return $this->translator->trans('commands.install');
        } elseif ($model->stage === Command::DO_ACTIVATE) {
            return $this->translator->trans('commands.activate');
        } elseif ($model->stage === Command::DO_PURGE) {
            return $this->translator->trans('commands.purge');
        }

        return $this->translator->trans('commands.clone');
    }
}
