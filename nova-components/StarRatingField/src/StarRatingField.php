<?php

namespace Vendor\StarRatingField;

use Laravel\Nova\Fields\Field;

class StarRatingField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'star-rating-field';
    public $showOnIndex = true;
    public $showOnDetail = true;

    public function maxStars(int $stars) : static
    {
        return $this->withMeta(['maxStars' => $stars]);   
    }
}
