<div class="login">
    <div class="text-count">
        <h2>Criar conta</h2>
    </div>

    <div class="form">
        <form method="POST">
            <input type="text" name="name" placeholder="Nome" required />
            <input type="email" name="email" placeholder="E-mail" required />
            <input type="password" name="password" placeholder="Senha" required />
            <div class="btn_sub"><input type="submit" value="Criar conta" /></div>
        </form>
        <?php if (!empty($erro)) : ?>
            <div class="warning"><?php echo $erro; ?></div>
        <?php endif; ?>
    </div>
</div>