<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <header>
        <?php include_once '../navbar.php'?>
    </header>
    <!-- register form for employees -->
    <section class="my-5 container">

        <form method="post" action="../../controller/registerAction.php">
            <div class="form-group mb-3">
                <label for="name" class="form-label">User Name</label>
                <input type="text" class="form-control" name="username" id="name">
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="form-group mb-3">
                <!-- confirm password -->
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password">
            </div>
            <!-- Register button -->
            <button type="submit" class="btn btn-primary" name="register">Register</button>
            <div class="my-3">
                <strong>Are You a memeber? <a href="./login.php" class="text-dark">Login</a></strong>
            </div>
        </form>
</section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html> 