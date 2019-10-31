<?php
/**
 * Author: Pavel Naumenko
 *
 * @var MetaTagContent[] $metaTagModelList
 * @var \yii\db\ActiveRecord $model
 * @var array $languageList
 * @var string $defaultLanguage
 */
use notgosu\yii2\modules\metaTag\models\MetaTagContent;
use yii\helpers\Html;

foreach ($model->metaTags as $i => $data) {
    if($data->language_id == $languageList){
        echo Html::beginTag('div', ['class' => 'form-group']);

        switch ($data->metaTag->name) {
            case \notgosu\yii2\modules\metaTag\models\MetaTag::META_ROBOTS:
                echo Html::activeCheckbox($model, 'metaTags[' . $i . '][content]',
                    ['class' => 'form-control', 'label' => 'robots no index, FOLLOW']);
                break;
            case \notgosu\yii2\modules\metaTag\models\MetaTag::META_SEO_TEXT:
                echo Html::activeLabel(
                    $model,
                    'metaTags[' . $i . '][content]',
                    ['class' => 'control-label', 'label' => $data->metaTag->name]
                );

                echo Html::activeTextarea($model, 'metaTags[' . $i . '][content]', ['class' => 'form-control']);
                break;
            default:
                echo Html::activeLabel(
                    $model,
                    'metaTags[' . $i . '][content]',
                    ['class' => 'control-label', 'label' => $data->metaTag->name]
                );

                echo Html::activeTextInput($model, 'metaTags[' . $i . '][content]', ['class' => 'form-control']);
                break;
        }
        echo Html::tag('div', $data->metaTag->description, ['class' => 'hint-block']);

        echo Html::endTag('div');
    }

}
