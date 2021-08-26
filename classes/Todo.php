<?php
include_once(__DIR__ . "/Db.php");
include_once(__DIR__ . "/List.php");

class Todo
{
    private $id;
    private $name;
    private $desc;
    private $dur;
    private $deadline;
    private $done;
    private $list_id;
    private $user_id;

    public function todoSave()
    {

        $conn = dbConn::dbConnection();
        $sqlQuery = "insert into todo (name, descTodo, dur, deadline, done, list_id, user_id) values (:name, :desc, :dur, :deadline, :done, :list_id, :user_id)";
        $statement = $conn->prepare($sqlQuery);
        $name = $this->getName();
        $desc = $this->getDesc();
        $dur = $this->getDur();
        $deadline = $this->getDeadline();
        $done = 0;
        $list_id = $this->getList_id();
        $user_id = $this->getUser_id();

        $statement->bindValue(":name", $name);
        $statement->bindValue(":desc", $desc);
        $statement->bindValue(":dur", $dur);
        $statement->bindValue(":deadline", $deadline);
        $statement->bindValue(":done", $done);
        $statement->bindValue(":list_id", $list_id);
        $statement->bindValue("user_id", $user_id);

        return $statement->execute();
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
     * Get the value of desc
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set the value of desc
     *
     * @return  self
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get the value of dur
     */
    public function getDur()
    {
        return $this->dur;
    }

    /**
     * Set the value of dur
     *
     * @return  self
     */
    public function setDur($dur)
    {
        $this->dur = $dur;

        return $this;
    }

    /**
     * Get the value of deadline
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set the value of deadline
     *
     * @return  self
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get the value of done
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Set the value of done
     *
     * @return  self
     */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    /**
     * Get the value of list_id
     */
    public function getList_id()
    {
        return $this->list_id;
    }

    /**
     * Set the value of list_id
     *
     * @return  self
     */
    public function setList_id($list_id)
    {
        $this->list_id = $list_id;

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
}
