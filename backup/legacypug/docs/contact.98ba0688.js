!function(){var e,t,a={};e="undefined"!=typeof window?window:{},t=function(e,t,a){var n,i;if(function(){var t,a={lazyClass:"lazyload",loadedClass:"lazyloaded",loadingClass:"lazyloading",preloadClass:"lazypreload",errorClass:"lazyerror",autosizesClass:"lazyautosizes",fastLoadedClass:"ls-is-cached",iframeLoadMode:0,srcAttr:"data-src",srcsetAttr:"data-srcset",sizesAttr:"data-sizes",minSize:40,customMedia:{},init:!0,expFactor:1.5,hFac:.8,loadMode:2,loadHidden:!0,ricTimeout:0,throttleDelay:125};for(t in i=e.lazySizesConfig||e.lazysizesConfig||{},a)t in i||(i[t]=a[t])}(),!t||!t.getElementsByClassName)return{init:function(){},cfg:i,noSupport:!0};var r=t.documentElement,o=e.HTMLPictureElement,s="addEventListener",l="getAttribute",c=e[s].bind(e),d=e.setTimeout,u=e.requestAnimationFrame||d,f=e.requestIdleCallback,m=/^picture$/i,z=["load","error","lazyincluded","_lazyloaded"],h={},y=Array.prototype.forEach,v=function(e,t){return h[t]||(h[t]=new RegExp("(\\s|^)"+t+"(\\s|$)")),h[t].test(e[l]("class")||"")&&h[t]},g=function(e,t){v(e,t)||e.setAttribute("class",(e[l]("class")||"").trim()+" "+t)},p=function(e,t){var a;(a=v(e,t))&&e.setAttribute("class",(e[l]("class")||"").replace(a," "))},C=function(e,t,a){var n=a?s:"removeEventListener";a&&C(e,t),z.forEach((function(a){e[n](a,t)}))},b=function(e,a,i,r,o){var s=t.createEvent("Event");return i||(i={}),i.instance=n,s.initEvent(a,!r,!o),s.detail=i,e.dispatchEvent(s),s},A=function(t,a){var n;!o&&(n=e.picturefill||i.pf)?(a&&a.src&&!t[l]("srcset")&&t.setAttribute("srcset",a.src),n({reevaluate:!0,elements:[t]})):a&&a.src&&(t.src=a.src)},E=function(e,t){return(getComputedStyle(e,null)||{})[t]},_=function(e,t,a){for(a=a||e.offsetWidth;a<i.minSize&&t&&!e._lazysizesWidth;)a=t.offsetWidth,t=t.parentNode;return a},w=function(){var e,a,n=[],i=[],r=n,o=function(){var t=r;for(r=n.length?i:n,e=!0,a=!1;t.length;)t.shift()();e=!1},s=function(n,i){e&&!i?n.apply(this,arguments):(r.push(n),a||(a=!0,(t.hidden?d:u)(o)))};return s._lsFlush=o,s}(),M=function(e,t){return t?function(){w(e)}:function(){var t=this,a=arguments;w((function(){e.apply(t,a)}))}},N=function(e){var t,n,i=function(){t=null,e()},r=function(){var e=a.now()-n;e<99?d(r,99-e):(f||i)(i)};return function(){n=a.now(),t||(t=d(r,99))}},L=function(){var o,z,h,_,L,S,x,B,T,F,R,D,k=/^img$/i,H=/^iframe$/i,O="onscroll"in e&&!/(gle|ing)bot/.test(navigator.userAgent),P=0,$=0,q=-1,I=function(e){$--,(!e||$<0||!e.target)&&($=0)},U=function(e){return null==D&&(D="hidden"==E(t.body,"visibility")),D||!("hidden"==E(e.parentNode,"visibility")&&"hidden"==E(e,"visibility"))},j=function(e,a){var n,i=e,o=U(e);for(B-=a,R+=a,T-=a,F+=a;o&&(i=i.offsetParent)&&i!=t.body&&i!=r;)(o=(E(i,"opacity")||1)>0)&&"visible"!=E(i,"overflow")&&(n=i.getBoundingClientRect(),o=F>n.left&&T<n.right&&R>n.top-1&&B<n.bottom+1);return o},G=function(){var e,a,s,c,d,u,f,m,h,y,v,g,p=n.elements;if((_=i.loadMode)&&$<8&&(e=p.length)){for(a=0,q++;a<e;a++)if(p[a]&&!p[a]._lazyRace)if(!O||n.prematureUnveil&&n.prematureUnveil(p[a]))Z(p[a]);else if((m=p[a][l]("data-expand"))&&(u=1*m)||(u=P),y||(y=!i.expand||i.expand<1?r.clientHeight>500&&r.clientWidth>500?500:370:i.expand,n._defEx=y,v=y*i.expFactor,g=i.hFac,D=null,P<v&&$<1&&q>2&&_>2&&!t.hidden?(P=v,q=0):P=_>1&&q>1&&$<6?y:0),h!==u&&(S=innerWidth+u*g,x=innerHeight+u,f=-1*u,h=u),s=p[a].getBoundingClientRect(),(R=s.bottom)>=f&&(B=s.top)<=x&&(F=s.right)>=f*g&&(T=s.left)<=S&&(R||F||T||B)&&(i.loadHidden||U(p[a]))&&(z&&$<3&&!m&&(_<3||q<4)||j(p[a],u))){if(Z(p[a]),d=!0,$>9)break}else!d&&z&&!c&&$<4&&q<4&&_>2&&(o[0]||i.preloadAfterLoad)&&(o[0]||!m&&(R||F||T||B||"auto"!=p[a][l](i.sizesAttr)))&&(c=o[0]||p[a]);c&&!d&&Z(c)}},J=function(e){var t,n=0,r=i.throttleDelay,o=i.ricTimeout,s=function(){t=!1,n=a.now(),e()},l=f&&o>49?function(){f(s,{timeout:o}),o!==i.ricTimeout&&(o=i.ricTimeout)}:M((function(){d(s)}),!0);return function(e){var i;(e=!0===e)&&(o=33),t||(t=!0,(i=r-(a.now()-n))<0&&(i=0),e||i<9?l():d(l,i))}}(G),K=function(e){var t=e.target;t._lazyCache?delete t._lazyCache:(I(e),g(t,i.loadedClass),p(t,i.loadingClass),C(t,V),b(t,"lazyloaded"))},Q=M(K),V=function(e){Q({target:e.target})},X=function(e){var t,a=e[l](i.srcsetAttr);(t=i.customMedia[e[l]("data-media")||e[l]("media")])&&e.setAttribute("media",t),a&&e.setAttribute("srcset",a)},Y=M((function(e,t,a,n,r){var o,s,c,u,f,z;(f=b(e,"lazybeforeunveil",t)).defaultPrevented||(n&&(a?g(e,i.autosizesClass):e.setAttribute("sizes",n)),s=e[l](i.srcsetAttr),o=e[l](i.srcAttr),r&&(u=(c=e.parentNode)&&m.test(c.nodeName||"")),z=t.firesLoad||"src"in e&&(s||o||u),f={target:e},g(e,i.loadingClass),z&&(clearTimeout(h),h=d(I,2500),C(e,V,!0)),u&&y.call(c.getElementsByTagName("source"),X),s?e.setAttribute("srcset",s):o&&!u&&(H.test(e.nodeName)?function(e,t){var a=e.getAttribute("data-load-mode")||i.iframeLoadMode;0==a?e.contentWindow.location.replace(t):1==a&&(e.src=t)}(e,o):e.src=o),r&&(s||u)&&A(e,{src:o})),e._lazyRace&&delete e._lazyRace,p(e,i.lazyClass),w((function(){var t=e.complete&&e.naturalWidth>1;z&&!t||(t&&g(e,i.fastLoadedClass),K(f),e._lazyCache=!0,d((function(){"_lazyCache"in e&&delete e._lazyCache}),9)),"lazy"==e.loading&&$--}),!0)})),Z=function(e){if(!e._lazyRace){var t,a=k.test(e.nodeName),n=a&&(e[l](i.sizesAttr)||e[l]("sizes")),r="auto"==n;(!r&&z||!a||!e[l]("src")&&!e.srcset||e.complete||v(e,i.errorClass)||!v(e,i.lazyClass))&&(t=b(e,"lazyunveilread").detail,r&&W.updateElem(e,!0,e.offsetWidth),e._lazyRace=!0,$++,Y(e,t,r,n,a))}},ee=N((function(){i.loadMode=3,J()})),te=function(){3==i.loadMode&&(i.loadMode=2),ee()},ae=function(){z||(a.now()-L<999?d(ae,999):(z=!0,i.loadMode=3,J(),c("scroll",te,!0)))};return{_:function(){L=a.now(),n.elements=t.getElementsByClassName(i.lazyClass),o=t.getElementsByClassName(i.lazyClass+" "+i.preloadClass),c("scroll",J,!0),c("resize",J,!0),c("pageshow",(function(e){if(e.persisted){var a=t.querySelectorAll("."+i.loadingClass);a.length&&a.forEach&&u((function(){a.forEach((function(e){e.complete&&Z(e)}))}))}})),e.MutationObserver?new MutationObserver(J).observe(r,{childList:!0,subtree:!0,attributes:!0}):(r[s]("DOMNodeInserted",J,!0),r[s]("DOMAttrModified",J,!0),setInterval(J,999)),c("hashchange",J,!0),["focus","mouseover","click","load","transitionend","animationend"].forEach((function(e){t[s](e,J,!0)})),/d$|^c/.test(t.readyState)?ae():(c("load",ae),t[s]("DOMContentLoaded",J),d(ae,2e4)),n.elements.length?(G(),w._lsFlush()):J()},checkElems:J,unveil:Z,_aLSL:te}}(),W=function(){var e,a=M((function(e,t,a,n){var i,r,o;if(e._lazysizesWidth=n,n+="px",e.setAttribute("sizes",n),m.test(t.nodeName||""))for(r=0,o=(i=t.getElementsByTagName("source")).length;r<o;r++)i[r].setAttribute("sizes",n);a.detail.dataAttr||A(e,a.detail)})),n=function(e,t,n){var i,r=e.parentNode;r&&(n=_(e,r,n),(i=b(e,"lazybeforesizes",{width:n,dataAttr:!!t})).defaultPrevented||(n=i.detail.width)&&n!==e._lazysizesWidth&&a(e,r,i,n))},r=N((function(){var t,a=e.length;if(a)for(t=0;t<a;t++)n(e[t])}));return{_:function(){e=t.getElementsByClassName(i.autosizesClass),c("resize",r)},checkElems:r,updateElem:n}}(),S=function(){!S.i&&t.getElementsByClassName&&(S.i=!0,W._(),L._())};return d((function(){i.init&&S()})),n={cfg:i,autoSizer:W,loader:L,init:S,uP:A,aC:g,rC:p,hC:v,fire:b,gW:_,rAF:w}}(e,e.document,Date),e.lazySizes=t,a&&(a=t)}();
//# sourceMappingURL=contact.98ba0688.js.map
