<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->title; ?></title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="public/assets/favicon.ico" />

    <!--========== BOX ICONS ==========-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/main.css" rel="stylesheet" />

    <!-- W3 -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap -->

    <link rel="stylesheet" href="<?= URL; ?>public/MDB/css/mdb.min.css" />
    <link rel="stylesheet" href="<?= URL; ?>public/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="<?= URL; ?>public/css/main.css" />

</head>

<body>
    <!--========== HEADER ==========-->
    <header class="header" style="background: #005BAA;">
        <div class="header__container">
            <a href="#" class="header__logo">Logo</a>

            <a href="#" class="header__logo">Bruno Seisdedos</a>

            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
        </div>
    </header>

    <!--========== NAV ==========-->
    <div class="nav" id="navbar">
        <nav class="nav__container">
            <div>
                <a href="#" class="nav__link nav__logo">
                    <i class='bx bx-home nav__icon'></i>
                    <span class="nav__logo-name">HOME</span>
                </a>

                <div class="nav__list">
                    <div class="nav__items">
                        <h3 class="nav__subtitle">Profile</h3>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">Profile</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="<?=URL;?>usuario/index" class="nav__dropdown-item">Minha conta</a>
                                    <?php if (isset($_SESSION['logado'])) { if ($_SESSION['nivel'] == 1){?>
                                    <a href="<?=URL;?>cadastro/index" class="nav__dropdown-item">Cadastrar usuario</a>
                                    <?php }} ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nav__items">
                        <h3 class="nav__subtitle">Menu</h3>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-bell nav__icon'></i>
                                <span class="nav__name">Manutenção</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>
                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                <?php if (isset($_SESSION['logado'])) { if ($_SESSION['nivel'] <= 2){?>
                                    <a href="<?=URL;?>tipolancamento/index" class="nav__dropdown-item">Tipo Lancamentos</a>
                                <?php }} ?>
                                    <a href="<?=URL;?>lancamentos/index" class="nav__dropdown-item">Lancamentos</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <a href="#" class="nav__link nav__logout">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>


</body>