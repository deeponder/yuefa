// (function($) {
//   'use strict';

//   $(function() {
//     var $fullText = $('.admin-fullText');
//     $('#admin-fullscreen').on('click', function() {
//       $.AMUI.fullscreen.toggle();
//     });

//     $(document).on($.AMUI.fullscreen.raw.fullscreenchange, function() {
//       $.AMUI.fullscreen.isFullscreen ? $fullText.text('关闭全屏') : $fullText.text('开启全屏');
//     });
//   });
// })(jQuery);
/*! Build on Thu Jan 15 2015 13:43:46 GMT+0800 (CST) */
(function() {
    var t = this.jQuery;
    if (t) {
        var o = function() {
            var o = t('<!--[if lte IE 9]><span id="old-ie-tester"></span><![endif]-->'),
            i = t(document.body).append(o).find("#old-ie-tester").length;
            return o.remove(),
            !!i
        },
        i = function() {
            this.isOldIE = o(),
            this.init()
        };
        i.prototype.init = function() {
            this.toolbar()
        },
        i.prototype.toolbar = function() {
            function o() {
                e.scrollTop() > 10 ? r.addClass("am-active") : r.removeClass("am-active")
            }
            function i() {
                l.css(e.width() > 1110 ? {
                    right: (e.width() - 1110) / 2
                }: {
                    right: "10px"
                })
            }
            var n = this,
            e = t(window),
            l = t("#amp-toolbar"),
            r = l.find("#amp-go-top");
            r.length && (r.on("click",
            function(o) {
                return o.preventDefault(),
                n.isOldIE ? (t("html, body").animate({
                    scrollTop: 0
                },
                500), !1) : void e.smoothScroll(0)
            }), o(), i(), e.on("scroll", t.AMUI.utils.debounce(o, 100)), e.on("resize", t.AMUI.utils.debounce(i, 100)))
        },
        t(function() {
            new i
        })
    }
}).call(this);
