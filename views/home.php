<?php ob_start() ?>
<!-- START FIRST PART : CAROUSEL + BUTTON SHOW MENU -->
<div class="container">
    <div class="row justify-content-center pt-lg-5">
        <!-- START CAROUSEL -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <!-- START CAROUSEL BUTTONS -->
            <div class="carousel-indicators">
                <?php
                $count = 1;
                foreach ($articles as $article) {?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$count-1?>" class="<?=($count === 1) ? 'active' : ''?> bg-black" aria-current="true" aria-label="Slide <?=$count?>"></button>
                    <?php $count++;
                }
                ?>
            </div>
            <!-- END CAROUSEL BUTTONS -->

            <!-- START CAROUSEL CONTENT -->
            <div class="carousel-inner">
                <?php
                $count = 1;
                foreach ($articles as $article) {
                    if ($count % 2 !== 0) {?>
                        <div class="carousel-item <?=($count === 1) ? 'active' : ''?>" data-bs-interval="5000">
                            <div class="my-5">
                                <div class="row mt-5 border-3 border-top border-bottom justify-content-center py-3 carousel-block">
                                    <div class="col-10 col-lg-4 d-flex justify-content-center align-items-center">
                                        <img class="img-fluid w-100 rounded-5" src="/public/assets/img/<?=$article->picture?>" alt="">
                                    </div>
                                    <div class="col-12 col-lg-8">
                                        <h2 class="poetsen-one-regular text-center text-blue sub-title mb-5 mt-3"><?=$article->title?></h2>
                                        <p class="noto-sans text-center text ps-lg-5"><?=$article->content?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else {?>
                        <div class="carousel-item" data-bs-interval="5000">
                            <div class="my-5">
                                <div class="row mt-5 border-3 border-top border-bottom justify-content-center py-3 carousel-block">
                                    <div class="col-12 col-lg-8">
                                        <h2 class="poetsen-one-regular text-center text-blue sub-title mb-5 mt-3"><?=$article->title?></h2>
                                        <p class="noto-sans text-center text ps-lg-5"><?=$article->content?></p>
                                    </div>
                                    <div class="col-10 col-lg-4 d-flex justify-content-center align-items-center">
                                        <img class="img-fluid w-100 rounded-5" src="/public/assets/img/<?=$article->picture?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    $count++;
                }
                ?>
            </div>
            <!-- END CAROUSEL CONTENT -->
        </div>
        <!-- END CAROUSEL -->    

        <!-- BUTTON SHOW MENU -->
        <div class="col-12 d-flex justify-content-center align-items-center my-5">
            <a href="/index.php?page=menu"><button type="button" class="btn btn-primary poetsen-one-regular fs-2 px-5 rounded-5">Voir la Carte</button></a>
        </div>
        <!-- BUTTON SHOW MENU -->
    </div>
</div>
<!-- END FIRST PART : CAROUSEL + BUTTON SHOW MENU -->

<!-- START MAP -->
<div class="mt-5 border-3 border-top border-bottom py-3 mb-5">
    <h2 class="poetsen-one-regular text-center text-blue sub-title mb-5 mt-3">Où sommes-nous</h2>
    <div id="map"></div>
</div>
<!-- END MAP -->

<div class="container schedules">
    <div class="row my-5 justify-content-center py-5 flex-column-reverse flex-lg-row">
        <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-center">
            <h2 class="poetsen-one-regular text-center text-blue sub-title mb-5">Horaires</h2>
            <table class="noto-sans">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lundi</td>
                        <td colspan="2">Fermé</td>
                    </tr>
                    <tr>
                        <td>Mardi</td>
                        <td>17h</td>
                        <td>01h</td>
                    </tr>
                    <tr>
                        <td>Mercredi</td>
                        <td>17h</td>
                        <td>01h</td>
                    </tr>
                    <tr>
                        <td>Jeudi</td>
                        <td>17h</td>
                        <td>02h</td>
                    </tr>
                    <tr>
                        <td>Vendredi</td>
                        <td>17h</td>
                        <td>02h</td>
                    </tr>
                    <tr>
                        <td>Samedi</td>
                        <td>17h</td>
                        <td>02h</td>
                    </tr>
                    <tr>
                        <td>Dimanche</td>
                        <td>18h</td>
                        <td>00h</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex">
                <p class="pb-0 poetsen-one-regular fs-2 me-3">Actuellement</p>
                <p class="pb-0 poetsen-one-regular fs-1 <?=$style?>"><?=$message?></p>
            </div>
            <img class="w-50" src="<?=$image?>" alt="">
        </div>
    </div>
</div>
<?php $main = ob_get_clean() ?>