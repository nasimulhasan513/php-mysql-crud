<?php
// MySQLi

// comment to database
include('./config/db_connect.php');
// write query for pizzas

$sql = "SELECT title,ingredients,id FROM pizzas";
// make query and get result
$result = mysqli_query($conn, $sql);
// fetch the result as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
// free result from memory
mysqli_free_result($result);
// closing connection
mysqli_close($conn);
// explode(',',$pizza["ingredients"])
?>


<!DOCTYPE html>
<html lang="en">

<?php
include('templates/header.php')
?>
<h1 class="center grey-text">Pizzas</h1>
<div class="container">
    <div class="row">
        <?php
        foreach ($pizzas as $pizza) :
        ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']) ?></h6>

                        <ul>
                            <?php
                            foreach (explode(',', $pizza["ingredients"]) as $ingredient) {
                            ?>
                                <li><?php echo $ingredient; ?></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="details.php?id=<?=$pizza['id']?>" class="brand-text">more info</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
include('templates/footer.php')
?>

</html>