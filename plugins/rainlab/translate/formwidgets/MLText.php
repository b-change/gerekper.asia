<?php namespace RainLab\Translate\FormWidgets;

use RainLab\Translate\Models\Locale;

/**
 * ML Text
 * Renders a multi-lingual text field.
 *
 * @package rainlab\translate
 * @author Alexey Bobkov, Samuel Georges
 */
class MLText extends MLControl
{

    /**
     * {@inheritDoc}
     */
    public $defaultAlias = 'mltext';

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $this->isAvailable = Locale::isAvailable();

        $this->prepareVars();

        if ($this->isAvailable)
            return $this->makePartial('mltext');
        else
            return parent::render();
    }

}