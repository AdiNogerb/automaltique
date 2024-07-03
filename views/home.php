<?php ob_start() ?>
<!-- START FIRST PART : CAROUSEL + BUTTON SHOW MENU -->
<div class="container">
    <div class="row justify-content-center pt-lg-5">
        <!-- START CAROUSEL -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <!-- START CAROUSEL BUTTONS -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active bg-black" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="bg-black" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="bg-black" aria-label="Slide 3"></button>
            </div>
            <!-- END CAROUSEL BUTTONS -->
    
            <!-- START CAROUSEL CONTENT -->
            <div class="carousel-inner">
                <!-- START FIRST CONTENT -->
                <div class="carousel-item active" data-bs-interval="5000">
                    <div class="my-5">
                        <div class="row mt-5 border-3 border-top border-bottom justify-content-center py-3 carousel-block">
                            <div class="col-10 col-lg-4 d-flex justify-content-center align-items-center">
                                <img class="img-fluid w-100 rounded-5" src="/public/assets/img/beers.jpg" alt="">
                            </div>
                            <div class="col-12 col-lg-8">
                                <h2 class="poetsen-one-regular text-center text-blue sub-title mb-5 mt-3">Le Concept</h2>
                                <p class="noto-sans text-center text ps-lg-5">Plongez dans une expérience unique où la convivialité et la liberté sont à l'honneur. Avec nos tireuses en libre service, explorez une sélection variée de bières artisanales, locales et internationales, à votre rythme et selon vos envies. Fini les attentes interminables au comptoir. Ici, vous devenez le maître de votre dégustation. Que vous soyez novice ou connaisseur, <strong>L'Automaltique</strong> vous offre l'opportunité de découvrir des saveurs nouvelles et surprenantes, le tout dans une ambiance chaleureuse et décontractée. Venez savourer ce que la bière a de meilleur à offrir, directement à la source !</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END FIRST CONTENT -->
    
                <!-- START SECOND CONTENT -->
                <div class="carousel-item" data-bs-interval="5000">
                    <div class="my-5">
                        <div class="row mt-5 border-3 border-top border-bottom justify-content-center py-3 carousel-block">
                            <div class="col-12 col-lg-8">
                                <h2 class="poetsen-one-regular text-center text-blue sub-title mb-5 mt-3">Les Blind Test</h2>
                                <p class="noto-sans text-center text ps-lg-5">Découvrez les soirées <strong>Blind Test</strong> de <strong>L'Automaltique</strong>, où musique et divertissement créent une ambiance électrisante! Chaque semaine, formez votre équipe et participez à une compétition musicale palpitante. Que vous soyez mélomane ou amateur, nos <strong>Blind Tests</strong> sont parfaits pour un moment inoubliable entre amis. Avec des thèmes variés et des playlists sélectionnées, préparez-vous à chanter, danser et rire. L'esprit d'équipe et le plaisir de jouer ensemble rendent chaque soirée unique. Ne manquez pas cette expérience festive qui fait de <strong>L'Automaltique</strong> un lieu incontournable!</p>                    </div>
                            <div class="col-10 col-lg-4 d-flex justify-content-center align-items-center">
                                <img class="img-fluid w-100 rounded-5" src="/public/assets/img/blindtest.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SECOND CONTENT -->
    
                <!-- START THIRD CONTENT -->
                <div class="carousel-item" data-bs-interval="5000">
                    <div class="my-5">
                        <div class="row mt-5 border-3 border-top border-bottom justify-content-center py-3 carousel-block">
                            <div class="col-10 col-lg-4 d-flex justify-content-center align-items-center">
                                <img class="img-fluid w-100 rounded-5" src="/public/assets/img/room.jpg" alt="">
                            </div>
                            <div class="col-12 col-lg-8">
                                <h2 class="poetsen-one-regular text-center text-blue sub-title mb-5 mt-3">Salle Privatisable</h2>
                                <p class="noto-sans text-center text ps-lg-5">Découvrez notre salle privatisable à l'étage, l'endroit idéal pour vos événements privés. Équipée d'un jeu de fléchettes et de trois tireuses à bière, cette salle offre un cadre parfait pour des moments de convivialité et de divertissement. Que ce soit pour une fête d'anniversaire, une soirée entre amis ou une réunion d'affaires, profitez d'un espace exclusif où vous pouvez déguster nos bières artisanales tout en vous amusant. L'ambiance chaleureuse et le service personnalisé de <strong>L'Automaltique</strong> garantissent une expérience mémorable. Réservez dès maintenant pour une soirée inoubliable!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END THIRD CONTENT -->
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