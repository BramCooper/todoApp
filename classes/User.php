<?php
include_once(__DIR__ . "/Db.php");

class User
{
    private $firstname;
    private $lastname;
    private $email;
    private $password;

    public function register()
    {
        $conn = dbConn::dbConnection();

        $sqlQuery = "insert into users (firstname, lastname, email, password) values (:firstname, :lastname, :email, :password)";
        $statement = $conn->prepare($sqlQuery);
        $firstname = $this->getFirstname();
        $lastname = $this->getLastname();
        $email = $this->getEmail();
        $password = $this->getPassword();

        $statement->bindValue(":firstname", $firstname);
        $statement->bindValue(":lastname", $lastname);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":password", $password);
        $statement->execute();

        return $this;
    }

    public function passwordHash()
    {

        $password = $this->getPassword();
        $options = [
            'cost' => 12,
        ];
        $this->password = password_hash($_POST[$password], PASSWORD_DEFAULT, $options);

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
