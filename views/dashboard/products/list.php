<?php ob_start() ?>
<div class="accordion" id="accordionExample">
    <?php
    foreach ($categories as $category) {?>
        <div class="accordion-item py-3 border-0">
            <h2 class="accordion-header text-center">
            <button class="target-button collapsed rounded-5 px-3 btn btn-primary poetsen-one-regular fs-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$category->id_category?>" aria-expanded="false" aria-controls="collapse<?=$category->id_category?>">
                <?=$category->name?>
            </button>
            </h2>
            <div id="collapse<?=$category->id_category?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body noto-sans">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Description</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Prix/50cl</th>
                                <th scope="col">Prix/happy</th>
                                <th scope="col">Prix/bouteille</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count=1;
                            foreach ($products as $product) {
                                if ($product->id_category === $category->id_category) {?>
                                    <tr>
                                        <td class="<?=($count % 2 != 0) ? 'bg-yellow' : ''?>" scope="row"><?=$product->name?></td>
                                        <td class="<?=($count % 2 != 0) ? 'bg-yellow' : ''?>" scope="row"><?=$product->description?></td>
                                        <td class="<?=($count % 2 != 0) ? 'bg-yellow' : ''?>" scope="row"><?=$product->price?></td>
                                        <td class="<?=($count % 2 != 0) ? 'bg-yellow' : ''?>" scope="row"><?=$product->price_pint?></td>
                                        <td class="<?=($count % 2 != 0) ? 'bg-yellow' : ''?>" scope="row"><?=$product->price_happy?></td>
                                        <td class="<?=($count % 2 != 0) ? 'bg-yellow' : ''?>" scope="row"><?=$product->price_bottle?></td>
                                        <td class="<?=($count % 2 != 0) ? 'bg-yellow' : ''?>"><a href="index.php?page=dashboard/products/update&idCategory=<?=$category->id_category?>&idProduct=<?=$product->id_product?>"><i class="text-primary fa-xl fa-solid fa-pen-to-square"></i></a></td>
                                        <td class="<?=($count % 2 != 0) ? 'bg-yellow' : ''?>"><a href="index.php?page=dashboard/products/delete&idCategory=<?=$category->id_category?>&idProduct=<?=$product->id_product?>"><i class="text-danger fa-xl fa-solid fa-trash"></i></a></td>
                                    </tr>
                                    <?php $count++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="/index.php?page=dashboard/products?id=<?=$category->id_category?>" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i> Ajouter une catégorie</a>
                </div>
            </div>
        </div>
    <?php }
    ?>
</div>
<?php $main = ob_get_clean() ?>