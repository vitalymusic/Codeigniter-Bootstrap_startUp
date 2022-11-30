<nav class="navbar navbar-dark bg-primary">
  <div class="container-md">
    <a class="navbar-brand" href="#">RSMT pakalpojumi administrātora lapa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link <?=($active_menu==1)?"active":""?>" aria-current="page" href="<?=base_url() . "/admin"?>">Pieteikumi</a>
        <a class="nav-link <?=($active_menu==2)?"active":""?>" href="<?=base_url() . "/admin/users"?>">Lietotāji</a>
        <a class="nav-link" href="<?=base_url() . "/admin/logout"?>">Iziet no sistēmas</a>
      </div>
  </div>
</nav>