<?php
namespace placeholderimages\LolitaFramework\Controls\Text;

use \placeholderimages\LolitaFramework\Controls\Control;
use \placeholderimages\LolitaFramework\Core\Arr;

class Text extends Control
{
    /**
     * Render control
     *
     * @author Guriev Eugen <gurievcreative@gmail.com>
     * @return string html code.
     */
    public function render()
    {
        $this->setAttributes(
            array_merge(
                array(
                    'name'                        => $this->getName(),
                    'id'                          => $this->getId(),
                    'value'                       => $this->getValue(),
                    'type'                        => 'text',
                    'data-customize-setting-link' => $this->getName(),
                ),
                $this->getAttributes()
            )
        );
        return parent::render();
    }
}
