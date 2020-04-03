<?php
namespace LFramework;

class DatabaseTable
{
    private $pdo;
    private $table;
    private $primarykey;

    public function __construct(\PDO $pdo,string $table,string $primarykey) {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primarykey = $primarykey;
    }

    private function query($sql,$parameters = []) 
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);
        return $stmt;
    }
    
    public function save($record) 
    {
        try {
          if(empty($record[$this->primarykey])) {
            $this->primarykey = NULL;
          }
          // INSERT
          $this->insert($record);
        } catch (\PDOException $e) {
          // UPDATE
          $this->update($record);
        }
    }

    public function findAll() 
    {
        $result = $this->query('SELECT * FROM ' . $this->table . ';');
        return $result->fetchAll();
    }

    public function findById($id) 
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . $this->primarykey . ' = :id;';
        $parameters = [':id' => $id ];
        $query = $this->query($sql,$parameters);
        return $query->fetch();
    }

    public function total() {
        $query = $this->query('SELECT COUNT(*) FROM ' . $this->table . ';');
        $row = $query->fetch();
        return $row[0];
    }

    public function remove($id) 
    {
      $sql = 'DELETE FROM ' . $this->table . ' WHERE ' . $this->primarykey . ' = :id;';
      $parameters = [
        'id'   => $id,
      ];
      $this->query($sql,$parameters);
    }

    private function insert($fields) 
    {
        $sql = 'INSERT INTO ' . $this->table . ' SET ';
        foreach ($fields as $key => $value) {
          $sql .= ' ' . $key . '= :' . $key . ',';
        }
        $sql = rtrim($sql,',') . ';';
        $this->query($sql,$fields);
    }

    private function update($fields) 
    {
        $sql = 'UPDATE ' . $this->table . ' SET ';
        foreach ($fields as $key => $value) {
          $sql .= $key . ' = :' . $key . ",";
        }
        $sql = rtrim($sql, ',');
        $sql .= ' WHERE ' . $this->primarykey . ' = :id_libro;';
        $this->query($sql,$fields);
    }
}
?>