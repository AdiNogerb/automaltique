<?php ob_start() ?>
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-10 col-sm-8">
            <h2 class="poetsen-one-regular mb-5 fs-1 text-nowrap text-center"><?=$title??''?></h2>
            <fieldset class="d-flex flex-column align-items-center">
                <form action="#" method="post" class="noto-sans w-100" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="pe-3 form-label">Titre :</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?=$validTitle??''?>" title="Uniquement des lettres, chiffres, points, et les caractères - / . ( ) °" placeholder="exemple: ''Blind-Test Jul le 30/02/25''" pattern="<?=$this->adaptRegex(REGEX_PRODUCT_NAME)?>" <?=(isset($update)) ? '' : 'required'?> <?=(isset($disabled)) ? 'disabled' : ''?>>
                        <p id="error-title" class="d-none text-danger fst-italic">Uniquement des lettres, chiffres et les caractères - / . ( ) °</p>
                        <p class="text-danger fst-italic <?=(isset($errorTitle)) ? '' : 'd-none'?>"><?=$errorTitle??''?></p>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="pe-3 form-label">Contenu :</label>
                        <textarea name="content" id="content" class="form-control" title="1000 caractères max" placeholder="1000 caractères max" maxlength="1000" minlength="5" <?=(isset($update)) ? '' : 'required'?> <?=(isset($disabled)) ? 'disabled' : ''?>><?=$validContent??''?></textarea>
                        <p id="error-content" class="d-none text-danger fst-italic">Entre 5 et 1000 caractères</p>
                        <p class="text-danger fst-italic <?=(isset($errorContent)) ? '' : 'd-none'?>"><?=$errorContent??''?></p>
                    </div>
                    <div class="mb-3 <?=(isset($update)) ? '' : 'd-none'?>">
                        <p class="fw-bold">Image actuelle :</p>
                        <img id="actual-picture" src="/public/assets/img/<?=$articleSelected->picture?>" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="picture" class="pe-3 form-label"><?=(isset($update)) ? 'Image (si image actuelle à modifier) :' : 'Image :'?></label>
                        <input type="file" name="picture" id="picture" class="form-control" accept="image/png, image/jpeg" title="Image au format jpeg ou png" <?=(isset($update)) ? '' : 'required'?> <?=(isset($disabled)) ? 'disabled' : ''?>>
                        <p id="error-picture" class="d-none text-danger fst-italic">Uniquement des images format jpeg ou png. 2Mo maximum.</p>
                        <p class="text-danger fst-italic <?=(isset($errorPicture)) ? '' : 'd-none'?>"><?=$errorPicture??''?></p>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-3 <?=(isset($disabled)) ? 'd-none' : ''?>">
                        <p class="text-danger fst-italic <?=(isset($errorBack)) ? '' : 'd-none'?>"><?=$errorBack??''?></p>
                        <button id="button" type="submit" class="btn btn-success fw-bold">Valider</button>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-3 <?=(isset($disabled)) ? '' : 'd-none'?>">
                        <p class="text-danger fst-italic <?=(isset($errorBack)) ? '' : 'd-none'?>"><?=$errorBack??''?></p>
                        <button type="submit" class="btn btn-success fw-bold">Valider</button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>
<?php $main = ob_get_clean() ?>