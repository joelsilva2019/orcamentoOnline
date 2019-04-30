<div class="prod-edit">
    <h2>Editar</h2>

    <form method="POST" enctype="multipart/form-data">

        <span>Nome</span>
        <input type="text" name="name" value="<?php echo $prod_info['name']; ?>" />
        <span>Preço</span>
        <input type="number" name="price" value="<?php echo $prod_info['price']; ?>" />
        <span>Categoria</span>
        <select name="category">
            <?php foreach ($category_info as $category) : ?>
                <option value="<?php echo $category['id']; ?>" <?php echo ($prod_info['category'] == $category['name'] ? 'selected="selected"' : '') ?> ><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <span>Unidade</span>
        <select name="unity">
            <option value="mt">METRO</option>
            <option value="gm">GRAMA</option>
            <option value="kg">QUILO</option>
        </select>
        <span>Código</span>
        <input type="number" name="code" value="<?php echo $prod_info['code']; ?>" />
        <span>Descrição</span>
        <textarea name="description">
            <?php echo $prod_info['description']; ?>
        </textarea>
        <span>Imagem</span>
        <img src="<?php echo BASE_URL ?>/Assets/images/prods/<?php echo $prod_info['image']; ?>" width="100" height="100" />

        <label>Selecionar imagem</label>
        <input type="file" name="image" />
        <input type="submit" value="Salvar" />
    </form>


</div>