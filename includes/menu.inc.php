<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="/mvc_template">Test</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="/mvc_template/blog/index">Blog</a></li>           
        <li><a href="/mvc_template/news/index">News</a></li>
        <li><a href="/mvc_template/contact/index">Contact</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
         <?php if(!isset($_SESSION['userID'])): ?> 
          <li><a href="/mvc_template/login/index"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
         <?php else: ?>
          <li><a href="/mvc_template/blog/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
          <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>