//jQuery.noConflict();

jQuery(document).ready(function () {

	var cms = jQuery('body.cms-page-view .main > .col-main');
	cms.attr('about', '/' + location.href.replace(/\?.+/,'').replace(shopUrl,''));
	jQuery('body.cms-page-view .main > .col-main > .std').attr('property','content');


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
