<div class="login">
    <div class="text-count">
        <h2>Minha Empresa</h2>
    </div>

    <div class="form">
        <form method="POST">
            <input type="email" name="email_company" placeholder="E-mail" required />
            <input type="password" name="password_company" placeholder="Senha" required />
            <div class="btn_sub"><input type="submit" value="Login" /></div>
        </form>

        <?php if (!empty($erro)) : ?>
            <div class="warning"><?php echo $erro; ?></div>
        <?php endif; ?>

        <div class="insert"><a href="<?php echo BASE_URL; ?>/Login/add_company">cadastre sua empresa</a></div>
    </div>
</div>