
<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name', 'ParcInformatique') }}</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="http://material-admin.strapui.com/css/vendor.css" />
    <link rel="stylesheet" href="{{ asset('css/custom2.css') }}" />
    <link rel="shortcut icon" href="{{ asset('img/mylogo.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">

</head>
<body class="small-sidebar   ">

<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header navbar shadow">
        <div class="mdl-layout__header-row">
            <!-- Hamburger -->
            <button class="c-hamburger c-hamburger--htla">
                <span>toggle menu</span>
            </button>
            <div class="responsive-logo">
                {{ Auth::user()->username }} <br><span class="smaller">Dashboard</span>
            </div>
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <!-- Left aligned menu below button -->

            </nav>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <span class="relative">
                    <button id="demo-menu-lower-right" class="mdl-button mdl-js-button nav-button">
                        <i class="material-icons">more_vert</i>
                    </button>
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="demo-menu-lower-right">
                      <li class="mdl-menu__item"><a class="dropdown-item" href="{{ route('changermdp') }}"
                                                      onclick="event.preventDefault();
                                                     document.getElementById('changermdp-form').submit();">
                                      <i class="material-icons" style="font-size:18px;">security</i>  {{ __('Changer Mot De Passe') }}
                                    </a></li>
                        <li class="mdl-menu__item"><a class="dropdown-item" href="{{ route('logout') }}"
                                                      onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                     <i class="material-icons" style="font-size:18px;">input</i>       {{ __('Déconnexion ') }}
                                    </a></li>
                        <form id="changermdp-form" action="{{ route('changermdp') }}" method="GET" style="display: none;">

                                    </form>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </ul>
                </span>
            </nav>
        </div>
    </header>
    <!-- Side bar here -->
    <aside id="" class="sidebar">
        <div class="top-logo">

        </div>
        <div class="top-logo-extended">
            {{ Auth::user()->username }} <i class="material-icons">verified_user</i><br/> <span class="smaller">dashboard</span>
        </div>
        <div class="scrollbar" id="scroll">
            <div class="user-info">
                <div class="opacity">
                    <a href="/profile"><img src="/images/profile.jpg" alt="" class="sidebar-profile"></a>
                    <div class="info">
                        <br /> <span class="smaller">Parc Informatique</span>
                    </div>
                </div>
            </div>
            <div class="dashboard-menu">
                <ul class="menu-list">
                    <li class=active><a href={{url('/')}} class="mdl-button mdl-js-button mdl-js-ripple-effect"><i class="material-icons" >home</i> &nbsp;<span class="text">Home </span></a></li>
                    <li class="show-subnav" ><a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect show-menu"><i class="mdi mdi-arrange-bring-to-front"></i> &nbsp;<span class="text"> UI Elements </span><i class="mdi mdi-chevron-down"></i></a>
                        <ul class="sub-menu ">
                            <li ><a href="/ui-elements/button" class="mdl-button mdl-js-button mdl-js-ripple-effect"><span class="text">Button</span></a></li>
                            <li ><a href="/ui-elements/card" class="mdl-button mdl-js-button mdl-js-ripple-effect"><span class="text">Cards</span></a></li>
                            <li ><a href="/ui-elements/components" class="mdl-button mdl-js-button mdl-js-ripple-effect"><span class="text">Components</span></a></li>
                        </ul>
                    </li>
                    <li ><a href="/form" class="mdl-button mdl-js-button mdl-js-ripple-effect"><i class="mdi mdi-receipt"></i> &nbsp;<span class="text"> Form</span></a></li>
                    <li ><a href="/grid" class="mdl-button mdl-js-button mdl-js-ripple-effect"><i class="mdi mdi-grid"></i> &nbsp;<span class="text"> Grid</span></a></li>
                    <li class="show-subnav"><a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect show-menu"><i class="mdi mdi-chart-areaspline"></i> &nbsp;<span class="text"> Charts</span><i class="mdi mdi-chevron-down"></i></a>
                        <ul class="sub-menu ">
                            <li ><a href="/charts/chartjs" class="mdl-button mdl-js-button mdl-js-ripple-effect"><span class="text">ChartJS</span></a></li>
                            <li ><a href="/charts/c3chart" class="mdl-button mdl-js-button mdl-js-ripple-effect"><span class="text">C3 Charts</span></a></li>
                        </ul>
                    </li>
                    <li ><a href="/calendar" class="mdl-button mdl-js-button mdl-js-ripple-effect"><i class="mdi mdi-calendar"></i> &nbsp;<span class="text"> Calendar</span></a></li>
                    <li ><a href="/inbox" class="mdl-button mdl-js-button mdl-js-ripple-effect"><i class="mdi mdi-message"></i> &nbsp;<span class="text"> Inbox</span></a></li>
                    <li ><a href="/profile" class="mdl-button mdl-js-button mdl-js-ripple-effect"><i class="mdi mdi-account"></i> &nbsp;<span class="text"> Profile</span></a></li>
                    <li ><a href="/invoice" class="mdl-button mdl-js-button mdl-js-ripple-effect"><i class="mdi mdi-barcode"></i> &nbsp;<span class="text"> Invoice</span></a></li>
                    <li ><a href="/signup" class="mdl-button mdl-js-button mdl-js-ripple-effect"><i class="mdi mdi-account-multiple-plus"></i> &nbsp;<span class="text"> Sign Up</span></a></li>
                    <li ><a href="/login" class="mdl-button mdl-js-button mdl-js-ripple-effect"><i class="mdi mdi-logout"></i> &nbsp;<span class="text"> Log in</span></a></li>
                    <li ><a href="/404" class="mdl-button mdl-js-button mdl-js-ripple-effect"><i class="mdi mdi-alert-octagon"></i> &nbsp;<span class="text"> 404 Page</span></a></li>
                    <li ><a href="/blank" class="mdl-button mdl-js-button mdl-js-ripple-effect"><i class="mdi mdi-content-paste"></i> &nbsp;<span class="text"> Blank page</span></a></li>
                    <li ><a href="/docs" class="mdl-button mdl-js-button mdl-js-ripple-effect"><i class="mdi mdi-texture"></i> &nbsp;<span class="text"> Documentation</span></a></li>
                </ul>
            </div>
        </div>
    </aside>
    <main class="mdl-layout__content content-holder">
        <div class=" page-content remodal-bg animsition">
            <!-- Your content goes here -->

           <div class="panel shadow">
               <i class="material-icons">verified_user</i>

           </div>
        </div>
    </main>
</div>


<script src="http://material-admin.strapui.com/js/vendor.js" type="text/javascript"></script>





<script>

    $(function () {

        if ($(window).width()<840) {

            if ($('body').hasClass('extended')==1) {
                $('body').removeClass('extended')
            }
        }

        var sessionLayout = "";

        if (!sessionLayout && $(window).width()>1600) {

            $('.c-hamburger').addClass('is-active');
            $('body').addClass('extended');
            $('.sidebar').perfectScrollbar();

        };

        $( ".thisRTL" ).click(function() {
            $('body').toggleClass('rtl');
            var hasClass = $('body').hasClass('rtl');
            $.get('/api/set-rtl?rtl='+ (hasClass ? 'rtl': ''));
            setTimeout(function() {
                window.location.reload(true);
            }, 0);
        });



        $( ".c-hamburger" ).click(function() {

            $( this ).toggleClass('is-active');
            $('body').toggleClass('extended');

            var hasClass = $('body').hasClass('extended');

            $.get('/api/change-layout?layout='+ (hasClass ? 'extended': 'collapsed'));

        });

        if ($('body').hasClass('extended')==1) {
            $( ".c-hamburger" ).addClass('is-active') ;
            $('.sidebar').perfectScrollbar();
        };
        $( ".show-menu" ).click(function() {
            $( this ).parent().find('.sub-menu').toggleClass('visible');
        });

        $(".animsition").animsition({

            inClass               :   'zoom-in-sm',
            outClass              :   'zoom-out-sm',
            inDuration            :    350,
            outDuration           :    500,
            linkElement           :   '.animsition-link',
            // e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
            loading               :    0,
            loadingParentElement  :   'body', //animsition wrapper element
            loadingClass          :   'animsition-loading',
            unSupportCss          : [ 'animation-duration',
                '-webkit-animation-duration',
                '-o-animation-duration'
            ],
            //"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
            //The default setting is to disable the "animsition" in a browser that does not support "animation-duration".

            overlay               :   false,
            overlayClass          :   'animsition-overlay-slide',
            overlayParentElement  :   'body'
        });


        $(window).resize(function  () {

            if ($(window).width()>1600) {
                $('.c-hamburger').addClass('is-active');
                $('body').addClass('extended');
                $('.sidebar').perfectScrollbar();

            };
            if ($(window).width()<1200) {
                $('.c-hamburger').removeClass('is-active');
                $('body').removeClass('extended');
            };
            if ($('body').hasClass('extended')==1) {
                $('.sidebar').addClass('ps-container');
                $('.sidebar').perfectScrollbar();
                $('.sidebar').perfectScrollbar('update');
            }
            else if ($('body').hasClass('extended')==0) {
                $('.sidebar').removeClass('ps-container');
            }
        });

        $( ".c-hamburger" ).click(function() {

            if ($('body').hasClass('extended')==1) {
                $('.sidebar').addClass('ps-container');
                $('.sidebar').perfectScrollbar();
                $('.sidebar').perfectScrollbar('update');
            }
            else if ($('body').hasClass('extended')==0) {
                $('.sidebar').removeClass('ps-container');
            }
        });
        $('.theme-picker').click(function() {
            changeTheme($(this).attr('id'));
        });

        function changeTheme(theme) {

            $('<link>')
                .appendTo('head')
                .attr({type : 'text/css', rel : 'stylesheet'})
                .attr('href', '/css/app-'+theme+'.css');

            $.get('api/change-theme?theme='+theme);
        }


    });
    function changeLanguage(lang){
        console.log(lang);
        $.get('api/lang?lang='+lang);
        setTimeout(function() {
            window.location.reload(true);

        }, 550);
    }
</script>



<script>
    $(function() {
        $.growl({ title: "Bonjour", message: "Bienvenue {{ Auth::user()->username }}!" });
        if ($(window).width()<600) {
            $('#drag').removeAttr('id');
            $('#drag2').removeAttr('id');
        };
        $('#chart1').easyPieChart({
            lineWidth: 8,
            scaleColor: false,
            size: 85,
            lineCap: "square",
            barColor: "#fb8c00",
            trackColor: "#f9dcb8"
        });
        $('#chart2').easyPieChart({
            lineWidth: 8,
            scaleColor: false,
            size: 85,
            lineCap: "square",
            barColor: "#00D554",
            trackColor: "#c7f9db"
        });
        $('#chart3').easyPieChart({
            lineWidth: 8,
            scaleColor: false,
            size: 85,
            lineCap: "square",
            barColor: "#F800FC",
            trackColor: "#F5E5F5"
        });

        var lineChartData1 = {
            labels : ["JAN","FEB","MAR","APR","MAY","JUN"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "#FFA3FD",
                    strokeColor: "#FFA3FD",
                    pointColor: "#fff",
                    pointStrokeColor: "#FFA3FD",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "#FFA3FD",
                    data: [7, 20, 10, 15, 17, 10, 27]
                },
                {
                    label: "My Second dataset",
                    fillColor: "#F800FC",
                    strokeColor: "#F800FC",
                    pointColor: "#fff",
                    pointStrokeColor: "#F800FC",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "#F800FC",
                    data: [6, 9, 22, 11, 13, 20, 27]
                }
            ]

        };

        var homeLineChart = document.getElementById("home-line-chart").getContext("2d");

        var chartCurves = new Chart(homeLineChart).Line(lineChartData1, {
            responsive: true,
            bezierCurve : false,
            datasetStroke: false,
            legendTemplate: false,
            pointDotRadius : 6,
            showTooltips: false
        });

        $( "#refresh1" ).click(function() {
            chartCurves.datasets[0].points[1].value = Math.floor(Math.random() * (22 - 17 + 1)) + 17;
            chartCurves.datasets[0].points[3].value = Math.floor(Math.random() * (22 - 15 + 1)) + 15;
            chartCurves.datasets[0].points[4].value = Math.floor(Math.random() * (19 - 13 + 1)) + 13;
            chartCurves.datasets[1].points[1].value = Math.floor(Math.random() * (10 - 5 + 1)) + 5;
            chartCurves.datasets[1].points[2].value = Math.floor(Math.random() * (25 - 20 + 1)) + 20;
            chartCurves.datasets[1].points[4].value = Math.floor(Math.random() * (15 - 10 + 1)) + 10;
            chartCurves.datasets[1].points[5].value = Math.floor(Math.random() * (22 - 18 + 1)) + 18;
            chartCurves.update();
        });

        var lineChartData2 = {
            labels : ["JAN","FEB","MAR","APR","MAY","JUN"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(0,0,0, 0)",
                    strokeColor: "#C172FF",
                    pointColor: "#fff",
                    pointStrokeColor: "#8F00FF",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "#8F00FF",
                    data: [99, 180, 80, 140, 120, 220, 100]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(0,0,0, 0)",
                    strokeColor: "#FFB53A",
                    pointColor: "#fff",
                    pointStrokeColor: "#FF8300",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "#FF8300",
                    data: [50, 145, 200, 75, 50, 100, 50]
                }
            ]

        };


        var homeLineChart2 = document.getElementById("home-line-chart2").getContext("2d");

        var chartCurves2 = new Chart(homeLineChart2).Line(lineChartData2, {
            responsive: true,
            bezierCurve : false,
            datasetStroke: false,
            legendTemplate: false,
            pointDotRadius : 9,
            pointDotStrokeWidth : 3,
            datasetStrokeWidth : 3
        });

        var chart = c3.generate({
            bindto: '#bar',
            data: {
                columns: [
                    ['Players', 30, 200, 100, 400, 150, 250, 200, 120, 80, 180, 40, 90, 220, 110, 20, 65]
                ],
                type: 'bar'
            },
            bar: {
                width: {
                    width: 30 // this makes bar width 50% of length between ticks
                }
                // or
                //width: 100 // this makes bar width 100px
            },
            color: {
                pattern: ['#00D554']
            },
            padding: {
                left: 70,
                right: 50,
                top: 10
            },
            legend: {
                hide: true
            }
        });


        var chart2 = c3.generate({
            bindto: '#donut',
            data: {
                columns: [
                    ['Approved', 13],
                    ['Pending', 25],
                    ['Rejected', 25],
                    ['Others', 37]
                ],
                type : 'donut'
            },
            donut: {
                title: ""
            },
            color: {
                pattern: ['#FF8300','#00AEFF','#00D554','#FF2800']
            },
            padding: {
                left: 30,
                right: 30,
                top: 30,
                bottom: 15
            }
        });
        dragula([document.getElementById('drag')], {
            revertOnSpill: true
        });
        dragula([document.getElementById('drag2')], {
            revertOnSpill: true
        });

        $('.c-hamburger').click(function() {
            chartCurves.clear();
            chartCurves2.clear();

            setTimeout(function() {
                chartCurves.render();
                chartCurves.resize();
                chartCurves2.render();
                chartCurves2.resize();
            }, 250);
            setTimeout(function() {
                chart.resize();
                chart2.resize();
            }, 150);
        });

    });
</script>

</body>
</html>