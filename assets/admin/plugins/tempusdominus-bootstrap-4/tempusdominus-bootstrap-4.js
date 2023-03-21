/*!@preserve
 * Tempus Dominus Bootstrap4 v5.39.0 (https://tempusdominus.github.io/bootstrap-4/)
 * Copyright 2016-2020 Jonathan Peterson and contributors
 * Licensed under MIT (https://github.com/tempusdominus/bootstrap-3/blob/master/LICENSE)
 */
if ("undefined" == typeof jQuery)
	throw new Error(
		"Tempus Dominus Bootstrap4's requires jQuery. jQuery must be included before Tempus Dominus Bootstrap4's JavaScript."
	);
if (
	(!(function () {
		var t = jQuery.fn.jquery.split(" ")[0].split(".");
		if (
			(t[0] < 2 && t[1] < 9) ||
			(1 === t[0] && 9 === t[1] && t[2] < 1) ||
			4 <= t[0]
		)
			throw new Error(
				"Tempus Dominus Bootstrap4's requires at least jQuery v3.0.0 but less than v4.0.0"
			);
	})(),
	"undefined" == typeof moment)
)
	throw new Error(
		"Tempus Dominus Bootstrap4's requires moment.js. Moment.js must be included before Tempus Dominus Bootstrap4's JavaScript."
	);
var version = moment.version.split(".");
if ((version[0] <= 2 && version[1] < 17) || 3 <= version[0])
	throw new Error(
		"Tempus Dominus Bootstrap4's requires at least moment.js v2.17.0 but less than v3.0.0"
	);
!(function () {
	function s(t, e) {
		for (var i = 0; i < e.length; i++) {
			var s = e[i];
			(s.enumerable = s.enumerable || !1),
				(s.configurable = !0),
				"value" in s && (s.writable = !0),
				Object.defineProperty(t, s.key, s);
		}
	}
	var a,
		n,
		o,
		r,
		d,
		h,
		l,
		c,
		u,
		_,
		f,
		m,
		w,
		g,
		i,
		b,
		v,
		M =
			((a = jQuery),
			(n = moment),
			(l = {
				DATA_TOGGLE: '[data-toggle="' + (r = o = "datetimepicker") + '"]',
			}),
			(c = { INPUT: o + "-input" }),
			(u = {
				CHANGE: "change" + (d = "." + r),
				BLUR: "blur" + d,
				KEYUP: "keyup" + d,
				KEYDOWN: "keydown" + d,
				FOCUS: "focus" + d,
				CLICK_DATA_API: "click" + d + (h = ".data-api"),
				UPDATE: "update" + d,
				ERROR: "error" + d,
				HIDE: "hide" + d,
				SHOW: "show" + d,
			}),
			(_ = [
				{ CLASS_NAME: "days", NAV_FUNCTION: "M", NAV_STEP: 1 },
				{ CLASS_NAME: "months", NAV_FUNCTION: "y", NAV_STEP: 1 },
				{ CLASS_NAME: "years", NAV_FUNCTION: "y", NAV_STEP: 10 },
				{ CLASS_NAME: "decades", NAV_FUNCTION: "y", NAV_STEP: 100 },
			]),
			(f = {
				up: 38,
				38: "up",
				down: 40,
				40: "down",
				left: 37,
				37: "left",
				right: 39,
				39: "right",
				tab: 9,
				9: "tab",
				escape: 27,
				27: "escape",
				enter: 13,
				13: "enter",
				pageUp: 33,
				33: "pageUp",
				pageDown: 34,
				34: "pageDown",
				shift: 16,
				16: "shift",
				control: 17,
				17: "control",
				space: 32,
				32: "space",
				t: 84,
				84: "t",
				delete: 46,
				46: "delete",
			}),
			(m = ["times", "days", "months", "years", "decades"]),
			(v = {
				timeZone: "",
				format: !(b = {
					time: "clock",
					date: "calendar",
					up: "arrow-up",
					down: "arrow-down",
					previous: "arrow-left",
					next: "arrow-right",
					today: "arrow-down-circle",
					clear: "trash-2",
					close: "x",
				}),
				dayViewHeaderFormat: "MMMM YYYY",
				extraFormats: !(i = {
					timeZone: -39,
					format: -38,
					dayViewHeaderFormat: -37,
					extraFormats: -36,
					stepping: -35,
					minDate: -34,
					maxDate: -33,
					useCurrent: -32,
					collapse: -31,
					locale: -30,
					defaultDate: -29,
					disabledDates: -28,
					enabledDates: -27,
					icons: -26,
					tooltips: -25,
					useStrict: -24,
					sideBySide: -23,
					daysOfWeekDisabled: -22,
					calendarWeeks: -21,
					viewMode: -20,
					toolbarPlacement: -19,
					buttons: -18,
					widgetPositioning: -17,
					widgetParent: -16,
					ignoreReadonly: -15,
					keepOpen: -14,
					focusOnShow: -13,
					inline: -12,
					keepInvalid: -11,
					keyBinds: -10,
					debug: -9,
					allowInputToggle: -8,
					disabledTimeIntervals: -7,
					disabledHours: -6,
					enabledHours: -5,
					viewDate: -4,
					allowMultidate: -3,
					multidateSeparator: -2,
					updateOnlyThroughDateOption: -1,
					date: 1,
				}),
				stepping: 1,
				minDate: !(g = {}),
				maxDate: !(w = {}),
				useCurrent: !0,
				collapse: !0,
				locale: n.locale(),
				defaultDate: !1,
				disabledDates: !1,
				enabledDates: !1,
				icons: {
					type: "class",
					time: "fa fa-clock-o",
					date: "fa fa-calendar",
					up: "fa fa-arrow-up",
					down: "fa fa-arrow-down",
					previous: "fa fa-chevron-left",
					next: "fa fa-chevron-right",
					today: "fa fa-calendar-check-o",
					clear: "fa fa-trash",
					close: "fa fa-times",
				},
				tooltips: {
					today: "Go to today",
					clear: "Clear selection",
					close: "Close the picker",
					selectMonth: "Select Month",
					prevMonth: "Previous Month",
					nextMonth: "Next Month",
					selectYear: "Select Year",
					prevYear: "Previous Year",
					nextYear: "Next Year",
					selectDecade: "Select Decade",
					prevDecade: "Previous Decade",
					nextDecade: "Next Decade",
					prevCentury: "Previous Century",
					nextCentury: "Next Century",
					pickHour: "Pick Hour",
					incrementHour: "Increment Hour",
					decrementHour: "Decrement Hour",
					pickMinute: "Pick Minute",
					incrementMinute: "Increment Minute",
					decrementMinute: "Decrement Minute",
					pickSecond: "Pick Second",
					incrementSecond: "Increment Second",
					decrementSecond: "Decrement Second",
					togglePeriod: "Toggle Period",
					selectTime: "Select Time",
					selectDate: "Select Date",
				},
				useStrict: !1,
				sideBySide: !1,
				daysOfWeekDisabled: !1,
				calendarWeeks: !1,
				viewMode: "days",
				toolbarPlacement: "default",
				buttons: { showToday: !1, showClear: !1, showClose: !1 },
				widgetPositioning: { horizontal: "auto", vertical: "auto" },
				widgetParent: null,
				readonly: !1,
				ignoreReadonly: !1,
				keepOpen: !1,
				focusOnShow: !0,
				inline: !1,
				keepInvalid: !1,
				keyBinds: {
					up: function () {
						if (!this.widget) return !1;
						var t = this._dates[0] || this.getMoment();
						return (
							this.widget.find(".datepicker").is(":visible")
								? this.date(t.clone().subtract(7, "d"))
								: this.date(t.clone().add(this.stepping(), "m")),
							!0
						);
					},
					down: function () {
						if (!this.widget) return this.show(), !1;
						var t = this._dates[0] || this.getMoment();
						return (
							this.widget.find(".datepicker").is(":visible")
								? this.date(t.clone().add(7, "d"))
								: this.date(t.clone().subtract(this.stepping(), "m")),
							!0
						);
					},
					"control up": function () {
						if (!this.widget) return !1;
						var t = this._dates[0] || this.getMoment();
						return (
							this.widget.find(".datepicker").is(":visible")
								? this.date(t.clone().subtract(1, "y"))
								: this.date(t.clone().add(1, "h")),
							!0
						);
					},
					"control down": function () {
						if (!this.widget) return !1;
						var t = this._dates[0] || this.getMoment();
						return (
							this.widget.find(".datepicker").is(":visible")
								? this.date(t.clone().add(1, "y"))
								: this.date(t.clone().subtract(1, "h")),
							!0
						);
					},
					left: function () {
						if (!this.widget) return !1;
						var t = this._dates[0] || this.getMoment();
						return (
							this.widget.find(".datepicker").is(":visible") &&
								this.date(t.clone().subtract(1, "d")),
							!0
						);
					},
					right: function () {
						if (!this.widget) return !1;
						var t = this._dates[0] || this.getMoment();
						return (
							this.widget.find(".datepicker").is(":visible") &&
								this.date(t.clone().add(1, "d")),
							!0
						);
					},
					pageUp: function () {
						if (!this.widget) return !1;
						var t = this._dates[0] || this.getMoment();
						return (
							this.widget.find(".datepicker").is(":visible") &&
								this.date(t.clone().subtract(1, "M")),
							!0
						);
					},
					pageDown: function () {
						if (!this.widget) return !1;
						var t = this._dates[0] || this.getMoment();
						return (
							this.widget.find(".datepicker").is(":visible") &&
								this.date(t.clone().add(1, "M")),
							!0
						);
					},
					enter: function () {
						return !!this.widget && (this.hide(), !0);
					},
					escape: function () {
						return !!this.widget && (this.hide(), !0);
					},
					"control space": function () {
						return (
							!!this.widget &&
							(this.widget.find(".timepicker").is(":visible") &&
								this.widget.find('.btn[data-action="togglePeriod"]').click(),
							!0)
						);
					},
					t: function () {
						return !!this.widget && (this.date(this.getMoment()), !0);
					},
					delete: function () {
						return !!this.widget && (this.clear(), !0);
					},
				},
				debug: !1,
				allowInputToggle: !1,
				disabledTimeIntervals: !1,
				disabledHours: !1,
				enabledHours: !1,
				viewDate: !1,
				allowMultidate: !1,
				multidateSeparator: ", ",
				updateOnlyThroughDateOption: !1,
				promptTimeOnDateChange: !1,
				promptTimeOnDateChangeTransitionDelay: 200,
			}),
			(function () {
				function p(t, e) {
					(this._options = this._getOptions(e)),
						(this._element = t),
						(this._dates = []),
						(this._datesFormatted = []),
						(this._viewDate = null),
						(this.unset = !0),
						(this.component = !1),
						(this.widget = !1),
						(this.use24Hours = null),
						(this.actualFormat = null),
						(this.parseFormats = null),
						(this.currentViewMode = null),
						(this.MinViewModeNumber = 0),
						(this.isInitFormatting = !1),
						(this.isInit = !1),
						(this.isDateUpdateThroughDateOptionFromClientCode = !1),
						(this.hasInitDate = !1),
						(this.initDate = void 0),
						(this._notifyChangeEventContext = void 0),
						(this._currentPromptTimeTimeout = null),
						this._int();
				}
				var t,
					e,
					i = p.prototype;
				return (
					(i._int = function () {
						this.isInit = !0;
						var t = this._element.data("target-input");
						this._element.is("input")
							? (this.input = this._element)
							: void 0 !== t &&
							  (this.input =
									"nearest" === t ? this._element.find("input") : a(t)),
							(this._dates = []),
							(this._dates[0] = this.getMoment()),
							(this._viewDate = this.getMoment().clone()),
							a.extend(!0, this._options, this._dataToOptions()),
							(this.hasInitDate = !1),
							(this.initDate = void 0),
							this.options(this._options),
							(this.isInitFormatting = !0),
							this._initFormatting(),
							(this.isInitFormatting = !1),
							void 0 !== this.input &&
							this.input.is("input") &&
							0 !== this.input.val().trim().length
								? this._setValue(
										this._parseInputDate(this.input.val().trim()),
										0
								  )
								: this._options.defaultDate &&
								  void 0 !== this.input &&
								  void 0 === this.input.attr("placeholder") &&
								  this._setValue(this._options.defaultDate, 0),
							this.hasInitDate && this.date(this.initDate),
							this._options.inline && this.show(),
							(this.isInit = !1);
					}),
					(i._update = function () {
						this.widget && (this._fillDate(), this._fillTime());
					}),
					(i._setValue = function (t, e) {
						var i = void 0 === e,
							s = !t && i,
							a = this.isDateUpdateThroughDateOptionFromClientCode,
							n =
								!this.isInit && this._options.updateOnlyThroughDateOption && !a,
							o = "",
							r = !1,
							d = this.unset ? null : this._dates[e];
						if (
							(!d &&
								!this.unset &&
								i &&
								s &&
								(d = this._dates[this._dates.length - 1]),
							!t)
						)
							return n
								? void this._notifyEvent({
										type: p.Event.CHANGE,
										date: t,
										oldDate: d,
										isClear: s,
										isInvalid: r,
										isDateUpdateThroughDateOptionFromClientCode: a,
										isInit: this.isInit,
								  })
								: (!this._options.allowMultidate ||
								  1 === this._dates.length ||
								  s
										? ((this.unset = !0),
										  (this._dates = []),
										  (this._datesFormatted = []))
										: ((o =
												"" +
												this._element.data("date") +
												this._options.multidateSeparator),
										  (o =
												(d &&
													o
														.replace(
															"" +
																d.format(this.actualFormat) +
																this._options.multidateSeparator,
															""
														)
														.replace(
															"" +
																this._options.multidateSeparator +
																this._options.multidateSeparator,
															""
														)
														.replace(
															new RegExp(
																this._options.multidateSeparator.replace(
																	/[-[\]{}()*+?.,\\^$|#\s]/g,
																	"\\$&"
																) + "\\s*$"
															),
															""
														)) ||
												""),
										  this._dates.splice(e, 1),
										  this._datesFormatted.splice(e, 1)),
								  (o = D(o)),
								  void 0 !== this.input &&
										(this.input.val(o), this.input.trigger("input")),
								  this._element.data("date", o),
								  this._notifyEvent({
										type: p.Event.CHANGE,
										date: !1,
										oldDate: d,
										isClear: s,
										isInvalid: r,
										isDateUpdateThroughDateOptionFromClientCode: a,
										isInit: this.isInit,
								  }),
								  void this._update());
						if (
							((t = t.clone().locale(this._options.locale)),
							this._hasTimeZone() && t.tz(this._options.timeZone),
							1 !== this._options.stepping &&
								t
									.minutes(
										Math.round(t.minutes() / this._options.stepping) *
											this._options.stepping
									)
									.seconds(0),
							this._isValid(t))
						) {
							if (n)
								return void this._notifyEvent({
									type: p.Event.CHANGE,
									date: t.clone(),
									oldDate: d,
									isClear: s,
									isInvalid: r,
									isDateUpdateThroughDateOptionFromClientCode: a,
									isInit: this.isInit,
								});
							if (
								((this._dates[e] = t),
								(this._datesFormatted[e] = t.format("YYYY-MM-DD")),
								(this._viewDate = t.clone()),
								this._options.allowMultidate && 1 < this._dates.length)
							) {
								for (var h = 0; h < this._dates.length; h++)
									o +=
										"" +
										this._dates[h].format(this.actualFormat) +
										this._options.multidateSeparator;
								o = o.replace(
									new RegExp(this._options.multidateSeparator + "\\s*$"),
									""
								);
							} else o = this._dates[e].format(this.actualFormat);
							(o = D(o)),
								void 0 !== this.input &&
									(this.input.val(o), this.input.trigger("input")),
								this._element.data("date", o),
								(this.unset = !1),
								this._update(),
								this._notifyEvent({
									type: p.Event.CHANGE,
									date: this._dates[e].clone(),
									oldDate: d,
									isClear: s,
									isInvalid: r,
									isDateUpdateThroughDateOptionFromClientCode: a,
									isInit: this.isInit,
								});
						} else
							(r = !0),
								this._options.keepInvalid
									? this._notifyEvent({
											type: p.Event.CHANGE,
											date: t,
											oldDate: d,
											isClear: s,
											isInvalid: r,
											isDateUpdateThroughDateOptionFromClientCode: a,
											isInit: this.isInit,
									  })
									: void 0 !== this.input &&
									  (this.input.val(
											"" +
												(this.unset
													? ""
													: this._dates[e].format(this.actualFormat))
									  ),
									  this.input.trigger("input")),
								this._notifyEvent({ type: p.Event.ERROR, date: t, oldDate: d });
					}),
					(i._change = function (t) {
						var e = a(t.target).val().trim(),
							i = e ? this._parseInputDate(e) : null;
						return this._setValue(i, 0), t.stopImmediatePropagation(), !1;
					}),
					(i._getOptions = function (t) {
						return (t = a.extend(
							!0,
							{},
							v,
							t && t.icons && "feather" === t.icons.type ? { icons: b } : {},
							t
						));
					}),
					(i._hasTimeZone = function () {
						return (
							void 0 !== n.tz &&
							void 0 !== this._options.timeZone &&
							null !== this._options.timeZone &&
							"" !== this._options.timeZone
						);
					}),
					(i._isEnabled = function (t) {
						if ("string" != typeof t || 1 < t.length)
							throw new TypeError(
								"isEnabled expects a single character string parameter"
							);
						switch (t) {
							case "y":
								return -1 !== this.actualFormat.indexOf("Y");
							case "M":
								return -1 !== this.actualFormat.indexOf("M");
							case "d":
								return -1 !== this.actualFormat.toLowerCase().indexOf("d");
							case "h":
							case "H":
								return -1 !== this.actualFormat.toLowerCase().indexOf("h");
							case "m":
								return -1 !== this.actualFormat.indexOf("m");
							case "s":
								return -1 !== this.actualFormat.indexOf("s");
							case "a":
							case "A":
								return -1 !== this.actualFormat.toLowerCase().indexOf("a");
							default:
								return !1;
						}
					}),
					(i._hasTime = function () {
						return (
							this._isEnabled("h") ||
							this._isEnabled("m") ||
							this._isEnabled("s")
						);
					}),
					(i._hasDate = function () {
						return (
							this._isEnabled("y") ||
							this._isEnabled("M") ||
							this._isEnabled("d")
						);
					}),
					(i._dataToOptions = function () {
						var i = this._element.data(),
							s = {};
						return (
							i.dateOptions &&
								i.dateOptions instanceof Object &&
								(s = a.extend(!0, s, i.dateOptions)),
							a.each(this._options, function (t) {
								var e = "date" + t.charAt(0).toUpperCase() + t.slice(1);
								void 0 !== i[e] ? (s[t] = i[e]) : delete s[t];
							}),
							s
						);
					}),
					(i._format = function () {
						return this._options.format || "YYYY-MM-DD HH:mm";
					}),
					(i._areSameDates = function (t, e) {
						var i = this._format();
						return (
							t &&
							e &&
							(t.isSame(e) || n(t.format(i), i).isSame(n(e.format(i), i)))
						);
					}),
					(i._notifyEvent = function (t) {
						if (t.type === p.Event.CHANGE) {
							if (
								((this._notifyChangeEventContext =
									this._notifyChangeEventContext || 0),
								this._notifyChangeEventContext++,
								(t.date && this._areSameDates(t.date, t.oldDate)) ||
									(!t.isClear && !t.date && !t.oldDate) ||
									1 < this._notifyChangeEventContext)
							)
								return void (this._notifyChangeEventContext = void 0);
							this._handlePromptTimeIfNeeded(t);
						}
						this._element.trigger(t), (this._notifyChangeEventContext = void 0);
					}),
					(i._handlePromptTimeIfNeeded = function (t) {
						if (this._options.promptTimeOnDateChange) {
							if (!t.oldDate && this._options.useCurrent) return;
							if (
								t.oldDate &&
								t.date &&
								(t.oldDate.format("YYYY-MM-DD") ===
									t.date.format("YYYY-MM-DD") ||
									(t.oldDate.format("YYYY-MM-DD") !==
										t.date.format("YYYY-MM-DD") &&
										t.oldDate.format("HH:mm:ss") !== t.date.format("HH:mm:ss")))
							)
								return;
							var e = this;
							clearTimeout(this._currentPromptTimeTimeout),
								(this._currentPromptTimeTimeout = setTimeout(function () {
									e.widget &&
										e.widget.find('[data-action="togglePicker"]').click();
								}, this._options.promptTimeOnDateChangeTransitionDelay));
						}
					}),
					(i._viewUpdate = function (t) {
						"y" === t && (t = "YYYY"),
							this._notifyEvent({
								type: p.Event.UPDATE,
								change: t,
								viewDate: this._viewDate.clone(),
							});
					}),
					(i._showMode = function (t) {
						this.widget &&
							(t &&
								(this.currentViewMode = Math.max(
									this.MinViewModeNumber,
									Math.min(3, this.currentViewMode + t)
								)),
							this.widget
								.find(".datepicker > div")
								.hide()
								.filter(".datepicker-" + _[this.currentViewMode].CLASS_NAME)
								.show());
					}),
					(i._isInDisabledDates = function (t) {
						return !0 === this._options.disabledDates[t.format("YYYY-MM-DD")];
					}),
					(i._isInEnabledDates = function (t) {
						return !0 === this._options.enabledDates[t.format("YYYY-MM-DD")];
					}),
					(i._isInDisabledHours = function (t) {
						return !0 === this._options.disabledHours[t.format("H")];
					}),
					(i._isInEnabledHours = function (t) {
						return !0 === this._options.enabledHours[t.format("H")];
					}),
					(i._isValid = function (t, e) {
						if (!t || !t.isValid()) return !1;
						if (
							this._options.disabledDates &&
							"d" === e &&
							this._isInDisabledDates(t)
						)
							return !1;
						if (
							this._options.enabledDates &&
							"d" === e &&
							!this._isInEnabledDates(t)
						)
							return !1;
						if (this._options.minDate && t.isBefore(this._options.minDate, e))
							return !1;
						if (this._options.maxDate && t.isAfter(this._options.maxDate, e))
							return !1;
						if (
							this._options.daysOfWeekDisabled &&
							"d" === e &&
							-1 !== this._options.daysOfWeekDisabled.indexOf(t.day())
						)
							return !1;
						if (
							this._options.disabledHours &&
							("h" === e || "m" === e || "s" === e) &&
							this._isInDisabledHours(t)
						)
							return !1;
						if (
							this._options.enabledHours &&
							("h" === e || "m" === e || "s" === e) &&
							!this._isInEnabledHours(t)
						)
							return !1;
						if (
							this._options.disabledTimeIntervals &&
							("h" === e || "m" === e || "s" === e)
						) {
							var i = !1;
							if (
								(a.each(this._options.disabledTimeIntervals, function () {
									if (t.isBetween(this[0], this[1])) return !(i = !0);
								}),
								i)
							)
								return !1;
						}
						return !0;
					}),
					(i._parseInputDate = function (t, e) {
						var i = (void 0 === e ? {} : e).isPickerShow,
							s = void 0 !== i && i;
						return (
							void 0 === this._options.parseInputDate || s
								? n.isMoment(t) || (t = this.getMoment(t))
								: (t = this._options.parseInputDate(t)),
							t
						);
					}),
					(i._keydown = function (t) {
						var e,
							i,
							s,
							a,
							n = null,
							o = [],
							r = {},
							d = t.which;
						for (e in ((w[d] = "p"), w))
							w.hasOwnProperty(e) &&
								"p" === w[e] &&
								(o.push(e), parseInt(e, 10) !== d && (r[e] = !0));
						for (e in this._options.keyBinds)
							if (
								this._options.keyBinds.hasOwnProperty(e) &&
								"function" == typeof this._options.keyBinds[e] &&
								(s = e.split(" ")).length === o.length &&
								f[d] === s[s.length - 1]
							) {
								for (a = !0, i = s.length - 2; 0 <= i; i--)
									if (!(f[s[i]] in r)) {
										a = !1;
										break;
									}
								if (a) {
									n = this._options.keyBinds[e];
									break;
								}
							}
						n && n.call(this) && (t.stopPropagation(), t.preventDefault());
					}),
					(i._keyup = function (t) {
						(w[t.which] = "r"),
							g[t.which] &&
								((g[t.which] = !1), t.stopPropagation(), t.preventDefault());
					}),
					(i._indexGivenDates = function (t) {
						var e = {},
							i = this;
						return (
							a.each(t, function () {
								var t = i._parseInputDate(this);
								t.isValid() && (e[t.format("YYYY-MM-DD")] = !0);
							}),
							!!Object.keys(e).length && e
						);
					}),
					(i._indexGivenHours = function (t) {
						var e = {};
						return (
							a.each(t, function () {
								e[this] = !0;
							}),
							!!Object.keys(e).length && e
						);
					}),
					(i._initFormatting = function () {
						var t = this._options.format || "L LT",
							e = this;
						(this.actualFormat = t.replace(
							/(\[[^\[]*])|(\\)?(LTS|LT|LL?L?L?|l{1,4})/g,
							function (t) {
								return (
									(e.isInitFormatting && null === e._options.date
										? e.getMoment()
										: e._dates[0]
									)
										.localeData()
										.longDateFormat(t) || t
								);
							}
						)),
							(this.parseFormats = this._options.extraFormats
								? this._options.extraFormats.slice()
								: []),
							this.parseFormats.indexOf(t) < 0 &&
								this.parseFormats.indexOf(this.actualFormat) < 0 &&
								this.parseFormats.push(this.actualFormat),
							(this.use24Hours =
								this.actualFormat.toLowerCase().indexOf("a") < 1 &&
								this.actualFormat.replace(/\[.*?]/g, "").indexOf("h") < 1),
							this._isEnabled("y") && (this.MinViewModeNumber = 2),
							this._isEnabled("M") && (this.MinViewModeNumber = 1),
							this._isEnabled("d") && (this.MinViewModeNumber = 0),
							(this.currentViewMode = Math.max(
								this.MinViewModeNumber,
								this.currentViewMode
							)),
							this.unset || this._setValue(this._dates[0], 0);
					}),
					(i._getLastPickedDate = function () {
						var t = this._dates[this._getLastPickedDateIndex()];
						return !t && this._options.allowMultidate && (t = n(new Date())), t;
					}),
					(i._getLastPickedDateIndex = function () {
						return this._dates.length - 1;
					}),
					(i.getMoment = function (t) {
						var e =
							null == t
								? n().clone().locale(this._options.locale)
								: this._hasTimeZone()
								? n.tz(
										t,
										this.parseFormats,
										this._options.locale,
										this._options.useStrict,
										this._options.timeZone
								  )
								: n(
										t,
										this.parseFormats,
										this._options.locale,
										this._options.useStrict
								  );
						return this._hasTimeZone() && e.tz(this._options.timeZone), e;
					}),
					(i.toggle = function () {
						return this.widget ? this.hide() : this.show();
					}),
					(i.readonly = function (t) {
						if (0 === arguments.length) return this._options.readonly;
						if ("boolean" != typeof t)
							throw new TypeError("readonly() expects a boolean parameter");
						(this._options.readonly = t),
							void 0 !== this.input &&
								this.input.prop("readonly", this._options.readonly),
							this.widget && (this.hide(), this.show());
					}),
					(i.ignoreReadonly = function (t) {
						if (0 === arguments.length) return this._options.ignoreReadonly;
						if ("boolean" != typeof t)
							throw new TypeError(
								"ignoreReadonly() expects a boolean parameter"
							);
						this._options.ignoreReadonly = t;
					}),
					(i.options = function (t) {
						if (0 === arguments.length) return a.extend(!0, {}, this._options);
						if (!(t instanceof Object))
							throw new TypeError(
								"options() this.options parameter should be an object"
							);
						a.extend(!0, this._options, t);
						var s = this,
							e = Object.keys(this._options).sort(k);
						a.each(e, function (t, e) {
							var i = s._options[e];
							if (void 0 !== s[e]) {
								if (s.isInit && "date" === e)
									return (s.hasInitDate = !0), void (s.initDate = i);
								s[e](i);
							}
						});
					}),
					(i.date = function (t, e) {
						if (((e = e || 0), 0 === arguments.length))
							return this.unset
								? null
								: this._options.allowMultidate
								? this._dates.join(this._options.multidateSeparator)
								: this._dates[e].clone();
						if (
							!(
								null === t ||
								"string" == typeof t ||
								n.isMoment(t) ||
								t instanceof Date
							)
						)
							throw new TypeError(
								"date() parameter must be one of [null, string, moment or Date]"
							);
						"string" == typeof t && y(t) && (t = new Date(t)),
							this._setValue(null === t ? null : this._parseInputDate(t), e);
					}),
					(i.updateOnlyThroughDateOption = function (t) {
						if ("boolean" != typeof t)
							throw new TypeError(
								"updateOnlyThroughDateOption() expects a boolean parameter"
							);
						this._options.updateOnlyThroughDateOption = t;
					}),
					(i.format = function (t) {
						if (0 === arguments.length) return this._options.format;
						if ("string" != typeof t && ("boolean" != typeof t || !1 !== t))
							throw new TypeError(
								"format() expects a string or boolean:false parameter " + t
							);
						(this._options.format = t),
							this.actualFormat && this._initFormatting();
					}),
					(i.timeZone = function (t) {
						if (0 === arguments.length) return this._options.timeZone;
						if ("string" != typeof t)
							throw new TypeError("newZone() expects a string parameter");
						this._options.timeZone = t;
					}),
					(i.dayViewHeaderFormat = function (t) {
						if (0 === arguments.length)
							return this._options.dayViewHeaderFormat;
						if ("string" != typeof t)
							throw new TypeError(
								"dayViewHeaderFormat() expects a string parameter"
							);
						this._options.dayViewHeaderFormat = t;
					}),
					(i.extraFormats = function (t) {
						if (0 === arguments.length) return this._options.extraFormats;
						if (!1 !== t && !(t instanceof Array))
							throw new TypeError(
								"extraFormats() expects an array or false parameter"
							);
						(this._options.extraFormats = t),
							this.parseFormats && this._initFormatting();
					}),
					(i.disabledDates = function (t) {
						if (0 === arguments.length)
							return this._options.disabledDates
								? a.extend({}, this._options.disabledDates)
								: this._options.disabledDates;
						if (!t)
							return (this._options.disabledDates = !1), this._update(), !0;
						if (!(t instanceof Array))
							throw new TypeError("disabledDates() expects an array parameter");
						(this._options.disabledDates = this._indexGivenDates(t)),
							(this._options.enabledDates = !1),
							this._update();
					}),
					(i.enabledDates = function (t) {
						if (0 === arguments.length)
							return this._options.enabledDates
								? a.extend({}, this._options.enabledDates)
								: this._options.enabledDates;
						if (!t)
							return (this._options.enabledDates = !1), this._update(), !0;
						if (!(t instanceof Array))
							throw new TypeError("enabledDates() expects an array parameter");
						(this._options.enabledDates = this._indexGivenDates(t)),
							(this._options.disabledDates = !1),
							this._update();
					}),
					(i.daysOfWeekDisabled = function (t) {
						if (0 === arguments.length)
							return this._options.daysOfWeekDisabled.splice(0);
						if ("boolean" == typeof t && !t)
							return (
								(this._options.daysOfWeekDisabled = !1), this._update(), !0
							);
						if (!(t instanceof Array))
							throw new TypeError(
								"daysOfWeekDisabled() expects an array parameter"
							);
						if (
							((this._options.daysOfWeekDisabled = t
								.reduce(function (t, e) {
									return (
										6 < (e = parseInt(e, 10)) ||
											e < 0 ||
											isNaN(e) ||
											(-1 === t.indexOf(e) && t.push(e)),
										t
									);
								}, [])
								.sort()),
							this._options.useCurrent && !this._options.keepInvalid)
						)
							for (var e = 0; e < this._dates.length; e++) {
								for (var i = 0; !this._isValid(this._dates[e], "d"); ) {
									if ((this._dates[e].add(1, "d"), 31 === i))
										throw "Tried 31 times to find a valid date";
									i++;
								}
								this._setValue(this._dates[e], e);
							}
						this._update();
					}),
					(i.maxDate = function (t) {
						if (0 === arguments.length)
							return this._options.maxDate
								? this._options.maxDate.clone()
								: this._options.maxDate;
						if ("boolean" == typeof t && !1 === t)
							return (this._options.maxDate = !1), this._update(), !0;
						"string" == typeof t &&
							(("now" !== t && "moment" !== t) || (t = this.getMoment()));
						var e = this._parseInputDate(t);
						if (!e.isValid())
							throw new TypeError(
								"maxDate() Could not parse date parameter: " + t
							);
						if (this._options.minDate && e.isBefore(this._options.minDate))
							throw new TypeError(
								"maxDate() date parameter is before this.options.minDate: " +
									e.format(this.actualFormat)
							);
						this._options.maxDate = e;
						for (var i = 0; i < this._dates.length; i++)
							this._options.useCurrent &&
								!this._options.keepInvalid &&
								this._dates[i].isAfter(t) &&
								this._setValue(this._options.maxDate, i);
						this._viewDate.isAfter(e) &&
							(this._viewDate = e
								.clone()
								.subtract(this._options.stepping, "m")),
							this._update();
					}),
					(i.minDate = function (t) {
						if (0 === arguments.length)
							return this._options.minDate
								? this._options.minDate.clone()
								: this._options.minDate;
						if ("boolean" == typeof t && !1 === t)
							return (this._options.minDate = !1), this._update(), !0;
						"string" == typeof t &&
							(("now" !== t && "moment" !== t) || (t = this.getMoment()));
						var e = this._parseInputDate(t);
						if (!e.isValid())
							throw new TypeError(
								"minDate() Could not parse date parameter: " + t
							);
						if (this._options.maxDate && e.isAfter(this._options.maxDate))
							throw new TypeError(
								"minDate() date parameter is after this.options.maxDate: " +
									e.format(this.actualFormat)
							);
						this._options.minDate = e;
						for (var i = 0; i < this._dates.length; i++)
							this._options.useCurrent &&
								!this._options.keepInvalid &&
								this._dates[i].isBefore(t) &&
								this._setValue(this._options.minDate, i);
						this._viewDate.isBefore(e) &&
							(this._viewDate = e.clone().add(this._options.stepping, "m")),
							this._update();
					}),
					(i.defaultDate = function (t) {
						if (0 === arguments.length)
							return this._options.defaultDate
								? this._options.defaultDate.clone()
								: this._options.defaultDate;
						if (!t) return !(this._options.defaultDate = !1);
						"string" == typeof t &&
							(t =
								"now" === t || "moment" === t
									? this.getMoment()
									: this.getMoment(t));
						var e = this._parseInputDate(t);
						if (!e.isValid())
							throw new TypeError(
								"defaultDate() Could not parse date parameter: " + t
							);
						if (!this._isValid(e))
							throw new TypeError(
								"defaultDate() date passed is invalid according to component setup validations"
							);
						(this._options.defaultDate = e),
							((this._options.defaultDate && this._options.inline) ||
								(void 0 !== this.input && "" === this.input.val().trim())) &&
								this._setValue(this._options.defaultDate, 0);
					}),
					(i.locale = function (t) {
						if (0 === arguments.length) return this._options.locale;
						if (!n.localeData(t))
							throw new TypeError(
								"locale() locale " + t + " is not loaded from moment locales!"
							);
						this._options.locale = t;
						for (var e = 0; e < this._dates.length; e++)
							this._dates[e].locale(this._options.locale);
						this._viewDate.locale(this._options.locale),
							this.actualFormat && this._initFormatting(),
							this.widget && (this.hide(), this.show());
					}),
					(i.stepping = function (t) {
						if (0 === arguments.length) return this._options.stepping;
						(t = parseInt(t, 10)),
							(isNaN(t) || t < 1) && (t = 1),
							(this._options.stepping = t);
					}),
					(i.useCurrent = function (t) {
						var e = ["year", "month", "day", "hour", "minute"];
						if (0 === arguments.length) return this._options.useCurrent;
						if ("boolean" != typeof t && "string" != typeof t)
							throw new TypeError(
								"useCurrent() expects a boolean or string parameter"
							);
						if ("string" == typeof t && -1 === e.indexOf(t.toLowerCase()))
							throw new TypeError(
								"useCurrent() expects a string parameter of " + e.join(", ")
							);
						this._options.useCurrent = t;
					}),
					(i.collapse = function (t) {
						if (0 === arguments.length) return this._options.collapse;
						if ("boolean" != typeof t)
							throw new TypeError("collapse() expects a boolean parameter");
						if (this._options.collapse === t) return !0;
						(this._options.collapse = t),
							this.widget && (this.hide(), this.show());
					}),
					(i.icons = function (t) {
						if (0 === arguments.length)
							return a.extend({}, this._options.icons);
						if (!(t instanceof Object))
							throw new TypeError("icons() expects parameter to be an Object");
						a.extend(this._options.icons, t),
							this.widget && (this.hide(), this.show());
					}),
					(i.tooltips = function (t) {
						if (0 === arguments.length)
							return a.extend({}, this._options.tooltips);
						if (!(t instanceof Object))
							throw new TypeError(
								"tooltips() expects parameter to be an Object"
							);
						a.extend(this._options.tooltips, t),
							this.widget && (this.hide(), this.show());
					}),
					(i.useStrict = function (t) {
						if (0 === arguments.length) return this._options.useStrict;
						if ("boolean" != typeof t)
							throw new TypeError("useStrict() expects a boolean parameter");
						this._options.useStrict = t;
					}),
					(i.sideBySide = function (t) {
						if (0 === arguments.length) return this._options.sideBySide;
						if ("boolean" != typeof t)
							throw new TypeError("sideBySide() expects a boolean parameter");
						(this._options.sideBySide = t),
							this.widget && (this.hide(), this.show());
					}),
					(i.viewMode = function (t) {
						if (0 === arguments.length) return this._options.viewMode;
						if ("string" != typeof t)
							throw new TypeError("viewMode() expects a string parameter");
						if (-1 === p.ViewModes.indexOf(t))
							throw new TypeError(
								"viewMode() parameter must be one of (" +
									p.ViewModes.join(", ") +
									") value"
							);
						(this._options.viewMode = t),
							(this.currentViewMode = Math.max(
								p.ViewModes.indexOf(t) - 1,
								this.MinViewModeNumber
							)),
							this._showMode();
					}),
					(i.calendarWeeks = function (t) {
						if (0 === arguments.length) return this._options.calendarWeeks;
						if ("boolean" != typeof t)
							throw new TypeError(
								"calendarWeeks() expects parameter to be a boolean value"
							);
						(this._options.calendarWeeks = t), this._update();
					}),
					(i.buttons = function (t) {
						if (0 === arguments.length)
							return a.extend({}, this._options.buttons);
						if (!(t instanceof Object))
							throw new TypeError(
								"buttons() expects parameter to be an Object"
							);
						if (
							(a.extend(this._options.buttons, t),
							"boolean" != typeof this._options.buttons.showToday)
						)
							throw new TypeError(
								"buttons.showToday expects a boolean parameter"
							);
						if ("boolean" != typeof this._options.buttons.showClear)
							throw new TypeError(
								"buttons.showClear expects a boolean parameter"
							);
						if ("boolean" != typeof this._options.buttons.showClose)
							throw new TypeError(
								"buttons.showClose expects a boolean parameter"
							);
						this.widget && (this.hide(), this.show());
					}),
					(i.keepOpen = function (t) {
						if (0 === arguments.length) return this._options.keepOpen;
						if ("boolean" != typeof t)
							throw new TypeError("keepOpen() expects a boolean parameter");
						this._options.keepOpen = t;
					}),
					(i.focusOnShow = function (t) {
						if (0 === arguments.length) return this._options.focusOnShow;
						if ("boolean" != typeof t)
							throw new TypeError("focusOnShow() expects a boolean parameter");
						this._options.focusOnShow = t;
					}),
					(i.inline = function (t) {
						if (0 === arguments.length) return this._options.inline;
						if ("boolean" != typeof t)
							throw new TypeError("inline() expects a boolean parameter");
						this._options.inline = t;
					}),
					(i.clear = function () {
						this._setValue(null);
					}),
					(i.keyBinds = function (t) {
						if (0 === arguments.length) return this._options.keyBinds;
						this._options.keyBinds = t;
					}),
					(i.debug = function (t) {
						if ("boolean" != typeof t)
							throw new TypeError("debug() expects a boolean parameter");
						this._options.debug = t;
					}),
					(i.allowInputToggle = function (t) {
						if (0 === arguments.length) return this._options.allowInputToggle;
						if ("boolean" != typeof t)
							throw new TypeError(
								"allowInputToggle() expects a boolean parameter"
							);
						this._options.allowInputToggle = t;
					}),
					(i.keepInvalid = function (t) {
						if (0 === arguments.length) return this._options.keepInvalid;
						if ("boolean" != typeof t)
							throw new TypeError("keepInvalid() expects a boolean parameter");
						this._options.keepInvalid = t;
					}),
					(i.datepickerInput = function (t) {
						if (0 === arguments.length) return this._options.datepickerInput;
						if ("string" != typeof t)
							throw new TypeError(
								"datepickerInput() expects a string parameter"
							);
						this._options.datepickerInput = t;
					}),
					(i.parseInputDate = function (t) {
						if (0 === arguments.length) return this._options.parseInputDate;
						if ("function" != typeof t)
							throw new TypeError("parseInputDate() should be as function");
						this._options.parseInputDate = t;
					}),
					(i.disabledTimeIntervals = function (t) {
						if (0 === arguments.length)
							return this._options.disabledTimeIntervals
								? a.extend({}, this._options.disabledTimeIntervals)
								: this._options.disabledTimeIntervals;
						if (!t)
							return (
								(this._options.disabledTimeIntervals = !1), this._update(), !0
							);
						if (!(t instanceof Array))
							throw new TypeError(
								"disabledTimeIntervals() expects an array parameter"
							);
						(this._options.disabledTimeIntervals = t), this._update();
					}),
					(i.disabledHours = function (t) {
						if (0 === arguments.length)
							return this._options.disabledHours
								? a.extend({}, this._options.disabledHours)
								: this._options.disabledHours;
						if (!t)
							return (this._options.disabledHours = !1), this._update(), !0;
						if (!(t instanceof Array))
							throw new TypeError("disabledHours() expects an array parameter");
						if (
							((this._options.disabledHours = this._indexGivenHours(t)),
							(this._options.enabledHours = !1),
							this._options.useCurrent && !this._options.keepInvalid)
						)
							for (var e = 0; e < this._dates.length; e++) {
								for (var i = 0; !this._isValid(this._dates[e], "h"); ) {
									if ((this._dates[e].add(1, "h"), 24 === i))
										throw "Tried 24 times to find a valid date";
									i++;
								}
								this._setValue(this._dates[e], e);
							}
						this._update();
					}),
					(i.enabledHours = function (t) {
						if (0 === arguments.length)
							return this._options.enabledHours
								? a.extend({}, this._options.enabledHours)
								: this._options.enabledHours;
						if (!t)
							return (this._options.enabledHours = !1), this._update(), !0;
						if (!(t instanceof Array))
							throw new TypeError("enabledHours() expects an array parameter");
						if (
							((this._options.enabledHours = this._indexGivenHours(t)),
							(this._options.disabledHours = !1),
							this._options.useCurrent && !this._options.keepInvalid)
						)
							for (var e = 0; e < this._dates.length; e++) {
								for (var i = 0; !this._isValid(this._dates[e], "h"); ) {
									if ((this._dates[e].add(1, "h"), 24 === i))
										throw "Tried 24 times to find a valid date";
									i++;
								}
								this._setValue(this._dates[e], e);
							}
						this._update();
					}),
					(i.viewDate = function (t) {
						if (0 === arguments.length) return this._viewDate.clone();
						if (!t)
							return (
								(this._viewDate = (this._dates[0] || this.getMoment()).clone()),
								!0
							);
						if (!("string" == typeof t || n.isMoment(t) || t instanceof Date))
							throw new TypeError(
								"viewDate() parameter must be one of [string, moment or Date]"
							);
						(this._viewDate = this._parseInputDate(t)),
							this._update(),
							this._viewUpdate(
								_[this.currentViewMode] && _[this.currentViewMode].NAV_FUNCTION
							);
					}),
					(i._fillDate = function () {}),
					(i._useFeatherIcons = function () {
						return "feather" === this._options.icons.type;
					}),
					(i.allowMultidate = function (t) {
						if ("boolean" != typeof t)
							throw new TypeError(
								"allowMultidate() expects a boolean parameter"
							);
						this._options.allowMultidate = t;
					}),
					(i.multidateSeparator = function (t) {
						if (0 === arguments.length) return this._options.multidateSeparator;
						if ("string" != typeof t)
							throw new TypeError(
								"multidateSeparator expects a string parameter"
							);
						this._options.multidateSeparator = t;
					}),
					(t = p),
					(e = [
						{
							key: "NAME",
							get: function () {
								return o;
							},
						},
						{
							key: "DATA_KEY",
							get: function () {
								return r;
							},
						},
						{
							key: "EVENT_KEY",
							get: function () {
								return d;
							},
						},
						{
							key: "DATA_API_KEY",
							get: function () {
								return h;
							},
						},
						{
							key: "DatePickerModes",
							get: function () {
								return _;
							},
						},
						{
							key: "ViewModes",
							get: function () {
								return m;
							},
						},
						{
							key: "Event",
							get: function () {
								return u;
							},
						},
						{
							key: "Selector",
							get: function () {
								return l;
							},
						},
						{
							key: "Default",
							get: function () {
								return v;
							},
							set: function (t) {
								v = t;
							},
						},
						{
							key: "ClassName",
							get: function () {
								return c;
							},
						},
					]) && s(t, e),
					p
				);
			})());
	function y(t) {
		return (
			(e = new Date(t)),
			"[object Date]" === Object.prototype.toString.call(e) &&
				!isNaN(e.getTime())
		);
		var e;
	}
	function D(t) {
		return t.replace(/(^\s+)|(\s+$)/g, "");
	}
	function k(t, e) {
		return i[t] && i[e]
			? i[t] < 0 && i[e] < 0
				? Math.abs(i[e]) - Math.abs(i[t])
				: i[t] < 0
				? -1
				: i[e] < 0
				? 1
				: i[t] - i[e]
			: i[t]
			? i[t]
			: i[e]
			? i[e]
			: 0;
	}
	var E, t, p, C, T, x;
	(E = jQuery),
		(t = E.fn[M.NAME]),
		(p = ["top", "bottom", "auto"]),
		(C = ["left", "right", "auto"]),
		(T = ["default", "top", "bottom"]),
		(x = (function (d) {
			var t, e;
			function n(t, e) {
				var i = d.call(this, t, e) || this;
				return i._init(), i;
			}
			(e = d),
				((t = n).prototype = Object.create(e.prototype)),
				((t.prototype.constructor = t).__proto__ = e);
			var i = n.prototype;
			return (
				(i._init = function () {
					var t;
					this._element.hasClass("input-group") &&
						(0 === (t = this._element.find(".datepickerbutton")).length
							? (this.component = this._element.find(
									'[data-toggle="datetimepicker"]'
							  ))
							: (this.component = t));
				}),
				(i._iconTag = function (t) {
					return "undefined" != typeof feather &&
						this._useFeatherIcons() &&
						feather.icons[t]
						? E("<span>").html(feather.icons[t].toSvg())
						: E("<span>").addClass(t);
				}),
				(i._getDatePickerTemplate = function () {
					var t = E("<thead>").append(
							E("<tr>")
								.append(
									E("<th>")
										.addClass("prev")
										.attr("data-action", "previous")
										.append(this._iconTag(this._options.icons.previous))
								)
								.append(
									E("<th>")
										.addClass("picker-switch")
										.attr("data-action", "pickerSwitch")
										.attr("colspan", this._options.calendarWeeks ? "6" : "5")
								)
								.append(
									E("<th>")
										.addClass("next")
										.attr("data-action", "next")
										.append(this._iconTag(this._options.icons.next))
								)
						),
						e = E("<tbody>").append(
							E("<tr>").append(
								E("<td>").attr(
									"colspan",
									this._options.calendarWeeks ? "8" : "7"
								)
							)
						);
					return [
						E("<div>")
							.addClass("datepicker-days")
							.append(
								E("<table>")
									.addClass("table table-sm")
									.append(t)
									.append(E("<tbody>"))
							),
						E("<div>")
							.addClass("datepicker-months")
							.append(
								E("<table>")
									.addClass("table-condensed")
									.append(t.clone())
									.append(e.clone())
							),
						E("<div>")
							.addClass("datepicker-years")
							.append(
								E("<table>")
									.addClass("table-condensed")
									.append(t.clone())
									.append(e.clone())
							),
						E("<div>")
							.addClass("datepicker-decades")
							.append(
								E("<table>")
									.addClass("table-condensed")
									.append(t.clone())
									.append(e.clone())
							),
					];
				}),
				(i._getTimePickerMainTemplate = function () {
					var t = E("<tr>"),
						e = E("<tr>"),
						i = E("<tr>");
					return (
						this._isEnabled("h") &&
							(t.append(
								E("<td>").append(
									E("<a>")
										.attr({
											href: "#",
											tabindex: "-1",
											title: this._options.tooltips.incrementHour,
										})
										.addClass("btn")
										.attr("data-action", "incrementHours")
										.append(this._iconTag(this._options.icons.up))
								)
							),
							e.append(
								E("<td>").append(
									E("<span>")
										.addClass("timepicker-hour")
										.attr({
											"data-time-component": "hours",
											title: this._options.tooltips.pickHour,
										})
										.attr("data-action", "showHours")
								)
							),
							i.append(
								E("<td>").append(
									E("<a>")
										.attr({
											href: "#",
											tabindex: "-1",
											title: this._options.tooltips.decrementHour,
										})
										.addClass("btn")
										.attr("data-action", "decrementHours")
										.append(this._iconTag(this._options.icons.down))
								)
							)),
						this._isEnabled("m") &&
							(this._isEnabled("h") &&
								(t.append(E("<td>").addClass("separator")),
								e.append(E("<td>").addClass("separator").html(":")),
								i.append(E("<td>").addClass("separator"))),
							t.append(
								E("<td>").append(
									E("<a>")
										.attr({
											href: "#",
											tabindex: "-1",
											title: this._options.tooltips.incrementMinute,
										})
										.addClass("btn")
										.attr("data-action", "incrementMinutes")
										.append(this._iconTag(this._options.icons.up))
								)
							),
							e.append(
								E("<td>").append(
									E("<span>")
										.addClass("timepicker-minute")
										.attr({
											"data-time-component": "minutes",
											title: this._options.tooltips.pickMinute,
										})
										.attr("data-action", "showMinutes")
								)
							),
							i.append(
								E("<td>").append(
									E("<a>")
										.attr({
											href: "#",
											tabindex: "-1",
											title: this._options.tooltips.decrementMinute,
										})
										.addClass("btn")
										.attr("data-action", "decrementMinutes")
										.append(this._iconTag(this._options.icons.down))
								)
							)),
						this._isEnabled("s") &&
							(this._isEnabled("m") &&
								(t.append(E("<td>").addClass("separator")),
								e.append(E("<td>").addClass("separator").html(":")),
								i.append(E("<td>").addClass("separator"))),
							t.append(
								E("<td>").append(
									E("<a>")
										.attr({
											href: "#",
											tabindex: "-1",
											title: this._options.tooltips.incrementSecond,
										})
										.addClass("btn")
										.attr("data-action", "incrementSeconds")
										.append(this._iconTag(this._options.icons.up))
								)
							),
							e.append(
								E("<td>").append(
									E("<span>")
										.addClass("timepicker-second")
										.attr({
											"data-time-component": "seconds",
											title: this._options.tooltips.pickSecond,
										})
										.attr("data-action", "showSeconds")
								)
							),
							i.append(
								E("<td>").append(
									E("<a>")
										.attr({
											href: "#",
											tabindex: "-1",
											title: this._options.tooltips.decrementSecond,
										})
										.addClass("btn")
										.attr("data-action", "decrementSeconds")
										.append(this._iconTag(this._options.icons.down))
								)
							)),
						this.use24Hours ||
							(t.append(E("<td>").addClass("separator")),
							e.append(
								E("<td>").append(
									E("<button>").addClass("btn btn-primary").attr({
										"data-action": "togglePeriod",
										tabindex: "-1",
										title: this._options.tooltips.togglePeriod,
									})
								)
							),
							i.append(E("<td>").addClass("separator"))),
						E("<div>")
							.addClass("timepicker-picker")
							.append(
								E("<table>").addClass("table-condensed").append([t, e, i])
							)
					);
				}),
				(i._getTimePickerTemplate = function () {
					var t = E("<div>")
							.addClass("timepicker-hours")
							.append(E("<table>").addClass("table-condensed")),
						e = E("<div>")
							.addClass("timepicker-minutes")
							.append(E("<table>").addClass("table-condensed")),
						i = E("<div>")
							.addClass("timepicker-seconds")
							.append(E("<table>").addClass("table-condensed")),
						s = [this._getTimePickerMainTemplate()];
					return (
						this._isEnabled("h") && s.push(t),
						this._isEnabled("m") && s.push(e),
						this._isEnabled("s") && s.push(i),
						s
					);
				}),
				(i._getToolbar = function () {
					var t,
						e,
						i = [];
					return (
						this._options.buttons.showToday &&
							i.push(
								E("<td>").append(
									E("<a>")
										.attr({
											href: "#",
											tabindex: "-1",
											"data-action": "today",
											title: this._options.tooltips.today,
										})
										.append(this._iconTag(this._options.icons.today))
								)
							),
						!this._options.sideBySide &&
							this._options.collapse &&
							this._hasDate() &&
							this._hasTime() &&
							((e =
								"times" === this._options.viewMode
									? ((t = this._options.tooltips.selectDate),
									  this._options.icons.date)
									: ((t = this._options.tooltips.selectTime),
									  this._options.icons.time)),
							i.push(
								E("<td>").append(
									E("<a>")
										.attr({
											href: "#",
											tabindex: "-1",
											"data-action": "togglePicker",
											title: t,
										})
										.append(this._iconTag(e))
								)
							)),
						this._options.buttons.showClear &&
							i.push(
								E("<td>").append(
									E("<a>")
										.attr({
											href: "#",
											tabindex: "-1",
											"data-action": "clear",
											title: this._options.tooltips.clear,
										})
										.append(this._iconTag(this._options.icons.clear))
								)
							),
						this._options.buttons.showClose &&
							i.push(
								E("<td>").append(
									E("<a>")
										.attr({
											href: "#",
											tabindex: "-1",
											"data-action": "close",
											title: this._options.tooltips.close,
										})
										.append(this._iconTag(this._options.icons.close))
								)
							),
						0 === i.length
							? ""
							: E("<table>")
									.addClass("table-condensed")
									.append(E("<tbody>").append(E("<tr>").append(i)))
					);
				}),
				(i._getTemplate = function () {
					var t = E("<div>").addClass(
							(
								"bootstrap-datetimepicker-widget dropdown-menu " +
								(this._options.calendarWeeks
									? "tempusdominus-bootstrap-datetimepicker-widget-with-calendar-weeks"
									: "") +
								" " +
								(this._useFeatherIcons()
									? "tempusdominus-bootstrap-datetimepicker-widget-with-feather-icons"
									: "") +
								" "
							).trim()
						),
						e = E("<div>")
							.addClass("datepicker")
							.append(this._getDatePickerTemplate()),
						i = E("<div>")
							.addClass("timepicker")
							.append(this._getTimePickerTemplate()),
						s = E("<ul>").addClass("list-unstyled"),
						a = E("<li>")
							.addClass(
								(
									"picker-switch" +
									(this._options.collapse ? " accordion-toggle" : "") +
									" " +
									(this._useFeatherIcons()
										? "picker-switch-with-feathers-icons"
										: "")
								).trim()
							)
							.append(this._getToolbar());
					return (
						this._options.inline && t.removeClass("dropdown-menu"),
						this.use24Hours && t.addClass("usetwentyfour"),
						((void 0 !== this.input && this.input.prop("readonly")) ||
							this._options.readonly) &&
							t.addClass("bootstrap-datetimepicker-widget-readonly"),
						this._isEnabled("s") && !this.use24Hours && t.addClass("wider"),
						this._options.sideBySide && this._hasDate() && this._hasTime()
							? (t.addClass("timepicker-sbs"),
							  "top" === this._options.toolbarPlacement && t.append(a),
							  t.append(
									E("<div>")
										.addClass("row")
										.append(e.addClass("col-md-6"))
										.append(i.addClass("col-md-6"))
							  ),
							  ("bottom" !== this._options.toolbarPlacement &&
									"default" !== this._options.toolbarPlacement) ||
									t.append(a),
							  t)
							: ("top" === this._options.toolbarPlacement && s.append(a),
							  this._hasDate() &&
									s.append(
										E("<li>")
											.addClass(
												this._options.collapse && this._hasTime()
													? "collapse"
													: ""
											)
											.addClass(
												this._options.collapse &&
													this._hasTime() &&
													"times" === this._options.viewMode
													? ""
													: "show"
											)
											.append(e)
									),
							  "default" === this._options.toolbarPlacement && s.append(a),
							  this._hasTime() &&
									s.append(
										E("<li>")
											.addClass(
												this._options.collapse && this._hasDate()
													? "collapse"
													: ""
											)
											.addClass(
												this._options.collapse &&
													this._hasDate() &&
													"times" === this._options.viewMode
													? "show"
													: ""
											)
											.append(i)
									),
							  "bottom" === this._options.toolbarPlacement && s.append(a),
							  t.append(s))
					);
				}),
				(i._place = function (t) {
					var e,
						i = (t && t.data && t.data.picker) || this,
						s = i._options.widgetPositioning.vertical,
						a = i._options.widgetPositioning.horizontal,
						n = (
							i.component && i.component.length ? i.component : i._element
						).position(),
						o = (
							i.component && i.component.length ? i.component : i._element
						).offset();
					if (i._options.widgetParent)
						e = i._options.widgetParent.append(i.widget);
					else if (i._element.is("input"))
						e = i._element.after(i.widget).parent();
					else {
						if (i._options.inline)
							return void (e = i._element.append(i.widget));
						(e = i._element), i._element.children().first().after(i.widget);
					}
					if (
						("auto" === s &&
							(s =
								o.top + 1.5 * i.widget.height() >=
									E(window).height() + E(window).scrollTop() &&
								i.widget.height() + i._element.outerHeight() < o.top
									? "top"
									: "bottom"),
						"auto" === a &&
							(a =
								e.width() < o.left + i.widget.outerWidth() / 2 &&
								o.left + i.widget.outerWidth() > E(window).width()
									? "right"
									: "left"),
						"top" === s
							? i.widget.addClass("top").removeClass("bottom")
							: i.widget.addClass("bottom").removeClass("top"),
						"right" === a
							? i.widget.addClass("float-right")
							: i.widget.removeClass("float-right"),
						"relative" !== e.css("position") &&
							(e = e
								.parents()
								.filter(function () {
									return "relative" === E(this).css("position");
								})
								.first()),
						0 === e.length)
					)
						throw new Error(
							"datetimepicker component should be placed within a relative positioned container"
						);
					i.widget.css({
						top: "top" === s ? "auto" : n.top + i._element.outerHeight() + "px",
						bottom:
							"top" === s
								? e.outerHeight() - (e === i._element ? 0 : n.top) + "px"
								: "auto",
						left:
							"left" === a ? (e === i._element ? 0 : n.left) + "px" : "auto",
						right:
							"left" === a
								? "auto"
								: e.outerWidth() -
								  i._element.outerWidth() -
								  (e === i._element ? 0 : n.left) +
								  "px",
					});
				}),
				(i._fillDow = function () {
					var t = E("<tr>"),
						e = this._viewDate.clone().startOf("w").startOf("d");
					for (
						!0 === this._options.calendarWeeks &&
						t.append(E("<th>").addClass("cw").text("#"));
						e.isBefore(this._viewDate.clone().endOf("w"));

					)
						t.append(E("<th>").addClass("dow").text(e.format("dd"))),
							e.add(1, "d");
					this.widget.find(".datepicker-days thead").append(t);
				}),
				(i._fillMonths = function () {
					for (
						var t = [], e = this._viewDate.clone().startOf("y").startOf("d");
						e.isSame(this._viewDate, "y");

					)
						t.push(
							E("<span>")
								.attr("data-action", "selectMonth")
								.addClass("month")
								.text(e.format("MMM"))
						),
							e.add(1, "M");
					this.widget.find(".datepicker-months td").empty().append(t);
				}),
				(i._updateMonths = function () {
					var t = this.widget.find(".datepicker-months"),
						e = t.find("th"),
						i = t.find("tbody").find("span"),
						s = this,
						a = this._getLastPickedDate();
					e.eq(0).find("span").attr("title", this._options.tooltips.prevYear),
						e.eq(1).attr("title", this._options.tooltips.selectYear),
						e.eq(2).find("span").attr("title", this._options.tooltips.nextYear),
						t.find(".disabled").removeClass("disabled"),
						this._isValid(this._viewDate.clone().subtract(1, "y"), "y") ||
							e.eq(0).addClass("disabled"),
						e.eq(1).text(this._viewDate.year()),
						this._isValid(this._viewDate.clone().add(1, "y"), "y") ||
							e.eq(2).addClass("disabled"),
						i.removeClass("active"),
						a &&
							a.isSame(this._viewDate, "y") &&
							!this.unset &&
							i.eq(a.month()).addClass("active"),
						i.each(function (t) {
							s._isValid(s._viewDate.clone().month(t), "M") ||
								E(this).addClass("disabled");
						});
				}),
				(i._getStartEndYear = function (t, e) {
					var i = t / 10,
						s = Math.floor(e / t) * t;
					return [s, s + 9 * i, Math.floor(e / i) * i];
				}),
				(i._updateYears = function () {
					var t = this.widget.find(".datepicker-years"),
						e = t.find("th"),
						i = this._getStartEndYear(10, this._viewDate.year()),
						s = this._viewDate.clone().year(i[0]),
						a = this._viewDate.clone().year(i[1]),
						n = "";
					for (
						e
							.eq(0)
							.find("span")
							.attr("title", this._options.tooltips.prevDecade),
							e.eq(1).attr("title", this._options.tooltips.selectDecade),
							e
								.eq(2)
								.find("span")
								.attr("title", this._options.tooltips.nextDecade),
							t.find(".disabled").removeClass("disabled"),
							this._options.minDate &&
								this._options.minDate.isAfter(s, "y") &&
								e.eq(0).addClass("disabled"),
							e.eq(1).text(s.year() + "-" + a.year()),
							this._options.maxDate &&
								this._options.maxDate.isBefore(a, "y") &&
								e.eq(2).addClass("disabled"),
							n +=
								'<span data-action="selectYear" class="year old' +
								(this._isValid(s, "y") ? "" : " disabled") +
								'">' +
								(s.year() - 1) +
								"</span>";
						!s.isAfter(a, "y");

					)
						(n +=
							'<span data-action="selectYear" class="year' +
							(s.isSame(this._getLastPickedDate(), "y") && !this.unset
								? " active"
								: "") +
							(this._isValid(s, "y") ? "" : " disabled") +
							'">' +
							s.year() +
							"</span>"),
							s.add(1, "y");
					(n +=
						'<span data-action="selectYear" class="year old' +
						(this._isValid(s, "y") ? "" : " disabled") +
						'">' +
						s.year() +
						"</span>"),
						t.find("td").html(n);
				}),
				(i._updateDecades = function () {
					var t,
						e = this.widget.find(".datepicker-decades"),
						i = e.find("th"),
						s = this._getStartEndYear(100, this._viewDate.year()),
						a = this._viewDate.clone().year(s[0]),
						n = this._viewDate.clone().year(s[1]),
						o = this._getLastPickedDate(),
						r = !1,
						d = !1,
						h = "";
					for (
						i
							.eq(0)
							.find("span")
							.attr("title", this._options.tooltips.prevCentury),
							i
								.eq(2)
								.find("span")
								.attr("title", this._options.tooltips.nextCentury),
							e.find(".disabled").removeClass("disabled"),
							(0 === a.year() ||
								(this._options.minDate &&
									this._options.minDate.isAfter(a, "y"))) &&
								i.eq(0).addClass("disabled"),
							i.eq(1).text(a.year() + "-" + n.year()),
							this._options.maxDate &&
								this._options.maxDate.isBefore(n, "y") &&
								i.eq(2).addClass("disabled"),
							a.year() - 10 < 0
								? (h += "<span>&nbsp;</span>")
								: (h +=
										'<span data-action="selectDecade" class="decade old" data-selection="' +
										(a.year() + 6) +
										'">' +
										(a.year() - 10) +
										"</span>");
						!a.isAfter(n, "y");

					)
						(t = a.year() + 11),
							(r =
								this._options.minDate &&
								this._options.minDate.isAfter(a, "y") &&
								this._options.minDate.year() <= t),
							(d =
								this._options.maxDate &&
								this._options.maxDate.isAfter(a, "y") &&
								this._options.maxDate.year() <= t),
							(h +=
								'<span data-action="selectDecade" class="decade' +
								(o && o.isAfter(a) && o.year() <= t ? " active" : "") +
								(this._isValid(a, "y") || r || d ? "" : " disabled") +
								'" data-selection="' +
								(a.year() + 6) +
								'">' +
								a.year() +
								"</span>"),
							a.add(10, "y");
					(h +=
						'<span data-action="selectDecade" class="decade old" data-selection="' +
						(a.year() + 6) +
						'">' +
						a.year() +
						"</span>"),
						e.find("td").html(h);
				}),
				(i._fillDate = function () {
					d.prototype._fillDate.call(this);
					var t,
						e,
						i,
						s,
						a,
						n = this.widget.find(".datepicker-days"),
						o = n.find("th"),
						r = [];
					if (this._hasDate()) {
						for (
							o
								.eq(0)
								.find("span")
								.attr("title", this._options.tooltips.prevMonth),
								o.eq(1).attr("title", this._options.tooltips.selectMonth),
								o
									.eq(2)
									.find("span")
									.attr("title", this._options.tooltips.nextMonth),
								n.find(".disabled").removeClass("disabled"),
								o
									.eq(1)
									.text(
										this._viewDate.format(this._options.dayViewHeaderFormat)
									),
								this._isValid(this._viewDate.clone().subtract(1, "M"), "M") ||
									o.eq(0).addClass("disabled"),
								this._isValid(this._viewDate.clone().add(1, "M"), "M") ||
									o.eq(2).addClass("disabled"),
								t = this._viewDate
									.clone()
									.startOf("M")
									.startOf("w")
									.startOf("d"),
								s = 0;
							s < 42;
							s++
						) {
							0 === t.weekday() &&
								((e = E("<tr>")),
								this._options.calendarWeeks &&
									e.append('<td class="cw">' + t.week() + "</td>"),
								r.push(e)),
								(i = ""),
								t.isBefore(this._viewDate, "M") && (i += " old"),
								t.isAfter(this._viewDate, "M") && (i += " new"),
								this._options.allowMultidate
									? -1 !==
											(a = this._datesFormatted.indexOf(
												t.format("YYYY-MM-DD")
											)) &&
									  t.isSame(this._datesFormatted[a], "d") &&
									  !this.unset &&
									  (i += " active")
									: t.isSame(this._getLastPickedDate(), "d") &&
									  !this.unset &&
									  (i += " active"),
								this._isValid(t, "d") || (i += " disabled"),
								t.isSame(this.getMoment(), "d") && (i += " today"),
								(0 !== t.day() && 6 !== t.day()) || (i += " weekend"),
								e.append(
									'<td data-action="selectDay" data-day="' +
										t.format("L") +
										'" class="day' +
										i +
										'">' +
										t.date() +
										"</td>"
								),
								t.add(1, "d");
						}
						E("body").addClass(
							"tempusdominus-bootstrap-datetimepicker-widget-day-click"
						),
							E("body").append(
								'<div class="tempusdominus-bootstrap-datetimepicker-widget-day-click-glass-panel"></div>'
							),
							n.find("tbody").empty().append(r),
							E("body")
								.find(
									".tempusdominus-bootstrap-datetimepicker-widget-day-click-glass-panel"
								)
								.remove(),
							E("body").removeClass(
								"tempusdominus-bootstrap-datetimepicker-widget-day-click"
							),
							this._updateMonths(),
							this._updateYears(),
							this._updateDecades();
					}
				}),
				(i._fillHours = function () {
					var t = this.widget.find(".timepicker-hours table"),
						e = this._viewDate.clone().startOf("d"),
						i = [],
						s = E("<tr>");
					for (
						11 < this._viewDate.hour() && !this.use24Hours && e.hour(12);
						e.isSame(this._viewDate, "d") &&
						(this.use24Hours ||
							(this._viewDate.hour() < 12 && e.hour() < 12) ||
							11 < this._viewDate.hour());

					)
						e.hour() % 4 == 0 && ((s = E("<tr>")), i.push(s)),
							s.append(
								'<td data-action="selectHour" class="hour' +
									(this._isValid(e, "h") ? "" : " disabled") +
									'">' +
									e.format(this.use24Hours ? "HH" : "hh") +
									"</td>"
							),
							e.add(1, "h");
					t.empty().append(i);
				}),
				(i._fillMinutes = function () {
					for (
						var t = this.widget.find(".timepicker-minutes table"),
							e = this._viewDate.clone().startOf("h"),
							i = [],
							s = 1 === this._options.stepping ? 5 : this._options.stepping,
							a = E("<tr>");
						this._viewDate.isSame(e, "h");

					)
						e.minute() % (4 * s) == 0 && ((a = E("<tr>")), i.push(a)),
							a.append(
								'<td data-action="selectMinute" class="minute' +
									(this._isValid(e, "m") ? "" : " disabled") +
									'">' +
									e.format("mm") +
									"</td>"
							),
							e.add(s, "m");
					t.empty().append(i);
				}),
				(i._fillSeconds = function () {
					for (
						var t = this.widget.find(".timepicker-seconds table"),
							e = this._viewDate.clone().startOf("m"),
							i = [],
							s = E("<tr>");
						this._viewDate.isSame(e, "m");

					)
						e.second() % 20 == 0 && ((s = E("<tr>")), i.push(s)),
							s.append(
								'<td data-action="selectSecond" class="second' +
									(this._isValid(e, "s") ? "" : " disabled") +
									'">' +
									e.format("ss") +
									"</td>"
							),
							e.add(5, "s");
					t.empty().append(i);
				}),
				(i._fillTime = function () {
					var t,
						e,
						i = this.widget.find(".timepicker span[data-time-component]"),
						s = this._getLastPickedDate();
					this.use24Hours ||
						((t = this.widget.find(".timepicker [data-action=togglePeriod]")),
						(e = s ? s.clone().add(12 <= s.hours() ? -12 : 12, "h") : void 0),
						s && t.text(s.format("A")),
						this._isValid(e, "h")
							? t.removeClass("disabled")
							: t.addClass("disabled")),
						s &&
							i
								.filter("[data-time-component=hours]")
								.text(s.format(this.use24Hours ? "HH" : "hh")),
						s && i.filter("[data-time-component=minutes]").text(s.format("mm")),
						s && i.filter("[data-time-component=seconds]").text(s.format("ss")),
						this._fillHours(),
						this._fillMinutes(),
						this._fillSeconds();
				}),
				(i._doAction = function (t, e) {
					var i = this._getLastPickedDate();
					if (E(t.currentTarget).is(".disabled")) return !1;
					switch ((e = e || E(t.currentTarget).data("action"))) {
						case "next":
							var s = M.DatePickerModes[this.currentViewMode].NAV_FUNCTION;
							this._viewDate.add(
								M.DatePickerModes[this.currentViewMode].NAV_STEP,
								s
							),
								this._fillDate(),
								this._viewUpdate(s);
							break;
						case "previous":
							var a = M.DatePickerModes[this.currentViewMode].NAV_FUNCTION;
							this._viewDate.subtract(
								M.DatePickerModes[this.currentViewMode].NAV_STEP,
								a
							),
								this._fillDate(),
								this._viewUpdate(a);
							break;
						case "pickerSwitch":
							this._showMode(1);
							break;
						case "selectMonth":
							var n = E(t.target)
								.closest("tbody")
								.find("span")
								.index(E(t.target));
							this._viewDate.month(n),
								this.currentViewMode === this.MinViewModeNumber
									? (this._setValue(
											i
												.clone()
												.year(this._viewDate.year())
												.month(this._viewDate.month()),
											this._getLastPickedDateIndex()
									  ),
									  this._options.inline || this.hide())
									: (this._showMode(-1), this._fillDate()),
								this._viewUpdate("M");
							break;
						case "selectYear":
							var o = parseInt(E(t.target).text(), 10) || 0;
							this._viewDate.year(o),
								this.currentViewMode === this.MinViewModeNumber
									? (this._setValue(
											i.clone().year(this._viewDate.year()),
											this._getLastPickedDateIndex()
									  ),
									  this._options.inline || this.hide())
									: (this._showMode(-1), this._fillDate()),
								this._viewUpdate("YYYY");
							break;
						case "selectDecade":
							var r = parseInt(E(t.target).data("selection"), 10) || 0;
							this._viewDate.year(r),
								this.currentViewMode === this.MinViewModeNumber
									? (this._setValue(
											i.clone().year(this._viewDate.year()),
											this._getLastPickedDateIndex()
									  ),
									  this._options.inline || this.hide())
									: (this._showMode(-1), this._fillDate()),
								this._viewUpdate("YYYY");
							break;
						case "selectDay":
							var d = this._viewDate.clone();
							E(t.target).is(".old") && d.subtract(1, "M"),
								E(t.target).is(".new") && d.add(1, "M");
							var h = d.date(parseInt(E(t.target).text(), 10)),
								p = 0;
							this._options.allowMultidate
								? -1 !==
								  (p = this._datesFormatted.indexOf(h.format("YYYY-MM-DD")))
									? this._setValue(null, p)
									: this._setValue(h, this._getLastPickedDateIndex() + 1)
								: this._setValue(h, this._getLastPickedDateIndex()),
								this._hasTime() ||
									this._options.keepOpen ||
									this._options.inline ||
									this._options.allowMultidate ||
									this.hide();
							break;
						case "incrementHours":
							if (!i) break;
							var l = i.clone().add(1, "h");
							this._isValid(l, "h") &&
								(this._getLastPickedDateIndex() < 0 && this.date(l),
								this._setValue(l, this._getLastPickedDateIndex()));
							break;
						case "incrementMinutes":
							if (!i) break;
							var c = i.clone().add(this._options.stepping, "m");
							this._isValid(c, "m") &&
								(this._getLastPickedDateIndex() < 0 && this.date(c),
								this._setValue(c, this._getLastPickedDateIndex()));
							break;
						case "incrementSeconds":
							if (!i) break;
							var u = i.clone().add(1, "s");
							this._isValid(u, "s") &&
								(this._getLastPickedDateIndex() < 0 && this.date(u),
								this._setValue(u, this._getLastPickedDateIndex()));
							break;
						case "decrementHours":
							if (!i) break;
							var _ = i.clone().subtract(1, "h");
							this._isValid(_, "h") &&
								(this._getLastPickedDateIndex() < 0 && this.date(_),
								this._setValue(_, this._getLastPickedDateIndex()));
							break;
						case "decrementMinutes":
							if (!i) break;
							var f = i.clone().subtract(this._options.stepping, "m");
							this._isValid(f, "m") &&
								(this._getLastPickedDateIndex() < 0 && this.date(f),
								this._setValue(f, this._getLastPickedDateIndex()));
							break;
						case "decrementSeconds":
							if (!i) break;
							var m = i.clone().subtract(1, "s");
							this._isValid(m, "s") &&
								(this._getLastPickedDateIndex() < 0 && this.date(m),
								this._setValue(m, this._getLastPickedDateIndex()));
							break;
						case "togglePeriod":
							this._setValue(
								i.clone().add(12 <= i.hours() ? -12 : 12, "h"),
								this._getLastPickedDateIndex()
							);
							break;
						case "togglePicker":
							var w,
								g,
								b = E(t.target),
								v = b.closest("a"),
								y = b.closest("ul"),
								D = y.find(".show"),
								k = y.find(".collapse:not(.show)"),
								C = b.is("span") ? b : b.find("span");
							if (D && D.length) {
								if ((w = D.data("collapse")) && w.transitioning) return !0;
								D.collapse
									? (D.collapse("hide"), k.collapse("show"))
									: (D.removeClass("show"), k.addClass("show")),
									this._useFeatherIcons()
										? (v.toggleClass(
												this._options.icons.time +
													" " +
													this._options.icons.date
										  ),
										  (g = v.hasClass(this._options.icons.time)
												? this._options.icons.date
												: this._options.icons.time),
										  v.html(this._iconTag(g)))
										: C.toggleClass(
												this._options.icons.time +
													" " +
													this._options.icons.date
										  ),
									(
										this._useFeatherIcons()
											? v.hasClass(this._options.icons.date)
											: C.hasClass(this._options.icons.date)
									)
										? v.attr("title", this._options.tooltips.selectDate)
										: v.attr("title", this._options.tooltips.selectTime);
							}
							break;
						case "showPicker":
							this.widget
								.find(".timepicker > div:not(.timepicker-picker)")
								.hide(),
								this.widget.find(".timepicker .timepicker-picker").show();
							break;
						case "showHours":
							this.widget.find(".timepicker .timepicker-picker").hide(),
								this.widget.find(".timepicker .timepicker-hours").show();
							break;
						case "showMinutes":
							this.widget.find(".timepicker .timepicker-picker").hide(),
								this.widget.find(".timepicker .timepicker-minutes").show();
							break;
						case "showSeconds":
							this.widget.find(".timepicker .timepicker-picker").hide(),
								this.widget.find(".timepicker .timepicker-seconds").show();
							break;
						case "selectHour":
							var T = parseInt(E(t.target).text(), 10);
							this.use24Hours ||
								(12 <= i.hours() ? 12 !== T && (T += 12) : 12 === T && (T = 0)),
								this._setValue(
									i.clone().hours(T),
									this._getLastPickedDateIndex()
								),
								this._isEnabled("a") ||
								this._isEnabled("m") ||
								this._options.keepOpen ||
								this._options.inline
									? this._doAction(t, "showPicker")
									: this.hide();
							break;
						case "selectMinute":
							this._setValue(
								i.clone().minutes(parseInt(E(t.target).text(), 10)),
								this._getLastPickedDateIndex()
							),
								this._isEnabled("a") ||
								this._isEnabled("s") ||
								this._options.keepOpen ||
								this._options.inline
									? this._doAction(t, "showPicker")
									: this.hide();
							break;
						case "selectSecond":
							this._setValue(
								i.clone().seconds(parseInt(E(t.target).text(), 10)),
								this._getLastPickedDateIndex()
							),
								this._isEnabled("a") ||
								this._options.keepOpen ||
								this._options.inline
									? this._doAction(t, "showPicker")
									: this.hide();
							break;
						case "clear":
							this.clear();
							break;
						case "close":
							this.hide();
							break;
						case "today":
							var x = this.getMoment();
							this._isValid(x, "d") &&
								this._setValue(x, this._getLastPickedDateIndex());
							break;
					}
					return !1;
				}),
				(i.hide = function () {
					var t,
						e = !1;
					this.widget &&
						(this.widget.find(".collapse").each(function () {
							var t = E(this).data("collapse");
							return !t || !t.transitioning || !(e = !0);
						}),
						e ||
							(this.component &&
								this.component.hasClass("btn") &&
								this.component.toggleClass("active"),
							this.widget.hide(),
							E(window).off("resize", this._place),
							this.widget.off("click", "[data-action]"),
							this.widget.off("mousedown", !1),
							this.widget.remove(),
							(this.widget = !1),
							void 0 !== this.input &&
								void 0 !== this.input.val() &&
								0 !== this.input.val().trim().length &&
								this._setValue(
									this._parseInputDate(this.input.val().trim(), {
										isPickerShow: !1,
									}),
									0
								),
							(t = this._getLastPickedDate()),
							this._notifyEvent({
								type: M.Event.HIDE,
								date: this.unset ? null : t ? t.clone() : void 0,
							}),
							void 0 !== this.input && this.input.blur(),
							(this._viewDate = t ? t.clone() : this.getMoment())));
				}),
				(i.show = function () {
					var t,
						e = !1;
					if (void 0 !== this.input) {
						if (
							this.input.prop("disabled") ||
							(!this._options.ignoreReadonly && this.input.prop("readonly")) ||
							this.widget
						)
							return;
						void 0 !== this.input.val() && 0 !== this.input.val().trim().length
							? this._setValue(
									this._parseInputDate(this.input.val().trim(), {
										isPickerShow: !0,
									}),
									0
							  )
							: (e = !0);
					} else e = !0;
					e &&
						this.unset &&
						this._options.useCurrent &&
						((t = this.getMoment()),
						"string" == typeof this._options.useCurrent &&
							(t = {
								year: function (t) {
									return t.month(0).date(1).hours(0).seconds(0).minutes(0);
								},
								month: function (t) {
									return t.date(1).hours(0).seconds(0).minutes(0);
								},
								day: function (t) {
									return t.hours(0).seconds(0).minutes(0);
								},
								hour: function (t) {
									return t.seconds(0).minutes(0);
								},
								minute: function (t) {
									return t.seconds(0);
								},
							}[this._options.useCurrent](t)),
						this._setValue(t, 0)),
						(this.widget = this._getTemplate()),
						this._fillDow(),
						this._fillMonths(),
						this.widget.find(".timepicker-hours").hide(),
						this.widget.find(".timepicker-minutes").hide(),
						this.widget.find(".timepicker-seconds").hide(),
						this._update(),
						this._showMode(),
						E(window).on("resize", { picker: this }, this._place),
						this.widget.on(
							"click",
							"[data-action]",
							E.proxy(this._doAction, this)
						),
						this.widget.on("mousedown", !1),
						this.component &&
							this.component.hasClass("btn") &&
							this.component.toggleClass("active"),
						this._place(),
						this.widget.show(),
						void 0 !== this.input &&
							this._options.focusOnShow &&
							!this.input.is(":focus") &&
							this.input.focus(),
						this._notifyEvent({ type: M.Event.SHOW });
				}),
				(i.destroy = function () {
					this.hide(),
						this._element.removeData(M.DATA_KEY),
						this._element.removeData("date");
				}),
				(i.disable = function () {
					this.hide(),
						this.component &&
							this.component.hasClass("btn") &&
							this.component.addClass("disabled"),
						void 0 !== this.input && this.input.prop("disabled", !0);
				}),
				(i.enable = function () {
					this.component &&
						this.component.hasClass("btn") &&
						this.component.removeClass("disabled"),
						void 0 !== this.input && this.input.prop("disabled", !1);
				}),
				(i.toolbarPlacement = function (t) {
					if (0 === arguments.length) return this._options.toolbarPlacement;
					if ("string" != typeof t)
						throw new TypeError(
							"toolbarPlacement() expects a string parameter"
						);
					if (-1 === T.indexOf(t))
						throw new TypeError(
							"toolbarPlacement() parameter must be one of (" +
								T.join(", ") +
								") value"
						);
					(this._options.toolbarPlacement = t),
						this.widget && (this.hide(), this.show());
				}),
				(i.widgetPositioning = function (t) {
					if (0 === arguments.length)
						return E.extend({}, this._options.widgetPositioning);
					if ("[object Object]" !== {}.toString.call(t))
						throw new TypeError(
							"widgetPositioning() expects an object variable"
						);
					if (t.horizontal) {
						if ("string" != typeof t.horizontal)
							throw new TypeError(
								"widgetPositioning() horizontal variable must be a string"
							);
						if (
							((t.horizontal = t.horizontal.toLowerCase()),
							-1 === C.indexOf(t.horizontal))
						)
							throw new TypeError(
								"widgetPositioning() expects horizontal parameter to be one of (" +
									C.join(", ") +
									")"
							);
						this._options.widgetPositioning.horizontal = t.horizontal;
					}
					if (t.vertical) {
						if ("string" != typeof t.vertical)
							throw new TypeError(
								"widgetPositioning() vertical variable must be a string"
							);
						if (
							((t.vertical = t.vertical.toLowerCase()),
							-1 === p.indexOf(t.vertical))
						)
							throw new TypeError(
								"widgetPositioning() expects vertical parameter to be one of (" +
									p.join(", ") +
									")"
							);
						this._options.widgetPositioning.vertical = t.vertical;
					}
					this._update();
				}),
				(i.widgetParent = function (t) {
					if (0 === arguments.length) return this._options.widgetParent;
					if (
						("string" == typeof t && (t = E(t)),
						null !== t && "string" != typeof t && !(t instanceof E))
					)
						throw new TypeError(
							"widgetParent() expects a string or a jQuery object parameter"
						);
					(this._options.widgetParent = t),
						this.widget && (this.hide(), this.show());
				}),
				(i.setMultiDate = function (t) {
					var e = this._options.format;
					this.clear();
					for (var i = 0; i < t.length; i++) {
						var s = moment(t[i], e);
						this._setValue(s, i);
					}
				}),
				(n._jQueryHandleThis = function (t, e, i) {
					var s = E(t).data(M.DATA_KEY);
					if (
						("object" == typeof e && E.extend({}, M.Default, e),
						s || ((s = new n(E(t), e)), E(t).data(M.DATA_KEY, s)),
						"string" == typeof e)
					) {
						if (void 0 === s[e]) throw new Error('No method named "' + e + '"');
						if (void 0 === i) return s[e]();
						"date" === e &&
							(s.isDateUpdateThroughDateOptionFromClientCode = !0);
						var a = s[e](i);
						return (s.isDateUpdateThroughDateOptionFromClientCode = !1), a;
					}
				}),
				(n._jQueryInterface = function (t, e) {
					return 1 === this.length
						? n._jQueryHandleThis(this[0], t, e)
						: this.each(function () {
								n._jQueryHandleThis(this, t, e);
						  });
				}),
				n
			);
		})(M)),
		E(document)
			.on(M.Event.CLICK_DATA_API, M.Selector.DATA_TOGGLE, function () {
				var t = E(this),
					e = I(t),
					i = e.data(M.DATA_KEY);
				0 !== e.length &&
					((i._options.allowInputToggle &&
						t.is('input[data-toggle="datetimepicker"]')) ||
						x._jQueryInterface.call(e, "toggle"));
			})
			.on(M.Event.CHANGE, "." + M.ClassName.INPUT, function (t) {
				var e = I(E(this));
				0 === e.length || t.isInit || x._jQueryInterface.call(e, "_change", t);
			})
			.on(M.Event.BLUR, "." + M.ClassName.INPUT, function (t) {
				var e = I(E(this)),
					i = e.data(M.DATA_KEY);
				0 !== e.length &&
					(i._options.debug ||
						window.debug ||
						x._jQueryInterface.call(e, "hide", t));
			})
			.on(M.Event.KEYDOWN, "." + M.ClassName.INPUT, function (t) {
				var e = I(E(this));
				0 !== e.length && x._jQueryInterface.call(e, "_keydown", t);
			})
			.on(M.Event.KEYUP, "." + M.ClassName.INPUT, function (t) {
				var e = I(E(this));
				0 !== e.length && x._jQueryInterface.call(e, "_keyup", t);
			})
			.on(M.Event.FOCUS, "." + M.ClassName.INPUT, function (t) {
				var e = I(E(this)),
					i = e.data(M.DATA_KEY);
				0 !== e.length &&
					i._options.allowInputToggle &&
					x._jQueryInterface.call(e, "show", t);
			}),
		(E.fn[M.NAME] = x._jQueryInterface),
		(E.fn[M.NAME].Constructor = x),
		(E.fn[M.NAME].noConflict = function () {
			return (E.fn[M.NAME] = t), x._jQueryInterface;
		});
	function I(t) {
		var e,
			i = t.data("target");
		return (
			i || ((i = t.attr("href") || ""), (i = /^#[a-z]/i.test(i) ? i : null)),
			0 === (e = E(i)).length
				? t
				: (e.data(M.DATA_KEY) || E.extend({}, e.data(), E(this).data()), e)
		);
	}
})();
