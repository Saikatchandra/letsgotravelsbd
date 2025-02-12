if ("undefined" == typeof jQuery) throw new Error("Bootstrap's JavaScript requires jQuery"); + function(t) {
	"use strict";
	var e = t.fn.jquery.split(" ")[0].split(".");
	if (e[0] < 2 && e[1] < 9 || 1 == e[0] && 9 == e[1] && e[2] < 1 || e[0] > 3) throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 4")
}(jQuery),
function(t) {
	"use strict";

	function e() {
		var t = document.createElement("bootstrap"),
			e = {
				WebkitTransition: "webkitTransitionEnd",
				MozTransition: "transitionend",
				OTransition: "oTransitionEnd otransitionend",
				transition: "transitionend"
			};
		for (var i in e)
			if (void 0 !== t.style[i]) return {
				end: e[i]
			};
		return !1
	}
	t.fn.emulateTransitionEnd = function(e) {
		var i = !1,
			o = this;
		t(this).one("bsTransitionEnd", function() {
			i = !0
		});
		var n = function() {
			i || t(o).trigger(t.support.transition.end)
		};
		return setTimeout(n, e), this
	}, t(function() {
		t.support.transition = e(), t.support.transition && (t.event.special.bsTransitionEnd = {
			bindType: t.support.transition.end,
			delegateType: t.support.transition.end,
			handle: function(e) {
				if (t(e.target).is(this)) return e.handleObj.handler.apply(this, arguments)
			}
		})
	})
}(jQuery),
function(t) {
	"use strict";

	function e(e) {
		return this.each(function() {
			var i = t(this),
				n = i.data("bs.alert");
			n || i.data("bs.alert", n = new o(this)), "string" == typeof e && n[e].call(i)
		})
	}
	var i = '[data-dismiss="alert"]',
		o = function(e) {
			t(e).on("click", i, this.close)
		};
	o.VERSION = "3.3.7", o.TRANSITION_DURATION = 150, o.prototype.close = function(e) {
		function i() {
			a.detach().trigger("closed.bs.alert").remove()
		}
		var n = t(this),
			s = n.attr("data-target");
		s || (s = (s = n.attr("href")) && s.replace(/.*(?=#[^\s]*$)/, ""));
		var a = t("#" === s ? [] : s);
		e && e.preventDefault(), a.length || (a = n.closest(".alert")), a.trigger(e = t.Event("close.bs.alert")), e.isDefaultPrevented() || (a.removeClass("in"), t.support.transition && a.hasClass("fade") ? a.one("bsTransitionEnd", i).emulateTransitionEnd(o.TRANSITION_DURATION) : i())
	};
	var n = t.fn.alert;
	t.fn.alert = e, t.fn.alert.Constructor = o, t.fn.alert.noConflict = function() {
		return t.fn.alert = n, this
	}, t(document).on("click.bs.alert.data-api", i, o.prototype.close)
}(jQuery),
function(t) {
	"use strict";

	function e(e) {
		return this.each(function() {
			var o = t(this),
				n = o.data("bs.button"),
				s = "object" == typeof e && e;
			n || o.data("bs.button", n = new i(this, s)), "toggle" == e ? n.toggle() : e && n.setState(e)
		})
	}
	var i = function(e, o) {
		this.$element = t(e), this.options = t.extend({}, i.DEFAULTS, o), this.isLoading = !1
	};
	i.VERSION = "3.3.7", i.DEFAULTS = {
		loadingText: "loading..."
	}, i.prototype.setState = function(e) {
		var i = "disabled",
			o = this.$element,
			n = o.is("input") ? "val" : "html",
			s = o.data();
		e += "Text", null == s.resetText && o.data("resetText", o[n]()), setTimeout(t.proxy(function() {
			o[n](null == s[e] ? this.options[e] : s[e]), "loadingText" == e ? (this.isLoading = !0, o.addClass(i).attr(i, i).prop(i, !0)) : this.isLoading && (this.isLoading = !1, o.removeClass(i).removeAttr(i).prop(i, !1))
		}, this), 0)
	}, i.prototype.toggle = function() {
		var t = !0,
			e = this.$element.closest('[data-toggle="buttons"]');
		if (e.length) {
			var i = this.$element.find("input");
			"radio" == i.prop("type") ? (i.prop("checked") && (t = !1), e.find(".active").removeClass("active"), this.$element.addClass("active")) : "checkbox" == i.prop("type") && (i.prop("checked") !== this.$element.hasClass("active") && (t = !1), this.$element.toggleClass("active")), i.prop("checked", this.$element.hasClass("active")), t && i.trigger("change")
		} else this.$element.attr("aria-pressed", !this.$element.hasClass("active")), this.$element.toggleClass("active")
	};
	var o = t.fn.button;
	t.fn.button = e, t.fn.button.Constructor = i, t.fn.button.noConflict = function() {
		return t.fn.button = o, this
	}, t(document).on("click.bs.button.data-api", '[data-toggle^="button"]', function(i) {
		var o = t(i.target).closest(".btn");
		e.call(o, "toggle"), t(i.target).is('input[type="radio"], input[type="checkbox"]') || (i.preventDefault(), o.is("input,button") ? o.trigger("focus") : o.find("input:visible,button:visible").first().trigger("focus"))
	}).on("focus.bs.button.data-api blur.bs.button.data-api", '[data-toggle^="button"]', function(e) {
		t(e.target).closest(".btn").toggleClass("focus", /^focus(in)?$/.test(e.type))
	})
}(jQuery),
function(t) {
	"use strict";

	function e(e) {
		return this.each(function() {
			var o = t(this),
				n = o.data("bs.carousel"),
				s = t.extend({}, i.DEFAULTS, o.data(), "object" == typeof e && e),
				a = "string" == typeof e ? e : s.slide;
			n || o.data("bs.carousel", n = new i(this, s)), "number" == typeof e ? n.to(e) : a ? n[a]() : s.interval && n.pause().cycle()
		})
	}
	var i = function(e, i) {
		this.$element = t(e), this.$indicators = this.$element.find(".carousel-indicators"), this.options = i, this.paused = null, this.sliding = null, this.interval = null, this.$active = null, this.$items = null, this.options.keyboard && this.$element.on("keydown.bs.carousel", t.proxy(this.keydown, this)), "hover" == this.options.pause && !("ontouchstart" in document.documentElement) && this.$element.on("mouseenter.bs.carousel", t.proxy(this.pause, this)).on("mouseleave.bs.carousel", t.proxy(this.cycle, this))
	};
	i.VERSION = "3.3.7", i.TRANSITION_DURATION = 600, i.DEFAULTS = {
		interval: 5e3,
		pause: "hover",
		wrap: !0,
		keyboard: !0
	}, i.prototype.keydown = function(t) {
		if (!/input|textarea/i.test(t.target.tagName)) {
			switch (t.which) {
				case 37:
					this.prev();
					break;
				case 39:
					this.next();
					break;
				default:
					return
			}
			t.preventDefault()
		}
	}, i.prototype.cycle = function(e) {
		return e || (this.paused = !1), this.interval && clearInterval(this.interval), this.options.interval && !this.paused && (this.interval = setInterval(t.proxy(this.next, this), this.options.interval)), this
	}, i.prototype.getItemIndex = function(t) {
		return this.$items = t.parent().children(".item"), this.$items.index(t || this.$active)
	}, i.prototype.getItemForDirection = function(t, e) {
		var i = this.getItemIndex(e);
		if (("prev" == t && 0 === i || "next" == t && i == this.$items.length - 1) && !this.options.wrap) return e;
		var o = (i + ("prev" == t ? -1 : 1)) % this.$items.length;
		return this.$items.eq(o)
	}, i.prototype.to = function(t) {
		var e = this,
			i = this.getItemIndex(this.$active = this.$element.find(".item.active"));
		if (!(t > this.$items.length - 1 || t < 0)) return this.sliding ? this.$element.one("slid.bs.carousel", function() {
			e.to(t)
		}) : i == t ? this.pause().cycle() : this.slide(t > i ? "next" : "prev", this.$items.eq(t))
	}, i.prototype.pause = function(e) {
		return e || (this.paused = !0), this.$element.find(".next, .prev").length && t.support.transition && (this.$element.trigger(t.support.transition.end), this.cycle(!0)), this.interval = clearInterval(this.interval), this
	}, i.prototype.next = function() {
		if (!this.sliding) return this.slide("next")
	}, i.prototype.prev = function() {
		if (!this.sliding) return this.slide("prev")
	}, i.prototype.slide = function(e, o) {
		var n = this.$element.find(".item.active"),
			s = o || this.getItemForDirection(e, n),
			a = this.interval,
			r = "next" == e ? "left" : "right",
			l = this;
		if (s.hasClass("active")) return this.sliding = !1;
		var h = s[0],
			d = t.Event("slide.bs.carousel", {
				relatedTarget: h,
				direction: r
			});
		if (this.$element.trigger(d), !d.isDefaultPrevented()) {
			if (this.sliding = !0, a && this.pause(), this.$indicators.length) {
				this.$indicators.find(".active").removeClass("active");
				var p = t(this.$indicators.children()[this.getItemIndex(s)]);
				p && p.addClass("active")
			}
			var c = t.Event("slid.bs.carousel", {
				relatedTarget: h,
				direction: r
			});
			return t.support.transition && this.$element.hasClass("slide") ? (s.addClass(e), s[0].offsetWidth, n.addClass(r), s.addClass(r), n.one("bsTransitionEnd", function() {
				s.removeClass([e, r].join(" ")).addClass("active"), n.removeClass(["active", r].join(" ")), l.sliding = !1, setTimeout(function() {
					l.$element.trigger(c)
				}, 0)
			}).emulateTransitionEnd(i.TRANSITION_DURATION)) : (n.removeClass("active"), s.addClass("active"), this.sliding = !1, this.$element.trigger(c)), a && this.cycle(), this
		}
	};
	var o = t.fn.carousel;
	t.fn.carousel = e, t.fn.carousel.Constructor = i, t.fn.carousel.noConflict = function() {
		return t.fn.carousel = o, this
	};
	var n = function(i) {
		var o, n = t(this),
			s = t(n.attr("data-target") || (o = n.attr("href")) && o.replace(/.*(?=#[^\s]+$)/, ""));
		if (s.hasClass("carousel")) {
			var a = t.extend({}, s.data(), n.data()),
				r = n.attr("data-slide-to");
			r && (a.interval = !1), e.call(s, a), r && s.data("bs.carousel").to(r), i.preventDefault()
		}
	};
	t(document).on("click.bs.carousel.data-api", "[data-slide]", n).on("click.bs.carousel.data-api", "[data-slide-to]", n), t(window).on("load", function() {
		t('[data-ride="carousel"]').each(function() {
			var i = t(this);
			e.call(i, i.data())
		})
	})
}(jQuery),
function(t) {
	"use strict";

	function e(e) {
		var i, o = e.attr("data-target") || (i = e.attr("href")) && i.replace(/.*(?=#[^\s]+$)/, "");
		return t(o)
	}

	function i(e) {
		return this.each(function() {
			var i = t(this),
				n = i.data("bs.collapse"),
				s = t.extend({}, o.DEFAULTS, i.data(), "object" == typeof e && e);
			!n && s.toggle && /show|hide/.test(e) && (s.toggle = !1), n || i.data("bs.collapse", n = new o(this, s)), "string" == typeof e && n[e]()
		})
	}
	var o = function(e, i) {
		this.$element = t(e), this.options = t.extend({}, o.DEFAULTS, i), this.$trigger = t('[data-toggle="collapse"][href="#' + e.id + '"],[data-toggle="collapse"][data-target="#' + e.id + '"]'), this.transitioning = null, this.options.parent ? this.$parent = this.getParent() : this.addAriaAndCollapsedClass(this.$element, this.$trigger), this.options.toggle && this.toggle()
	};
	o.VERSION = "3.3.7", o.TRANSITION_DURATION = 350, o.DEFAULTS = {
		toggle: !0
	}, o.prototype.dimension = function() {
		return this.$element.hasClass("width") ? "width" : "height"
	}, o.prototype.show = function() {
		if (!this.transitioning && !this.$element.hasClass("in")) {
			var e, n = this.$parent && this.$parent.children(".panel").children(".in, .collapsing");
			if (!(n && n.length && (e = n.data("bs.collapse")) && e.transitioning)) {
				var s = t.Event("show.bs.collapse");
				if (this.$element.trigger(s), !s.isDefaultPrevented()) {
					n && n.length && (i.call(n, "hide"), e || n.data("bs.collapse", null));
					var a = this.dimension();
					this.$element.removeClass("collapse").addClass("collapsing")[a](0).attr("aria-expanded", !0), this.$trigger.removeClass("collapsed").attr("aria-expanded", !0), this.transitioning = 1;
					var r = function() {
						this.$element.removeClass("collapsing").addClass("collapse in")[a](""), this.transitioning = 0, this.$element.trigger("shown.bs.collapse")
					};
					if (!t.support.transition) return r.call(this);
					var l = t.camelCase(["scroll", a].join("-"));
					this.$element.one("bsTransitionEnd", t.proxy(r, this)).emulateTransitionEnd(o.TRANSITION_DURATION)[a](this.$element[0][l])
				}
			}
		}
	}, o.prototype.hide = function() {
		if (!this.transitioning && this.$element.hasClass("in")) {
			var e = t.Event("hide.bs.collapse");
			if (this.$element.trigger(e), !e.isDefaultPrevented()) {
				var i = this.dimension();
				this.$element[i](this.$element[i]())[0].offsetHeight, this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded", !1), this.$trigger.addClass("collapsed").attr("aria-expanded", !1), this.transitioning = 1;
				var n = function() {
					this.transitioning = 0, this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")
				};
				if (!t.support.transition) return n.call(this);
				this.$element[i](0).one("bsTransitionEnd", t.proxy(n, this)).emulateTransitionEnd(o.TRANSITION_DURATION)
			}
		}
	}, o.prototype.toggle = function() {
		this[this.$element.hasClass("in") ? "hide" : "show"]()
	}, o.prototype.getParent = function() {
		return t(this.options.parent).find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]').each(t.proxy(function(i, o) {
			var n = t(o);
			this.addAriaAndCollapsedClass(e(n), n)
		}, this)).end()
	}, o.prototype.addAriaAndCollapsedClass = function(t, e) {
		var i = t.hasClass("in");
		t.attr("aria-expanded", i), e.toggleClass("collapsed", !i).attr("aria-expanded", i)
	};
	var n = t.fn.collapse;
	t.fn.collapse = i, t.fn.collapse.Constructor = o, t.fn.collapse.noConflict = function() {
		return t.fn.collapse = n, this
	}, t(document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]', function(o) {
		var n = t(this);
		n.attr("data-target") || o.preventDefault();
		var s = e(n),
			a = s.data("bs.collapse") ? "toggle" : n.data();
		i.call(s, a)
	})
}(jQuery),
function(t) {
	"use strict";

	function e(e) {
		var i = e.attr("data-target");
		i || (i = (i = e.attr("href")) && /#[A-Za-z]/.test(i) && i.replace(/.*(?=#[^\s]*$)/, ""));
		var o = i && t(i);
		return o && o.length ? o : e.parent()
	}

	function i(i) {
		i && 3 === i.which || (t(n).remove(), t(s).each(function() {
			var o = t(this),
				n = e(o),
				s = {
					relatedTarget: this
				};
			n.hasClass("open") && (i && "click" == i.type && /input|textarea/i.test(i.target.tagName) && t.contains(n[0], i.target) || (n.trigger(i = t.Event("hide.bs.dropdown", s)), i.isDefaultPrevented() || (o.attr("aria-expanded", "false"), n.removeClass("open").trigger(t.Event("hidden.bs.dropdown", s)))))
		}))
	}

	function o(e) {
		return this.each(function() {
			var i = t(this),
				o = i.data("bs.dropdown");
			o || i.data("bs.dropdown", o = new a(this)), "string" == typeof e && o[e].call(i)
		})
	}
	var n = ".dropdown-backdrop",
		s = '[data-toggle="dropdown"]',
		a = function(e) {
			t(e).on("click.bs.dropdown", this.toggle)
		};
	a.VERSION = "3.3.7", a.prototype.toggle = function(o) {
		var n = t(this);
		if (!n.is(".disabled, :disabled")) {
			var s = e(n),
				a = s.hasClass("open");
			if (i(), !a) {
				"ontouchstart" in document.documentElement && !s.closest(".navbar-nav").length && t(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(t(this)).on("click", i);
				var r = {
					relatedTarget: this
				};
				if (s.trigger(o = t.Event("show.bs.dropdown", r)), o.isDefaultPrevented()) return;
				n.trigger("focus").attr("aria-expanded", "true"), s.toggleClass("open").trigger(t.Event("shown.bs.dropdown", r))
			}
			return !1
		}
	}, a.prototype.keydown = function(i) {
		if (/(38|40|27|32)/.test(i.which) && !/input|textarea/i.test(i.target.tagName)) {
			var o = t(this);
			if (i.preventDefault(), i.stopPropagation(), !o.is(".disabled, :disabled")) {
				var n = e(o),
					a = n.hasClass("open");
				if (!a && 27 != i.which || a && 27 == i.which) return 27 == i.which && n.find(s).trigger("focus"), o.trigger("click");
				var r = n.find(".dropdown-menu li:not(.disabled):visible a");
				if (r.length) {
					var l = r.index(i.target);
					38 == i.which && l > 0 && l--, 40 == i.which && l < r.length - 1 && l++, ~l || (l = 0), r.eq(l).trigger("focus")
				}
			}
		}
	};
	var r = t.fn.dropdown;
	t.fn.dropdown = o, t.fn.dropdown.Constructor = a, t.fn.dropdown.noConflict = function() {
		return t.fn.dropdown = r, this
	}, t(document).on("click.bs.dropdown.data-api", i).on("click.bs.dropdown.data-api", ".dropdown form", function(t) {
		t.stopPropagation()
	}).on("click.bs.dropdown.data-api", s, a.prototype.toggle).on("keydown.bs.dropdown.data-api", s, a.prototype.keydown).on("keydown.bs.dropdown.data-api", ".dropdown-menu", a.prototype.keydown)
}(jQuery),
function(t) {
	"use strict";

	function e(e, o) {
		return this.each(function() {
			var n = t(this),
				s = n.data("bs.modal"),
				a = t.extend({}, i.DEFAULTS, n.data(), "object" == typeof e && e);
			s || n.data("bs.modal", s = new i(this, a)), "string" == typeof e ? s[e](o) : a.show && s.show(o)
		})
	}
	var i = function(e, i) {
		this.options = i, this.$body = t(document.body), this.$element = t(e), this.$dialog = this.$element.find(".modal-dialog"), this.$backdrop = null, this.isShown = null, this.originalBodyPad = null, this.scrollbarWidth = 0, this.ignoreBackdropClick = !1, this.options.remote && this.$element.find(".modal-content").load(this.options.remote, t.proxy(function() {
			this.$element.trigger("loaded.bs.modal")
		}, this))
	};
	i.VERSION = "3.3.7", i.TRANSITION_DURATION = 300, i.BACKDROP_TRANSITION_DURATION = 150, i.DEFAULTS = {
		backdrop: !0,
		keyboard: !0,
		show: !0
	}, i.prototype.toggle = function(t) {
		return this.isShown ? this.hide() : this.show(t)
	}, i.prototype.show = function(e) {
		var o = this,
			n = t.Event("show.bs.modal", {
				relatedTarget: e
			});
		this.$element.trigger(n), this.isShown || n.isDefaultPrevented() || (this.isShown = !0, this.checkScrollbar(), this.setScrollbar(), this.$body.addClass("modal-open"), this.escape(), this.resize(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', t.proxy(this.hide, this)), this.$dialog.on("mousedown.dismiss.bs.modal", function() {
			o.$element.one("mouseup.dismiss.bs.modal", function(e) {
				t(e.target).is(o.$element) && (o.ignoreBackdropClick = !0)
			})
		}), this.backdrop(function() {
			var n = t.support.transition && o.$element.hasClass("fade");
			o.$element.parent().length || o.$element.appendTo(o.$body), o.$element.show().scrollTop(0), o.adjustDialog(), n && o.$element[0].offsetWidth, o.$element.addClass("in"), o.enforceFocus();
			var s = t.Event("shown.bs.modal", {
				relatedTarget: e
			});
			n ? o.$dialog.one("bsTransitionEnd", function() {
				o.$element.trigger("focus").trigger(s)
			}).emulateTransitionEnd(i.TRANSITION_DURATION) : o.$element.trigger("focus").trigger(s)
		}))
	}, i.prototype.hide = function(e) {
		e && e.preventDefault(), e = t.Event("hide.bs.modal"), this.$element.trigger(e), this.isShown && !e.isDefaultPrevented() && (this.isShown = !1, this.escape(), this.resize(), t(document).off("focusin.bs.modal"), this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"), this.$dialog.off("mousedown.dismiss.bs.modal"), t.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", t.proxy(this.hideModal, this)).emulateTransitionEnd(i.TRANSITION_DURATION) : this.hideModal())
	}, i.prototype.enforceFocus = function() {
		t(document).off("focusin.bs.modal").on("focusin.bs.modal", t.proxy(function(t) {
			document === t.target || this.$element[0] === t.target || this.$element.has(t.target).length || this.$element.trigger("focus")
		}, this))
	}, i.prototype.escape = function() {
		this.isShown && this.options.keyboard ? this.$element.on("keydown.dismiss.bs.modal", t.proxy(function(t) {
			27 == t.which && this.hide()
		}, this)) : this.isShown || this.$element.off("keydown.dismiss.bs.modal")
	}, i.prototype.resize = function() {
		this.isShown ? t(window).on("resize.bs.modal", t.proxy(this.handleUpdate, this)) : t(window).off("resize.bs.modal")
	}, i.prototype.hideModal = function() {
		var t = this;
		this.$element.hide(), this.backdrop(function() {
			t.$body.removeClass("modal-open"), t.resetAdjustments(), t.resetScrollbar(), t.$element.trigger("hidden.bs.modal")
		})
	}, i.prototype.removeBackdrop = function() {
		this.$backdrop && this.$backdrop.remove(), this.$backdrop = null
	}, i.prototype.backdrop = function(e) {
		var o = this,
			n = this.$element.hasClass("fade") ? "fade" : "";
		if (this.isShown && this.options.backdrop) {
			var s = t.support.transition && n;
			if (this.$backdrop = t(document.createElement("div")).addClass("modal-backdrop " + n).appendTo(this.$body), this.$element.on("click.dismiss.bs.modal", t.proxy(function(t) {
					this.ignoreBackdropClick ? this.ignoreBackdropClick = !1 : t.target === t.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus() : this.hide())
				}, this)), s && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !e) return;
			s ? this.$backdrop.one("bsTransitionEnd", e).emulateTransitionEnd(i.BACKDROP_TRANSITION_DURATION) : e()
		} else if (!this.isShown && this.$backdrop) {
			this.$backdrop.removeClass("in");
			var a = function() {
				o.removeBackdrop(), e && e()
			};
			t.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", a).emulateTransitionEnd(i.BACKDROP_TRANSITION_DURATION) : a()
		} else e && e()
	}, i.prototype.handleUpdate = function() {
		this.adjustDialog()
	}, i.prototype.adjustDialog = function() {
		var t = this.$element[0].scrollHeight > document.documentElement.clientHeight;
		this.$element.css({
			paddingLeft: !this.bodyIsOverflowing && t ? this.scrollbarWidth : "",
			paddingRight: this.bodyIsOverflowing && !t ? this.scrollbarWidth : ""
		})
	}, i.prototype.resetAdjustments = function() {
		this.$element.css({
			paddingLeft: "",
			paddingRight: ""
		})
	}, i.prototype.checkScrollbar = function() {
		var t = window.innerWidth;
		if (!t) {
			var e = document.documentElement.getBoundingClientRect();
			t = e.right - Math.abs(e.left)
		}
		this.bodyIsOverflowing = document.body.clientWidth < t, this.scrollbarWidth = this.measureScrollbar()
	}, i.prototype.setScrollbar = function() {
		var t = parseInt(this.$body.css("padding-right") || 0, 10);
		this.originalBodyPad = document.body.style.paddingRight || "", this.bodyIsOverflowing && this.$body.css("padding-right", t + this.scrollbarWidth)
	}, i.prototype.resetScrollbar = function() {
		this.$body.css("padding-right", this.originalBodyPad)
	}, i.prototype.measureScrollbar = function() {
		var t = document.createElement("div");
		t.className = "modal-scrollbar-measure", this.$body.append(t);
		var e = t.offsetWidth - t.clientWidth;
		return this.$body[0].removeChild(t), e
	};
	var o = t.fn.modal;
	t.fn.modal = e, t.fn.modal.Constructor = i, t.fn.modal.noConflict = function() {
		return t.fn.modal = o, this
	}, t(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function(i) {
		var o = t(this),
			n = o.attr("href"),
			s = t(o.attr("data-target") || n && n.replace(/.*(?=#[^\s]+$)/, "")),
			a = s.data("bs.modal") ? "toggle" : t.extend({
				remote: !/#/.test(n) && n
			}, s.data(), o.data());
		o.is("a") && i.preventDefault(), s.one("show.bs.modal", function(t) {
			t.isDefaultPrevented() || s.one("hidden.bs.modal", function() {
				o.is(":visible") && o.trigger("focus")
			})
		}), e.call(s, a, this)
	})
}(jQuery),
function(t) {
	"use strict";

	function e(e) {
		return this.each(function() {
			var o = t(this),
				n = o.data("bs.tooltip"),
				s = "object" == typeof e && e;
			!n && /destroy|hide/.test(e) || (n || o.data("bs.tooltip", n = new i(this, s)), "string" == typeof e && n[e]())
		})
	}
	var i = function(t, e) {
		this.type = null, this.options = null, this.enabled = null, this.timeout = null, this.hoverState = null, this.$element = null, this.inState = null, this.init("tooltip", t, e)
	};
	i.VERSION = "3.3.7", i.TRANSITION_DURATION = 150, i.DEFAULTS = {
		animation: !0,
		placement: "top",
		selector: !1,
		template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
		trigger: "hover focus",
		title: "",
		delay: 0,
		html: !1,
		container: !1,
		viewport: {
			selector: "body",
			padding: 0
		}
	}, i.prototype.init = function(e, i, o) {
		if (this.enabled = !0, this.type = e, this.$element = t(i), this.options = this.getOptions(o), this.$viewport = this.options.viewport && t(t.isFunction(this.options.viewport) ? this.options.viewport.call(this, this.$element) : this.options.viewport.selector || this.options.viewport), this.inState = {
				click: !1,
				hover: !1,
				focus: !1
			}, this.$element[0] instanceof document.constructor && !this.options.selector) throw new Error("`selector` option must be specified when initializing " + this.type + " on the window.document object!");
		for (var n = this.options.trigger.split(" "), s = n.length; s--;) {
			var a = n[s];
			if ("click" == a) this.$element.on("click." + this.type, this.options.selector, t.proxy(this.toggle, this));
			else if ("manual" != a) {
				var r = "hover" == a ? "mouseenter" : "focusin",
					l = "hover" == a ? "mouseleave" : "focusout";
				this.$element.on(r + "." + this.type, this.options.selector, t.proxy(this.enter, this)), this.$element.on(l + "." + this.type, this.options.selector, t.proxy(this.leave, this))
			}
		}
		this.options.selector ? this._options = t.extend({}, this.options, {
			trigger: "manual",
			selector: ""
		}) : this.fixTitle()
	}, i.prototype.getDefaults = function() {
		return i.DEFAULTS
	}, i.prototype.getOptions = function(e) {
		return (e = t.extend({}, this.getDefaults(), this.$element.data(), e)).delay && "number" == typeof e.delay && (e.delay = {
			show: e.delay,
			hide: e.delay
		}), e
	}, i.prototype.getDelegateOptions = function() {
		var e = {},
			i = this.getDefaults();
		return this._options && t.each(this._options, function(t, o) {
			i[t] != o && (e[t] = o)
		}), e
	}, i.prototype.enter = function(e) {
		var i = e instanceof this.constructor ? e : t(e.currentTarget).data("bs." + this.type);
		if (i || (i = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, i)), e instanceof t.Event && (i.inState["focusin" == e.type ? "focus" : "hover"] = !0), i.tip().hasClass("in") || "in" == i.hoverState) i.hoverState = "in";
		else {
			if (clearTimeout(i.timeout), i.hoverState = "in", !i.options.delay || !i.options.delay.show) return i.show();
			i.timeout = setTimeout(function() {
				"in" == i.hoverState && i.show()
			}, i.options.delay.show)
		}
	}, i.prototype.isInStateTrue = function() {
		for (var t in this.inState)
			if (this.inState[t]) return !0;
		return !1
	}, i.prototype.leave = function(e) {
		var i = e instanceof this.constructor ? e : t(e.currentTarget).data("bs." + this.type);
		if (i || (i = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, i)), e instanceof t.Event && (i.inState["focusout" == e.type ? "focus" : "hover"] = !1), !i.isInStateTrue()) {
			if (clearTimeout(i.timeout), i.hoverState = "out", !i.options.delay || !i.options.delay.hide) return i.hide();
			i.timeout = setTimeout(function() {
				"out" == i.hoverState && i.hide()
			}, i.options.delay.hide)
		}
	}, i.prototype.show = function() {
		var e = t.Event("show.bs." + this.type);
		if (this.hasContent() && this.enabled) {
			this.$element.trigger(e);
			var o = t.contains(this.$element[0].ownerDocument.documentElement, this.$element[0]);
			if (e.isDefaultPrevented() || !o) return;
			var n = this,
				s = this.tip(),
				a = this.getUID(this.type);
			this.setContent(), s.attr("id", a), this.$element.attr("aria-describedby", a), this.options.animation && s.addClass("fade");
			var r = "function" == typeof this.options.placement ? this.options.placement.call(this, s[0], this.$element[0]) : this.options.placement,
				l = /\s?auto?\s?/i,
				h = l.test(r);
			h && (r = r.replace(l, "") || "top"), s.detach().css({
				top: 0,
				left: 0,
				display: "block"
			}).addClass(r).data("bs." + this.type, this), this.options.container ? s.appendTo(this.options.container) : s.insertAfter(this.$element), this.$element.trigger("inserted.bs." + this.type);
			var d = this.getPosition(),
				p = s[0].offsetWidth,
				c = s[0].offsetHeight;
			if (h) {
				var f = r,
					u = this.getPosition(this.$viewport);
				r = "bottom" == r && d.bottom + c > u.bottom ? "top" : "top" == r && d.top - c < u.top ? "bottom" : "right" == r && d.right + p > u.width ? "left" : "left" == r && d.left - p < u.left ? "right" : r, s.removeClass(f).addClass(r)
			}
			var g = this.getCalculatedOffset(r, d, p, c);
			this.applyPlacement(g, r);
			var m = function() {
				var t = n.hoverState;
				n.$element.trigger("shown.bs." + n.type), n.hoverState = null, "out" == t && n.leave(n)
			};
			t.support.transition && this.$tip.hasClass("fade") ? s.one("bsTransitionEnd", m).emulateTransitionEnd(i.TRANSITION_DURATION) : m()
		}
	}, i.prototype.applyPlacement = function(e, i) {
		var o = this.tip(),
			n = o[0].offsetWidth,
			s = o[0].offsetHeight,
			a = parseInt(o.css("margin-top"), 10),
			r = parseInt(o.css("margin-left"), 10);
		isNaN(a) && (a = 0), isNaN(r) && (r = 0), e.top += a, e.left += r, t.offset.setOffset(o[0], t.extend({
			using: function(t) {
				o.css({
					top: Math.round(t.top),
					left: Math.round(t.left)
				})
			}
		}, e), 0), o.addClass("in");
		var l = o[0].offsetWidth,
			h = o[0].offsetHeight;
		"top" == i && h != s && (e.top = e.top + s - h);
		var d = this.getViewportAdjustedDelta(i, e, l, h);
		d.left ? e.left += d.left : e.top += d.top;
		var p = /top|bottom/.test(i),
			c = p ? 2 * d.left - n + l : 2 * d.top - s + h,
			f = p ? "offsetWidth" : "offsetHeight";
		o.offset(e), this.replaceArrow(c, o[0][f], p)
	}, i.prototype.replaceArrow = function(t, e, i) {
		this.arrow().css(i ? "left" : "top", 50 * (1 - t / e) + "%").css(i ? "top" : "left", "")
	}, i.prototype.setContent = function() {
		var t = this.tip(),
			e = this.getTitle();
		t.find(".tooltip-inner")[this.options.html ? "html" : "text"](e), t.removeClass("fade in top bottom left right")
	}, i.prototype.hide = function(e) {
		function o() {
			"in" != n.hoverState && s.detach(), n.$element && n.$element.removeAttr("aria-describedby").trigger("hidden.bs." + n.type), e && e()
		}
		var n = this,
			s = t(this.$tip),
			a = t.Event("hide.bs." + this.type);
		if (this.$element.trigger(a), !a.isDefaultPrevented()) return s.removeClass("in"), t.support.transition && s.hasClass("fade") ? s.one("bsTransitionEnd", o).emulateTransitionEnd(i.TRANSITION_DURATION) : o(), this.hoverState = null, this
	}, i.prototype.fixTitle = function() {
		var t = this.$element;
		(t.attr("title") || "string" != typeof t.attr("data-original-title")) && t.attr("data-original-title", t.attr("title") || "").attr("title", "")
	}, i.prototype.hasContent = function() {
		return this.getTitle()
	}, i.prototype.getPosition = function(e) {
		var i = (e = e || this.$element)[0],
			o = "BODY" == i.tagName,
			n = i.getBoundingClientRect();
		null == n.width && (n = t.extend({}, n, {
			width: n.right - n.left,
			height: n.bottom - n.top
		}));
		var s = window.SVGElement && i instanceof window.SVGElement,
			a = o ? {
				top: 0,
				left: 0
			} : s ? null : e.offset(),
			r = {
				scroll: o ? document.documentElement.scrollTop || document.body.scrollTop : e.scrollTop()
			},
			l = o ? {
				width: t(window).width(),
				height: t(window).height()
			} : null;
		return t.extend({}, n, r, l, a)
	}, i.prototype.getCalculatedOffset = function(t, e, i, o) {
		return "bottom" == t ? {
			top: e.top + e.height,
			left: e.left + e.width / 2 - i / 2
		} : "top" == t ? {
			top: e.top - o,
			left: e.left + e.width / 2 - i / 2
		} : "left" == t ? {
			top: e.top + e.height / 2 - o / 2,
			left: e.left - i
		} : {
			top: e.top + e.height / 2 - o / 2,
			left: e.left + e.width
		}
	}, i.prototype.getViewportAdjustedDelta = function(t, e, i, o) {
		var n = {
			top: 0,
			left: 0
		};
		if (!this.$viewport) return n;
		var s = this.options.viewport && this.options.viewport.padding || 0,
			a = this.getPosition(this.$viewport);
		if (/right|left/.test(t)) {
			var r = e.top - s - a.scroll,
				l = e.top + s - a.scroll + o;
			r < a.top ? n.top = a.top - r : l > a.top + a.height && (n.top = a.top + a.height - l)
		} else {
			var h = e.left - s,
				d = e.left + s + i;
			h < a.left ? n.left = a.left - h : d > a.right && (n.left = a.left + a.width - d)
		}
		return n
	}, i.prototype.getTitle = function() {
		var t = this.$element,
			e = this.options;
		return t.attr("data-original-title") || ("function" == typeof e.title ? e.title.call(t[0]) : e.title)
	}, i.prototype.getUID = function(t) {
		do {
			t += ~~(1e6 * Math.random())
		} while (document.getElementById(t));
		return t
	}, i.prototype.tip = function() {
		if (!this.$tip && (this.$tip = t(this.options.template), 1 != this.$tip.length)) throw new Error(this.type + " `template` option must consist of exactly 1 top-level element!");
		return this.$tip
	}, i.prototype.arrow = function() {
		return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
	}, i.prototype.enable = function() {
		this.enabled = !0
	}, i.prototype.disable = function() {
		this.enabled = !1
	}, i.prototype.toggleEnabled = function() {
		this.enabled = !this.enabled
	}, i.prototype.toggle = function(e) {
		var i = this;
		e && ((i = t(e.currentTarget).data("bs." + this.type)) || (i = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, i))), e ? (i.inState.click = !i.inState.click, i.isInStateTrue() ? i.enter(i) : i.leave(i)) : i.tip().hasClass("in") ? i.leave(i) : i.enter(i)
	}, i.prototype.destroy = function() {
		var t = this;
		clearTimeout(this.timeout), this.hide(function() {
			t.$element.off("." + t.type).removeData("bs." + t.type), t.$tip && t.$tip.detach(), t.$tip = null, t.$arrow = null, t.$viewport = null, t.$element = null
		})
	};
	var o = t.fn.tooltip;
	t.fn.tooltip = e, t.fn.tooltip.Constructor = i, t.fn.tooltip.noConflict = function() {
		return t.fn.tooltip = o, this
	}
}(jQuery),
function(t) {
	"use strict";

	function e(e) {
		return this.each(function() {
			var o = t(this),
				n = o.data("bs.popover"),
				s = "object" == typeof e && e;
			!n && /destroy|hide/.test(e) || (n || o.data("bs.popover", n = new i(this, s)), "string" == typeof e && n[e]())
		})
	}
	var i = function(t, e) {
		this.init("popover", t, e)
	};
	if (!t.fn.tooltip) throw new Error("Popover requires tooltip.js");
	i.VERSION = "3.3.7", i.DEFAULTS = t.extend({}, t.fn.tooltip.Constructor.DEFAULTS, {
		placement: "right",
		trigger: "click",
		content: "",
		template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
	}), i.prototype = t.extend({}, t.fn.tooltip.Constructor.prototype), i.prototype.constructor = i, i.prototype.getDefaults = function() {
		return i.DEFAULTS
	}, i.prototype.setContent = function() {
		var t = this.tip(),
			e = this.getTitle(),
			i = this.getContent();
		t.find(".popover-title")[this.options.html ? "html" : "text"](e), t.find(".popover-content").children().detach().end()[this.options.html ? "string" == typeof i ? "html" : "append" : "text"](i), t.removeClass("fade top bottom left right in"), t.find(".popover-title").html() || t.find(".popover-title").hide()
	}, i.prototype.hasContent = function() {
		return this.getTitle() || this.getContent()
	}, i.prototype.getContent = function() {
		var t = this.$element,
			e = this.options;
		return t.attr("data-content") || ("function" == typeof e.content ? e.content.call(t[0]) : e.content)
	}, i.prototype.arrow = function() {
		return this.$arrow = this.$arrow || this.tip().find(".arrow")
	};
	var o = t.fn.popover;
	t.fn.popover = e, t.fn.popover.Constructor = i, t.fn.popover.noConflict = function() {
		return t.fn.popover = o, this
	}
}(jQuery),
function(t) {
	"use strict";

	function e(i, o) {
		this.$body = t(document.body), this.$scrollElement = t(t(i).is(document.body) ? window : i), this.options = t.extend({}, e.DEFAULTS, o), this.selector = (this.options.target || "") + " .nav li > a", this.offsets = [], this.targets = [], this.activeTarget = null, this.scrollHeight = 0, this.$scrollElement.on("scroll.bs.scrollspy", t.proxy(this.process, this)), this.refresh(), this.process()
	}

	function i(i) {
		return this.each(function() {
			var o = t(this),
				n = o.data("bs.scrollspy"),
				s = "object" == typeof i && i;
			n || o.data("bs.scrollspy", n = new e(this, s)), "string" == typeof i && n[i]()
		})
	}
	e.VERSION = "3.3.7", e.DEFAULTS = {
		offset: 10
	}, e.prototype.getScrollHeight = function() {
		return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
	}, e.prototype.refresh = function() {
		var e = this,
			i = "offset",
			o = 0;
		this.offsets = [], this.targets = [], this.scrollHeight = this.getScrollHeight(), t.isWindow(this.$scrollElement[0]) || (i = "position", o = this.$scrollElement.scrollTop()), this.$body.find(this.selector).map(function() {
			var e = t(this),
				n = e.data("target") || e.attr("href"),
				s = /^#./.test(n) && t(n);
			return s && s.length && s.is(":visible") && [
				[s[i]().top + o, n]
			] || null
		}).sort(function(t, e) {
			return t[0] - e[0]
		}).each(function() {
			e.offsets.push(this[0]), e.targets.push(this[1])
		})
	}, e.prototype.process = function() {
		var t, e = this.$scrollElement.scrollTop() + this.options.offset,
			i = this.getScrollHeight(),
			o = this.options.offset + i - this.$scrollElement.height(),
			n = this.offsets,
			s = this.targets,
			a = this.activeTarget;
		if (this.scrollHeight != i && this.refresh(), e >= o) return a != (t = s[s.length - 1]) && this.activate(t);
		if (a && e < n[0]) return this.activeTarget = null, this.clear();
		for (t = n.length; t--;) a != s[t] && e >= n[t] && (void 0 === n[t + 1] || e < n[t + 1]) && this.activate(s[t])
	}, e.prototype.activate = function(e) {
		this.activeTarget = e, this.clear();
		var i = this.selector + '[data-target="' + e + '"],' + this.selector + '[href="' + e + '"]',
			o = t(i).parents("li").addClass("active");
		o.parent(".dropdown-menu").length && (o = o.closest("li.dropdown").addClass("active")), o.trigger("activate.bs.scrollspy")
	}, e.prototype.clear = function() {
		t(this.selector).parentsUntil(this.options.target, ".active").removeClass("active")
	};
	var o = t.fn.scrollspy;
	t.fn.scrollspy = i, t.fn.scrollspy.Constructor = e, t.fn.scrollspy.noConflict = function() {
		return t.fn.scrollspy = o, this
	}, t(window).on("load.bs.scrollspy.data-api", function() {
		t('[data-spy="scroll"]').each(function() {
			var e = t(this);
			i.call(e, e.data())
		})
	})
}(jQuery),
function(t) {
	"use strict";

	function e(e) {
		return this.each(function() {
			var o = t(this),
				n = o.data("bs.tab");
			n || o.data("bs.tab", n = new i(this)), "string" == typeof e && n[e]()
		})
	}
	var i = function(e) {
		this.element = t(e)
	};
	i.VERSION = "3.3.7", i.TRANSITION_DURATION = 150, i.prototype.show = function() {
		var e = this.element,
			i = e.closest("ul:not(.dropdown-menu)"),
			o = e.data("target");
		if (o || (o = (o = e.attr("href")) && o.replace(/.*(?=#[^\s]*$)/, "")), !e.parent("li").hasClass("active")) {
			var n = i.find(".active:last a"),
				s = t.Event("hide.bs.tab", {
					relatedTarget: e[0]
				}),
				a = t.Event("show.bs.tab", {
					relatedTarget: n[0]
				});
			if (n.trigger(s), e.trigger(a), !a.isDefaultPrevented() && !s.isDefaultPrevented()) {
				var r = t(o);
				this.activate(e.closest("li"), i), this.activate(r, r.parent(), function() {
					n.trigger({
						type: "hidden.bs.tab",
						relatedTarget: e[0]
					}), e.trigger({
						type: "shown.bs.tab",
						relatedTarget: n[0]
					})
				})
			}
		}
	}, i.prototype.activate = function(e, o, n) {
		function s() {
			a.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !1), e.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded", !0), r ? (e[0].offsetWidth, e.addClass("in")) : e.removeClass("fade"), e.parent(".dropdown-menu").length && e.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !0), n && n()
		}
		var a = o.find("> .active"),
			r = n && t.support.transition && (a.length && a.hasClass("fade") || !!o.find("> .fade").length);
		a.length && r ? a.one("bsTransitionEnd", s).emulateTransitionEnd(i.TRANSITION_DURATION) : s(), a.removeClass("in")
	};
	var o = t.fn.tab;
	t.fn.tab = e, t.fn.tab.Constructor = i, t.fn.tab.noConflict = function() {
		return t.fn.tab = o, this
	};
	var n = function(i) {
		i.preventDefault(), e.call(t(this), "show")
	};
	t(document).on("click.bs.tab.data-api", '[data-toggle="tab"]', n).on("click.bs.tab.data-api", '[data-toggle="pill"]', n)
}(jQuery),
function(t) {
	"use strict";

	function e(e) {
		return this.each(function() {
			var o = t(this),
				n = o.data("bs.affix"),
				s = "object" == typeof e && e;
			n || o.data("bs.affix", n = new i(this, s)), "string" == typeof e && n[e]()
		})
	}
	var i = function(e, o) {
		this.options = t.extend({}, i.DEFAULTS, o), this.$target = t(this.options.target).on("scroll.bs.affix.data-api", t.proxy(this.checkPosition, this)).on("click.bs.affix.data-api", t.proxy(this.checkPositionWithEventLoop, this)), this.$element = t(e), this.affixed = null, this.unpin = null, this.pinnedOffset = null, this.checkPosition()
	};
	i.VERSION = "3.3.7", i.RESET = "affix affix-top affix-bottom", i.DEFAULTS = {
		offset: 0,
		target: window
	}, i.prototype.getState = function(t, e, i, o) {
		var n = this.$target.scrollTop(),
			s = this.$element.offset(),
			a = this.$target.height();
		if (null != i && "top" == this.affixed) return n < i && "top";
		if ("bottom" == this.affixed) return null != i ? !(n + this.unpin <= s.top) && "bottom" : !(n + a <= t - o) && "bottom";
		var r = null == this.affixed,
			l = r ? n : s.top,
			h = r ? a : e;
		return null != i && n <= i ? "top" : null != o && l + h >= t - o && "bottom"
	}, i.prototype.getPinnedOffset = function() {
		if (this.pinnedOffset) return this.pinnedOffset;
		this.$element.removeClass(i.RESET).addClass("affix");
		var t = this.$target.scrollTop(),
			e = this.$element.offset();
		return this.pinnedOffset = e.top - t
	}, i.prototype.checkPositionWithEventLoop = function() {
		setTimeout(t.proxy(this.checkPosition, this), 1)
	}, i.prototype.checkPosition = function() {
		if (this.$element.is(":visible")) {
			var e = this.$element.height(),
				o = this.options.offset,
				n = o.top,
				s = o.bottom,
				a = Math.max(t(document).height(), t(document.body).height());
			"object" != typeof o && (s = n = o), "function" == typeof n && (n = o.top(this.$element)), "function" == typeof s && (s = o.bottom(this.$element));
			var r = this.getState(a, e, n, s);
			if (this.affixed != r) {
				null != this.unpin && this.$element.css("top", "");
				var l = "affix" + (r ? "-" + r : ""),
					h = t.Event(l + ".bs.affix");
				if (this.$element.trigger(h), h.isDefaultPrevented()) return;
				this.affixed = r, this.unpin = "bottom" == r ? this.getPinnedOffset() : null, this.$element.removeClass(i.RESET).addClass(l).trigger(l.replace("affix", "affixed") + ".bs.affix")
			}
			"bottom" == r && this.$element.offset({
				top: a - e - s
			})
		}
	};
	var o = t.fn.affix;
	t.fn.affix = e, t.fn.affix.Constructor = i, t.fn.affix.noConflict = function() {
		return t.fn.affix = o, this
	}, t(window).on("load", function() {
		t('[data-spy="affix"]').each(function() {
			var i = t(this),
				o = i.data();
			o.offset = o.offset || {}, null != o.offsetBottom && (o.offset.bottom = o.offsetBottom), null != o.offsetTop && (o.offset.top = o.offsetTop), e.call(i, o)
		})
	})
}(jQuery);
/*
  =======================================================================
      PLATFORM DETECT
  =======================================================================
*/
var htmlT    = $('html'),
  windowT    = $(window),
  ieDetect = false,
  mobileDetect = false,
  ua = window.navigator.userAgent,
  old_ie = ua.indexOf('MSIE '),
  new_ie = ua.indexOf('Trident/');

if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)) {
  mobileDetect = true;
  htmlT.addClass('mobile');
} else {
  htmlT.addClass('no-mobile');
};   

//IE Detect
if ((old_ie > -1) || (new_ie > -1)) {
  ieDetect = true;
};





/*
=======================================================================
  Image Loader  Script Library
=======================================================================
*/
(function(){function e(){}function t(e,t){for(var n=e.length;n--;)if(e[n].listener===t)return n;return-1}function n(e){return function(){return this[e].apply(this,arguments)}}var i=e.prototype,r=this,o=r.EventEmitter;i.getListeners=function(e){var t,n,i=this._getEvents();if("object"==typeof e){t={};for(n in i)i.hasOwnProperty(n)&&e.test(n)&&(t[n]=i[n])}else t=i[e]||(i[e]=[]);return t},i.flattenListeners=function(e){var t,n=[];for(t=0;e.length>t;t+=1)n.push(e[t].listener);return n},i.getListenersAsObject=function(e){var t,n=this.getListeners(e);return n instanceof Array&&(t={},t[e]=n),t||n},i.addListener=function(e,n){var i,r=this.getListenersAsObject(e),o="object"==typeof n;for(i in r)r.hasOwnProperty(i)&&-1===t(r[i],n)&&r[i].push(o?n:{listener:n,once:!1});return this},i.on=n("addListener"),i.addOnceListener=function(e,t){return this.addListener(e,{listener:t,once:!0})},i.once=n("addOnceListener"),i.defineEvent=function(e){return this.getListeners(e),this},i.defineEvents=function(e){for(var t=0;e.length>t;t+=1)this.defineEvent(e[t]);return this},i.removeListener=function(e,n){var i,r,o=this.getListenersAsObject(e);for(r in o)o.hasOwnProperty(r)&&(i=t(o[r],n),-1!==i&&o[r].splice(i,1));return this},i.off=n("removeListener"),i.addListeners=function(e,t){return this.manipulateListeners(!1,e,t)},i.removeListeners=function(e,t){return this.manipulateListeners(!0,e,t)},i.manipulateListeners=function(e,t,n){var i,r,o=e?this.removeListener:this.addListener,s=e?this.removeListeners:this.addListeners;if("object"!=typeof t||t instanceof RegExp)for(i=n.length;i--;)o.call(this,t,n[i]);else for(i in t)t.hasOwnProperty(i)&&(r=t[i])&&("function"==typeof r?o.call(this,i,r):s.call(this,i,r));return this},i.removeEvent=function(e){var t,n=typeof e,i=this._getEvents();if("string"===n)delete i[e];else if("object"===n)for(t in i)i.hasOwnProperty(t)&&e.test(t)&&delete i[t];else delete this._events;return this},i.removeAllListeners=n("removeEvent"),i.emitEvent=function(e,t){var n,i,r,o,s=this.getListenersAsObject(e);for(r in s)if(s.hasOwnProperty(r))for(i=s[r].length;i--;)n=s[r][i],n.once===!0&&this.removeListener(e,n.listener),o=n.listener.apply(this,t||[]),o===this._getOnceReturnValue()&&this.removeListener(e,n.listener);return this},i.trigger=n("emitEvent"),i.emit=function(e){var t=Array.prototype.slice.call(arguments,1);return this.emitEvent(e,t)},i.setOnceReturnValue=function(e){return this._onceReturnValue=e,this},i._getOnceReturnValue=function(){return this.hasOwnProperty("_onceReturnValue")?this._onceReturnValue:!0},i._getEvents=function(){return this._events||(this._events={})},e.noConflict=function(){return r.EventEmitter=o,e},"function"==typeof define&&define.amd?define("eventEmitter/EventEmitter",[],function(){return e}):"object"==typeof module&&module.exports?module.exports=e:this.EventEmitter=e}).call(this),function(e){function t(t){var n=e.event;return n.target=n.target||n.srcElement||t,n}var n=document.documentElement,i=function(){};n.addEventListener?i=function(e,t,n){e.addEventListener(t,n,!1)}:n.attachEvent&&(i=function(e,n,i){e[n+i]=i.handleEvent?function(){var n=t(e);i.handleEvent.call(i,n)}:function(){var n=t(e);i.call(e,n)},e.attachEvent("on"+n,e[n+i])});var r=function(){};n.removeEventListener?r=function(e,t,n){e.removeEventListener(t,n,!1)}:n.detachEvent&&(r=function(e,t,n){e.detachEvent("on"+t,e[t+n]);try{delete e[t+n]}catch(i){e[t+n]=void 0}});var o={bind:i,unbind:r};"function"==typeof define&&define.amd?define("eventie/eventie",o):e.eventie=o}(this),function(e,t){"function"==typeof define&&define.amd?define(["eventEmitter/EventEmitter","eventie/eventie"],function(n,i){return t(e,n,i)}):"object"==typeof exports?module.exports=t(e,require("wolfy87-eventemitter"),require("eventie")):e.imagesLoaded=t(e,e.EventEmitter,e.eventie)}(window,function(e,t,n){function i(e,t){for(var n in t)e[n]=t[n];return e}function r(e){return"[object Array]"===d.call(e)}function o(e){var t=[];if(r(e))t=e;else if("number"==typeof e.length)for(var n=0,i=e.length;i>n;n++)t.push(e[n]);else t.push(e);return t}function s(e,t,n){if(!(this instanceof s))return new s(e,t);"string"==typeof e&&(e=document.querySelectorAll(e)),this.elements=o(e),this.options=i({},this.options),"function"==typeof t?n=t:i(this.options,t),n&&this.on("always",n),this.getImages(),a&&(this.jqDeferred=new a.Deferred);var r=this;setTimeout(function(){r.check()})}function f(e){this.img=e}function c(e){this.src=e,v[e]=this}var a=e.jQuery,u=e.console,h=u!==void 0,d=Object.prototype.toString;s.prototype=new t,s.prototype.options={},s.prototype.getImages=function(){this.images=[];for(var e=0,t=this.elements.length;t>e;e++){var n=this.elements[e];"IMG"===n.nodeName&&this.addImage(n);var i=n.nodeType;if(i&&(1===i||9===i||11===i))for(var r=n.querySelectorAll("img"),o=0,s=r.length;s>o;o++){var f=r[o];this.addImage(f)}}},s.prototype.addImage=function(e){var t=new f(e);this.images.push(t)},s.prototype.check=function(){function e(e,r){return t.options.debug&&h&&u.log("confirm",e,r),t.progress(e),n++,n===i&&t.complete(),!0}var t=this,n=0,i=this.images.length;if(this.hasAnyBroken=!1,!i)return this.complete(),void 0;for(var r=0;i>r;r++){var o=this.images[r];o.on("confirm",e),o.check()}},s.prototype.progress=function(e){this.hasAnyBroken=this.hasAnyBroken||!e.isLoaded;var t=this;setTimeout(function(){t.emit("progress",t,e),t.jqDeferred&&t.jqDeferred.notify&&t.jqDeferred.notify(t,e)})},s.prototype.complete=function(){var e=this.hasAnyBroken?"fail":"done";this.isComplete=!0;var t=this;setTimeout(function(){if(t.emit(e,t),t.emit("always",t),t.jqDeferred){var n=t.hasAnyBroken?"reject":"resolve";t.jqDeferred[n](t)}})},a&&(a.fn.imagesLoaded=function(e,t){var n=new s(this,e,t);return n.jqDeferred.promise(a(this))}),f.prototype=new t,f.prototype.check=function(){var e=v[this.img.src]||new c(this.img.src);if(e.isConfirmed)return this.confirm(e.isLoaded,"cached was confirmed"),void 0;if(this.img.complete&&void 0!==this.img.naturalWidth)return this.confirm(0!==this.img.naturalWidth,"naturalWidth"),void 0;var t=this;e.on("confirm",function(e,n){return t.confirm(e.isLoaded,n),!0}),e.check()},f.prototype.confirm=function(e,t){this.isLoaded=e,this.emit("confirm",this,t)};var v={};return c.prototype=new t,c.prototype.check=function(){if(!this.isChecked){var e=new Image;n.bind(e,"load",this),n.bind(e,"error",this),e.src=this.src,this.isChecked=!0}},c.prototype.handleEvent=function(e){var t="on"+e.type;this[t]&&this[t](e)},c.prototype.onload=function(e){this.confirm(!0,"onload"),this.unbindProxyEvents(e)},c.prototype.onerror=function(e){this.confirm(!1,"onerror"),this.unbindProxyEvents(e)},c.prototype.confirm=function(e,t){this.isConfirmed=!0,this.isLoaded=e,this.emit("confirm",this,t)},c.prototype.unbindProxyEvents=function(e){n.unbind(e.target,"load",this),n.unbind(e.target,"error",this)},s});
!function(a,b,c,d){function e(b,c){this.element=b,this.options=a.extend({},g,c),this._defaults=g,this._name=f,this.init()}var f="stellar",g={scrollProperty:"scroll",positionProperty:"position",horizontalScrolling:!0,verticalScrolling:!0,horizontalOffset:0,verticalOffset:0,responsive:!1,parallaxBackgrounds:!0,parallaxElements:!0,hideDistantElements:!0,hideElement:function(a){a.hide()},showElement:function(a){a.show()}},h={scroll:{getLeft:function(a){return a.scrollLeft()},setLeft:function(a,b){a.scrollLeft(b)},getTop:function(a){return a.scrollTop()},setTop:function(a,b){a.scrollTop(b)}},position:{getLeft:function(a){return-1*parseInt(a.css("left"),10)},getTop:function(a){return-1*parseInt(a.css("top"),10)}},margin:{getLeft:function(a){return-1*parseInt(a.css("margin-left"),10)},getTop:function(a){return-1*parseInt(a.css("margin-top"),10)}},transform:{getLeft:function(a){var b=getComputedStyle(a[0])[k];return"none"!==b?-1*parseInt(b.match(/(-?[0-9]+)/g)[4],10):0},getTop:function(a){var b=getComputedStyle(a[0])[k];return"none"!==b?-1*parseInt(b.match(/(-?[0-9]+)/g)[5],10):0}}},i={position:{setLeft:function(a,b){a.css("left",b)},setTop:function(a,b){a.css("top",b)}},transform:{setPosition:function(a,b,c,d,e){a[0].style[k]="translate3d("+(b-c)+"px, "+(d-e)+"px, 0)"}}},j=function(){var b,c=/^(Moz|Webkit|Khtml|O|ms|Icab)(?=[A-Z])/,d=a("script")[0].style,e="";for(b in d)if(c.test(b)){e=b.match(c)[0];break}return"WebkitOpacity"in d&&(e="Webkit"),"KhtmlOpacity"in d&&(e="Khtml"),function(a){return e+(e.length>0?a.charAt(0).toUpperCase()+a.slice(1):a)}}(),k=j("transform"),l=a("<div />",{style:"background:#fff"}).css("background-position-x")!==d,m=l?function(a,b,c){a.css({"background-position-x":b,"background-position-y":c})}:function(a,b,c){a.css("background-position",b+" "+c)},n=l?function(a){return[a.css("background-position-x"),a.css("background-position-y")]}:function(a){return a.css("background-position").split(" ")},o=b.requestAnimationFrame||b.webkitRequestAnimationFrame||b.mozRequestAnimationFrame||b.oRequestAnimationFrame||b.msRequestAnimationFrame||function(a){setTimeout(a,1e3/60)};e.prototype={init:function(){this.options.name=f+"_"+Math.floor(1e9*Math.random()),this._defineElements(),this._defineGetters(),this._defineSetters(),this._handleWindowLoadAndResize(),this._detectViewport(),this.refresh({firstLoad:!0}),"scroll"===this.options.scrollProperty?this._handleScrollEvent():this._startAnimationLoop()},_defineElements:function(){this.element===c.body&&(this.element=b),this.$scrollElement=a(this.element),this.$element=this.element===b?a("body"):this.$scrollElement,this.$viewportElement=this.options.viewportElement!==d?a(this.options.viewportElement):this.$scrollElement[0]===b||"scroll"===this.options.scrollProperty?this.$scrollElement:this.$scrollElement.parent()},_defineGetters:function(){var a=this,b=h[a.options.scrollProperty];this._getScrollLeft=function(){return b.getLeft(a.$scrollElement)},this._getScrollTop=function(){return b.getTop(a.$scrollElement)}},_defineSetters:function(){var b=this,c=h[b.options.scrollProperty],d=i[b.options.positionProperty],e=c.setLeft,f=c.setTop;this._setScrollLeft="function"==typeof e?function(a){e(b.$scrollElement,a)}:a.noop,this._setScrollTop="function"==typeof f?function(a){f(b.$scrollElement,a)}:a.noop,this._setPosition=d.setPosition||function(a,c,e,f,g){b.options.horizontalScrolling&&d.setLeft(a,c,e),b.options.verticalScrolling&&d.setTop(a,f,g)}},_handleWindowLoadAndResize:function(){var c=this,d=a(b);c.options.responsive&&d.bind("load."+this.name,function(){c.refresh()}),d.bind("resize."+this.name,function(){c._detectViewport(),c.options.responsive&&c.refresh()})},refresh:function(c){var d=this,e=d._getScrollLeft(),f=d._getScrollTop();c&&c.firstLoad||this._reset(),this._setScrollLeft(0),this._setScrollTop(0),this._setOffsets(),this._findParticles(),this._findBackgrounds(),c&&c.firstLoad&&/WebKit/.test(navigator.userAgent)&&a(b).load(function(){var a=d._getScrollLeft(),b=d._getScrollTop();d._setScrollLeft(a+1),d._setScrollTop(b+1),d._setScrollLeft(a),d._setScrollTop(b)}),this._setScrollLeft(e),this._setScrollTop(f)},_detectViewport:function(){var a=this.$viewportElement.offset(),b=null!==a&&a!==d;this.viewportWidth=this.$viewportElement.width(),this.viewportHeight=this.$viewportElement.height(),this.viewportOffsetTop=b?a.top:0,this.viewportOffsetLeft=b?a.left:0},_findParticles:function(){{var b=this;this._getScrollLeft(),this._getScrollTop()}if(this.particles!==d)for(var c=this.particles.length-1;c>=0;c--)this.particles[c].$element.data("stellar-elementIsActive",d);this.particles=[],this.options.parallaxElements&&this.$element.find("[data-stellar-ratio]").each(function(){var c,e,f,g,h,i,j,k,l,m=a(this),n=0,o=0,p=0,q=0;if(m.data("stellar-elementIsActive")){if(m.data("stellar-elementIsActive")!==this)return}else m.data("stellar-elementIsActive",this);b.options.showElement(m),m.data("stellar-startingLeft")?(m.css("left",m.data("stellar-startingLeft")),m.css("top",m.data("stellar-startingTop"))):(m.data("stellar-startingLeft",m.css("left")),m.data("stellar-startingTop",m.css("top"))),f=m.position().left,g=m.position().top,h="auto"===m.css("margin-left")?0:parseInt(m.css("margin-left"),10),i="auto"===m.css("margin-top")?0:parseInt(m.css("margin-top"),10),k=m.offset().left-h,l=m.offset().top-i,m.parents().each(function(){var b=a(this);return b.data("stellar-offset-parent")===!0?(n=p,o=q,j=b,!1):(p+=b.position().left,void(q+=b.position().top))}),c=m.data("stellar-horizontal-offset")!==d?m.data("stellar-horizontal-offset"):j!==d&&j.data("stellar-horizontal-offset")!==d?j.data("stellar-horizontal-offset"):b.horizontalOffset,e=m.data("stellar-vertical-offset")!==d?m.data("stellar-vertical-offset"):j!==d&&j.data("stellar-vertical-offset")!==d?j.data("stellar-vertical-offset"):b.verticalOffset,b.particles.push({$element:m,$offsetParent:j,isFixed:"fixed"===m.css("position"),horizontalOffset:c,verticalOffset:e,startingPositionLeft:f,startingPositionTop:g,startingOffsetLeft:k,startingOffsetTop:l,parentOffsetLeft:n,parentOffsetTop:o,stellarRatio:m.data("stellar-ratio")!==d?m.data("stellar-ratio"):1,width:m.outerWidth(!0),height:m.outerHeight(!0),isHidden:!1})})},_findBackgrounds:function(){var b,c=this,e=this._getScrollLeft(),f=this._getScrollTop();this.backgrounds=[],this.options.parallaxBackgrounds&&(b=this.$element.find("[data-stellar-background-ratio]"),this.$element.data("stellar-background-ratio")&&(b=b.add(this.$element)),b.each(function(){var b,g,h,i,j,k,l,o=a(this),p=n(o),q=0,r=0,s=0,t=0;if(o.data("stellar-backgroundIsActive")){if(o.data("stellar-backgroundIsActive")!==this)return}else o.data("stellar-backgroundIsActive",this);o.data("stellar-backgroundStartingLeft")?m(o,o.data("stellar-backgroundStartingLeft"),o.data("stellar-backgroundStartingTop")):(o.data("stellar-backgroundStartingLeft",p[0]),o.data("stellar-backgroundStartingTop",p[1])),h="auto"===o.css("margin-left")?0:parseInt(o.css("margin-left"),10),i="auto"===o.css("margin-top")?0:parseInt(o.css("margin-top"),10),j=o.offset().left-h-e,k=o.offset().top-i-f,o.parents().each(function(){var b=a(this);return b.data("stellar-offset-parent")===!0?(q=s,r=t,l=b,!1):(s+=b.position().left,void(t+=b.position().top))}),b=o.data("stellar-horizontal-offset")!==d?o.data("stellar-horizontal-offset"):l!==d&&l.data("stellar-horizontal-offset")!==d?l.data("stellar-horizontal-offset"):c.horizontalOffset,g=o.data("stellar-vertical-offset")!==d?o.data("stellar-vertical-offset"):l!==d&&l.data("stellar-vertical-offset")!==d?l.data("stellar-vertical-offset"):c.verticalOffset,c.backgrounds.push({$element:o,$offsetParent:l,isFixed:"fixed"===o.css("background-attachment"),horizontalOffset:b,verticalOffset:g,startingValueLeft:p[0],startingValueTop:p[1],startingBackgroundPositionLeft:isNaN(parseInt(p[0],10))?0:parseInt(p[0],10),startingBackgroundPositionTop:isNaN(parseInt(p[1],10))?0:parseInt(p[1],10),startingPositionLeft:o.position().left,startingPositionTop:o.position().top,startingOffsetLeft:j,startingOffsetTop:k,parentOffsetLeft:q,parentOffsetTop:r,stellarRatio:o.data("stellar-background-ratio")===d?1:o.data("stellar-background-ratio")})}))},_reset:function(){var a,b,c,d,e;for(e=this.particles.length-1;e>=0;e--)a=this.particles[e],b=a.$element.data("stellar-startingLeft"),c=a.$element.data("stellar-startingTop"),this._setPosition(a.$element,b,b,c,c),this.options.showElement(a.$element),a.$element.data("stellar-startingLeft",null).data("stellar-elementIsActive",null).data("stellar-backgroundIsActive",null);for(e=this.backgrounds.length-1;e>=0;e--)d=this.backgrounds[e],d.$element.data("stellar-backgroundStartingLeft",null).data("stellar-backgroundStartingTop",null),m(d.$element,d.startingValueLeft,d.startingValueTop)},destroy:function(){this._reset(),this.$scrollElement.unbind("resize."+this.name).unbind("scroll."+this.name),this._animationLoop=a.noop,a(b).unbind("load."+this.name).unbind("resize."+this.name)},_setOffsets:function(){var c=this,d=a(b);d.unbind("resize.horizontal-"+this.name).unbind("resize.vertical-"+this.name),"function"==typeof this.options.horizontalOffset?(this.horizontalOffset=this.options.horizontalOffset(),d.bind("resize.horizontal-"+this.name,function(){c.horizontalOffset=c.options.horizontalOffset()})):this.horizontalOffset=this.options.horizontalOffset,"function"==typeof this.options.verticalOffset?(this.verticalOffset=this.options.verticalOffset(),d.bind("resize.vertical-"+this.name,function(){c.verticalOffset=c.options.verticalOffset()})):this.verticalOffset=this.options.verticalOffset},_repositionElements:function(){var a,b,c,d,e,f,g,h,i,j,k=this._getScrollLeft(),l=this._getScrollTop(),n=!0,o=!0;if(this.currentScrollLeft!==k||this.currentScrollTop!==l||this.currentWidth!==this.viewportWidth||this.currentHeight!==this.viewportHeight){for(this.currentScrollLeft=k,this.currentScrollTop=l,this.currentWidth=this.viewportWidth,this.currentHeight=this.viewportHeight,j=this.particles.length-1;j>=0;j--)a=this.particles[j],b=a.isFixed?1:0,this.options.horizontalScrolling?(f=(k+a.horizontalOffset+this.viewportOffsetLeft+a.startingPositionLeft-a.startingOffsetLeft+a.parentOffsetLeft)*-(a.stellarRatio+b-1)+a.startingPositionLeft,h=f-a.startingPositionLeft+a.startingOffsetLeft):(f=a.startingPositionLeft,h=a.startingOffsetLeft),this.options.verticalScrolling?(g=(l+a.verticalOffset+this.viewportOffsetTop+a.startingPositionTop-a.startingOffsetTop+a.parentOffsetTop)*-(a.stellarRatio+b-1)+a.startingPositionTop,i=g-a.startingPositionTop+a.startingOffsetTop):(g=a.startingPositionTop,i=a.startingOffsetTop),this.options.hideDistantElements&&(o=!this.options.horizontalScrolling||h+a.width>(a.isFixed?0:k)&&h<(a.isFixed?0:k)+this.viewportWidth+this.viewportOffsetLeft,n=!this.options.verticalScrolling||i+a.height>(a.isFixed?0:l)&&i<(a.isFixed?0:l)+this.viewportHeight+this.viewportOffsetTop),o&&n?(a.isHidden&&(this.options.showElement(a.$element),a.isHidden=!1),this._setPosition(a.$element,f,a.startingPositionLeft,g,a.startingPositionTop)):a.isHidden||(this.options.hideElement(a.$element),a.isHidden=!0);for(j=this.backgrounds.length-1;j>=0;j--)c=this.backgrounds[j],b=c.isFixed?0:1,d=this.options.horizontalScrolling?(k+c.horizontalOffset-this.viewportOffsetLeft-c.startingOffsetLeft+c.parentOffsetLeft-c.startingBackgroundPositionLeft)*(b-c.stellarRatio)+"px":c.startingValueLeft,e=this.options.verticalScrolling?(l+c.verticalOffset-this.viewportOffsetTop-c.startingOffsetTop+c.parentOffsetTop-c.startingBackgroundPositionTop)*(b-c.stellarRatio)+"px":c.startingValueTop,m(c.$element,d,e)}},_handleScrollEvent:function(){var a=this,b=!1,c=function(){a._repositionElements(),b=!1},d=function(){b||(o(c),b=!0)};this.$scrollElement.bind("scroll."+this.name,d),d()},_startAnimationLoop:function(){var a=this;this._animationLoop=function(){o(a._animationLoop),a._repositionElements()},this._animationLoop()}},a.fn[f]=function(b){var c=arguments;return b===d||"object"==typeof b?this.each(function(){a.data(this,"plugin_"+f)||a.data(this,"plugin_"+f,new e(this,b))}):"string"==typeof b&&"_"!==b[0]&&"init"!==b?this.each(function(){var d=a.data(this,"plugin_"+f);d instanceof e&&"function"==typeof d[b]&&d[b].apply(d,Array.prototype.slice.call(c,1)),"destroy"===b&&a.data(this,"plugin_"+f,null)}):void 0},a[f]=function(){var c=a(b);return c.stellar.apply(c,Array.prototype.slice.call(arguments,0))},a[f].scrollProperty=h,a[f].positionProperty=i,b.Stellar=e}(jQuery,this,document);