<script>
    function loadStyle(url, callback) {
        var style = document.createElement("link")
        style.rel = "stylesheet";
        if (style.readyState) {
            style.onreadystatechange = function() {
                if (style.readyState == "loaded" || style.readyState == "complete") {
                    style.onreadystatechange = null;
                    callback();
                }
            };
        } else {
            style.onload = function() {
                callback();
            };
        }
        style.href = url;
        document.getElementsByTagName("head")[0].appendChild(style);
    }
    
    /*var attArray = {id1: 100, id2: 200, "tag with spaces": 300};
    myArray["id4"] = 500;*/
        function loadScriptWithAttribute(url, callback, attArray) {
        var script = document.createElement("script")
        script.type = "text/javascript";
        if (script.readyState) {
            script.onreadystatechange = function() {
                if (script.readyState == "loaded" || script.readyState == "complete") {
                    script.onreadystatechange = null;
                    callback();
                }
            };
        } else {
            script.onload = function() {
                callback();
            };
        }
        for (var key in attArray) {
            script.setAttribute(key, attArray[key]);
        }
        script.src = url;
        document.body.appendChild(script);
    }
    
    

    function loadScript(url, callback) {
        var script = document.createElement("script")
        script.type = "text/javascript";
        if (script.readyState) {
            script.onreadystatechange = function() {
                if (script.readyState == "loaded" || script.readyState == "complete") {
                    script.onreadystatechange = null;
                    callback();
                }
            };
        } else {
            script.onload = function() {
                callback();
            };
        }
        script.src = url;
        document.body.appendChild(script);
    }

    // loadStyle("/css/all.css", function() {});
    
    setTimeout(function() {
        loadScript("/js/jquery-3.4.1.min.js", function() {
        	loadScript("/js/script.js", function() {});
            $( document ).ready(function() {
                /*console.log( "ready!" );*/
                /*loadScriptWithAttribute("/js/script.js", function() {},{"data-ad-client": "ca-pub-5616123127531866"});*/
                /*loadScript("https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0", function() {});*/
				//loadScript("/js/sdk.js", function() {});
                
            });
        });
        
    }, 1500);
    
        /*loadStyle("/css/bootstrap.css", function() { });
        loadStyle("/css/font-awesome.css", function() {});
        loadStyle("/css/stacks.css", function() {});
        loadStyle("/css/primary.css", function() {});
        loadStyle("/css/secondary.css", function() {});
        loadStyle("/css/menu.css", function() {});       
        loadStyle("/css/style.css", function() {});*/
</script>