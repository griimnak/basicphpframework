<?php
if(count(get_included_files()) ==1) exit("Direct access not permitted.");
render_model('admin/dashboard.php');
$users = get_users(); 
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <meta name="format-detection" content="telephone=no">
  <meta charset="UTF-8">
  <title>Trinity 3 - Administration</title>

  <link href="static/admin/css/animate.min.css" rel="stylesheet">
  <link href="static/admin/css/material-design-iconic-font.min.css" rel="stylesheet">
  <link href="static/admin/css/fullcalendar.min.css" rel="stylesheet">
  <link href="static/admin/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link href="static/admin/css/app.min.css" rel="stylesheet">
</head>

<body>

  <script type="text/javascript">
    $(document).ready(function() {

      setInterval(function(event){
        var n = $(document).height();
        $('#messages').animate({ scrollTop: n }, 50);
      },500);

      var socket = io.connect('http://localhost:80');
      var user = '{{ username }}'
      socket.on('connect', function() {
        socket.send(user + ' has connected!');
      });

      socket.on('disconnect', function() {
        socket.send(user + 'has disconnected.');
      });

      socket.on('message', function(msg) {
        $("#messages").append('<b class="list-group-item">'+msg+'</b>');
        console.log('Received message');
      });
      $('#sendbutton').on('click', function() {
        socket.send(user + ' <b class="zmdi zmdi-chevron-right"></b> ' + $('#myMessage').val());
        $('#myMessage').val('');
      });

      $('#disablechat').on('click', function() {
        $("#messages").append('<b class="list-group-item">'+ user +' has disconnected.</b>');
        console.log('You have been disconnected from admin chat.');
        socket.disconnect();
      });

      $(window).unload(function () {
        socket.disconnect();
      });

    });
  </script>





  <header id="header" class="clearfix" data-spy="affix" data-offset-top="65">
    <ul class="header-inner">

      <!-- Logo -->
      <li class="logo">
        <a style="font-size: 1.3em; color: #f2f2f2; margin-left:-2px; margin-top:-22px;" href="#">
          <i style="" class="zmdi zmdi-shield-security"></i>&nbsp;&nbsp;
          <b>Trinity</b><span style="font-weight: lighter;">Admin</span>
        </a>
        <div style="margin-top:-4px" id="menu-trigger"><i class="zmdi zmdi-menu"></i></div>
      </li>



      <!-- Settings -->
      <li style="margin-top:-7px;" class="pull-right dropdown ">
        <a href="" data-toggle="dropdown">
          <i style="color:#fff;" class="zmdi zmdi-more-vert"></i>
        </a>
        <ul class="dropdown-menu">
          <li><a data-toggle="fullscreen" href="">Toggle Fullscreen</a></li>
          <li><a data-toggle="localStorage" href="">Clear Local Storage</a></li>
          <li><a href="">Account Settings</a></li>
          <li><a href="">Other Settings</a></li>
        </ul>
      </li>


      <!-- Time -->
      <li class="pull-right hidden-xs">
        <div style="margin-top:7px;" id="time">
          <span id="t-hours"></span>
          <span id="t-min"></span>
          <span id="t-sec"></span>
        </div>
      </li>
    </ul>
  </header>

  <aside id="sidebar">

    <!--| MAIN MENU |-->
    <ul class="side-menu">
      <li class="sm-sub sms-profile toggled">
        <a class="clearfix" href="">
          <img src="static/img/avatar.png" alt="">

          <span class="f-11">
            <span class="d-block"><?php echo($_SESSION['username']);?></span>
            <small>Administrator</small>
          </span>
        </a>

        <ul style="display:block;">
          <li><a href="/logout">Logout</a></li>
        </ul>
      </li>

      <li class="sm-sub active">
        <a href="">
          <i class="zmdi zmdi zmdi-home"></i>
          <span>Home</span>
        </a>
        <ul>
          <li><a href="/admin">Dashboard</a></li>
          <li><a href="/admin/home/configuration">Configuration</a></li>
        </ul>
      </li>
      <li>
        <a href="widgets.html">
          <i class="zmdi zmdi-widgets"></i>
          <span>Widgets</span>
        </a>
      </li>
      <li class="sm-sub">
        <a href="">
          <i class="zmdi zmdi zmdi-view-list"></i>
          <span>Tables</span>
        </a>
        <ul>
          <li><a href="normal-tables.html">Normal Tables</a></li>
          <li><a href="data-tables.html">Data Tables</a></li>
        </ul>
      </li>
      <li class="sm-sub">
        <a href="">
          <i class="zmdi zmdi-collection-text"></i>
          <span>Templates <span class="label label-warning">New</span></span>
        </a>
        <ul>
          <li><a href="form-elements.html">Template editor</a></li>
          <li><a href="form-components.html">Change Template folder</a></li>
          <li><a href="form-examples.html">Create new template</a></li>
        </ul>
      </li>
    </ul>
  </aside>

  <ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Dashboard</li>
  </ol>

  <section id="content">
    <div class="container">
      <header class="page-header">
        <h3>Welcome, <?php echo($_SESSION['username']);?>.</h3>
      </header>

      <div class="row">

        <div class="col-lg-8">
          <div class="t-body tb-padding">
            <div class="row">
              <div class="col-sm-4">
               <div class="tile bg-orange">
                <div class="t-body tb-padding text-center">
                  <h1 style="color: #fff;"><?php echo($users); ?> <i class="zmdi zmdi-accounts"></i></h1>
                  <small>Users Registered</small>
                </div>
              </div>

            </div>
            <div class="col-sm-4">
             <div class="tile bg-blue">
              <div class="t-body tb-padding text-center">
                <h1 style="color: #fff;">131 <i class="zmdi zmdi-equalizer"></i></h1>
                <small>Unique visitors</small>
              </div>
            </div>

          </div>
          <div class="col-sm-4">
           <div class="tile bg-green">
            <div class="t-body tb-padding text-center">
              <h1 style="color: #fff;">4 <i class="zmdi zmdi-brush"></i></h1>
              <small>Templates availible</small>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Helper Classes -->
    <div class="tile">
 <div class="t-header th-alt bg-bluegray">
        <div class="th-title ">Admin Chat</div>
        <div class="actions dropdown">
          <a href="" data-toggle="dropdown" aria-expanded="false"><i class="zmdi zmdi-more"></i></a>

          <ul class="dropdown-menu pull-right">
            <li><a href="/admin/dashboard">Refresh</a></li>
            <li><a id="disablechat">Disable</a></li>
          </ul>
        </div>
      </div>





      <div style="min-height: 200px;height:0;overflow-y:scroll;" id="messages" class="list-group active">
        
      </div>
      <div class="msb-reply">
        <textarea id="myMessage" placeholder="What's on your mind..."></textarea>

        <button id="sendbutton"><i class="zmdi zmdi-mail-send"></i></button>
      </div>
      
    </div>


    <!-- about -->
    <div class="tile">
      <div class="t-header">
        <div class="th-title">About Trinity 3</div>
      </div>
      <div class="t-body tb-padding">
        <center>
          <p>
            <img style="width:auto;max-width:100%;height:auto;" src="static/admin/img/trinity.png"/>
          </p>
          <br />
        </center>
        <p>
          <dl class="dl-horizontal">
            <p>
              <dt class="c-black f-500">Objective</dt>
              <dd class="c-black f-500">Trinity 3 aims to offer a completely automated way of setting up a live mysql website with python easily under 5 minutes, without the need of the end user having to install third party modules! Instead, Trinity 3 automatically installs required modules via pip, and automatically creates required database tables.</dd>
            </p>
            <p>
              <dt class="c-black f-500">Credits</dt>
              <dd><small><i>If you wish to support the developers of this project, please check out the following links:</i></small></dd>
              <dd>
                <ul class="clist clist-angle">
                  <li><small><a href="griimnak.ga">Griimnak</a> (Developing Trinity)</small></li>
                  <li><small><a href="http://byrushan.com">Rushan</a> (Beautiful Admin panel theme)</small></li>
                </ul>
              </dd>
            </p>
            <p>
              <dt class="c-black f-500">Python version</dt>
              <dd class="c-black f-500"><mark>{{ pyinfo }}</mark></dd>
            </p>
            <p>
              <dt class="c-black f-500">Trinity version</dt>
              <dd class="c-black f-500"><mark>3.1r2</mark></dd>
            </p>
          </dl>
        </p>
      </div>
    </div>
  </div>

  <div class="col-lg-3">

    <!-- Headings-->
    <div class="tile bg-teal">
      <div class="t-header th-alt">
        <div class="th-title">Configuration</div>
        <div class="actions dropdown">
          <a href="" data-toggle="dropdown" aria-expanded="false"><i class="zmdi zmdi-more"></i></a>

          <ul class="dropdown-menu pull-right">
            <li><a href="/admin/dashboard">Refresh</a></li>
            <li><a href="">Re-configure</a></li>
          </ul>
        </div>
      </div>

      <div class="list-group">
        <a href="#" class="list-group-item active"><span style="float:right;" class="zmdi zmdi-chevron-down"></span> Site settings</a>
        <a href="#" class="list-group-item">Site name: <?php echo(Config::site_name);?></a>
        <a href="#" class="list-group-item">Site desc: <?php echo(Config::site_desc);?></a>
        <a href="#" class="list-group-item active"><span style="float:right;" class="zmdi zmdi-chevron-down"></span> MySQL settings</a>
        <a href="#" class="list-group-item">Logged in as: <?php echo(Config::mysql_username);?></a>
        <a href="#" class="list-group-item">Selected database: <?php echo(Config::mysql_database);?></a>
      </div>

    </div>


    <!-- Blockquotes -->
    <div class="tile bg-red">
      <div class="t-header th-alt">
        <div class="th-title">Backups</div>
        <div class="actions dropdown">
          <a href="" data-toggle="dropdown" aria-expanded="false"><i class="zmdi zmdi-more"></i></a>

          <ul class="dropdown-menu pull-right">
            <li><a href="/admin/dashboard">Refresh</a></li>
            <li><a href="">Re-configure</a></li>
          </ul>
        </div>
      </div>

      <div class="t-body tb-padding">
        eventually..
      </div>
    </div>
    <!-- End -->
  </div>
</div>
</div>
</section>



<footer id="footer">
  Trinity 3, bringing python back to the web.

  <ul class="f-menu">
    <li><a href="https://github.com/griimnak/Trinity3">Github</a></li>
    <li><a href="https://devbest.com/threads/release-trinity-3-an-advanced-fully-automated-cms-built-on-python-flask-mvc-wsgi-python.82239/">Devbest</a></li>
    <li><a href="https://griimnak.ga">Personal site</a></li>
  </ul>
</footer>

<!-- Older IE Warning Message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>   
            <![endif]-->

            <!-- Javascript Libraries -->
            <script src="static/admin/js/bootstrap.min.js"></script>

            <script src="static/admin/js/jquery.flot.js"></script>
            <script src="static/admin/js/jquery.flot.resize.js"></script>
            <script src="static/admin/js/jquery.flot.orderBars.js"></script>
            <script src="static/admin/s/curvedLines.js"></script>           
            <script src="static/admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
            <script src="static/admin/js/jquery.sparkline.min.js"></script>
            <script src="static/admin/js/jquery.easypiechart.min.js"></script>

            <script src="static/admin/js/bootstrap-growl.min.js"></script>
            <script src="static/admin/js/moment.min.js"></script>
            <script src="static/admin/js/fullcalendar.min.js"></script>

            <!-- Charts - Please read the read-me.txt inside the js folder-->
            <script src="static/admin/js/curved-line-chart.js"></script>
            <script src="static/admin/js/bar-chart.js"></script>
            <script src="static/admin/js/charts.js"></script>

            <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
            <![endif]-->

            <script src="static/admin/js/functions.js"></script>
            <script src="static/admin/js/demo.js"></script>
          </body>
          </html>