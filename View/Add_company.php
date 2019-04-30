<div class="add_company">
    <div class="container">
        <div class="form">

            <fieldset>
                <legend>Cadastrar Empresa</legend>

                <?php if(!empty($erro)): ?>
                  <div class="warning"><?php echo $erro; ?></div>
                <?php endif ?>

                <form method="POST" enctype="multipart/form-data">

                    <input type="text" name="name" placeholder="Nome da Empresa*" required />
                    <input type="email" name="email" placeholder="E-mail da empresa*" required />
                    <input type="password" name="password" placeholder="senha*" required />
                    <div class="form-wrapper w60"><input type="text" class="input_small" name="address" placeholder="Rua*" required /></div>
                    <div class="form-wrapper w40"><input type="number" class="input_small" name="address_number" placeholder="Número*" required /></div>
                    <input type="text" name="address_complement" placeholder="Complemento (opcional)" />
                    <input type="text" name="phone" placeholder="Telefone ()*" required />
                    <input type="text" name="address_neigbor" placeholder="Bairro*" required />
                    <input type="text" name="address_city" placeholder="Cidade*" required />
                    <div class="img-label"><label for="image">Selecionar Imagem</label></div>
                    <input type="file" name="image" id="image" style="display:none;" />
                    <div class="btn_sub"><input type="submit" value="Criar conta" /></div>

                </form>

            </fieldset>

        </div>

    </div>
</div>