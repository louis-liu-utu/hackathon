!function(e){var t={};function r(n){if(t[n])return t[n].exports;var o=t[n]={i:n,l:!1,exports:{}};return e[n].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=e,r.c=t,r.d=function(e,t,n){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)r.d(n,o,function(t){return e[t]}.bind(null,o));return n},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="/",r(r.s=0)}({0:function(e,t,r){r("bUC5"),r("aVt4"),r("oMlb"),e.exports=r("yEMo")},aVt4:function(e,t){},bUC5:function(e,t){var r=document.querySelector("form"),n=document.querySelectorAll("form [required]");r.addEventListener("submit",(function(e){e.preventDefault();var t=!0;n&&n.forEach((function(e){var r=e.parentElement.querySelector(".error"),n=e.parentElement.querySelector("label").innerText;""==e.value.trim()?r&&n&&(r.innerHTML=n+" is required",r.style.display="block",t=!1):r&&n&&(r.innerHTML="",r.style.display="none")}));var r=document.querySelector("form input[type=email]");if(r){var o=r.parentElement.querySelector(".error");/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(r.value)?(o.innerHTML="",o.style.display="none"):(o.innerHTML="email format is invalid",o.style.display="block",t=!1)}t&&this.submit()}))},oMlb:function(e,t){},yEMo:function(e,t){}});