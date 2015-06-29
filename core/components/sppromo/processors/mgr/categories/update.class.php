<?php

/**
 * Update an Item
 */
class spPromoCategoriesUpdateProcessor extends modObjectUpdateProcessor {
	public $objectType = 'spPromoCategories';
	public $classKey = 'spPromoCategories';
	public $languageTopics = array('sppromo');
	//public $permission = 'save';


	/**
	 * We doing special check of permission
	 * because of our objects is not an instances of modAccessibleObject
	 *
	 * @return bool|string
	 */
	public function beforeSave() {
		if (!$this->checkPermissions()) {
			return $this->modx->lexicon('access_denied');
		}

		return true;
	}

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

    public function prepareRow(xPDOObject $object) {
        $array = $object->toArray();
        return $array;
    }

	/**
	 * @return bool
	 */
	public function beforeSet() {
		$id = (int)$this->getProperty('id');
		$name = trim($this->getProperty('name'));
		if (empty($id)) {
			return $this->modx->lexicon('sppromo_category_err_ns');
		}

		if (empty($name)) {
			$this->modx->error->addField('name', $this->modx->lexicon('sppromo_category_err_name'));
		}
		elseif ($this->modx->getCount($this->classKey, array('name' => $name, 'id:!=' => $id))) {
			$this->modx->error->addField('name', $this->modx->lexicon('sppromo_category_err_ae'));
		}

		return parent::beforeSet();
	}
}

return 'spPromoCategoriesUpdateProcessor';
