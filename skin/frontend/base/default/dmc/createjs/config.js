jQuery.noConflict();

jQuery(document).ready(function () {

	var $cms = jQuery('body.cms-page-view .main > .col-main');
	$cms.attr('about', '/' + location.href.replace(/\?.+/,'').replace(shopUrl,''));
	jQuery('body.cms-page-view .main > .col-main > .std').attr('property','content');

    window.$product = jQuery('body.catalog-product-view .main > .col-main');
    $product.attr('about', '/' + ressourceUrl );
    $product.find('.product-name > h1').attr('property','product-name');
    $product.find('.short-description > .std').attr('property','short-description');
    $product.find('.box-description > .std').attr('property','description');

	jQuery('body').midgardCreate({
		url: function () {
			return '/admin/createJs/savecreatejs';
		}
	});

});
// Fake Backbone.sync since there is no server to communicate with
Backbone.sync = function(method, model, options) {
	if (console && console.log) {
		console.log('Model contents', model.toJSONLD(), model.get('product-name') );
    }

    var postData = {};
    postData.form_key = magentoCreatejs.fKey;


    if( window.$product.size() == 1){
        postData.model = 'product'
        postData.ID    = document.getElementsByName('product')[0].value
        postData.name = model.get('product-name')
        postData.description = model.get('description')
        postData["short-description"] = model.get('short-description')
    }

    new Ajax.Request(magentoCreatejs.aurl, {
        method: 'post',
        parameters: postData,
        onSuccess: function() {
            alert("Save done!");
        }
	})
	options.success(model);
};
