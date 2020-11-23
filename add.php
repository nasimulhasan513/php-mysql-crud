<?php
include('./config/db_connect.php');
$errors = array("email" => "", "title" => "", "ingredients" => "");
$email = "";
$title = "";
$ingredients = "";
if (isset($_POST['submit'])) {

    // check email
    if (empty($_POST['email'])) {
        $errors["email"] = "Email is required";
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] =  "Email must be valid";
        }
    }
    if (empty($_POST['title'])) {
        $errors["title"]  = "Title is required";
    } else {
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors["title"] = "Title must be letters and spaces only";
        }
    }
    if (empty($_POST['ingredients'])) {
        $errors["ingredients"] = "At least one ingredients is required";
    } else {

        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors["ingredients"] = "Ingredients must be a comma separated vaalue";
        }
    }
    // form validation
    if (array_filter($errors)) {
        // echo "errors in the form";
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

        // create data

        $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')";

        if (mysqli_query($conn, $sql)) {
            // success

            header('Location: index.php');
        } else {
            echo "QUERY ERROR" . mysqli_error($conn);
        }

        // echo "form in valid";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<?php
include('templates/header.php')
?>
<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="add.php" method="POST" class="white">
        <label for="email">Your Email</label>
        <input type="text" name="email" value="<?= htmlspecialchars($email); ?>">
        <div class="red-text"><?= $errors['email']; ?></div>
        <label for="pizza">Pizza title</label>
        <input type="text" name="title" value="<?= htmlspecialchars($title); ?>">
        <div class="red-text"><?= $errors['title']; ?></div>
        <label for="ingredients">Ingredients (separated comma)</label>
        <input type="text" name="ingredients" value="<?= htmlspecialchars($ingredients); ?>">
        <div class="red-text"><?= $errors['ingredients']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>


    </form>
</section>
<?php
include('templates/footer.php')
?>

>


</html>