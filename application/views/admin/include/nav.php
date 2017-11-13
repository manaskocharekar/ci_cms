<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= base_url(); ?>">=><?= 'CMS'; ?> </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?= base_url('/Admin/Dashboard'); ?>">Home</a></li>
        <li class=""><a href="<?= base_url('/Admin/Page'); ?>">Pages</a></li>
        <li class=""><a href="<?= base_url('/Admin/Post'); ?>">Posts</a></li>
        <li class=""><a href="<?= base_url('/Admin/User'); ?>">Users</a></li>
        <li class=""><a href="<?= base_url('/Admin/Page/order'); ?>">Order Pages</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
      <?php if($this->session->userdata()){ ?>
        <li><a href="#"><span class="label label-success" style="font-size:small; color: white; font-size: 16px; background-color: #1b5e20"><?=  $this->session->userdata('name'); ?></span></a></li>
      <li><a href="#"><span class="glyphicon glyphicon-cog" style= "font-size:24px;" ></span></a></li> <?php } ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="glyphicon glyphicon-user" style= "font-size:24px;"></span><b class="caret"></b></a>
          <ul class="dropdown-menu">
            
            <li><?= anchor(base_url(), '<span class="glyphicon glyphicon-off" style="margin-right: 4%;"></span>Home') ?></li>
            <li class="divider"></li>
            <li><?= anchor(base_url(), '<span class="glyphicon glyphicon-off" style="margin-right: 4%;"></span>Log out') ?></li>
            </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


