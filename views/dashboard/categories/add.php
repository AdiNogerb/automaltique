<?php ob_start() ?>
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-10 col-sm-6">
            <fieldset class="d-flex flex-column align-items-center">
                <h2 class="poetsen-one-regular mb-5 fs-1 text-nowrap"><?=$title??''?></h2>
                <form action="#" method="post" class="noto-sans w-100">
                    <label for="category" class="form-label">Nom :</label>
                    <input type="text" name="category" id="category" class="form-control" title="Uniquement des lettres, traits d'union et apostrophe" placeholder="exemple: Bières pressions" pattern="<?=$this->adaptRegex(REGEXP_NAME)?>" value="<?=$name??''?>" required>
                    <p id="error" class="d-none text-danger fst-italic"></p>
                    <p class="text-danger fst-italic <?=($errorBack) ? '' : 'd-none'?>"><?=$errorBack??''?></p>
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <button id="button" type="submit" class="btn btn-success fw-bold">Valider</button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>
<?php $main = ob_get_clean() ?>