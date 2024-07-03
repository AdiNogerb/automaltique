<?php
/**
 * Trait AccessorTrait
 *
 * Fournit des méthodes magiques pour accéder aux propriétés d'un objet.
 * Permet de récupérer et de définir dynamiquement les propriétés d'une classe qui utilise ce trait.
 */
trait AccessorTrait {
    /**
     * Méthode magique __get
     *
     * Permet d'accéder à une propriété d'un objet dynamiquement.
     *
     * @param string $property Le nom de la propriété à accéder.
     * @return mixed La valeur de la propriété si elle existe, sinon un message indiquant que la propriété n'est pas définie.
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return 'Propriété '.$property.' non définie';
    }

    /**
     * Méthode magique __set
     *
     * Permet de définir dynamiquement une propriété d'un objet.
     *
     * @param string $property Le nom de la propriété à définir.
     * @param mixed $value La valeur à affecter à la propriété.
     * @return $this|mixed Retourne l'objet courant si la propriété existe, sinon un message indiquant que la propriété n'est pas définie.
     */
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
            return $this;
        } else {
            return 'Propriété '.$property.' non définie';
        }
    }
}
