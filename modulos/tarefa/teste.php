<a href="teste.html?page=1"> Abre pagina teste com div 1 </a>
<a href="teste.html?page=2"> Abre pagina teste com div 2 </a>
<a href="teste.html?page=3"> Abre pagina teste com div 3 </a>

<html>
    </head>
        <script>
            function getUrlVars() {
                var vars = {};
                var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
                    vars[key] = value;
                });
                return vars;
            }

            function init() {
                var page = getUrlVars()["page"];
                document.getElementById( "div"+page ).style.display = "inline"; 
            }


        </script>
    </head>
    <body onload="init()">
        <div id="div1" style="display:none;" > esta eh div 1</div>
        <div id="div2" style="display:none" >esta eh div 2</div>
        <div id="div3" style="display:none" >esta eh div 3</div>
    </body>
</html>