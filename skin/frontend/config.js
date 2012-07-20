jQuery.noConflict();

jQuery(document).ready(function () {
	jQuery('body').midgardCreate({
		url: function () {
			return 'javascript:false;';
		}
	});
});
// Fake Backbone.sync since there is no server to communicate with
Backbone.sync = function(method, model, options) {
	if (console && console.log) {
		console.log('Model contents', model.toJSONLD());
	}
	options.success(model);
};
