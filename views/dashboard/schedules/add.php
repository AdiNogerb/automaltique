<?php ob_start() ?>
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-10 col-sm-8">
            <h2 class="poetsen-one-regular mb-5 fs-1 text-nowrap text-center"><?=$title??''?></h2>
            <fieldset class="d-flex flex-column align-items-center">
                <form action="#" method="post" class="noto-sans w-100">
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="opened" class="form-label">Ouverture :</label>
                            <input type="number" name="opened" id="opened" class="form-control" max="23" min="0" value="<?=$opened??null?>">
                        </div>
                        <div class="col-6">
                            <label for="closed" class="form-label">Fermeture :</label>
                            <input type="number" name="closed" id="closed" class="form-control" max="23" min="0" value="<?=$closed??null?>">
                        </div>
                        <p id="error-open" class="d-none text-danger fst-italic"></p>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="happy_start" class="form-label">Début Happy :</label>
                            <input type="number" name="happy_start" id="happy_start" class="form-control" max="23" min="0" value="<?=$happy_start??null?>">
                        </div>
                        <div class="col-6">
                            <label for="happy_end" class="form-label">Fin Happy :</label>
                            <input type="number" name="happy_end" id="happy_end" class="form-control" max="23" min="0" value="<?=$happy_end??null?>">
                        </div>
                        <p id="error-happy" class="d-none text-danger fst-italic"></p>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <p class="text-danger fst-italic <?=(isset($errorBack)) ? '' : 'd-none'?>"><?=$errorBack??''?></p>
                        <button id="button" type="submit" class="btn btn-success fw-bold">Valider</button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>
<?php $main = ob_get_clean() ?>