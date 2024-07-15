<?php ob_start() ?>
<div class="container">
    <div class="row justify-content-center">
        <h1>Identification du site :</h1>
        
        <p>Propriétaire : [Nom / Dénomination sociale]</p>
        <ul>
            <li>Adresse : [Adresse]</li>
            <li>Téléphone : [Numéro de téléphone]</li>
            <li>Email : [Adresse email]</li>
        </ul>
        
        
        <p>Directeur de la publication : Xavier Renolleau</p>
        
        <p>Hébergeur :</p>
        
        <ul>
            <li>Nom de l'hébergeur : [Nom]</li>
            <li>Adresse de l'hébergeur : [Adresse]</li>
            <li>Téléphone de l'hébergeur : [Numéro de téléphone]</li>
        </ul>
        
        <p>Données personnelles : Ce site ne collecte pas de données personnelles.</p>
        
        <p>Utilisation des cookies : Ce site n'utilise pas de cookies.</p>
        
        <p>Propriété intellectuelle :</p>
        
        <p>Sauf mention contraire, les contenus de ce site sont la propriété de Xavier Renolleau. Toute reproduction, même partielle, est interdite sans autorisation préalable.</p>
        
        <p>Mention de copyright :</p>
        
        <p>© 2024 L'Automaltique. Tous droits réservés.</p>
    </div>
</div>
<?php $main = ob_get_clean() ?>