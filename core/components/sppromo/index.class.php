<?php
/**
 * Class spPromoMainController
 */
abstract class spPromoMainController extends modExtraManagerController {
    /** @var spPromo $spPromo */
    public $spPromo;
    /**
     * @return void
     */
    public function initialize() {
        $version = $this->modx->getVersionData();
        $modx23 = !empty($version) && version_compare($version['full_version'], '2.3.0', '>=');
        if (!$modx23) {
            $this->addCss(MODX_ASSETS_URL . 'components/sppromo/css/mgr/font-awesome.min.css');
        }
        $this->addCss(MODX_ASSETS_URL . 'components/sppromo/css/mgr/bootstrap.buttons.min.css');
        $corePath = $this->modx->getOption('sppromo_core_path', null, $this->modx->getOption('core_path') . 'components/sppromo/');
        require_once $corePath . 'model/sppromo/sppromo.class.php';
        $this->spPromo = new spPromo($this->modx);
        $this->addCss($this->spPromo->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->spPromo->config['jsUrl'] . 'mgr/sppromo.js');
        $this->addJavascript($this->spPromo->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.modx23 = ' . (int)$modx23 . ';
			spPromo.config = ' . $this->modx->toJSON($this->spPromo->config) . ';
			spPromo.config.connector_url = "' . $this->spPromo->config['connectorUrl'] . '";
		});
		</script>');
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