
<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name', 'ParcInformatique') }}</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom2.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom3.css') }}" />
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
      @if((strpos(Request::path(),'home') !== false)||(strpos(Request::path(),'password_reset') !== false))<li class=active>@else <li> @endif <a href="{{url('/')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect"><i class="material-icons" >home</i> &nbsp;<span class="text">Home </span></a></li>
                    @if(Auth::user()->hasAnyRole(['AJOUT EQUIPEMENT','CONSULTER EQUIPEMENT']))
                        <li class="show-subnav" ><a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect show-menu"><i class="material-icons">developer_board</i> &nbsp;<span class="text"> Gérer les équipements </span><i class="material-icons">arrow_drop_down</i></a>
                    <ul id="1111" class="sub-menu ">
                       @if(Auth::user()->hasRole('AJOUT EQUIPEMENT')) @if(strpos(Request::path(),'gerer_equipements/Ajout') !== false)<li class=active>@else <li> @endif<a href="{{url('/gerer_equipements/Ajout')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect"><span class="text">Ajouter</span></a></li>@endif
                        @if(Auth::user()->hasRole('CONSULTER EQUIPEMENT'))@if(strpos(Request::path(),'gerer_equipements/Consulter') !== false)<li class=active>@else <li> @endif<a href="{{url('/gerer_equipements/Consulter')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect"><span class="text">Consulter</span></a></li>@endif
                    </ul>
                    </li>
                    @endif
                @if(Auth::user()->hasAnyRole(['TABLEAUX DE BORDS','STATISTIQUES']))
                    <li class="show-subnav" ><a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect show-menu"><i class="material-icons">assessment</i> &nbsp;<span class="text"> Services </span><i class="material-icons">arrow_drop_down</i></a>
                        <ul id="2222" class="sub-menu ">
                            @if(Auth::user()->hasRole('TABLEAUX DE BORDS'))@if(strpos(Request::path(),'consulter_services/TableauxDeBords') !== false)<li class=active>@else <li> @endif<a href="{{url('/consulter_services/TableauxDeBords')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect"><span class="text">Tableau De Bord</span></a></li>@endif
                            @if(Auth::user()->hasRole('STATISTIQUES'))@if(strpos(Request::path(),'consulter_services/Statistiques') !== false)<li class=active>@else <li> @endif<a href="{{url('/consulter_services/Statistiques')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect"><span class="text">Statistiques</span></a></li>@endif
                        </ul>
                    </li>
                        @endif
                            @if(Auth::user()->isAdmin())
                    <li class="show-subnav" ><a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect show-menu"><i class="material-icons">supervisor_account</i> &nbsp;<span class="text"> Gérer les utilisateurs </span><i class="material-icons">arrow_drop_down</i></a>
                        <ul id="3333" class="sub-menu ">
                            @if(strpos(Request::path(),'gerer_utilisateurs/Ajout') !== false)<li class=active>@else <li> @endif<a href="{{url('/gerer_utilisateurs/Ajout')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect"><span class="text">Ajouter</span></a></li>
                            @if(strpos(Request::path(),'gerer_utilisateurs/Modifier') !== false)<li class=active>@else <li> @endif<a href="{{url('/gerer_utilisateurs/Modifier')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect"><span class="text">Modifier</span></a></li>
                            @if(strpos(Request::path(),'gerer_utilisateurs/Historique') !== false)<li class=active>@else <li> @endif<a href="{{url('/gerer_utilisateurs/Historique')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect"><span class="text">Historique</span></a></li>
                            @if(strpos(Request::path(),'gerer_utilisateurs/Supprimer') !== false)<li class=active>@else <li> @endif<a href="{{url('/gerer_utilisateurs/Supprimer')}}" class="mdl-button mdl-js-button mdl-js-ripple-effect"><span class="text">Supprimer</span></a></li>
                        </ul>
                    </li>
                            @endif
                    </ul>
            </div>
        </div>
    </aside>
    <main class="mdl-layout__content content-holder">
        <div class=" page-content remodal-bg animsition">
            <!-- Your content goes here -->

           <div class="panel shadow">
               <main class="py-4">
               @include('layouts.messages')
               @yield('content')
               </main>
           </div>
            @if((strpos(Request::path(),'home') !== false)||(strpos(Request::path(),'password_reset') !== false))
            <footer class="mdl-mini-footer">
                <div class="mdl-mini-footer__left-section">
                    <ul class="mdl-mini-footer__link-list">
                        <li><a href={{url('/about')}}>À propos OACA</a></li>
                        <li align="right">OACA©2018</li>
                        <li> </li><li> </li><li> </li><li> </li><li> </li><li> </li><li> </li><li> </li><li> </li><li> </li>
                        <li> </li><li> </li><li> </li><li> </li><li> </li><li> </li><li> </li><li> </li><li> </li><li> </li><li> </li>
                        <li> </li><li> </li><li> </li><li> </li><li>  </li><li> </li><li> </li><li> </li><li> </li><li> </li><li> </li>
                        <li><small>Développé par Chames Eddine Ben Jelloul</small></li>
                    </ul>
                </div>
            </footer>
                @endif
        </div>
    </main>

</div>



<script src="{{ asset('js/custom1.js') }}" type="text/javascript"></script>





<script>
    $('body').toggleClass('extended');
    var url="{{Request::path()}}";
    if(url.includes("gerer_equipements")){
        $( "#1111" ).toggleClass('visible');
    }
    if(url.includes("consulter_services")){
        $( "#2222" ).toggleClass('visible');
    }
    if(url.includes("gerer_utilisateurs")){
        $( "#3333" ).toggleClass('visible');
    }



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



    });
</script>



<script>
    $(function() {
        if("{{Request::path()}}"=="home"){
        $.growl({ title: "Bonjour", message: "Bienvenue {{ Auth::user()->username }}!" });
        }
        if ($(window).width()<600) {
            $('#drag').removeAttr('id');
            $('#drag2').removeAttr('id');
        };

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