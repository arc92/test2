<?php

namespace app\modules\user\controllers;

use yii\web\Controller;

/**
 * Default controller for the `user` module
 */
class ContactController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionContactsetting()
    {
        return $this->render('contactsetting');
    }
}
