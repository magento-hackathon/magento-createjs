new Ajax.Request('/admin/createjs/getcreatejs', {
    method: 'get',
    onSuccess: function(response) {
        var create_js_div = new Element('span', {'id' : 'createjs_libs'});

        var res = response.responseText.evalJSON();

        //"<meta content='is used' name='createjs'/>"

        for(item in res.js) {
            if (res.js.hasOwnProperty(item)) {
                alert('<script type="text/javascript" src="'+res.js[item]+'"></script>');
            }
        }
        /**
         *
         *
         $$('head')[0].insert(create_js_div);

         $('createjs_libs').innerHTML = response.responseText;
         *
         */
    }
})