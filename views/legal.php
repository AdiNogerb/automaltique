<?php ob_start() ?>
<div class="container">
    <div class="row justify-content-center">
        <h1>Identification du site :</h1>
        <hr>
        <div class="my-3">
            <p>Propriétaire : XR BAR&CO</p>
            <ul>
                <li>Adresse : 4 Place PARMENTIER, 80000 AMIENS</li>
                <li>Email : lautomaltique@gmail.com</li>
            </ul>
            
            <p>Directeur de la publication : Xavier Renolleau</p>
        </div>
        <hr>
        <div class="my-3">
            <p>Hébergeur :</p>
            <ul>
                <li>Nom de l'hébergeur : OVH</li>
                <li>Adresse de l'hébergeur : 2 rue Kellermann, 59100 Roubaix, France</li>
                <li>Téléphone de l'hébergeur : +33 9 72 10 10 07</li>
            </ul>
        </div>
        <hr>
        <div class="my-3">
            <p>Données personnelles : Ce site ne collecte pas de données personnelles.</p>
            <p>Utilisation des cookies : Ce site n'utilise pas de cookies.</p>
        </div>
        <hr>
        <div class="my-3">
            <p>Propriété intellectuelle :</p>
            <p>Sauf mention contraire, les contenus de ce site sont la propriété de XR BAR&CO. Toute reproduction, même partielle, est interdite sans autorisation préalable.</p>
            <p>Certaines images utilisées sur ce site proviennent de Pixabay et sont sous licence Creative Commons Zero (CC0).</p>
        </div>
        <hr>
        <p>Mention de copyright :</p>
        <p>&copy; <?=$year?> XR BAR&CO. Tous droits réservés.</p>
    </div>
</div>
<?php $main = ob_get_clean() ?>