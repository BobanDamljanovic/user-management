<?php
namespace nitrocinema\modules\UserManagement\components;

use nitrocinema\modules\UserManagement\models\User;
use yii\widgets\Menu;

/**
 * Class GhostNav
 *
 * Show only those items in navigation menu which user can see
 * If item has no "visible" key, than "visible"=>User::canRoute($item['url') will be added
 *
 * @package nitrocinema\modules\UserManagement\components
 */
class GhostMenu extends Menu
{
    public function init()
    {
        parent::init();

        $this->ensureVisibility($this->items);
    }

    /**
     * @param array $items
     *
     * @return bool
     */
    protected function ensureVisibility(&$items)
    {
        $allVisible = false;

        foreach ($items as &$item) {
            if (isset($item['url']) and !in_array($item['url'], ['', '#']) and !isset($item['visible'])) {
                $item['visible'] = User::canRoute($item['url']);
            }

            if (isset($item['items'])) {
                // If not children are visible - make invisible this node
                if (!$this->ensureVisibility($item['items']) and !isset($item['visible'])) {
                    $item['visible'] = false;
                }
            }

            if (isset($item['label']) and (!isset($item['visible']) or $item['visible'] === true)) {
                $allVisible = true;
            }
        }

        return $allVisible;
    }
}
