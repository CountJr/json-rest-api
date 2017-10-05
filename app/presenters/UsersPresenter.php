<?php

namespace App\Presenters;

use Nette;


class UsersPresenter extends Nette\Application\UI\Presenter
{

    public function actionList($id) {
        if(!$id) {
            throw new InvalidArgumentException('Invalid Id');
        }
    }

    public function actionCreate() {
        //
    }

    public function actionEdit($id) {
        if(!$id) {
            throw new InvalidArgumentException('Invalid Id');
        }
    }

    public function actionDelete($id) {
        if(!$id) {
            throw new InvalidArgumentException('Invalid Id');
        }
    }
}
