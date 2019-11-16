<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SliderController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */

    public function actionIndex()
    {
        $time=time();
        $now=Yii::$app->jdate->date('H',$time);
        foreach(\app\models\Slider::find()->Where(['create_date'=>Yii::$app->jdate->date('Y/m/d')])->andWhere(['hour'=>$now])->andWhere(['status'=>0])->all() as $slider){
       
            $slider->status=1;
            $slider->save(); 

        }
        return ExitCode::OK;
    }
}
