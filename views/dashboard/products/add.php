<?php ob_start() ?>
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-10 col-sm-6">
            <fieldset class="d-flex flex-column align-items-center">
                <h2 class="poetsen-one-regular mb-5 fs-1 text-nowrap"><?=$title??''?></h2>
                <form action="#" method="post" class="noto-sans w-100">
                <div class="mb-3">
                        <label for="product-name" class="pe-3 form-label">Nom :</label>
                        <input type="text" name="product-name" id="product-name" class="form-control" title="Uniquement des lettres, chiffres, points, traits d'union et apostrophes" placeholder="exemple: La mousse au chocolat du patron" pattern="<?=$this->adaptRegex(REGEX_PRODUCT_NAME)?>" required>
                        <p id="error-name" class="d-none text-danger fst-italic"></p>
                        <p class="text-danger fst-italic <?=($errorName) ? '' : 'd-none'?>"><?=$errorName??''?></p>
                    </div>
                    <div class="mb-3">
                        <label for="product-description" class="pe-3 form-label">Nom :</label>
                        <input type="text" name="product-description" id="product-description" class="form-control" title="Uniquement des lettres, chiffres, points, traits d'union, apostrophes et virgules" placeholder="exemple: Chocolat, poils, ongles, dents" pattern="<?=$this->adaptRegex(REGEX_PRODUCT_DESCRIPTION)?>" required>
                        <p id="error-description" class="d-none text-danger fst-italic"></p>
                        <p class="text-danger fst-italic <?=($errorDescription) ? '' : 'd-none'?>"><?=$errorDescription??''?></p>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <button id="button" type="submit" class="btn btn-success fw-bold" disabled>Valider</button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>
<?php $main = ob_get_clean() ?>