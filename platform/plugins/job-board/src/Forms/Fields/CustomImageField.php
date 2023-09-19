<?php

namespace Botble\JobBoard\Forms\Fields;

use Botble\Base\Forms\FormField;
use Botble\JobBoard\Facades\JobBoardHelper;
use Illuminate\Support\Arr;

class CustomImageField extends FormField
{
    protected function getTemplate(): string
    {
        return JobBoardHelper::viewPath('dashboard.forms.fields.custom-image');
    }

    public function render(array $options = [], $showLabel = true, $showField = true, $showError = true): string
    {
        $options['attr'] = Arr::set(
            $options['attr'],
            'class',
            Arr::get($options['attr'], 'class') . 'form-control editor-tinymce'
        );

        return parent::render($options, $showLabel, $showField, $showError);
    }
}
