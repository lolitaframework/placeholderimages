<?php
namespace placeholderimages\LolitaFramework\Controls\Editor;

use \placeholderimages\LolitaFramework\Controls\Control;
use \placeholderimages\LolitaFramework\Core\Arr;

class Editor extends Control
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
                $this->getAttributes(),
                array(
                    'name'                        => $this->getName(),
                    'data-customize-setting-link' => $this->getName(),
                )
            )
        );
        return parent::render();
    }
}
