<html>
<head>
    <title>Formulario en PHP7</title>
</head>

<body>

<?php
    require "poo.php";
    $Objetos = new Persona();
    $Objetos->validarDatos();
?>


<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name" value="<?php echo $Objetos->name;?>">
    <span class="error">* <?php echo $Objetos->nameErr;?></span>
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $Objetos->email;?>">
    <span class="error">* <?php echo $Objetos->emailErr;?></span>
    <br><br>
    Website: <input type="text" name="website" value="<?php echo $Objetos->website;?>">
    <span class="error"><?php echo $Objetos->websiteErr;?></span>
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"><?php echo $Objetos->comment;?></textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender" <?php if (isset($Objetos->gender) && $Objetos->gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($Objetos->gender) && $Objetos->gender=="male") echo "checked";?> value="male">Male
    <span class="error">* <?php echo $Objetos->genderErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php


echo "<h2>Your Input:</h2>";
echo $Objetos->name;
echo "<br>";
echo $Objetos->email;
echo "<br>";
echo $Objetos->website;
echo "<br>";
echo $Objetos->comment;
echo "<br>";
echo $Objetos->gender;

?>

<ul>
    <li><a href="#">Volver al Inicio</a></li>
</ul>
</body>
</html>
