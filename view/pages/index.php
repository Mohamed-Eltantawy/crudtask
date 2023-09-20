<?php require_once '../../includes/connection.php' ?>
<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Employee</title>
    </head>
    <body>
        <header class="bg-primary text-light text-center p-3">
                <h2>Employee Crud</h2>
            </header>
        <section class="my-5 container">
            <a href="../../controller/add.php" class="btn btn-dark mb-3">Add Employee</a>

            <table class="table table-bordered text-center mt-4">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Id</th>
                        <th>Employee Name</th>
                        <th>Employee Salary</th>
                        <th>Employee Address</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM employees";
                        $selectedEmployees = mysqli_query($conn , $sql);
                        while($row = mysqli_fetch_assoc($selectedEmployees)) {
                    ?>
                        <tr>
                            <td><img src="../../images/<?php echo $row["image"] ?>" width="100px" height="100px"></td>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["salary"] ?></td>
                            <td><?php echo $row["address"] ?></td>
                            <td><?php echo $row["gender"] ?></td>
                            <td>
                                <a href="../../controller/edit.php?id=<?php echo $row["id"];?>" class="btn btn-sm btn-success mx-1">update</a>
                                <a href="../../controller/delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-danger mx-1">delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>