<?php

/**
 * Create an Item
 */
class spPromoCategoriesCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'spPromoCategories';
	public $classKey = 'spPromoCategories';
	public $languageTopics = array('sppromo');
	//public $permission = 'create';


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$name = trim($this->getProperty('name'));
		if (empty($name)) {
			$this->modx->error->addField('name', $this->modx->lexicon('sppromo_category_err_name'));
		}
		elseif ($this->modx->getCount($this->classKey, array('name' => $name))) {
			$this->modx->error->addField('name', $this->modx->lexicon('sppromo_category_err_ae'));
		}

		return parent::beforeSet();
	}

}

return 'spPromoCategoriesCreateProcessor';