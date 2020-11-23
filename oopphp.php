<?php
class User{

    public $username;
    private $email;
    public function __construct($username,$email)
    {
        $this->username=$username;
        $this->email=$email;
    }
    public function addFriend(){
        echo $this->email." is a private property";
    }
}

$userOne = new User("ryu","nasimulhasan@gmail.com");

?>


<html>
<head><title>PHP OOP</title></head>

<body>
    <h3>
        <?php
        // echo $userOne->username."</br>";
        // echo $userOne->email."</br>";
        $userOne->addFriend()."</br>";
        ?>
    </h3>

</body>
</html>

