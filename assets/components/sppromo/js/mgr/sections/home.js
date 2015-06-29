spPromo.page.Home = function (config) {
	config = config || {};
	Ext.applyIf(config, {
		components: [{
			xtype: 'sppromo-panel-home', renderTo: 'sppromo-panel-home-div'
		}]
	});
	spPromo.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(spPromo.page.Home, MODx.Component);
Ext.reg('sppromo-page-home', spPromo.page.Home);