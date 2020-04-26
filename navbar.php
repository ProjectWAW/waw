<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li <?php if($_SERVER['PHP_SELF']=='/index.php'){echo 'class=active';}?>><a href="/index.php">Home</a></li>
        <li <?php if($_SERVER['PHP_SELF']=='/map.php'){echo 'class=active';}?>><a href="/map.php">Map</a></li>
        <li <?php if($_SERVER['PHP_SELF']=='/editor.php'){echo 'class=active';}?>><a href="/editor.php">Editor</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if($_SERVER['PHP_SELF']!=='/map.php'){
          echo '<li><a href="/settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>';
          if(isset($_SESSION['username']) !== true) { echo '
            <li><a href="/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
          }
          if(isset($_SESSION['username']) == true) { echo '
            <li><a href="/server/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>';
          }
        } else {
          echo '<li><a href="#" onclick="hideSidebar()"><span class="glyphicon glyphicon-align-right"></span> Toggle Sidebar</a></li>';
          $iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
          $iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
          $iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
          if ($iPod == false && $iPhone == false && $iPad == false) { echo '<li><a href="#" onclick="openFullscreen()"><span class="glyphicon glyphicon-fullscreen"></span> Full screen</a></li>'; }
        }?>
    </ul>
  </div>
</nav>