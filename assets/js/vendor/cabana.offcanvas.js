/*
*   jquery offCanvas plugin
*   jQuery UI Widget-factory plugin (for 1.8/9+)
*/

; (function ($, window, document, undefined) {

    $.widget("cabana.offcanvas", {

        /*
        *   Options to be used as defaults
        */
        options: {
            navOpenBtn: '',
            navCloseBtn: '',
            pageRoot: 'body',
            offCanvasContainerId: 'off-canvas',
            _outerWrapId: 'outer-wrap',
            _innerWrapId: 'inner-wrap'
        },

        /*
        *   prefix all custom events that this widget will fire: "offcanvas:beforerender"
        */
        widgetEventPrefix: 'offcanvas:',

        /*
        *   set version
        */
        version: '0.1',

        /*
        *   Setup widget (eg. element creation, apply theming, bind events etc.)
        */
        _create: function () {

            if (!$.isPlainObject(window.Modernizr)) {
                alert('OffCanvas plugin needs Modernizr');
                return;
            }

            if (!$.isFunction(window.Modernizr.prefixed)) {
                alert('OffCanvas plugin needs Modernizr.prefixed()');
                return;
            }

            if (!$.isFunction(window.FastClick)) {
                alert('OffCanvas plugin need FastClick');
                return;
            } else {
                $(window).on('load', function () {
                    FastClick.attach(document.body);
                });
            }

            this._$pageRoot = $(this.options.pageRoot).first().wrapInner('<div id="' + this.options._outerWrapId + '"><div id="' + this.options._innerWrapId + '"></div></div>');
            this._offCanvasInnerContainerClass = this.options.offCanvasContainerId + '-inner';
            this._$offCanvasContainer = $('#' + this.options.offCanvasContainerId).wrapInner('<div class="' + this._offCanvasInnerContainerClass + '"/>');
            this._styles = [
                //'@-ms-viewport {width: device-width;}',
                //'@viewport {width: device-width;}',
                'body {position: relative; width: 100%;}',
                '#' + this.options._outerWrapId + '{position: relative; overflow: hidden; width: 100%;}',
                '#' + this.options._innerWrapId + '{position: relative; width: 100%;}',
                '@media screen and (max-width: 1023px) {',
                '.js-ready #' + this.options._innerWrapId + '{left: 0;}',
                '.js-nav #' + this.options._innerWrapId + '{left: 70%;}',
                '#' + this.options.offCanvasContainerId + '{ position: absolute; top: 0; z-index: 200; overflow: hidden; }',
                '#' + this.options.offCanvasContainerId + ':not(:target) { z-index: 1; height: 0; }',
                '.js-ready #' + this.options.offCanvasContainerId + '{ left: -70%; height: 100%; width: 70%; }',
                '.csstransforms3d.csstransitions.js-ready #' + this.options.offCanvasContainerId + '{left: 0;   -webkit-transform: translate3d(-100%, 0, 0); -moz-transform: translate3d(-100%, 0, 0); -ms-transform: translate3d(-100%, 0, 0); -o-transform: translate3d(-100%, 0, 0); transform: translate3d(-100%, 0, 0);}',
                '.csstransforms3d.csstransitions.js-ready #' + this.options._innerWrapId + '{left: 0 !important; -webkit-transform: translate3d(0, 0, 0); -moz-transform: translate3d(0, 0, 0); -ms-transform: translate3d(0, 0, 0); -o-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); -webkit-transition: -webkit-transform 500ms ease; -moz-transition: -moz-transform 500ms ease; -o-transition: -o-transform 500ms ease; transition: transform 500ms ease;}',
                '.csstransforms3d.csstransitions.js-nav #' + this.options._innerWrapId + '{-webkit-transform: translate3d(70%, 0, 0) scale3d(1, 1, 1); -moz-transform: translate3d(70%, 0, 0) scale3d(1, 1, 1); -ms-transform: translate3d(70%, 0, 0) scale3d(1, 1, 1); -o-transform: translate3d(70%, 0, 0) scale3d(1, 1, 1); transform: translate3d(70%, 0, 0) scale3d(1, 1, 1);}',
                '.csstransforms3d.csstransitions.js-ready #' + this.options.offCanvasContainerId + ' .' + this._offCanvasInnerContainerClass + '{ filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=70); opacity: 0.7; -webkit-transition: opacity 300ms 100ms, -webkit-transform 500ms ease; -webkit-transition-delay: ease, 0s; -moz-transition: opacity 300ms 100ms ease, -moz-transform 500ms ease; -o-transition: opacity 300ms 100ms ease, -o-transform 500ms ease; transition: opacity 300ms 100ms ease, transform 500ms ease; -webkit-transform: translate3d(70%, 0, 0) scale3d(0.9, 0.9, 0.9); -moz-transform: translate3d(70%, 0, 0) scale3d(0.9, 0.9, 0.9); -ms-transform: translate3d(70%, 0, 0) scale3d(0.9, 0.9, 0.9); -o-transform: translate3d(70%, 0, 0) scale3d(0.9, 0.9, 0.9); transform: translate3d(70%, 0, 0) scale3d(0.9, 0.9, 0.9); -webkit-transform-origin: 50% 0%; -moz-transform-origin: 50% 0%; -ms-transform-origin: 50% 0%; -o-transform-origin: 50% 0%; transform-origin: 50% 0%; }',
                '.csstransforms3d.csstransitions.js-nav #' + this.options.offCanvasContainerId + ' .' + this._offCanvasInnerContainerClass + '{ filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100); opacity: 1; -webkit-transform: translate3d(0, 0, 0); -moz-transform: translate3d(0, 0, 0); -ms-transform: translate3d(0, 0, 0); -o-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); }',
                '.csstransforms3d.csstransitions.js-ready #' + this.options.offCanvasContainerId + ', ' + '.csstransforms3d.csstransitions.js-ready #' + this.options._innerWrapId + '{-webkit-backface-visibility: hidden; -moz-backface-visibility: hidden; -ms-backface-visibility: hidden; -o-backface-visibility: hidden; backface-visibility: hidden;}',
                '}/*close @media*/'
            ];

            $("<div />", {
                html: '<style id="offcanvas">\n' + this._styles.join('\n') + '\n</style>'
            }).appendTo(this._$pageRoot);

            this.hasParent = function (el, id) {
                if (el) {
                    do {
                        if (el.id === id) {
                            return true;
                        }
                        if (el.nodeType === 9) {
                            break;
                        }
                    }
                    while ((el = el.parentNode));
                }
                return false;
            };

            this.$doc = this.element.find('html');

            this.transform_prop = window.Modernizr.prefixed('transform');
            this.transition_prop = window.Modernizr.prefixed('transition');
            this.transition_end = (function () {
                this.props = {
                    'WebkitTransition': 'webkitTransitionEnd',
                    'MozTransition': 'transitionend',
                    'OTransition': 'oTransitionEnd otransitionend',
                    'msTransition': 'MSTransitionEnd',
                    'transition': 'transitionend'
                };
                return props.hasOwnProperty(this.transition_prop) ? props[this.transition_prop] : false;
            })();

            this.inner = document.getElementById('inner-wrap');
            this.nav_open = false;
            this.nav_class = 'js-nav';

            this._render();

        },

        /*
        *   Close Nav End
        */
        _closeNavEnd: function (e) {
            if (e && e.target === this.inner) {
                document.removeEventListener(this.transition_end, this.closeNavEnd, false);
            }
            this.nav_open = false;
        },

        /*
        *   Close Nav
        */
        _closeNav: function () {
            if (this.nav_open) {
                // close navigation after transition or immediately
                var duration = (this.transition_end && this.transition_prop) ? parseFloat(window.getComputedStyle(this.inner, '')[this.transition_prop + 'Duration']) : 0;
                if (duration > 0) {
                    document.addEventListener(this.transition_end, this._closeNavEnd, false);
                } else {
                    this._closeNavEnd(null);
                }
            }
            this.$doc.removeClass(this.nav_class);
        },

        /*
        *   Open Nav
        */
        _openNav: function () {
            if (this.nav_open) {
                return;
            }
            this.$doc.addClass(this.nav_class);
            this.nav_open = true;
        },

        /*
        *   Toggle Nav
        */
        toggleNav: function (e) {
            if (this.nav_open && this.$doc.hasClass(this.nav_class)) {
                this._closeNav();
            } else {
                this._openNav();
            }
            if (e) {
                e.preventDefault();
                e.stopPropagation();
            }
        },

        /*
        *   Destroy an instantiated plugin and clean up modifications the widget has made to the DOM
        */
        _destroy: function () {

            this.element.unbind();
            this.element.html('');
            this.element.remove();

        },

        /*
        *   render to the DOM
        */
        _render: function () {

            var _base = this;

            $(this.options.navOpenBtn).on('click', function (event) {
                event.stopPropagation();
                _base.toggleNav(event);
            });

            $(this.options.navCloseBtn).on('click', function (event) {
                event.stopPropagation();
                _base.toggleNav(event);
            });

            $(document).on('click', function (event) {
                event.stopPropagation();
                if (_base.nav_open && !_base.hasParent(event.target, _base.options.offCanvasContainerId)) {
                    event.preventDefault();
                    _base._closeNav();
                }
            });

            this.$doc.addClass('js-ready');

        },

        /*
        *   set options
        */
        _setOption: function (key, value) {
            switch (key) {
                case "someValue":
                    this.options.someValue = doSomethingWith(value);
                    break;
                default:
                    this.options[key] = value;
                    break;
            }
            this._super("_setOption", key, value);
        }
    });

})(jQuery, window, document);
