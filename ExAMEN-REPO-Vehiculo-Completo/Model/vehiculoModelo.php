<?php
class vehiculoModelo
{
    private $DB;

    function __construct()
    {
        $this->DB = Database::connect();
    }

    function get()
    {
        $sql = 'SELECT * FROM vehicles ORDER BY id ASC';
        $query = $this->DB->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function create($data)
    {
        $sql = "INSERT INTO vehicles (placacar, modelo, anho, binauto) VALUES (?, ?, ?, ?)";
        $query = $this->DB->prepare($sql);
        $query->execute([$data['placacar'], $data['modelo'], $data['anho'], $data['binauto']]);
    }

    function get_id($id)
    {
        $sql = "SELECT * FROM vehicles WHERE id = ?";
        $query = $this->DB->prepare($sql);
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function update($id, $data)
    {
        $sql = "UPDATE vehicles SET placacar=?, modelo=?, anho=?, binauto=? WHERE id = ?";
        $query = $this->DB->prepare($sql);
        // El array pasado a execute() debe coincidir con el orden de los placeholders en la consulta SQL
        $query->execute([$data['placacar'], $data['modelo'], $data['anho'], $data['binauto'], $id]);
    }



    function delete($id)
    {
        $sql = "DELETE FROM vehicles WHERE id=?";
        $query = $this->DB->prepare($sql);
        $query->execute([$id]);
    }
}
