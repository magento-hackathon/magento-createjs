new Ajax.Request('/admin/createjs/getcreatejs', {
    method: 'get',
    onSuccess: function(response) {

        var res = response.responseText.evalJSON();

        for(item in res.js) {
            if (res.js.hasOwnProperty(item)) {
                var element = document.createElement('script');
                element.type = 'text/javascript';
                element.src = res.js[item];
                document.getElementsByTagName('head')[0].appendChild(element);
            }
        }

        console.log(res);

        window.adminUrl = res.adminUrl[0];
        window.shopUrl = res.shopUrl[0];

        window.setTimeout(function(){

            new Ajax.Request(res.aurl, {
                method: 'post',
                parameters: {form_key: res.fkey},
                onSuccess: function() {
                    alert("Save done!");
                }
            })

        },250)
    }
})

