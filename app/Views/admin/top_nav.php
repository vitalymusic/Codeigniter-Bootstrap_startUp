<nav class="navbar navbar-dark bg-danger">
  <div class="container-md">
    <a class="navbar-brand" href="#">RSMT pakalpojumi administrātora lapa</a>
    <?php if($active_menu):?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">    
        <a class="nav-link <?=($active_menu==1)?"active":""?>" aria-current="page" href="<?=base_url() . "/admin"?>">Pieteikumi</a>
        <?php
      if($_SESSION["admin"]): ?>
        <a class="nav-link <?=($active_menu==2)?"active":""?>" href="<?=base_url() . "/admin/users"?>">Meistari</a>
        <a class="nav-link <?=($active_menu==3)?"active":""?>" href="<?=base_url() . "/admin/services"?>">Pakalpojumi</a>
        <?php endif; ?>
        <a class="nav-link" href="<?=base_url() . "/logout"?>">Iziet no sistēmas</a>
      </div>
      <?php endif;?>
  </div>
</nav>