(function () {
    "use strict";
    var w             = window,
        d             = document,
        container,
        defaultInterval = 5000,
        slideIndex    = 0,
        inlineStyle   = ".ps-slides {display:none;width:100%}"+
                        ".ps-dot {cursor:pointer;height:13px;width:13px;padding:0;background-color:#000;color:#fff;display:inline-block;text-align:center;border-radius:50%;border:1px solid #ccc!important;background-color:transparent!important;-webkit-transition:background-color .3s,color .15s,box-shadow .3s,opacity 0.3s;transition:background-color .3s,color .15s,box-shadow .3s,opacity 0.3s}"+
                        ".ps-content{max-width:100%;margin:auto;position:relative;}"+
                        ".ps-container{width:100%;text-align:center!important;margin-top:16px!important;margin-bottom:16px!important;font-size:18px!important;color:#fff!important;position:absolute;left:0;bottom:0}"+
                        ".ps-white,.ps-white:hover{color:#000!important;background-color:#fff!important}";
    
    !w.PHOTOSLIDE && (w.PHOTOSLIDE = (function () {
        function trim(str) {
          return str.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, '');
        }
        
        function s(selector,el){
            var elm = el ? el : d;
            return elm.querySelector(selector);
        }
        
        function ss(s,e){
            var elm = e ? e : d;
            return elm.querySelectorAll(s);
        }
        
        function listen(target, evt, cb) {
            target.addEventListener ? target.addEventListener(evt, cb, false) : target.attachEvent && target.attachEvent("on" + evt, function (evt) { cb(evt || w.event);});
        }
        
        function hasClass(elm, cls) {
            if (!cls) return;
            return elm.classList ? elm.classList.contains(cls) : (new RegExp('(^|\\s)' + cls + '(\\s|$)')).test(elm.className);
        }
        
        function addClass(elm, cls) {
            if (!cls) return;
            elm.classList ? elm.classList.add(cls) : !hasClass(elm, cls) && (elm.className += (elm.className ? ' ' : '') + cls);
        }
        
        function removeClass(elm, cls) {
            if (!cls) return;
            elm.classList ? elm.classList.remove(cls) : (elm.className = trim(elm.className.replace(cls, '')), !elm.className && elm.removeAttribute('class'));
        }
                
        function plusDivs(n) { 
            showDivs(slideIndex += n);
        }
        
        function goToDiv(event) {
            if(hasClass(event.target,"ps-dot")){
                showDivs(slideIndex = event.target.getAttribute("data-ps-index"));
            }
        }
        
        function showDivs(n) {
            var i,
                x = ss(".ps-slides",container),
                dots = ss(".ps-dot",container);
            n > x.length && (slideIndex = 1);
            n < 1 && (slideIndex = x.length);
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                removeClass(dots[i],"ps-white");
            }
            x[slideIndex-1].style.display = "block";
            addClass(dots[slideIndex-1],"ps-white");
        }
        
        function carousel(){
            plusDivs(1);
            setTimeout(carousel, defaultInterval);
        }

        function injectStyles(){
            var style = d.createElement("style");                    
            style.insertAdjacentHTML("afterbegin", inlineStyle);
            s("head").appendChild(style);
        }
        
        function buildMarkup(imgs){

            var psContent = d.createElement("div"),
                psContainer,
                image,
                dot;
                
            psContent.className = "ps-content";
            
            psContainer = d.createElement("div");
            psContainer.className = "ps-container";
            
            for(var i = 0; i < imgs.length; i++){
                image = d.createElement("img");
                image.src = imgs[i];
                image.className = "ps-slides";
                psContent.appendChild(image);
                
                dot = d.createElement("span");
                dot.className = "ps-dot ps-white";
                dot.setAttribute("data-ps-index", i+1);
                psContainer.appendChild(dot);
            }
            
            psContent.appendChild(psContainer);
            
            container.appendChild(psContent);

        }
        
        function init(options){
            
            if(!options.targetElm || !options.images){
                return false;
            }
            
            var images = options.images;
            container = options.targetElm,
                
            defaultInterval = options.interval || defaultInterval;
            injectStyles();
            buildMarkup(images);
            showDivs(0);
            carousel();
            
            listen(s(".ps-content"),"click", goToDiv);
            
        }
        return {
            init  : init
        };
    }()));

}());