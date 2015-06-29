spPromo.window.CreateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'sppromo-categories-window-create';
	}
	Ext.applyIf(config, {
		title: _('sppromo_category_create'),
		width: 550,
		autoHeight: true,
		url: spPromo.config.connector_url,
		action: 'mgr/categories/create',
		fields: this.getFields(config),
		keys: [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}]
	});
	spPromo.window.CreateItem.superclass.constructor.call(this, config);
};
Ext.extend(spPromo.window.CreateItem, MODx.Window, {

	getFields: function (config) {
		return [{
			xtype: 'textfield',
			fieldLabel: _('sppromo_category_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textfield',
			fieldLabel: _('sppromo_category_parent'),
			name: 'parent',
			id: config.id + '-parent',
			anchor: '99%'
		}, {
            xtype: 'textfield',
            fieldLabel: _('sppromo_category_level'),
            name: 'level',
            id: config.id + '-level',
            anchor: '99%'
        }, {
			xtype: 'xcheckbox',
			boxLabel: _('sppromo_category_active'),
			name: 'active',
			id: config.id + '-active',
			checked: true,
		}];
	}

});
Ext.reg('sppromo-categories-window-create', spPromo.window.CreateItem);


spPromo.window.UpdateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'sppromo-categories-window-update';
	}
	Ext.applyIf(config, {
		title: _('sppromo_category_update'),
		width: 550,
		autoHeight: true,
		url: spPromo.config.connector_url,
		action: 'mgr/categories/update',
		fields: this.getFields(config),
		keys: [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}]
	});
	spPromo.window.UpdateItem.superclass.constructor.call(this, config);
};
Ext.extend(spPromo.window.UpdateItem, MODx.Window, {
	getFields: function (config) {
		return [{
			xtype: 'hidden',
			name: 'id',
			id: config.id + '-id',
		}, {
			xtype: 'textfield',
			fieldLabel: _('sppromo_category_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'modx-combo',
			fieldLabel: _('sppromo_category_parent'),
			name: 'parent',
			id: config.id + '-parent',
			anchor: '99%',
            hiddenName: 'parent',
            autoSelect: false,
            allowBlank: false,
            editable: false,
            triggerAction: 'all',
            typeAhead: true,
            width:120,
            listWidth: 120,
            enableKeyEvents: true,
            mode: 'local',
            store: [
                ['1','Товары для животных / Ветеринария'],
                ['2','Ветеринария'],
                ['3','Товары / услуги для животных'],
            ]
		}, {
            xtype: 'textfield',
            fieldLabel: _('sppromo_category_level'),
            name: 'level',
            id: config.id + '-level',
            anchor: '99%',
        }, {
			xtype: 'xcheckbox',
			boxLabel: _('sppromo_item_active'),
			name: 'active',
			id: config.id + '-active',
		}];
	}

});
Ext.reg('sppromo-categories-window-update', spPromo.window.UpdateItem);