<div class="login">
    <div class="text-count"><h2>Minha conta</h2></div>
    
    <div class="form">
        <form method="POST">
            <input type="email" name="email" placeholder="E-mail" required/>
            <input type="password" name="password" placeholder="Senha" required/>
            <div class="btn_sub"><input type="submit" value="Login"/></div>
        </form>
        
        <div class="warning"><?php if(!empty($erro)){ echo $erro;} ?></div>
        <div class="insert"><a href="<?php echo BASE_URL; ?>/Login/add_user">cadastre-se aqui</a></div>
    </div>
</div>