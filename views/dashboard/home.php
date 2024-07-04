<?php ob_start() ?>
<div class="container py-5 my-5 <?=(isset($_COOKIE['Admin'])) ? 'd-none' : ''?>">
    <div class="row justify-content-center py-5 my-5">
        <div class="col-10 col-sm-6">
            <fieldset class="d-flex flex-column align-items-center">
                <h2 class="poetsen-one-regular text-danger mb-5 fs-1 text-nowrap">Connexion Requise</h2>
                <form action="#" method="post" class="noto-sans">
                    <label for="password" class="pe-3 form-label">Mot de passe :</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <button type="submit" class="btn btn-success fw-bold">Valider</button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>

<div class="container mb-5 <?=(isset($_COOKIE['Admin'])) ? '' : 'd-none'?>">
    <h2 class="poetsen-one-regular text-success mb-5 text-nowrap text-center">Connexion Validée</h2>
    <h3 class="poetsen-one-regular mb-5 fs-1 text-nowrap text-center">Section à administrer :</h3>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <a href="/index.php?page=dashboard/categories" class="rounded-5 px-3 btn btn-primary poetsen-one-regular fs-2 my-3">Les Catégories</a>
        <a href="/index.php?page=dashboard/products" class="rounded-5 px-3 btn btn-primary poetsen-one-regular fs-2 my-3">Les Produits</a>
    </div>
</div>
<?php $main = ob_get_clean() ?>