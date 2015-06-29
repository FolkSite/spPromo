var spPromo = function (config) {
	config = config || {};
	spPromo.superclass.constructor.call(this, config);
};
Ext.extend(spPromo, Ext.Component, {
	page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('sppromo', spPromo);

spPromo = new spPromo();