<?php

namespace app\modules\user\controllers;

use yii\web\Controller;

/**
 * Default controller for the `user` module
 */
class FavourietsController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionMyfavouriets()
    {
        return $this->render('myfavouriets');
    }
}
