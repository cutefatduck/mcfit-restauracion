<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="?controller=index">
            <div class="logo"></div>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="?controller=index">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?controller=producto&action=carta">Carta</a>
              </li>
            </ul>
            <form class="d-flex nav-form-search" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
                <?php session_start();?>
                <?php if(isset($_SESSION['user'])){?>
                  <a class="nav-button" href="?controller=user&action=userData"><?=$_SESSION['user']->getUsuario()?></a>
                  <a class="nav-button" href="?controller=carrito&action=compra">Carrito</a>
                <?php }elseif(isset($_SESSION['admin'])){?>
                  <a class="nav-button" href="?controller=admin&action=userDataAdmin"><?=$_SESSION['admin']->getUsuario()?></a>
                <?php }else{?>
                  <a class="nav-button" href="?controller=user&action=login">Login</a>
                  <a class="nav-button" href="?controller=carrito&action=compra">Carrito</a>
                <?php } ?>
            </form>
          </div>
        </div>
      </nav>
</header>