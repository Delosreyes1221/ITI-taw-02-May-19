<?php
   


class Persona{
    public $name;
    public $email;
    public $gender;
    public $comment;
    public $website;
    public $nameErr = " ";
    public $emailErr =" "; 
    public $genderErr =" ";
    public $websiteErr =" "; 
   

    public function validarDatos(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $this->nameErr = "Name is required";
            } else {
                $this->name = test_input($_POST["name"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$this->name)) {
                    $this->nameErr = "Only letters and white space allowed";
                }
            }
         }

            if (empty($_POST["email"])) {
                $this->emailErr = "Email is required";
            } else {
                $this->email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                    $this->email = "Invalid email format";
                }
            }
            if (empty($_POST["website"])) {
                $this->websiteErr = "Website is required";
            } else {
                $this->website = test_input($_POST["website"]);
                // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                    $this->websiteErr = "Invalid URL";
                }
            }
            if (empty($_POST["comment"])) {
                $this->thiscomment = "";
            } else {
                $this->thiscomment = test_input($_POST["comment"]);
            }
            if (empty($_POST["gender"])) {
                $this->genderErr = "Gender is required";
            } else {
                $this->gender = test_input($_POST["gender"]);
            }

}

            public function test_input($data){
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
            }


}

    
    // function test_input($data) {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }
    ?>
