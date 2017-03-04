<?php
namespace placeholderimages\LolitaFramework\Controls\View;

use \placeholderimages\LolitaFramework\Controls\Control;
use \placeholderimages\LolitaFramework\Core\Arr;

class View extends Control
{

    /**
     * View callback
     * @var array
     */
    protected $callback = null;

    /**
     * Control constructor
     *
     * @author Guriev Eugen <gurievcreative@gmail.com>
     * @param string $name control name.
     * @param mixed $value contro value.
     * @param array $attributes control attributes.
     * @param string $lable control label.
     * @param string $descriptions control description.
     */
    public function __construct($name, $value = '', $callback = null, $attributes = array(), $label = '', $description = '')
    {
        $this->setName($name);
        $this->setValue($value);
        $this->setAttributes($attributes);
        $this->label       = $label;
        $this->description = $description;
        $this->callback    = $callback;
    }

    /**
     * Render control
     *
     * @author Guriev Eugen <gurievcreative@gmail.com>
     * @return string html code.
     */
    public function render()
    {
        if (is_callable($this->callback)) {
            return call_user_func_array($this->callback, array('me' => $this));
        }
        return '';
    }
}
