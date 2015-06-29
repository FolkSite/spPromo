<?php
ini_set('display_errors', 1);
ini_set('error_reporting', -1);
/**
 * Class spPromoMainController
 */
abstract class spPromoMainController extends spPromoManagerController {
	/** @var spPromo $spPromo */
	public $spPromo;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('sppromo_core_path', null, $this->modx->getOption('core_path') . 'components/sppromo/');
		require_once $corePath . 'model/sppromo/sppromo.class.php';

		$this->spPromo = new spPromo($this->modx);
		$this->addCss($this->spPromo->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->spPromo->config['jsUrl'] . 'mgr/sppromo.js');
		$this->addHtml('
		<script type="text/javascript">
			spPromo.config = ' . $this->modx->toJSON($this->spPromo->config) . ';
			spPromo.config.connector_url = "' . $this->spPromo->config['connectorUrl'] . '";
		</script>
		');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('sppromo:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends spPromoMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}