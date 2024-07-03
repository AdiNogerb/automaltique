<?php
trait AccessorTrait {
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return 'Propriété '.$property.' non définie';
    }

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