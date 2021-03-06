/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/
jQuery(document).ready(function () {
        jQuery('header nav').meanmenu();
    });

window.getComputedStyle || (window.getComputedStyle = function(el, pseudo) {
    this.el = el;
    this.getPropertyValue = function(prop) {
        var re = /(\-([a-z]){1})/g;
        prop == "float" && (prop = "styleFloat");
        re.test(prop) && (prop = prop.replace(re, function() {
            return arguments[2].toUpperCase();
        }));
        return el.currentStyle[prop] ? el.currentStyle[prop] : null;
    };
    return this;
});

jQuery(document).ready(function($) {
    var responsive_viewport = $(window).width();
    responsive_viewport < 481;
    responsive_viewport > 481;
    responsive_viewport >= 768 && $(".comment img[data-gravatar]").each(function() {
        $(this).attr("src", $(this).attr("data-gravatar"));
    });
    responsive_viewport > 1030;
});

(function(w) {
    function restoreZoom() {
        meta.setAttribute("content", enabledZoom);
        enabled = !0;
    }
    function disableZoom() {
        meta.setAttribute("content", disabledZoom);
        enabled = !1;
    }
    function checkTilt(e) {
        aig = e.accelerationIncludingGravity;
        x = Math.abs(aig.x);
        y = Math.abs(aig.y);
        z = Math.abs(aig.z);
        !w.orientation && (x > 7 || (z > 6 && y < 8 || z < 8 && y > 6) && x > 5) ? enabled && disableZoom() : enabled || restoreZoom();
    }
    if (!(/iPhone|iPad|iPod/.test(navigator.platform) && navigator.userAgent.indexOf("AppleWebKit") > -1)) return;
    var doc = w.document;
    if (!doc.querySelector) return;
    var meta = doc.querySelector("meta[name=viewport]"), initialContent = meta && meta.getAttribute("content"), disabledZoom = initialContent + ",maximum-scale=1", enabledZoom = initialContent + ",maximum-scale=10", enabled = !0, x, y, z, aig;
    if (!meta) return;
    w.addEventListener("orientationchange", restoreZoom, !1);
    w.addEventListener("devicemotion", checkTilt, !1);
})(this);
