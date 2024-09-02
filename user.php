<?php
    $id = "";
    $firstname = "";
    $lastname = "";
    $email = "";
    $password = "";

    $errorMessage ="";
    $successMessage ="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        #$name=$POST["id"];
        #$firstname=$POST["firstname"];
       # $lastname=$POST["lastname"];
        #$email=$POST["email"];
        #$password=$POST["password"];

        do{
            if(empty($id)|| empty($firstname)|| empty($lastname)|| empty($email)|| empty($password)){
                $errorMessage ="All the fields are required";
                break; 
            }
            $sql="INSERT INTO crudoperations(id,firstname,lastname,email,password)" . "VALUES('$id','$firstname','$lastname','$email','password')";
            $result=$connection->query($sql);

            if(!$result) {
                $errorMessage="invalid query:".$connection->error;
                break;
            }
            $id = "";
            $firstname = "";
            $lastname = "";
            $email = "";
            $password = "";   
             
            $successMessage = " added correctly";
            header("location:/crudoperations/display.ph");
            exit;
        } while (false);
    

    }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>crud operations.</title>
</head>

<body>
    <div class="container my-5">
        <?php
        if(!empty($errorMessage)){
            echo"
            <div class='alert alert warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>  
            ";
        }
        ?>
        <form method="POST">
            <div class="form-group">
                <label>id</label>
                <input type="text" class="form-control" placeholder="Enter Your id" name="id" value= "<?php echo $id; ?>">
            </div>
            <div class="form-group">
                <label>firstname</label>
                <input type="text" class="form-control" placeholder="Enter Your firstname" name="firstname" value= "<?php echo $firstname; ?>">
            </div>
            <div class="form-group">
                <label>lastname</label>
                <input type="text" class="form-control" placeholder="Enter Your lastname" name="lastname" value= "<?php echo $lastname; ?>">
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="Email" class="form-control" placeholder="Enter Your email" name="email" value= "<?php echo $email; ?>">
            </div>
            
            <?php
            if (!empty($succesMessage)){
                echo"
                
                ";
            }

            ?>
            <div class="form-group">
                <label>password</label>
                <input type="password" class="form-control" placeholder="password" name="password" value= "<?php echo $password; ?>">
            </div>
            <button type="submit" class="btn btn-primary" names="submit">Submit</button>
        </form>
    </div>

</body>

</html>
