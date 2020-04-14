<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
      <?php if(isset($_SESSION['username']) !== true) { echo '
      <li><a href="/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
      }?>
      <?php if(isset($_SESSION['username']) == true) { echo '
      <li><a href="/server/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>';
      }?>
    </ul>
  </div>
</nav>