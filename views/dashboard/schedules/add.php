<?php ob_start() ?>
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-10 col-sm-8">
            <h2 class="poetsen-one-regular mb-5 fs-1 text-nowrap text-center"><?=$title??''?></h2>
            <fieldset class="d-flex flex-column align-items-center">
                <form action="#" method="post" class="noto-sans w-100">
                    <div class="mb-3">
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>
<?php $main = ob_get_clean() ?>