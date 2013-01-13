new Ajax.Request('/admin/createjs/getcreatejs', {
    method: 'get',
    onSuccess: function(response) {


        var create_js_div = new Element('span', {'id' : 'createjs_libs'});

        var res = response.responseText.evalJSON();

        //"<meta content='is used' name='createjs'/>"

        for(item in res.js) {
            if (res.js.hasOwnProperty(item)) {
                var element = document.createElement('script');
                element.type = 'text/javascript';
                element.src = res.js[item];
                document.getElementsByTagName('head')[0].appendChild(element);
            }
        }

        //$html .= "<link type='text/css' href='$cssPath' media='all' rel='stylesheet'/>";

        /**
        for(item in res.css) {
            if (res.css.hasOwnProperty(item)) {
                var element = document.createElement('link');
                element.type = 'text/css';
                element.href = res.css[item];
                element.media = 'all';
                element.ref = 'stylesheet';
                document.getElementsByTagName('head')[0].appendChild(element);
            }
        }**/

        window.adminUrl = res.adminUrl[0];
        window.shopUrl = res.shopUrl[0];
        window.ressourceUrl = res.ressourceUrl[0];

    }
})