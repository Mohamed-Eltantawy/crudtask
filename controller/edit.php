<?php 
    // edit employee
    require_once '../includes/connection.php';    
    
    $id = $_GET['id'];
    $selectSql = "SELECT * FROM employees WHERE id=$id";
    $selectedEmployee = mysqli_query($conn , $selectSql);
    $row = mysqli_fetch_assoc($selectedEmployee);

    if(isset($_POST['edit_employee'])){
        $name = $_POST['name'];
        $salary = $_POST['salary'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];

          // Check if a new image file was uploaded
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "../images/$image");
        } else {
            // No new image uploaded, retain the existing image
            $image = $_POST['image'];
        }

        $sql = "UPDATE employees SET
        name = '$name',
        address='$address' ,
        salary ='$salary',
        gender = '$gender',
        image = '$image'
        WHERE id = $id";
        $stmt = mysqli_prepare($conn , $sql);
        mysqli_stmt_execute($stmt);
        header("location:../views/pages/index.php");

        // close connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h2 class="my-5 text-center container 
        bg-success text-light opacity-75
        p-3 w-50 bg-dark text-light border shadow">
        Edit Employee
    </h2>

    <div class="container  p-5 mx-auto w-50 border shadow">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group my-1">
                <label for="image">Employee Image</label>
                <img class="img-fluid d-block" src="../images/<?php echo $row['image'];?>" width="100px" height="100px">
                <input type="file" class="form-control" name="image"
                placeholder="Employee Image"
                value="<?php echo $row['image'];?>">
            </div>
            <div class="form-group my-1">
                <label for="name">Employee Name</label>
                <input type="text" class="form-control" name="name"
                placeholder="Employee Name"
                value=<?php echo $row['name'];?>></div>
            <div class="form-group my-1">
                <label for="salary">Emloyee Salary</label>
                <input type="number" name="salary"
                placeholder="Employee Salary"
                value=<?php echo $row['salary'];?>
                class="form-control"></div>
            <div class="form-group my-1">
                <label for="address">Employee Address</label>
                <input type="text" class="form-control" name="address"
                placeholder="Employee Address"
                value=<?php echo $row['address'];?>>
            </div>
            <div class="form-group mt-2 mb-1">
                <label for="male" class="mx-1">Male</label>
                <input type="radio" name="gender" value="male"
                <?php echo $row['gender']=='male'?"checked":""?>>
                <label for="female" class="mx-1">Female</label>
                <input type="radio" name="gender" value="female"
                <?php echo $row['gender']=='female'?"checked":""?>>
            </div>
            <input type="submit" value="Edit Employee" 
            class="mt-3 mx-1 btn btn-success" name="edit_employee">
            <a href="../views/pages/index.php" class="mx-1 mt-3 btn btn-info">Return to index</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>