<?php
namespace placeholderimages\LolitaFramework\Configuration\Modules;

use \placeholderimages\LolitaFramework\Configuration\Configuration;
use \placeholderimages\LolitaFramework\Configuration\IModule;
use \placeholderimages\LolitaFramework\Core\Arr;

class RemoveFilters extends Filters
{

    /**
     * Add shortcodes
     *
     * @author Guriev Eugen <gurievcreative@gmail.com>
     * @return Filters instance.
     */
    protected function install()
    {
        foreach ($this->data as $data) {
            remove_filter($data[0], $data[1], $data[2]);
        }
        return $this;
    }

    /**
     * Prepare data
     *
     * @author Guriev Eugen <gurievcreative@gmail.com>
     * @return Filters instance.
     */
    protected function prepare()
    {
        foreach ($this->data as &$data) {
            // Priority
            $data[2] = Arr::get($data, 2, 10);
        }
        return $this;
    }
}
