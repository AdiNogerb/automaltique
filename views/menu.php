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
                    <?php
                    foreach ($products as $product) {
                        if ($product->id_category === $category->id_category) {?>
                            <div class="container mt-5">
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-md-center justify-content-lg-end">
                                        <p class="poetsen-one-regular text-blue fs-5 mb-0"><?=$product->name?></p>
                                    </div>
                                    <div class="col-6 d-flex flex-column align-items-end align-items-md-center align-items-lg-start">
                                        <?php
                                            if (!empty($product->price)) {
                                                $price = $product->price;
                                                $price = str_replace('.', '€', $price);
                                                $price = str_replace('00', '', $price)?>
                                                <p class="px-3 rounded-5 poetsen-one-regular mt-1"><?=$price?></p>
                                            <?php }
                                            if (!empty($product->price_pint)) {
                                                $pricePint = $product->price_pint;
                                                $pricePint = str_replace('.', '€', $pricePint);
                                                $pricePint = str_replace('00', '', $pricePint)?>
                                                <p class="px-3 rounded-5 poetsen-one-regular"><?=$pricePint?> / 50cl</p>
                                            <?php }
                                            if (!empty($product->price_happy)) {
                                                $priceHappy = $product->price_happy;
                                                $priceHappy = str_replace('.', '€', $priceHappy);
                                                $priceHappy = str_replace('00', '', $priceHappy)?>
                                                <p class="px-3 rounded-5 poetsen-one-regular"><?=$priceHappy?> / Happy</p>
                                            <?php }
                                            if (!empty($product->price_bottle)) {
                                                $priceBottle = $product->price_bottle;
                                                $priceBottle = str_replace('.', '€', $priceBottle);
                                                $priceBottle = str_replace('00', '', $priceBottle)?>
                                                <p class="px-3 rounded-5 poetsen-one-regular"><?=$priceBottle?> / Bouteille</p>
                                            <?php }
                                        ?>
                                    </div>
                                    <?php
                                        if (!empty($product->description)) {?>
                                        <div class="col-12">
                                            <p class="fst-italic text-center"><?=$product->description?></p>
                                        </div>
                                        <?php }
                                    ?>
                                </div>
                            </div>
                        <?php }
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php }
    ?>
</div>
<?php $main = ob_get_clean() ?>