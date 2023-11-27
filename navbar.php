
<nav class="navbar navbar-expand-lg bg-primary">
    <a class="navbar-brand text-dark" href="#">OLX Seminovos</a>

    <!-- Botão de menu (mostra ou oculta o menu em telas pequenas) -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Formulário de Pesquisa -->
    <div class="collapse navbar-collapse navbar-primary bg-primary" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </li>

            <li class="nav-item">
                <a class="btn btn-secondary ml-2" href="cadastrar_anuncio.php">Anunciar</a>
                <a class="btn btn-secondary ml-2" href="meus_anuncios.php">Meus Anúncios</a>
                <a class="btn btn-secondary ml-2" href="cadastrar_anuncio.php">Informações</a>
            </li>
        </ul>
    </div>
</nav>