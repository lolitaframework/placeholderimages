<?php
namespace placeholderimages\LolitaFramework\Configuration\Modules;

use \placeholderimages\LolitaFramework\Configuration\Configuration;
use \placeholderimages\LolitaFramework\Configuration\IModule;
use \placeholderimages\LolitaFramework\Core\Ref;
use \placeholderimages\LolitaFramework\Core\Arr;

class Columns implements IModule
{
    /**
     * All columns
     * @var array
     */
    private $columns = array();

    /**
     * Images class constructor
     *
     * @author Guriev Eugen <gurievcreative@gmail.com>
     * @param array $data engine data.
     */
    public function __construct($data = null)
    {
        $this->data = (array) $data;
        if (is_array($this->data)) {
            foreach ($this->data as $col) {
                $this->columns[] = Ref::create(
                    __NAMESPACE__ . NS . 'Columns' . NS . Arr::get($col, 'type', 'PostType'),
                    $col
                );
            }
        }
    }

    /**
     * Module priority
     *
     * @author Guriev Eugen <gurievcreative@gmail.com>
     * @return [int] priority, the smaller number the faster boot.
     */
    public static function getPriority()
    {
        return Configuration::DEFAULT_PRIORITY;
    }
}
