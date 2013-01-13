new Ajax.Request('/admin/createjs/getcreatejs', {
    method: 'get',
    onSuccess: function(response) {

        window.magentoCreatejs = response.responseText.evalJSON();

        console.log(response.responseText.evalJSON(),window.magentoCreatejs);


        for(item in magentoCreatejs.js) {
            if (magentoCreatejs.js.hasOwnProperty(item)) {
                var element = document.createElement('script');
                element.type = 'text/javascript';
                element.src = magentoCreatejs.js[item];
                document.getElementsByTagName('head')[0].appendChild(element);
                window.setTimeout(50);
            }
        }

        window.adminUrl = magentoCreatejs.adminUrl[0];
        window.shopUrl = magentoCreatejs.shopUrl[0];
        window.ressourceUrl = magentoCreatejs.ressourceUrl[0];

    }
})
