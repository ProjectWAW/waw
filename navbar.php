<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
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
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
        <?php if(isset($_SESSION['username']) !== true) { echo '
        <li><a href="/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
        }?>
        <?php if(isset($_SESSION['username']) == true) { echo '
        <li><a href="/server/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>';
        }?>
      </ul>
    </div>
  </div>
</nav>