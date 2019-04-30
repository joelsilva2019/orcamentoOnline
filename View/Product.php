
<section class="product">
    <div class="container">
        <div class="product-sigle">
            <h2><?php echo $prod_info['name']; ?></h2>
            <div class="image-prod-single" style="background-image: url('<?php echo BASE_URL; ?>/Assets/images/prods/<?php echo $prod_info['image']; ?>')"></div>
           
            <div class="product-price">
                <span>Preço : <?php echo $prod_info['price']; ?></span>
                <p>Descrição:
                    <?php echo $prod_info['description']; ?>
                </p>
            </div>

            <div class="product-info">
                <span>Detalhes do anuncio: </span>
                <p>Categoria: <?php echo $prod_info['category']; ?></p>
            </div>

            <div class="company-address">
                <span>Endereço da empresa: </span>
                <p><?php echo 'Rua: '.$prod_info['address']; ?></p>
                <p><?php echo 'Número: '.$prod_info['address_number']; ?></p>
                <p><?php echo 'Bairro: '.$prod_info['address_neigbor']; ?></p>
                <p><?php echo 'Complemento: '.$prod_info['address_complement']; ?></p>
                <p><?php echo 'Cidade: '.$prod_info['address_city']; ?></p>
            </div>
        </div>

        <div class="company-info-single">
            <h2><?php echo $prod_info['company'] ?></h2>
            <div class="image-company-single" style="background-image:url('<?php echo BASE_URL ?>/Assets/images/company/<?php echo $prod_info['image_company'] ?>')"></div>
            <span>Faça o pedido desse produto: </span>
            <span>Telefone: <?php echo $prod_info['phone']; ?></span>
            <span>E-mail: <?php echo $prod_info['email']; ?></span>
        </div>

    <div class="clear"></div>
    </div>
</section>