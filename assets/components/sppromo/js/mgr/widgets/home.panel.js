spPromo.panel.Home = function (config) {
	config = config || {};
	Ext.apply(config, {
		baseCls: 'modx-formpanel',
		layout: 'anchor',
		/*
		 stateful: true,
		 stateId: 'sppromo-panel-home',
		 stateEvents: ['tabchange'],
		 getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
		 */
		hideMode: 'offsets',
		items: [{
			html: '<h2>' + _('sppromo') + '</h2>',
			cls: '',
			style: {margin: '15px 0'}
		}, {
			xtype: 'modx-tabs',
			defaults: {border: false, autoHeight: true},
			border: true,
			hideMode: 'offsets',
			items: [{
				title: _('sppromo_categories'),
				layout: 'anchor',
				items: [{
					html: _('sppromo_intro_msg'),
					cls: 'panel-desc',
				}, {
					xtype: 'sppromo-grid-categories',
					cls: 'main-wrapper',
				}]
			}]
		}]
	});
	spPromo.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(spPromo.panel.Home, MODx.Panel);
Ext.reg('sppromo-panel-home', spPromo.panel.Home);
