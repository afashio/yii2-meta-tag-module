<?php
/**
 * Author: Pavel Naumenko
 */

namespace notgosu\yii2\modules\metaTag\widgets\metaTagForm;

/**
 * Class Widget
 */
class Widget extends \yii\base\Widget
{

    /**
     * @var \yii\db\ActiveRecord
     */
    public $model;
    public $language;

    /**
     * @return null|string
     */
    public function run()
    {
        /**
         * @var \notgosu\yii2\modules\metaTag\components\MetaTagBehavior $behavior
         */
        $behavior = $this->model->getBehavior('seo');
        if (!$behavior) {
            return null;
        }

        if($this->language){
            $languageList = $this->language;
        } else {
            $languageList = $behavior->languages;
        }

        switch ($languageList){
            case !is_array($languageList):
                $view = 'single';
                break;
            default:
                $view = 'default';
        }

        return $this->render($view, [
            'model' => $this->model,
            'languageList' => $languageList,
        ]);
    }
}
