! function(a) {
    "object" != typeof a.joms && (a.joms = {}), a.joms.DEBUG = !1, a.joms.log = a.joms.info = a.joms.warn = function(a) {}, a.joms_cache_$LAB = a.$LAB, a.joms_cache_Hammer = a.Hammer
}(this),
function(a) {
    function b(a) {
        return "[object Function]" == Object.prototype.toString.call(a)
    }

    function c(a) {
        return "[object Array]" == Object.prototype.toString.call(a)
    }

    function d(a, b) {
        var c = /^\w+\:\/\//;
        return /^\/\/\/?/.test(a) ? a = location.protocol + a : c.test(a) || "/" == a.charAt(0) || (a = (b || "") + a), c.test(a) ? a : ("/" == a.charAt(0) ? r : q) + a
    }

    function e(a, b) {
        for (var c in a) a.hasOwnProperty(c) && (b[c] = a[c]);
        return b
    }

    function f(a) {
        for (var b = !1, c = 0; c < a.scripts.length; c++) a.scripts[c].ready && a.scripts[c].exec_trigger && (b = !0, a.scripts[c].exec_trigger(), a.scripts[c].exec_trigger = null);
        return b
    }

    function g(a, b, c, d) {
        a.onload = a.onreadystatechange = function() {
            a.readyState && "complete" != a.readyState && "loaded" != a.readyState || b[c] || (a.onload = a.onreadystatechange = null, d())
        }
    }

    function h(a) {
        a.ready = a.finished = !0;
        for (var b = 0; b < a.finished_listeners.length; b++) a.finished_listeners[b]();
        a.ready_listeners = [], a.finished_listeners = []
    }

    function i(a, b, c, d, e) {
        setTimeout(function() {
            var f, h, i = b.real_src;
            if ("item" in s) {
                if (!s[0]) return void setTimeout(arguments.callee, 25);
                s = s[0]
            }
            f = document.createElement("script"), b.type && (f.type = b.type), b.charset && (f.charset = b.charset), e ? w ? (c.elem = f, v ? (f.preload = !0, f.onpreload = d) : f.onreadystatechange = function() {
                "loaded" == f.readyState && d()
            }, f.src = i) : e && 0 == i.indexOf(r) && a[l] ? (h = new XMLHttpRequest, h.onreadystatechange = function() {
                4 == h.readyState && (h.onreadystatechange = function() {}, c.text = h.responseText + "\n//@ sourceURL=" + i, d())
            }, h.open("GET", i), h.send()) : (f.type = "text/cache-script", g(f, c, "ready", function() {
                s.removeChild(f), d()
            }), f.src = i, s.insertBefore(f, s.firstChild)) : x ? (f.async = !1, g(f, c, "finished", d), f.src = i, s.insertBefore(f, s.firstChild)) : (g(f, c, "finished", d), f.src = i, s.insertBefore(f, s.firstChild))
        }, 0)
    }

    function j() {
        function q(a, b, c) {
            function d() {
                null != e && (e = null, h(c))
            }
            var e;
            A[b.src].finished || (a[n] || (A[b.src].finished = !0), e = c.elem || document.createElement("script"), b.type && (e.type = b.type), b.charset && (e.charset = b.charset), g(e, c, "finished", d), c.elem ? c.elem = null : c.text ? (e.onload = e.onreadystatechange = null, e.text = c.text) : e.src = b.real_src, s.insertBefore(e, s.firstChild), c.text && d())
        }

        function r(a, b, c, e) {
            var f, g, j = function() {
                    b.ready_cb(b, function() {
                        q(a, b, f)
                    })
                },
                k = function() {
                    b.finished_cb(b, c)
                };
            b.src = d(b.src, a[p]), b.real_src = b.src + (a[o] ? (/\?.*$/.test(b.src) ? "&_" : "?_") + ~~(1e9 * Math.random()) + "=" : ""), A[b.src] || (A[b.src] = {
                items: [],
                finished: !1
            }), g = A[b.src].items, a[n] || 0 == g.length ? (f = g[g.length] = {
                ready: !1,
                finished: !1,
                ready_listeners: [j],
                finished_listeners: [k]
            }, i(a, b, f, e ? function() {
                f.ready = !0;
                for (var a = 0; a < f.ready_listeners.length; a++) f.ready_listeners[a]();
                f.ready_listeners = []
            } : function() {
                h(f)
            }, e)) : (f = g[0], f.finished ? k() : f.finished_listeners.push(k))
        }

        function t() {
            function a(a, b) {
                a.ready = !0, a.exec_trigger = b, g()
            }

            function d(a, b) {
                a.ready = a.finished = !0, a.exec_trigger = null;
                for (var c = 0; c < b.scripts.length; c++)
                    if (!b.scripts[c].finished) return;
                b.finished = !0, g()
            }

            function g() {
                for (; n < l.length;)
                    if (b(l[n])) try {
                        l[n++]()
                    } catch (a) {} else {
                        if (!l[n].finished) {
                            if (f(l[n])) continue;
                            break
                        }
                        n++
                    }
                    n == l.length && (o = !1, j = !1)
            }

            function h() {
                j && j.scripts || l.push(j = {
                    scripts: [],
                    finished: !0
                })
            }
            var i, j, k = e(v, {}),
                l = [],
                n = 0,
                o = !1;
            return i = {
                script: function() {
                    for (var f = 0; f < arguments.length; f++) ! function(f, g) {
                        var l;
                        c(f) || (g = [f]);
                        for (var n = 0; n < g.length; n++) h(), f = g[n], b(f) && (f = f()), f && (c(f) ? (l = [].slice.call(f), l.unshift(n, 1), [].splice.apply(g, l), n--) : ("string" == typeof f && (f = {
                            src: f
                        }), f = e(f, {
                            ready: !1,
                            ready_cb: a,
                            finished: !1,
                            finished_cb: d
                        }), j.finished = !1, j.scripts.push(f), r(k, f, j, x && o), o = !0, k[m] && i.wait()))
                    }(arguments[f], arguments[f]);
                    return i
                },
                wait: function() {
                    if (arguments.length > 0) {
                        for (var a = 0; a < arguments.length; a++) l.push(arguments[a]);
                        j = l[l.length - 1]
                    } else j = !1;
                    return g(), i
                }
            }, {
                script: i.script,
                wait: i.wait,
                setOptions: function(a) {
                    return e(a, k), i
                }
            }
        }
        var u, v = {},
            x = w || y,
            z = [],
            A = {};
        return v[l] = !0, v[m] = !1, v[n] = !1, v[o] = !1, v[p] = "", u = {
            setGlobalDefaults: function(a) {
                return e(a, v), u
            },
            setOptions: function() {
                return t().setOptions.apply(null, arguments)
            },
            script: function() {
                return t().script.apply(null, arguments)
            },
            wait: function() {
                return t().wait.apply(null, arguments)
            },
            queueScript: function() {
                return z[z.length] = {
                    type: "script",
                    args: [].slice.call(arguments)
                }, u
            },
            queueWait: function() {
                return z[z.length] = {
                    type: "wait",
                    args: [].slice.call(arguments)
                }, u
            },
            runQueue: function() {
                for (var a, b = u, c = z.length, d = c; --d >= 0;) a = z.shift(), b = b[a.type].apply(null, a.args);
                return b
            },
            noConflict: function() {
                return a.$LAB = k, u
            },
            sandbox: function() {
                return j()
            }
        }
    }
    var k = a.$LAB,
        l = "UseLocalXHR",
        m = "AlwaysPreserveOrder",
        n = "AllowDuplicates",
        o = "CacheBust",
        p = "BasePath",
        q = /^[^?#]*\//.exec(location.href)[0],
        r = /^\w+\:\/\/\/?[^\/]+/.exec(q)[0],
        s = document.head || document.getElementsByTagName("head"),
        t = a.opera && "[object Opera]" == Object.prototype.toString.call(a.opera) || "MozAppearance" in document.documentElement.style,
        u = document.createElement("script"),
        v = "boolean" == typeof u.preload,
        w = v || u.readyState && "uninitialized" == u.readyState,
        x = !w && u.async === !0,
        y = !w && !x && !t;
    a.$LAB = j(),
        function(a, b, c) {
            null == document.readyState && document[a] && (document.readyState = "loading", document[a](b, c = function() {
                document.removeEventListener(b, c, !1), document.readyState = "complete"
            }, !1))
        }("addEventListener", "DOMContentLoaded")
}(this),
function(a, b) {
    function c() {
        var b = a.joms.DEBUG,
            c = a.joms_assets_url || "",
            g = c + (b ? e : f) + j;
        a.joms.$LAB.script(function() {
            return a.jQuery ? null : c + h
        }).wait(function() {
            a.joms_init_toolkit()
        }).wait(d).script(function() {
            return b ? c + i : null
        }).wait(function() {
            b && require.config({
                baseUrl: c + e
            })
        }).script(g).wait(function() {
            a.joms_init_postbox(), a.joms.misc.view.fixSVG()
        })
    }

    function d() {
        a.joms.jQuery = a.jQuery, a.joms.loadCSS = a.loadCSS, a.joms.Hammer = a.Hammer, a.Hammer = a.joms_cache_Hammer, delete a.joms_cache_Hammer, a.joms._ = a._, a.joms.Backbone = a.Backbone.noConflict(), a.joms.Backbone.$ = a.joms.jQuery
    }
    a.joms.$LAB = a.$LAB, a.$LAB = a.joms_cache_$LAB, delete a.joms_cache_$LAB, a.joms.jQuery = b, a.joms.Hammer = b, a.joms._ = b, a.joms.Backbone = b, a.joms.onAjaxReponse = function(b, c) {
        a.joms._onAjaxReponseQueue || (a.joms._onAjaxReponseQueue = []), a.joms._onAjaxReponseQueue[b] || (a.joms._onAjaxReponseQueue[b] = []), a.joms._onAjaxReponseQueue[b].push(c)
    }, a.joms.onStart = function(c) {
        a.joms._onStartQueue === b && (a.joms._onStartQueue = []), a.joms._onStartStarted ? c(a.joms.jQuery) : a.joms._onStartQueue.push(c)
    }, a.joms.start = function() {
        if (a.joms_queue && a.joms_queue.length && (a.joms._onStartQueue === b && (a.joms._onStartQueue = []), a.joms._onStartQueue = a.joms_queue.concat(a.joms._onStartQueue), a.joms_queue = []), a.joms._onStartQueue !== b)
            for (; a.joms._onStartQueue.length;) try {
                a.joms._onStartQueue.shift()(a.joms.jQuery)
            } catch (c) {}
        a.joms._onStartStarted = !0
    }, a.joms.fixUI = function() {
        var a, b, c, d, e, f = document.getElementsByClassName("joms-module__wrapper"),
            g = document.getElementsByClassName("joms-module__wrapper--stacked");
        for (e = f.length - 1; e >= 0; e--) f[e].innerHTML.match(/joms-tab__content|joms-js--app-new/) || f[e].parentNode.removeChild(f[e]);
        for (e = g.length - 1; e >= 0; e--) g[e].innerHTML.match(/joms-module--stacked|joms-js--app-new/) || g[e].parentNode.removeChild(g[e]);
        a = document.getElementsByClassName("joms-sidebar")[0], a && !a.innerHTML.match(/joms-module|app-position/) && (b = document.getElementsByClassName("joms-main")[0], a.parentNode.removeChild(a), b && (b.className += " joms-main--full")), c = /android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i, c.test(navigator.userAgent) || (d = document.documentElement.className || "", document.documentElement.className = d + (d.length ? " " : "") + "joms-no-touch"), joms.onStart(function(a) {
            a(function() {
                a(".joms-select").each(function() {
                    var b, c = a(this);
                    c.parent(".joms-select--wrapper").length || (b = c.attr("size") || c.attr("multiple"), c.wrap('<div class="joms-select--wrapper' + (b ? " joms-select--expand" : "") + '"></div>'))
                })
            })
        })
    };
    var e = "source/js/",
        f = "release/js/",
        g = "vendors/",
        h = g + "jquery.min.js",
        i = g + "require.min.js",
        j = "bundle.js?_=" + (new Date).getTime();
    if (a.joms_assets_url !== b) return void c();
    var k = 0,
        l = 500,
        m = 1200,
        n = a.setInterval(function() {
            return ++k > m ? (a.clearInterval(n), void a.joms.warn("Variable `joms_assets_url` is not defined.")) : void(a.joms_assets_url !== b && (a.clearInterval(n), c()))
        }, l)
}(this);
