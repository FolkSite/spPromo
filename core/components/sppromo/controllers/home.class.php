<?php

/**
 * The home manager controller for spPromo.
 *
 */
class spPromoHomeManagerController extends spPromoMainController {
	/* @var spPromo $spPromo */
	public $spPromo;


	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
	}


	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('sppromo');
	}


	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
		$this->addCss($this->spPromo->config['cssUrl'] . 'mgr/main.css');
		$this->addCss($this->spPromo->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
		$this->addJavascript($this->spPromo->config['jsUrl'] . 'mgr/misc/utils.js');
		$this->addJavascript($this->spPromo->config['jsUrl'] . 'mgr/widgets/categories.grid.js');
		$this->addJavascript($this->spPromo->config['jsUrl'] . 'mgr/widgets/categories.windows.js');
		$this->addJavascript($this->spPromo->config['jsUrl'] . 'mgr/widgets/home.panel.js');
		$this->addJavascript($this->spPromo->config['jsUrl'] . 'mgr/sections/home.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "sppromo-page-home"});
		});
		</script>');
	}


	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->spPromo->config['templatesPath'] . 'home.tpl';
	}
}