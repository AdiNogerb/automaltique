<?php ob_start() ?>
    <div class="container noto-sans fw-bold mb-5">
        <div class="row justify-content-center align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count=1;
                    foreach ($categories as $category) {?>
                        <tr>
                            <td class="<?=($count % 2 != 0) ? 'bg-yellow' : ''?>" scope="row"><?=$category->name?></td>
                            <td class="<?=($count % 2 != 0) ? 'bg-yellow' : ''?>"><a href="index.php?page=dashboard/categories/update&id=<?=$category->id_category?>"><i class="text-primary fa-xl fa-solid fa-pen-to-square"></i></a></td>
                            <td class="<?=($count % 2 != 0) ? 'bg-yellow' : ''?>"><a href="index.php?page=dashboard/categories/delete&id=<?=$category->id_category?>"><i class="text-danger fa-xl fa-solid fa-trash"></i></a></td>
                        </tr>
                        <?php $count++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <a href="/index.php?page=dashboard/categories/add" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i> Ajouter une catégorie</a>
        </div>
    </div>
<?php $main = ob_get_clean() ?>