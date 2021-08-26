<?php

include_once(__DIR__ . "/Db.php");

class listClass
{
    private $id;
    private $name;
    private $user_id;

    public function listSave()
    {
        $conn = dbConn::dbConnection();
        $sqlQuery = "insert into lists (name, user_id) values (:name, :user_id)";
        $statement = $conn->prepare($sqlQuery);

        $name = $this->getName();
        $user_id = $this->getUser_id();
        $statement->bindValue(":name", $name);
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();

        return $this;
    }

    public function getAllLists()
    {
        $conn = dbConn::dbConnection();
        $sqlQuery = "select * from lists where user_id = :id";
        $statement = $conn->prepare($sqlQuery);
        $id = $_SESSION['id'];
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function delete()
    {
        $conn = dbConn::dbConnection();
        $sqlQuery = "delete from lists where id = :id";
        $statement = $conn->prepare($sqlQuery);
        $id = $this->getId();
        $statement->bindValue(":id", $id);
        $statement->execute();

        return $this;
    }


    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of user_id
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
