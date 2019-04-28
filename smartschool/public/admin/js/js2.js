"use strict";
! function(e) {
    e.fn.circliful = function(t, r) {
        var o = e.extend({
            foregroundColor: "#3498DB",
            backgroundColor: "#ccc",
            pointColor: "none",
            fillColor: "none",
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            pointSize: 28.5,
            fontColor: "#aaa",
            percent: 75,
            animation: 1,
            animationStep: 5,
            icon: "none",
            iconSize: "30",
            iconColor: "#ccc",
            iconPosition: "top",
            iconDecoration: !0,
            target: 0,
            start: 0,
            showPercent: 1,
            percentageTextSize: 22,
            percentageX: 100,
            percentageY: 113,
            textAdditionalCss: "",
            targetPercent: 0,
            targetTextSize: 17,
            targetColor: "#2980B9",
            text: null,
            textStyle: null,
            textColor: "#666",
            textY: null,
            textX: null,
            multiPercentage: 0,
            percentages: [],
            multiPercentageLegend: 0,
            textBelow: !1,
            noPercentageSign: !1,
            replacePercentageByText: null,
            halfCircle: !1,
            animateInView: !1,
            decimals: 0,
            alwaysDecimals: !1,
            title: "Circle Chart",
            description: "",
            progressColor: null
        }, t);
        return this.each(function() {
            function t() {
                var e = m,
                    t = z;
                if (1 === o.multiPercentage) {
                    var r, l = o.percentages,
                        a = 360;
                    for (r = 0; r < l.length; ++r) t = a / 100 * (g = l[r].percent), e = i.find("#circle" + (r + 1)), r > 0 && (t = (a += 62.5) / 100 * g), n(e, t, a, g)
                } else n(e, t, 360, g)
            }
            function n(t, n, l, a) {
                var c = window.setInterval(function() {
                    P >= n ? (window.clearInterval(c), v = 1, "function" == typeof r && r.call(this)) : (P += b, B += T), o.halfCircle ? 2 * P / (l / 100) >= a && 1 === v && (P = l / 100 * a / 2) : P / (l / 100) >= a && 1 === v && (P = l / 100 * a), B > o.target && 1 === v && (B = o.target), null === o.replacePercentageByText && (S = o.halfCircle ? parseFloat(100 * P / l * 2) : parseFloat(100 * P / l), S = S.toFixed(o.decimals), !o.alwaysDecimals && (0 === a || a > 1 && 1 !== v) && (S = parseInt(S))), t.attr("stroke-dasharray", P + ", 20000"), 1 !== o.multiPercentage ? 1 === o.showPercent ? w.find(".number").text(S) : (w.find(".number").text(B), w.find(".percent").text("")) : (w.find(".number").text(""), w.find(".percent").text("")), null !== C && e.each(C, function(e, r) {
                        o.halfCircle && (e /= 2), P >= e * (l / 100) && t.css({
                            stroke: r,
                            transition: "stroke 0.1s linear"
                        })
                    })
                }.bind(t), k)
            }
            function l() {
                var t = -1 !== navigator.userAgent.toLowerCase().indexOf("webkit") ? "body" : "html",
                    r = e(t).scrollTop(),
                    o = r + e(window).height(),
                    n = Math.round(m.offset().top),
                    l = n + m.height();
                return n < o && l > r
            }
            function a() {
                m.hasClass("start") || l(m) && (m.addClass("start"), setTimeout(t, 250))
            }
            function c() {
                var t, r = i.height(),
                    n = i.width(),
                    l = o.percentages,
                    a = "";
                for (t = 0; t < l.length; ++t) {
                    var c = l[t].title;
                    a += '<div><span class="color-box" style="background: ' + l[t].color + '"></span>' + c + ", " + l[t].percent + "%</div>"
                }
                i.append(e("<div/>").append(a).attr("style", "position:absolute;top:" + r / 3 + "px;left:" + (n + 20) + "px").attr("class", "legend-line"))
            }
            var i = e(this);
            ! function(t, r) {
                e.each(t, function(e, o) {
                    e.toLowerCase() in r && (t[e] = r[e.toLowerCase()])
                })
            }(o, i.data());
            var s, x, d, g = o.percent,
                f = 83,
                p = 100,
                u = o.percentageY,
                h = o.percentageX,
                y = o.backgroundBorderWidth,
                C = o.progressColor;
            if (o.halfCircle ? "left" === o.iconPosition ? (p = 80, f = 100, h = 117, u = 100) : o.halfCircle && (f = 80, u = 100) : "bottom" === o.iconPosition ? (f = 124, u = 95) : "left" === o.iconPosition ? (p = 80, f = 110, h = 117) : "middle" === o.iconPosition ? (1 !== o.multiPercentage && (o.iconDecoration && (x = '<g stroke="' + ("none" !== o.backgroundColor ? o.backgroundColor : "#ccc") + '" ><line x1="133" y1="50" x2="140" y2="40" stroke-width="2"  /></g>', x += '<g stroke="' + ("none" !== o.backgroundColor ? o.backgroundColor : "#ccc") + '" ><line x1="140" y1="40" x2="200" y2="40" stroke-width="2"  /></g>'), h = 170, u = 35), f = 110) : "right" === o.iconPosition ? (p = 120, f = 110, h = 80) : "top" === o.iconPosition && "none" !== o.icon && (u = 120), o.targetPercent > 0 && !0 !== o.halfCircle && (u = 95, x = '<g stroke="' + ("none" !== o.backgroundColor ? o.backgroundColor : "#ccc") + '" ><line x1="75" y1="101" x2="125" y2="101" stroke-width="1"  /></g>', x += '<text text-anchor="middle" x="' + h + '" y="120" style="font-size: ' + o.targetTextSize + 'px;" fill="' + o.targetColor + '">' + o.targetPercent + (o.noPercentageSign && null === o.replacePercentageByText ? "" : "%") + "</text>", x += '<circle cx="100" cy="100" r="69" fill="none" stroke="' + o.backgroundColor + '" stroke-width="3" stroke-dasharray="450" transform="rotate(-90,100,100)" />', x += '<circle cx="100" cy="100" r="69" fill="none" stroke="' + o.targetColor + '" stroke-width="3" stroke-dasharray="' + 4.35 * o.targetPercent + ', 20000" transform="rotate(-90,100,100)" />'), null !== o.text && (o.halfCircle ? o.textBelow ? x += '<text text-anchor="middle" x="' + (null !== o.textX ? o.textX : "100") + '" y="' + (null !== o.textY ? o.textY : "64%") + '" style="' + o.textStyle + '" fill="' + o.textColor + '">' + o.text + "</text>" : x += '<text text-anchor="middle" x="' + (null !== o.textX ? o.textX : "100") + '" y="' + (null !== o.textY ? o.textY : "115") + '" style="' + o.textStyle + '" fill="' + o.textColor + '">' + o.text + "</text>" : o.textBelow ? x += '<text text-anchor="middle" x="' + (null !== o.textX ? o.textX : "100") + '" y="' + (null !== o.textY ? o.textY : "99%") + '" style="' + o.textStyle + '" fill="' + o.textColor + '">' + o.text + "</text>" : x += '<text text-anchor="middle" x="' + (null !== o.textX ? o.textX : "100") + '" y="' + (null !== o.textY ? o.textY : "115") + '" style="' + o.textStyle + '" fill="' + o.textColor + '">' + o.text + "</text>"), "none" !== o.icon && (d = '<text text-anchor="middle" x="' + p + '" y="' + f + '" class="icon" style="font-size: ' + o.iconSize + 'px" fill="' + o.iconColor + '">&#x' + o.icon + "</text>"), o.halfCircle) {
                i.addClass("svg-container").append(e('<svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 194 186" class="circliful">' + (void 0 !== x ? x : "") + '<clipPath id="cut-off-bottom"> <rect x="100" y="0" width="100" height="200" /> </clipPath><circle cx="100" cy="100" r="57" class="border" fill="' + o.fillColor + '" stroke="' + o.backgroundColor + '" stroke-width="' + y + '" stroke-dasharray="360" clip-path="url(#cut-off-bottom)" transform="rotate(-90,100,100)" /><circle class="circle" cx="100" cy="100" r="57" class="border" fill="none" stroke="' + o.foregroundColor + '" stroke-width="' + o.foregroundBorderWidth + '" stroke-dasharray="0,20000" transform="rotate(-180,100,100)" /><circle cx="100" cy="100" r="' + o.pointSize + '" fill="' + o.pointColor + '" clip-path="url(#cut-off-bottom)" transform="rotate(-90,100,100)" />' + d + '<text class="timer" text-anchor="middle" x="' + h + '" y="' + u + '" style="font-size: ' + o.percentageTextSize + "px; " + s + ";" + o.textAdditionalCss + '" fill="' + o.fontColor + '"><tspan class="number">' + (null === o.replacePercentageByText ? 0 : o.replacePercentageByText) + '</tspan><tspan class="percent">' + (o.noPercentageSign || null !== o.replacePercentageByText ? "" : "%") + "</tspan></text>"))
            } else ! function() {
                if (1 === o.multiPercentage) {
                    var t, r, n, l, a, g = o.percentages,
                        f = 47,
                        p = 360;
                    for (t = 0; t < g.length; ++t) n = g[t].percent, l = g[t].color, r = p / 100 * n, t > 0 && (r = (p += 62.5) / 100 * n), a += '<circle cx="100" cy="100" r="' + (f += 10) + '" class="border" fill="' + o.fillColor + '" stroke="' + o.backgroundColor + '" stroke-width="' + y + '" stroke-dasharray="' + p + '" transform="rotate(' + -90 + ',100,100)" /><circle class="circle" id="circle' + (t + 1) + '" data-percent="' + n + '" cx="100" cy="100" r="' + f + '" class="border" fill="none" stroke="' + l + '" stroke-width="' + o.foregroundBorderWidth + '" stroke-dasharray="' + r + ',20000" transform="rotate(' + -90 + ',100,100)" />';
                    i.addClass("svg-container").append(e('<svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 194 186" class="circliful">' + (void 0 !== x ? x : "") + a + d + '<text class="timer" text-anchor="middle" x="' + h + '" y="' + u + '" style="font-size: ' + o.percentageTextSize + "px; " + s + ";" + o.textAdditionalCss + '" fill="' + o.fontColor + '"><tspan class="number">' + (null === o.replacePercentageByText ? 0 : o.replacePercentageByText) + '</tspan><tspan class="percent">' + (o.noPercentageSign || null !== o.replacePercentageByText ? "" : "%") + "</tspan></text>")), 1 === o.multiPercentageLegend && c()
                } else i.addClass("svg-container").append(e('<svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 194 186" class="circliful">' + (void 0 !== x ? x : "") + '<circle cx="100" cy="100" r="57" class="border" fill="' + o.fillColor + '" stroke="' + o.backgroundColor + '" stroke-width="' + y + '" stroke-dasharray="360" transform="rotate(-90,100,100)" /><circle class="circle" cx="100" cy="100" r="57" class="border" fill="none" stroke="' + o.foregroundColor + '" stroke-width="' + o.foregroundBorderWidth + '" stroke-dasharray="0,20000" transform="rotate(-90,100,100)" /><circle cx="100" cy="100" r="' + o.pointSize + '" fill="' + o.pointColor + '" />' + d + '<text class="timer" text-anchor="middle" x="' + h + '" y="' + u + '" style="font-size: ' + o.percentageTextSize + "px; " + s + ";" + o.textAdditionalCss + '" fill="' + o.fontColor + '"><tspan class="number">' + (null === o.replacePercentageByText ? 0 : o.replacePercentageByText) + '</tspan><tspan class="percent">' + (o.noPercentageSign || null !== o.replacePercentageByText ? "" : "%") + "</tspan></text>"))
            }();
            var m = i.find(".circle"),
                w = i.find(".timer"),
                k = 30,
                P = 0,
                b = o.animationStep,
                v = 0,
                B = 0,
                T = 0,
                S = g,
                z = 3.6 * g;
            o.halfCircle && (z = 3.6 * g / 2), null !== o.replacePercentageByText && (S = o.replacePercentageByText), o.start > 0 && o.target > 0 && (g = o.start / (o.target / 100), T = o.target / 100), 1 === o.animation ? o.animateInView ? e(window).scroll(function() {
                a()
            }) : t() : 1 !== o.multiPercentage ? (m.attr("stroke-dasharray", z + ", 20000"), 1 === o.showPercent ? w.find(".number").text(S) : (w.find(".number").text(o.target), w.find(".percent").text(""))) : null !== o.replacePercentageByText && (w.find(".number").text(o.replacePercentageByText), w.find(".percent").text(""))
        })
    }
}(jQuery);