<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/index.php">Project: World at War</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav mr-auto">
        <li><a href="/editor.php">(Dev build) Editor</a></li>
        <li><a href="/editor2.php">(Dev build) Editor 2</a></li>
        <li><a href="/marker_editor.php">(Dev build) Marker Editor</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if(__FILE__ === 'index.php') {
          echo '<li id="toggleSidebar"><a href="#" onclick="hideSidebar()"><span class="glyphicon glyphicon-align-right"></span>&nbsp;&nbsp;Toggle Sidebar</a></li>';
          $iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
          $iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
          $iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
          if ($iPod == false && $iPhone == false && $iPad == false) {
            echo '<li><a href="#" onclick="openFullscreen()"><span class="glyphicon glyphicon-fullscreen"></span>&nbsp;&nbsp;Full screen</a></li>';
          }
        }?>
      </ul>
    </div>
  </div>
</nav>
