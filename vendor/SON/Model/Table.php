<?php


namespace SON\Model;


class Table
{
    protected $db;
        protected $table;
        public function __construct(\PDO $db)
    {
        $this->db = $db;
    }
        public function fetchAll()
    {
        $query = "SELECT * FROM {$this->table}";
        return $this->db->query($query);
    }

    public function find($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}