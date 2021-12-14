<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="@yield('author')">
    <meta name="description" content="@yield('description')">
    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <!-- Favicon
  ================================================== -->
    <link rel="icon" type="image/png" href="{{ asset('assets') }}/images/favicon.png">

    <!-- CSS
  ================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/bootstrap/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/all.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/animate-css/animate.css">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/slick/slick.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/slick/slick-theme.css">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/colorbox/colorbox.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

{{--    rating--}}
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        (function ($) {
            var DEFAULT_MIN = 0;
            var DEFAULT_MAX = 5;
            var DEFAULT_STEP = 0.5;

            var isEmpty = function (value, trim) {
                return typeof value === 'undefined' || value === null || value === undefined || value == []
                    || value === '' || trim && $.trim(value) === '';
            };

            var validateAttr = function ($input, vattr, options) {
                var chk = isEmpty($input.data(vattr)) ? $input.attr(vattr) : $input.data(vattr);
                if (chk) {
                    return chk;
                }
                return options[vattr];
            };

            var getDecimalPlaces = function (num) {
                var match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                if (!match) {
                    return 0;
                }
                return Math.max(0, (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0));
            };

            var applyPrecision = function (val, precision) {
                return parseFloat(val.toFixed(precision));
            };

            // Rating public class definition
            var Rating = function (element, options) {
                this.$element = $(element);
                this.init(options);
            };

            Rating.prototype = {
                constructor: Rating,
                _parseAttr: function (vattr, options) {
                    var self = this, $input = self.$element;
                    if ($input.attr('type') === 'range' || $input.attr('type') === 'number') {
                        var val = validateAttr($input, vattr, options);
                        var chk = DEFAULT_STEP;
                        if (vattr === 'min') {
                            chk = DEFAULT_MIN;
                        } else if (vattr === 'max') {
                            chk = DEFAULT_MAX;
                        } else if (vattr === 'step') {
                            chk = DEFAULT_STEP;
                        }
                        var final = isEmpty(val) ? chk : val;
                        return parseFloat(final);
                    }
                    return parseFloat(options[vattr]);
                },
                /**
                 * Listens to events
                 */
                listen: function () {
                    var self = this;
                    self.$rating.on("click", function (e) {
                        if (!self.inactive) {
                            w = e.pageX - self.$rating.offset().left;
                            self.setStars(w);
                            self.$element.trigger('change');
                            self.$element.trigger('rating.change', [self.$element.val(), self.$caption.html()]);
                        }
                    });
                    self.$clear.on("click", function (e) {
                        if (!self.inactive) {
                            self.clear();
                        }
                    });
                    $(self.$element[0].form).on("reset", function (e) {
                        if (!self.inactive) {
                            self.reset();
                        }
                    });
                },
                initSlider: function (options) {
                    var self = this;
                    if (isEmpty(self.$element.val())) {
                        self.$element.val(0);
                    }
                    self.initialValue = self.$element.val();
                    self.min = (typeof options.min !== 'undefined') ? options.min : self._parseAttr('min', options);
                    self.max = (typeof options.max !== 'undefined') ? options.max : self._parseAttr('max', options);
                    self.step = (typeof options.step !== 'undefined') ? options.step : self._parseAttr('step', options);
                    if (isNaN(self.min) || isEmpty(self.min)) {
                        self.min = DEFAULT_MIN;
                    }
                    if (isNaN(self.max) || isEmpty(self.max)) {
                        self.max = DEFAULT_MAX;
                    }
                    if (isNaN(self.step) || isEmpty(self.step) || self.step == 0) {
                        self.step = DEFAULT_STEP;
                    }
                    self.diff = self.max - self.min;
                },
                /**
                 * Initializes the plugin
                 */
                init: function (options) {
                    var self = this;
                    self.options = options;
                    self.initSlider(options);
                    self.checkDisabled();
                    $element = self.$element;
                    self.containerClass = options.containerClass;
                    self.glyphicon = options.glyphicon;
                    var defaultStar = (self.glyphicon) ? '\ue006' : '\u2605';
                    self.symbol = isEmpty(options.symbol) ? defaultStar : options.symbol;
                    self.rtl = options.rtl || self.$element.attr('dir');
                    if (self.rtl) {
                        self.$element.attr('dir', 'rtl');
                    }
                    self.showClear = options.showClear;
                    self.showCaption = options.showCaption;
                    self.size = options.size;
                    self.stars = options.stars;
                    self.defaultCaption = options.defaultCaption;
                    self.starCaptions = options.starCaptions;
                    self.starCaptionClasses = options.starCaptionClasses;
                    self.clearButton = options.clearButton;
                    self.clearButtonTitle = options.clearButtonTitle;
                    self.clearButtonBaseClass = !isEmpty(options.clearButtonBaseClass) ? options.clearButtonBaseClass : 'clear-rating';
                    self.clearButtonActiveClass = !isEmpty(options.clearButtonActiveClass) ? options.clearButtonActiveClass : 'clear-rating-active';
                    self.clearCaption = options.clearCaption;
                    self.clearCaptionClass = options.clearCaptionClass;
                    self.clearValue = options.clearValue;
                    self.$element.removeClass('form-control').addClass('form-control');
                    self.$clearElement = isEmpty(options.clearElement) ? null : $(options.clearElement);
                    self.$captionElement = isEmpty(options.captionElement) ? null : $(options.captionElement);
                    if (typeof self.$rating == 'undefined' && typeof self.$container == 'undefined') {
                        self.$rating = $(document.createElement("div")).html('<div class="rating-stars"></div>');
                        self.$container = $(document.createElement("div"));
                        self.$container.before(self.$rating);
                        self.$container.append(self.$rating);
                        self.$element.before(self.$container).appendTo(self.$rating);
                    }
                    self.$stars = self.$rating.find('.rating-stars');
                    self.generateRating();
                    self.$clear = !isEmpty(self.$clearElement) ? self.$clearElement : self.$container.find('.' + self.clearButtonBaseClass);
                    self.$caption = !isEmpty(self.$captionElement) ? self.$captionElement : self.$container.find(".caption");
                    self.setStars();
                    self.$element.hide();
                    self.listen();
                    if (self.showClear) {
                        self.$clear.attr({"class": self.getClearClass()});
                    }
                    self.$element.removeClass('rating-loading');
                },
                checkDisabled: function () {
                    var self = this;
                    self.disabled = validateAttr(self.$element, 'disabled', self.options);
                    self.readonly = validateAttr(self.$element, 'readonly', self.options);
                    self.inactive = (self.disabled || self.readonly);
                },
                getClearClass: function () {
                    return this.clearButtonBaseClass + ' ' + ((this.inactive) ? '' : this.clearButtonActiveClass);
                },
                generateRating: function () {
                    var self = this, clear = self.renderClear(), caption = self.renderCaption(),
                        css = (self.rtl) ? 'rating-container-rtl' : 'rating-container',
                        stars = self.getStars();
                    css += (self.glyphicon) ? ((self.symbol == '\ue006') ? ' rating-gly-star' : ' rating-gly') : ' rating-uni';
                    self.$rating.attr('class', css);
                    self.$rating.attr('data-content', stars);
                    self.$stars.attr('data-content', stars);
                    var css = self.rtl ? 'star-rating-rtl' : 'star-rating';
                    self.$container.attr('class', css + ' rating-' + self.size);

                    if (self.inactive) {
                        self.$container.removeClass('rating-active').addClass('rating-disabled');
                    } else {
                        self.$container.removeClass('rating-disabled').addClass('rating-active');
                    }

                    if (typeof self.$caption == 'undefined' && typeof self.$clear == 'undefined') {
                        if (self.rtl) {
                            self.$container.prepend(caption).append(clear);
                        } else {
                            self.$container.prepend(clear).append(caption);
                        }
                    }
                    if (!isEmpty(self.containerClass)) {
                        self.$container.removeClass(self.containerClass).addClass(self.containerClass);
                    }
                },
                getStars: function () {
                    var self = this, numStars = self.stars, stars = '';
                    for (var i = 1; i <= numStars; i++) {
                        stars += self.symbol;
                    }
                    return stars;
                },
                renderClear: function () {
                    var self = this;
                    if (!self.showClear) {
                        return '';
                    }
                    var css = self.getClearClass();
                    if (!isEmpty(self.$clearElement)) {
                        self.$clearElement.removeClass(css).addClass(css).attr({"title": self.clearButtonTitle});
                        self.$clearElement.html(self.clearButton);
                        return '';
                    }
                    return '<div class="' + css + '" title="' + self.clearButtonTitle + '">' + self.clearButton + '</div>';
                },
                renderCaption: function () {
                    var self = this, val = self.$element.val();
                    if (!self.showCaption) {
                        return '';
                    }
                    var html = self.fetchCaption(val);
                    if (!isEmpty(self.$captionElement)) {
                        self.$captionElement.removeClass('caption').addClass('caption').attr({"title": self.clearCaption});
                        self.$captionElement.html(html);
                        return '';
                    }
                    return '<div class="caption">' + html + '</div>';
                },
                fetchCaption: function (rating) {
                    var self = this;
                    var val = parseFloat(rating), css, cap;
                    if (typeof (self.starCaptionClasses) == "function") {
                        css = isEmpty(self.starCaptionClasses(val)) ? self.clearCaptionClass : self.starCaptionClasses(val);
                    } else {
                        css = isEmpty(self.starCaptionClasses[val]) ? self.clearCaptionClass : self.starCaptionClasses[val];
                    }
                    if (typeof (self.starCaptions) == "function") {
                        var cap = isEmpty(self.starCaptions(val)) ? self.defaultCaption.replace(/\{rating\}/g, val) : self.starCaptions(val);
                    } else {
                        var cap = isEmpty(self.starCaptions[val]) ? self.defaultCaption.replace(/\{rating\}/g, val) : self.starCaptions[val];
                    }
                    var caption = (val == self.clearValue) ? self.clearCaption : cap;
                    return '<span class="' + css + '">' + caption + '</span>';
                },
                getValueFromPosition: function (pos) {
                    var self = this, precision = getDecimalPlaces(self.step),
                        percentage, val, maxWidth = self.$rating.width();
                    percentage = (pos / maxWidth);
                    if (self.rtl) {
                        val = (self.min + Math.floor(self.diff * percentage / self.step) * self.step);
                    } else {
                        val = (self.min + Math.ceil(self.diff * percentage / self.step) * self.step);
                    }
                    if (val < self.min) {
                        val = self.min;
                    } else if (val > self.max) {
                        val = self.max;
                    }
                    val = applyPrecision(parseFloat(val), precision);
                    if (self.rtl) {
                        val = self.max - val;
                    }
                    return val;
                },
                setStars: function (pos) {
                    var self = this, min = self.min, max = self.max, step = self.step,
                        val = arguments.length ? self.getValueFromPosition(pos) : (isEmpty(self.$element.val()) ? 0 : self.$element.val()),
                        width = 0, maxWidth = self.$rating.width(), caption = self.fetchCaption(val);
                    width = (val - min) / max * 100;
                    if (self.rtl) {
                        width = 100 - width;
                    }
                    self.$element.val(val);
                    width += '%';
                    self.$stars.css('width', width);
                    self.$caption.html(caption);
                },
                clear: function () {
                    var self = this;
                    var title = '<span class="' + self.clearCaptionClass + '">' + self.clearCaption + '</span>';
                    self.$stars.removeClass('rated');
                    if (!self.inactive) {
                        self.$caption.html(title);
                    }
                    self.$element.val(self.clearValue);
                    self.setStars();
                    self.$element.trigger('rating.clear');
                },
                reset: function () {
                    var self = this;
                    self.$element.val(self.initialValue);
                    self.setStars();
                    self.$element.trigger('rating.reset');
                },
                update: function (val) {
                    if (arguments.length > 0) {
                        var self = this;
                        self.$element.val(val);
                        self.setStars();
                    }
                },
                refresh: function (options) {
                    var self = this;
                    if (arguments.length) {
                        var cap = '';
                        self.init($.extend(self.options, options));
                        if (self.showClear) {
                            self.$clear.show();
                        } else {
                            self.$clear.hide();
                        }
                        if (self.showCaption) {
                            self.$caption.show();
                        } else {
                            self.$caption.hide();
                        }
                    }
                }
            };

            //Star rating plugin definition
            $.fn.rating = function (option) {
                var args = Array.apply(null, arguments);
                args.shift();
                return this.each(function () {
                    var $this = $(this),
                        data = $this.data('rating'),
                        options = typeof option === 'object' && option;

                    if (!data) {
                        $this.data('rating', (data = new Rating(this, $.extend({}, $.fn.rating.defaults, options, $(this).data()))));
                    }

                    if (typeof option === 'string') {
                        data[option].apply(data, args);
                    }
                });
            };

            $.fn.rating.defaults = {
                stars: 5,
                glyphicon: true,
                symbol: null,
                disabled: false,
                readonly: false,
                rtl: false,
                size: 'md',
                showClear: true,
                showCaption: true,
                defaultCaption: '{rating} Stars',
                starCaptions: {
                    0.5: 'Half Star',
                    1: 'One Star',
                    1.5: 'One & Half Star',
                    2: 'Two Stars',
                    2.5: 'Two & Half Stars',
                    3: 'Three Stars',
                    3.5: 'Three & Half Stars',
                    4: 'Four Stars',
                    4.5: 'Four & Half Stars',
                    5: 'Five Stars'
                },
                starCaptionClasses: {
                    0.5: 'label label-danger',
                    1: 'label label-danger',
                    1.5: 'label label-warning',
                    2: 'label label-warning',
                    2.5: 'label label-info',
                    3: 'label label-info',
                    3.5: 'label label-primary',
                    4: 'label label-primary',
                    4.5: 'label label-success',
                    5: 'label label-success'
                },
                clearButton: '<i class="glyphicon glyphicon-minus-sign"></i>',
                clearButtonTitle: 'Clear',
                clearButtonBaseClass: 'clear-rating',
                clearButtonActiveClass: 'clear-rating-active',
                clearCaption: 'Not Rated',
                clearCaptionClass: 'label label-default',
                clearValue: 0,
                captionElement: null,
                clearElement: null,
                containerClass: null
            };


            /**
             * Convert automatically number inputs with class 'rating'
             * into the star rating control.
             */
            $('input.rating').addClass('rating-loading');

            $(document).ready(function () {
                var $input = $('input.rating'), count = Object.keys($input).length;
                if (count > 0) {
                    $input.rating();
                }
            });
        }(jQuery));
    </script>
    <style>
        .ramiCustome a:hover {
            color:  darkorange !important;
        }
        .white-span span {
            color: #999 !important;
        }
        .header-one .navbar-collapse {
            padding-left: 15px !important;
        }
        #my-form {
            position: relative;
        }
        .search-btn {
            position: absolute;
            left: -30px;
            top: 0;
        }
        .search-block {
            display: none !important;
        }
        .glyphicon-lg{font-size:3em}
        .blockquote-box{border-right:5px solid #E6E6E6;margin-bottom:25px}
        .blockquote-box .square{width:100px;min-height:50px;margin-right:22px;text-align:center!important;background-color:#E6E6E6;padding:20px 0}
        .blockquote-box.blockquote-primary{border-color:#357EBD}
        .blockquote-box.blockquote-primary .square{background-color:#428BCA;color:#FFF}
        .blockquote-box.blockquote-success{border-color:#4CAE4C}
        .blockquote-box.blockquote-success .square{background-color:#5CB85C;color:#FFF}
        .blockquote-box.blockquote-info{border-color:#46B8DA}
        .blockquote-box.blockquote-info .square{background-color:#5BC0DE;color:#FFF}
        .blockquote-box.blockquote-warning{border-color:#EEA236}
        .blockquote-box.blockquote-warning .square{background-color:#F0AD4E;color:#FFF}
        .blockquote-box.blockquote-danger{border-color:#D43F3A}
        .blockquote-box.blockquote-danger .square{background-color:#D9534F;color:#FFF}

        /*!
         * @copyright © Kartik Visweswaran, Krajee.com, 2014
         * @version 2.5.0
         *
         * A simple yet powerful JQuery star rating plugin that allows rendering
         * fractional star ratings and supports Right to Left (RTL) input.
         *
         * For more JQuery/Bootstrap plugins and demos visit http://plugins.krajee.com
         * For more Yii related demos visit http://demos.krajee.com
         */
        .rating-loading {
            width: 25px;
            height: 25px;
            font-size: 0px;
            color: #fff;
            border: none;
        }
        /*
         * Stars
         */
        .rating-gly {
            font-family: 'Glyphicons Halflings';
        }
        .rating-gly-star {
            font-family: 'Glyphicons Halflings';
            padding-left: 2px;
        }

        .rating-gly-star .rating-stars:before {
            padding-left: 2px;
        }

        .rating-lg .rating-gly-star, .rating-lg .rating-gly-star .rating-stars:before {
            padding-left: 4px;
        }

        .rating-xl .rating-gly-star, .rating-xl .rating-gly-star .rating-stars:before {
            padding-left: 2px;
        }

        .rating-active {
            cursor: default;
        }

        .rating-disabled {
            cursor: not-allowed;
        }

        .rating-uni {
            font-size: 1.2em;
            margin-top: -5px;
        }

        .rating-container {
            position: relative;
            vertical-align: middle;
            display: inline-block;
            color: #e3e3e3;
            overflow: hidden;
        }

        .rating-container:before {
            content: attr(data-content);
        }

        .rating-container .rating-stars {
            position: absolute;
            left: 0;
            top: 0;
            white-space: nowrap;
            overflow: hidden;
            color: #fde16d;
            transition: all 0.25s ease-out;
            -o-transition: all 0.25s ease-out;
            -moz-transition: all 0.25s ease-out;
            -webkit-transition: all 0.25s ease-out;
        }

        .rating-container .rating-stars:before {
            content: attr(data-content);
            text-shadow: 0 0 1px rgba(0, 0, 0, 0.7);
        }

        .rating-container-rtl {
            position: relative;
            vertical-align: middle;
            display: inline-block;
            overflow: hidden;
            color: #fde16d;
        }

        .rating-container-rtl:before {
            content: attr(data-content);
            text-shadow: 0 0 1px rgba(0, 0, 0, 0.7);
        }

        .rating-container-rtl .rating-stars {
            position: absolute;
            left: 0;
            top: 0;
            white-space: nowrap;
            overflow: hidden;
            color: #e3e3e3;
            transition: all 0.25s ease-out;
            -o-transition: all 0.25s ease-out;
            -moz-transition: all 0.25s ease-out;
            -webkit-transition: all 0.25s ease-out;
        }

        .rating-container-rtl .rating-stars:before {
            content: attr(data-content);
        }

        /**
         * Rating sizes
         */
        .rating-xl {
            font-size: 4.89em;
        }

        .rating-lg {
            font-size: 3.91em;
        }

        .rating-md {
            font-size: 3.13em;
        }

        .rating-sm {
            font-size: 2.5em;
        }

        .rating-xs {
            font-size: 2em;
        }

        /**
         * Clear rating button
         */
        .star-rating .clear-rating, .star-rating-rtl .clear-rating {
            color: #aaa;
            cursor: not-allowed;
            display: inline-block;
            vertical-align: middle;
            font-size: 60%;
        }

        .clear-rating-active {
            cursor: pointer !important;
        }

        .clear-rating-active:hover {
            color: #843534;
        }

        .star-rating .clear-rating {
            padding-right: 5px;
        }

        /**
         * Caption
         */
        .star-rating .caption, .star-rating-rtl .caption {
            color: #999;
            display: inline-block;
            vertical-align: middle;
            font-size: 55%;
        }

        .star-rating .caption {
            padding-left: 5px;
        }

        .star-rating-rtl .caption {
            padding-right: 5px;
        }
        .rating {
            float:left;
        }

        /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t
           follow these rules. Every browser that supports :checked also supports :not(), so
           it doesn’t make the test unnecessarily selective */
        .rating:not(:checked) > input {
            position: absolute;
            /* top: -9999px; */
            clip: rect(0, 0, 0, 0);
            height: 0;
            width: 0;
            overflow: hidden;
            opacity: 0;
        }

        .rating:not(:checked) > label {
            float:right;
            width:1em;
            padding:0 .1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:200%;
            line-height:1.2;
            color:#ddd;
            text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
        }

        .rating:not(:checked) > label:before {
            content: '★ ';
        }

        .rating > input:checked ~ label {
            color: #f70;
            text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
        }

        .rating:not(:checked) > label:hover,
        .rating:not(:checked) > label:hover ~ label {
            color: gold;
            text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
        }

        .rating > input:checked + label:hover,
        .rating > input:checked + label:hover ~ label,
        .rating > input:checked ~ label:hover,
        .rating > input:checked ~ label:hover ~ label,
        .rating > label:hover ~ input:checked ~ label {
            color: #ea0;
            text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
        }

        .rating > label:active {
            position:relative;
            top:2px;
            left:2px;
        }
        .logo img {
            width: 200px;
            height: 200px;
        }


    </style>
    @yield('css')
    @yield('header-js')
</head>
<body>
<div class="body-inner">

    @include("home._header")

    @section('body')
    @show

    @include("home._footer")
    @yield('footer-js')

</div>
</body>
</html>
