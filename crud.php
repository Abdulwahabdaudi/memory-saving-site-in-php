<?php

include "./connection.php";

class Crud extends Conn
{
    protected $stm;
    // public $title;
    // public $place;
    // public $description;
    // public $photo;
    // public $user_id;

    public function create_memo($title,$place,$description,$photo)
    {
        echo $title;
        $this->stm = $this->pdo->prepare("INSERT INTO memories(title,place,description,photo,user_id) VALUE (:title,:place,:description,:photo,:user_id)");
        $this->stm->bindParam(':title',$title);
        $this->stm->bindParam(':place',$place);
        $this->stm->bindParam(':description',$description);
        $this->stm->bindParam(':photo',$photo);
        $this->stm->bindParam(':user_id',$user_id);
        if ($this->stm->execute()){
            return true;
        }else{
            return false;
        };
    }


    public function read_memo()
    {
        $statement = $this->pdo->prepare("SELECT * FROM memories ");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
        
    }


    public function update()
    {
        $this->stm = $this->pdo->prepare("UPDATE users SET name=('ally') WHERE id=1");
        if ($this->stm->execute());
    }


    public function delete_memo($id)
    {
        $this->stm = $this->pdo->prepare("DELETE FROM memories WHERE id=$id");
        if ($this->stm->execute()){
            return true;
        }else{
            return false;
        };
    }
}
