<?php
require_once("database.php");

class Config
{
    private $id;
    public $titre;
    public $prix;
    public $description;
    protected $dbcnx;

    public function __construct($id = 0, $titre = "", $prix = "", $description = ""){
        $this->id = $id;
        $this->titre = $titre;
        $this->prix = $prix;
        $this->description = $description;

        $this->dbcnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_annonces,DB_PWD,[ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function insertData()
    {
        try {
            $stm = $this->dbcnx->prepare("INSERT INTO annonces(titre, prix, description) VALUES (?, ?, ?)");
            $stm->execute([$this->titre, $this->prix, $this->description]);
            echo "<script>alert('Data saved successfully');document.location='alldata.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function fetchAll()
    {
        try {
            $stm = $this->dbcnx->prepare("SELECT * FROM annonces");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function fetchOne()
    {
        try {
            $stm = $this->dbcnx->prepare("SELECT * FROM annonces WHERE id=?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update()
    {
        try {
            $stm = $this->dbcnx->prepare("UPDATE annonces SET titre = ?, prix=?, description=? WHERE id = ?");
            $stm->execute([$this->titre, $this->prix, $this->description, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            $stm = $this->dbcnx->prepare("DELETE FROM annonces WHERE id = ?");
            $stm->execute([$this->id]);
            echo "<script>alert('Data deleted successfully');document.location='alldata.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>
