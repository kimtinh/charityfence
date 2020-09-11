<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/progresscircle.css') }}">
    @yield('css')
</head>

<body>
    <div id="app">

        @include('view.layouts.header')

        @if( session()->get('success') || session()->get('error') )
            <div class="alert alert-{{ session()->get('success') ? 'primary' : 'danger' }} alert-global" role="alert" style="position:fixed;top: 85px; right: 60px; z-index: 9">
                {{ session()->get('success') ?? session()->get('error') }}
                <a href="javascript:document.querySelector('.alert-global').remove()" class="ml-2"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        @endif

        @yield('content')

        @include('view.layouts.footer')

    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.slim.min.js') }}"></script>
    --}}
    <script src="{{ asset('js/progresscircle.js') }}"></script>
    <script src="{{asset('js/sweetalert2.js')}}"></script>
    <script type="text/javascript">
        function makesvg(percentage, inner_text = "") {

            var abs_percentage = Math.abs(percentage).toString();
            var percentage_str = percentage.toString();
            var classes = ""

            if (percentage < 0) {
                classes = "danger-stroke circle-chart__circle--negative";
            } else if (percentage > 0 && percentage <= 30) {
                classes = "warning-stroke";
            } else {
                classes = "success-stroke";
            }

            var svg =
                '<svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">' +
                '<circle class="circle-chart__background" cx="16.9" cy="16.9" r="15.9" />' +
                '<circle class="circle-chart__circle ' + classes + '"' +
                'stroke-dasharray="' + abs_percentage + ',100"    cx="16.9" cy="16.9" r="15.9" />' +
                '<g class="circle-chart__info">' +
                '   <text class="circle-chart__percent" x="17.9" y="15.5">' + percentage_str + '%</text>';

            if (inner_text) {
                svg += '<text class="circle-chart__subline" x="16.91549431" y="22">' + inner_text + '</text>'
            }

            svg += ' </g></svg>';

            return svg
        }

        (function($) {

            $.fn.circlechart = function() {
                this.each(function() {
                    var percentage = $(this).data("percentage");
                    var inner_text = $(this).text();
                    $(this).html(makesvg(percentage, inner_text));
                });
                return this;
            };
            $('.circlechart').circlechart();
        }(jQuery));
        $(function(){
            setTimeout(() => {
                $('.alert-global').fadeOut(1000);
            }, 8000);
        })
    </script>
    @yield('scripts')
</body>

</html>
