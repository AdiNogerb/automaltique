<?php
class BaseModel {
    use AccessorTrait;
    protected \PDO $db;

    public function __construct()
    {
        $this->db = Database::dbConnect();
    }
}

