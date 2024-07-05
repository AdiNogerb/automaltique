<?php ob_start() ?>
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-10 col-sm-8">
            <fieldset class="d-flex flex-column align-items-center">
                <h2 class="poetsen-one-regular mb-5 fs-1 text-nowrap"><?=$title??''?></h2>
                <form action="#" method="post" class="noto-sans w-100">
                    <div class="mb-3">
                        <label for="product-name" class="pe-3 form-label">Nom* :</label>
                        <input type="text" name="product-name" id="product-name" class="form-control" title="Uniquement des lettres, chiffres, points, traits d'union et apostrophes" placeholder="exemple: ''La mousse au chocolat du patron''" pattern="<?=$this->adaptRegex(REGEX_PRODUCT_NAME)?>" required>
                        <p id="error-name" class="d-none text-danger fst-italic"></p>
                        <p class="text-danger fst-italic <?=($errorName) ? '' : 'd-none'?>"><?=$errorName??''?></p>
                    </div>
                    <div class="mb-3">
                        <label for="product-description" class="pe-3 form-label">Description :</label>
                        <input type="text" name="product-description" id="product-description" class="form-control" title="Uniquement des lettres, chiffres, points, traits d'union, apostrophes et virgules" placeholder="exemple: ''Chocolat, poils, ongles, dents''" pattern="<?=$this->adaptRegex(REGEX_PRODUCT_DESCRIPTION)?>">
                        <p id="error-description" class="d-none text-danger fst-italic"></p>
                        <p class="text-danger fst-italic <?=($errorDescription) ? '' : 'd-none'?>"><?=$errorDescription??''?></p>
                    </div>
                    <div class="mb-3">
                        <label for="product-price" class="pe-3 form-label">Prix :</label>
                        <input type="text" name="product-price" id="product-price" class="form-control" title="Uniquement des chiffres, avec point ou virgule en séparateur" placeholder="exemples: ''2''  ou  ''2.5''  ou  ''2,50''" pattern="<?=$this->adaptRegex(REGEX_PRICE)?>">
                        <p id="error-price" class="d-none text-danger fst-italic"></p>
                        <p class="text-danger fst-italic <?=($errorPrice) ? '' : 'd-none'?>"><?=$errorPrice??''?></p>
                    </div>
                    <div class="mb-3">
                        <label for="product-pint" class="pe-3 form-label">Prix 50cl :</label>
                        <input type="text" name="product-pint" id="product-pint" class="form-control" title="Uniquement des chiffres, avec point ou virgule en séparateur" placeholder="exemples: ''2''  ou  ''2.5''  ou  ''2,50''" pattern="<?=$this->adaptRegex(REGEX_PRICE)?>">
                        <p id="error-pint" class="d-none text-danger fst-italic"></p>
                        <p class="text-danger fst-italic <?=($errorPint) ? '' : 'd-none'?>"><?=$errorPint??''?></p>
                    </div>
                    <div class="mb-3">
                        <label for="product-happy" class="pe-3 form-label">Prix Happy :</label>
                        <input type="text" name="product-happy" id="product-happy" class="form-control" title="Uniquement des chiffres, avec point ou virgule en séparateur" placeholder="exemples: ''2''  ou  ''2.5''  ou  ''2,50''" pattern="<?=$this->adaptRegex(REGEX_PRICE)?>">
                        <p id="error-happy" class="d-none text-danger fst-italic"></p>
                        <p class="text-danger fst-italic <?=($errorHappy) ? '' : 'd-none'?>"><?=$errorHappy??''?></p>
                    </div>
                    <div class="mb-3">
                        <label for="product-bottle" class="pe-3 form-label">Prix Bouteille :</label>
                        <input type="text" name="product-bottle" id="product-bottle" class="form-control" title="Uniquement des chiffres, avec point ou virgule en séparateur" placeholder="exemples: ''2''  ou  ''2.5''  ou  ''2,50''" pattern="<?=$this->adaptRegex(REGEX_PRICE)?>">
                        <p id="error-bottle" class="d-none text-danger fst-italic"></p>
                        <p class="text-danger fst-italic <?=($errorBottle) ? '' : 'd-none'?>"><?=$errorBottle??''?></p>
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