
<section class="filters">
    <div class="container">
        <div class="filter-prods">
            <form method="POST" name="form-prod">

                <div class="filter">
                    <select name="category" onchange="document.forms['form-prod'].submit();">
                        <option value="">Todas as categorias</option>
                        <?php foreach ($get_category as $category): ?>
                            <option id="select" value="<?php echo $category['id']; ?>"
                            <?php
                            if (!empty($_POST['category'])) {
                                if ($category['id'] == $_POST['category']) {
                                    echo 'selected="selected"';
                                }
                            }
                            ?>
                                    ><?php echo $category['name']; ?></option>
                                <?php endforeach; ?>
                    </select>
                </div>
            </form>

            <div class="filter">
                <input type="text" name="search" placeholder="Buscar Produtos.."/>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</section>

<h1>Produtos</h1>

<div class="prods">
    <div class="container">

        <?php foreach ($get_products as $prod): ?>

            <div class="prod-item">
                <div class="company-info">
                    <h3>Empresa</h3>
                    <span><?php echo $prod['company']; ?></span>
                </div>

                <div class="prod-info">  
                    <div class="img-info"><img src="<?php echo BASE_URL ?>/Assets/images/prods/<?php echo $prod['image']; ?>" /></div>
                    <div class="text-info">
                        <h3><?php echo $prod['name']; ?></h3>
                        <span>R$ <?php echo number_format($prod['price'], 2, ',', '.'); ?></span>
                        <p><?php echo $prod['description']; ?></p>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>

        <?php endforeach; ?>
        <div class="clear"></div>
    </div>
</div>