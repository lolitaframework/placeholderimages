<?php
namespace liveeditor\LolitaFramework\Configuration\Modules;

use \liveeditor\LolitaFramework\Core\Str;
use \liveeditor\LolitaFramework\Core\Arr;
use \liveeditor\LolitaFramework\Core\Ref;
use \liveeditor\LolitaFramework\Configuration\Init;
use \liveeditor\LolitaFramework\Configuration\Configuration;
use \liveeditor\LolitaFramework\Configuration\IModule;

class Taxonomies extends Init implements IModule
{
    private $taxonomies = array();
    /**
     * Taxonomies class constructor
     *
     * @author Guriev Eugen <gurievcreative@gmail.com>
     * @param array $data engine data.
     */
    public function __construct($data = null)
    {
        $this->data = $data;
        if (is_array($this->data)) {
            foreach ($this->data as $tax) {
                $this->taxonomies[] = Ref::create(
                    __NAMESPACE__ . NS . 'Elements' . NS . 'Taxonomy',
                    $tax
                );
            }
        }
        $this->install();
        $this->init();
    }

    /**
     * Add prefix to name
     *
     * @author Guriev Eugen <gurievcreative@gmail.com>
     * @param  string $prefix prefix.
     * @param  string $name   name.
     * @return string         name with prefix.
     */
    private function controlNameWithPrefix($prefix, $name)
    {
        return sprintf(
            '%s_%s',
            $prefix,
            $name
        );
    }

    /**
     * Run by the 'init' hook.
     * Execute the "add_theme_support" function from WordPress.
     *
     * @author Guriev Eugen <gurievcreative@gmail.com>
     * @return void
     */
    public function install()
    {
        if (is_array($this->taxonomies)) {
            foreach ($this->taxonomies as $tax) {
                $tax->register();
            }
        }
    }

    /**
     * Module priority
     * @return [int] priority, the smaller number the faster boot.
     */
    public static function getPriority()
    {
        return 99;
    }
}
