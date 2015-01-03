(function() {
    var Ferramentas = {
       ValorPadrao : function (valor, default_) {
           valor = typeof valor !== "undefined" ? valor : default_;
           return valor;
       }
    };
    
    
    
   var Elemento = function(ele) {
        if(!(this instanceof arguments.callee)){
            return new Elemento(ele);
        }
        
        this.Get = function () {
            return document.querySelector(ele);
        };
        
        this.Width = function(width) {
            if (typeof width !== "undefined") {
                this.Get().style.width = width + "px";
            }
            return this.Get().clientWidth;
        };
        
        this.Height = function(height) {
            if (typeof height !== "undefined") {
                this.Get().style.height = height + "px";
            }
            return this.Get().clientHeight;
        };
   };
   
   
   
   
   var Tabuleiro = function() {
       this.container = Elemento("#tabuleiro");
       
       this.Render = function (proporcao) {
           proporcao = Ferramentas.ValorPadrao(proporcao, 2.7);
           this.CriarTabuleiro(proporcao);
       };
       
       this.CriarTabuleiro = function (proporcao) {
           this.container.innerHTML = "";
           var width = Elemento("body").Width() / proporcao;
           this.container.Width(width);
           this.container.Height(width + 1);
           var branco;
           for (var linha = 1; linha <= 8; linha++) {
               if ((linha % 2) !== 0) {
                    branco = true;
                } else {
                    branco = false;
                }
               for (var coluna = 1; coluna <= 8; coluna++) {
                   var div = document.createElement("div");
                   div.classList.add("casa");
                   if (branco) {
                       div.classList.add("casasBrancas");
                       branco = false;
                   } else {
                       div.classList.add("casasNegras");
                       branco = true;
                   }
                   div.style.height = (width / 8) + "px";
                   div.setAttribute("id", "casa" + linha + coluna);
                   this.container.Get().appendChild(div);
               }
           }
       };
   };
   
   
   
   document.addEventListener("DOMContentLoaded", function() {
        var tabuleiro = new Tabuleiro();
        tabuleiro.Render();
    });
})();

