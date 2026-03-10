<?php

namespace Vendor\ImagePreviewField;

use Laravel\Nova\Fields\Field;

class ImagePreviewField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'image-preview-field';
    public $showOnIndex = true;
    public $showOnDetail = true;
}
