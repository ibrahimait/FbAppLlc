<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- <link href="/../css/admin_style.css" rel ="stylesheet"/> -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('js/axios.js') }}"></script>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header" style="text-align : center">
                <h3> Lalachante Team {{Auth::user()->name}}</h3>
                <!--<h3>{{Auth::user()->name}}</h3>-->
            </div>

            <ul class="list-unstyled components">
                <li> <a href="/home">Welcome</a> </li>
                <li> <a href="/welcomedashboard">Welcome Dashboard</a> </li>
                <br>

                <!-- Activité -->

                <li style="background-color : #DEDEDE ; text-align : center ; color : black">
                    <h5>Activité<h5>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Groupe</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li> <a href="/groupesdashboard">Dashboard groupe</a> </li>
                        <li> <a href="/groupes">Liste groupe</a> </li>
                        <li> <a href="/onboardgroupe">Onboarding groupes</a> </li>
                        <li> <a href="/adhmanuelles">Adhésion manuelle</a> </li>
                        <li> <a href="/questionads">Question d'Adhésion</a> </li>
                        <li> <a href="/optimisationactivite">Optimisation Activité</a> </li>
                        <li> <a href="/dashboardrequalificationgroupe">Dashboard Re qualification Groupe</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Campagne</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li> <a href="/campagnesdashboard">Dashboard Campagne </a></li>
                        <li> <a href="/campagnes">Liste Campagne</a> </li>
                        <li> <a href="/analysecampagne">Analyse Campagne</a> </li>
                        <li> <a href="/processcampagne">Process Campagne</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Post</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1">
                        <li> <a href="/postmeres">Liste des Post Mère </a></li>
                        <li> <a href="/postpartages">Liste des Post Partage</a> </li>
                        <li> <a href="/postgroupes">Liste des Post Groupe</a> </li>
                        <li> <a href="/dashboardpostmere">Dashboard Post Mere</a> </li>
                        <li> <a href="/dashboardpostpartage">Dashboard Post Partage</a> </li>
                        <li> <a href="/dashboardpostgroupe">Dashboard Post Groupe</a> </li>

                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">User</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li> <a href="/utilisateurs">Liste des utilisateurs </a></li>
                        <li> <a href="/dashboarduser">Dashboard User</a> </li>
                        <li> <a href="/dashboardaudiencegroupe">Dashboard Audience groupe</a> </li>
                        <li> <a href="/dashboardlalachanteengage">Dashboard LalaChante engagé</a> </li>
                    </ul>
                </li>

                <!-- Analyse et stratégie -->

                <li style="background-color : #DEDEDE ; text-align : center ; color : black">
                    <h5>Analyse et stratégie<h5>
                </li>
                <li>
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Performance</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu3">
                        <li> <a href="/groupeperformance">Groupe performance</a> </li>
                        <li> <a href="/campagneperformance">Compagne perforamnce</a> </li>
                        <li> <a href="/segmentperformance">Segement performance</a> </li>
                        <li> <a href="/segmentationperformance">Segmentation performance</a> </li>
                        <li> <a href="/teamperformance">Team performance</a> </li>
                        <li> <a href="/ambassadeurperformance">Ambassadeur performance</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Data analyse</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu4">
                        <li> <a href="/analysetags">Analyse des tags </a></li>
                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Segmentation</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu5">
                        <li> <a href="/segmentsdashboard">Dashboard Segment </a></li>
                        <li> <a href="/segementations">Segmentation </a></li>
                        <li> <a href="/segements">Segment</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Stratégie</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu6">
                        <li> <a href="/dashboardstrategie">Dashboard stratégie</a></li>
                        <li> <a href="/planificationcampagnes">Planification compagnes</a> </li>
                        <li> <a href="/ambassadeurs">Ambassadeur List </a> </li>
                    </ul>
                </li>

                <!-- Administration -->

                <li style="background-color : #DEDEDE ; text-align : center ; color : black">
                    <h5>Administration<h5>
                </li>
                <li>
                    <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Administration</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu7">
                        <li> <a href="/users">Team</a> </li>
                        <li> <a href="/crud">Crud</a> </li>
                        <li> <a href="/administrationlistes">Administration des listes</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu8" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Page script</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu8">
                        <li> <a href="/publiergroupe">0_Publier_Groupe </a></li>
                        <li> <a href="/partagepublications">1_Partage_Publications</a> </li>
                        <li> <a href="/cherchepublications">2_Cherche_Publications</a> </li>
                        <li> <a href="/engagements">3_Engagements_Posts<br>_Partagés</a> </li>
                        <li> <a href="/insightspost">4_Insights_Post_Mere </a></li>
                        <li> <a href="/insightspage">5_Insights_Page_LLC</a> </li>
                        <li> <a href="/releveinfo">6_Releve_Info_Groupe</a> </li>
                        <li> <a href="/adhesion">7_Adhésion</a> </li>
                        <li> <a href="/notifications">8_Notifications</a> </li>
                        <li> <a href="/relevecentposts">9_Releve_100_Post_Groupe</a> </li>
                        <li> <a href="/recherchenouveauxgroupe">10_Rechercher_nouveaux<br>_groupe</a> </li>
                    </ul>
                </li>

                <li style="background-color : #DEDEDE ; text-align : center ; color : black">
                    <h5>Infrastructure<h5>
                </li>
                <li>
                    <a href="#pageSubmenu10" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Expérience</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu10">
                        <li> <a href="/reservationclient.index">Suivi Réservation</a> </li>
                        <li> <a href="/">Expérience</a> </li>
                        <li> <a href="/clients.index">Client</a> </li>
                        <li> <a href="/contacts.index">Contact</a> </li>
                        <li> <a href="/">Produit</a> </li>
                        <li> <a href="/">Témoignage</a> </li>
                        <li> <a href="/">Factures</a> </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu11" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Evènement</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu11">
                        <li> <a href="/"></a> </li>
                        <li> <a href="/"></a> </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu12" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Automation</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu12">
                        <li> <a href="/notif.index">Notification</a> </li>
                        <li> <a href="/">Automat</a> </li>
                    </ul>
                </li>


            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="{{ route('logout') }}" class="download">Déconnexion</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <!-- 

            ICI
            
-->
                </div>
            </nav>
            <main>
                <div class="container-fluid px-5">

                    <div class="row">
                        @yield('content')
                    </div>



            </main>

        </div>
    </div>
    <script>
        import axios from 'axios';
        window.axios = axios;
        
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });
    </script>
    <!-- Style -->
    <style>
        @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

        body {
            font-family: 'Poppins', sans-serif;
            background: #fafafa;
            font-size: 12px
        }

        p {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        .navbar {
            padding: 15px 10px;
            background: #fff;
            border: none;
            border-radius: 0;
            margin-bottom: 40px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .navbar-btn {
            box-shadow: none;
            outline: none !important;
            border: none;
        }

        .line {
            width: 100%;
            height: 1px;
            border-bottom: 1px dashed #ddd;
            margin: 40px 0;
        }

        /* ---------------------------------------------------
            SIDEBAR STYLE
        ----------------------------------------------------- */

        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #616161;
            color: #fff;
            transition: all 0.3s;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #333333;
            color: #17a2b8
        }

        #sidebar ul.components {
            padding: 20px 0;
        }

        #sidebar ul p {
            color: #fff;
            padding: 10px;
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }

        #sidebar ul li a:hover {
            color: #fff;
            background: #333333;
        }

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #fff;
            background: #333333;
        }

        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #808080;
            color: #fff;
        }

        ul.CTAs {
            padding: 20px;
        }

        ul.CTAs a {
            text-align: center;
            font-size: 0.9em !important;
            display: block;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        a.download {
            background: #17a2b8;
            color: #fff;
        }

        a.article,
        a.article:hover {
            background: 5 !important;
            color: #fff !important;
        }


        /* ---------------------------------------------------
            CONTENT STYLE
        ----------------------------------------------------- */

        #content {
            width: 100%;
            padding: 20px;
            min-height: 100vh;
            transition: all 0.3s;
        }

        /* ---------------------------------------------------
            MEDIAQUERIES
        ----------------------------------------------------- */

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }

            #sidebar.active {
                margin-left: 0;
            }

            #sidebarCollapse span {
                display: none;
            }
        }
    </style>

    <!-- Script -->
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

</body>

</html>