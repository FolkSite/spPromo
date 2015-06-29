<?php
/**
 * Get a list of Categories
 */
class spPromoCategoriesGetListProcessor extends modObjectGetListProcessor {
    public $objectType = 'spPromoCategories';
    public $classKey = 'spPromoCategories';
    public $defaultSortField = 'id';
    public $defaultSortDirection = 'DESC';
    //public $permission = 'list';
    /**
     * * We doing special check of permission
     * because of our objects is not an instances of modAccessibleObject
     *
     * @return boolean|string
     */
    public function beforeQuery() {
        if (!$this->checkPermissions()) {
            return $this->modx->lexicon('access_denied');
        }
        return true;
    }
    /**
     * @param xPDOQuery $c
     *
     * @return xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $query = trim($this->getProperty('query'));
        if ($query) {
            $c->where(array(
                'id:LIKE' => "%{$query}%",
                'OR:title:LIKE' => "%{$query}%",
                'OR:parent:LIKE' => "%{$query}%",
                'OR:level:LIKE' => "%{$query}%",
                'OR:active:LIKE' => "%{$query}%",
            ));
        }
        return $c;
    }
    /**
     * @param xPDOObject $object
     *
     * @return array
     */
    public function prepareRow(xPDOObject $object) {
        $array = $object->toArray();
        $array['actions'] = array();
        // Edit
        $array['actions'][] = array(
            'cls' => '',
            'icon' => 'icon icon-edit',
            'title' => $this->modx->lexicon('sppromo_category_update'),
            //'multiple' => $this->modx->lexicon('sppromo_categories_update'),
            'action' => 'updateItem',
            'button' => true,
            'menu' => true,
        );
        if (!$array['active']) {
            $array['actions'][] = array(
                'cls' => '',
                'icon' => 'icon icon-power-off action-green',
                'title' => $this->modx->lexicon('sppromo_category_enable'),
                'multiple' => $this->modx->lexicon('sppromo_categories_enable'),
                'action' => 'enableItem',
                'button' => true,
                'menu' => true,
            );
        }
        else {
            $array['actions'][] = array(
                'cls' => '',
                'icon' => 'icon icon-power-off action-gray',
                'title' => $this->modx->lexicon('sppromo_category_disable'),
                'multiple' => $this->modx->lexicon('sppromo_categories_disable'),
                'action' => 'disableItem',
                'button' => true,
                'menu' => true,
            );
        }
        // Remove
        $array['actions'][] = array(
            'cls' => '',
            'icon' => 'icon icon-trash-o action-red',
            'title' => $this->modx->lexicon('sppromo_category_remove'),
            'multiple' => $this->modx->lexicon('sppromo_categories_remove'),
            'action' => 'removeItem',
            'button' => true,
            'menu' => true,
        );
        return $array;
    }
}
return 'spPromoCategoriesGetListProcessor';