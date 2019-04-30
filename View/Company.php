<div class="company">
    <div class="container">
        <div class="topo-company">
            <h1><?php echo $company_info['name']; ?></h1>
            <a href="<?php echo BASE_URL ?>/Company/logOut">Sair</a>
            <a href="" class="button-prod" id="config">Configurações</a>
            <a href="" class="button-prod" id="view-prods">Ver produtos</a>
            <a href="" class="button-prod" id="add-prod">Adicionar</a>
            <div class="clear"></div>
        </div>

        <div class="company-area">

            <div class="config-wraper" style="display:none;">
                <h2>Configurações</h2>
                <div class="data-count">
                    <h4>Dados da conta:</h4>

                    <form method="POST">
                        <span>Nome:</span>
                        <div><input class="input-config" type="text" name="name" value="<?php echo $company_info['name']; ?>" /></div>
                        <span>Email: </span>
                        <div><input class="input-config" type="email" name="email" value="<?php echo $company_info['email']; ?>" /></div>
                        <span>Senha: </span>
                        <div><input class="input-config" type="password" name="password" placeholder="alterar senha.." /></div>
                        <div><input class="btn-config" type="submit" value="Alterar dados" /></div>
                    </form>
                </div>
                <div class="clear"></div>
            </div>

            <div class="add-prod-area" style="display:none;">
                <form method="POST" enctype="multipart/form-data">
                    <h2>Adicionar Produtos</h2>
                    <span>Nome: </span>
                    <div><input type="text" name="name_prod" /></div>
                    <span>Categoria</span>
                    <select name="category_prod">
                        <?php foreach ($category_info as $category) : ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span>Preço</span>
                    <div><input type="number" name="price_prod" /></div>
                    <span>Unidade</span>
                    <select name="unity_prod">
                        <option value="mt">METRO</option>
                        <option value="gm">GRAMA</option>
                        <option value="kg">QUILO</option>
                    </select>
                    <span>Codigo</span>
                    <input type="number" name="code_prod" />
                    <span>Descrição</span>
                    <textarea name="description_prod">

                </textarea>
                    <label for="image_prod">Selecionar imagem</label>
                    <input type="file" name="image_prod" id="image_prod" style="display:none;" />

                    <div class="btn_sub"><input type="submit" value="Adicionar" /></div>
                </form>
            </div>

            <div class="prods-company">
                <h2>Produtos Cadastrados</h2>

                <table class="table-prod">
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Edições</th>
                    </tr>

                    <?php foreach($company_prods as $prod):  ?>
                        <tr>
                            <td><?php echo $prod['name']; ?></td>
                            <td><?php echo number_format($prod['price'], 2, ',','.'); ?></td>
                            <td width="180"><a href="<?php echo BASE_URL; ?>/Products/edit/<?php echo $prod['id']; ?>">Editar</a> - <a href="<?php echo BASE_URL; ?>/Products/delete/<?php echo $prod['id']; ?>">Excluir</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>