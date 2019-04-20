<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Orçamento Online</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/Assets/css/template.css" />
    <meta name="description" content="Orçamentos de produtos de todas as cidades" />
    <meta name="keywords" content="orçamento, produtos, lojas" />
    <meta name="author" content="Joel Silva e Silva" />
</head>

<body>
    <!--header-->
    <header class="topo">
        <div class="container">
            <div class="logo">
                <img src="<?php echo BASE_URL; ?>/Assets/images/logo.png" />
            </div>

            <nav class="menu-desktop">
                <ul>
                    <li><a href="">Quem somos</a></li>
                    <li><a href="<?php
                                    if (!empty($_SESSION['company_login'])) {
                                        echo BASE_URL;
                                        ?>/Company               
                                   <?php
                                } else {
                                    echo BASE_URL;
                                    ?>/Login/company
                                   <?php
                                }
                                ?>
                               ">empresa</a></li>
                    <li><a href="">Precisa de um site</a></li>
                    <li><a href="">Contato</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div>

        <div class="user-info">
            <div class="container">
                <div class="user-account"></div>
                <div class="login-user">
                    <div class="login-access">
                        <?php if (!empty($_SESSION['user_login'])) : ?>
                            <div class="login-item">
                                <div class="img-user"></div>
                            </div>
                            <div class="login-item"><a href="<?php echo BASE_URL; ?>/User/logout">Sair</a></div>
                        <?php else : ?>

                            <div class="img-user"></div>
                            <a href="<?php
                                        if (!empty($_SESSION['user_login'])) {
                                            echo BASE_URL; ?>/User               
                                    <?php
                                } else {

                                    echo BASE_URL; ?>/Login/user
                                    <?php
                                }
                                ?>
                                    "><span>Minha conta</span></a>
                        <?php endif; ?>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </header>

    <!--end-header-->

    <section class="area">
        <div class="container">
            <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        </div>
    </section>
</body>

</html>