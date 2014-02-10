<?php

$user = Auth::check() ? Auth::user() : null;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="shortcut icon" href="../../assets/ico/favicon.png">-->

    <title>@yield('title')</title>

    @stylesheets('layout')
    @javascripts('layout')
    @stylesheets('application')
    <link href="{{ asset('datepicker/css/datepicker.css') }}" rel="stylesheet">
  
    <script src="{{ asset('node_modules/underscore/underscore-min.js') }}"></script>
    <script src="{{ asset('node_modules/backbone/backbone-min.js') }}"></script>
    <script src="{{ asset('node_modules/handlebars/dist/handlebars.min.js') }}"></script>
    <script src="{{ asset('node_modules/moment/moment.js') }}"></script>
    <script src="{{ asset('node_modules/moment/lang/nb.js') }}"></script>
    <script src="{{ asset('js/handlebars.helpers.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/models/printer.js') }}"></script>
    <script src="{{ asset('js/views/printer.last.js') }}"></script>
    <script src="{{ asset('datepicker/js/bootstrap-datepicker.js') }}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{{ URL::to('/') }}}">BS Intern</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              @if ($user)
              <li{{ (Request::is('userlist') ? ' class="active"' : '') }}><a href="{{{ URL::to('userlist') }}}">Brukerliste</a></li>
              <li class="dropdown">
              	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Printer <b class="caret"></b></a>
              	<ul class="dropdown-menu">
              	  <li{{ (Request::is('printer/siste') ? ' class="active"' : '') }}><a href="{{{ URL::to('printer/siste') }}}">Siste utskrifter</a></li>
                  <li{{ (Request::is('printer/fakturere') ? ' class="active"' : '') }}><a href="{{{ URL::to('printer/fakturere') }}}">Fakturering</a></li>
	              </ul>
  	          </li>
              @endif
              <li{{ (Request::is('arrplan') ? ' class="active"' : '') }}><a href="{{{ URL::to('arrplan') }}}">Arrangementplan</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	@if ($user)
              <li class="dropdown{{ (Request::is('profile') ? ' active' : '') }}">
            		<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{{ $user->username }}} <b class="caret"></b></a>
            		<ul class="dropdown-menu">
            			<li><a href="{{{ URL::to('profile') }}}">Brukerinfo</a></li>
            			<li><a href="{{{ URL::to('logout') }}}">Logg ut</a></li>
            		</ul>
            	</li>
            	@else
              <li><a href="{{{ URL::to('login') }}}">Logg inn</a></li>
            	@endif
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

      <!-- Begin page content -->

      <div class="container">

      	<!--<?php /*echo implode("", Messages::get());*/ ?>-->

      	<div class="page-header">
          <h1 id="page_title">@yield('title')</h1>
        </div>
        <div id="content">
          @yield('content')
        </div>
      </div>
    </div>

    <div id="footer" class="hidden-print">
      <div class="container">
        <p class="text-muted credit">Blindern Studenterhjem (<a href="/">offisiell side</a>) - Kontakt Henrik Steen ved forespørsler vedr. denne siden - <a href="https://github.com/blindern/intern">GitHub-prosjekt</a></p>
      </div>
    </div>
  </body>
</html>
