<?php  include('inc/header.php'); ?>
<?php  include('inc/validation.php'); ?>

<?php

        if(isset($_POST['submit']))
        {
            $name =     santString($_POST['name']);
            $email =    santEmail($_POST['email']);
            $password = santString($_POST['password']);

            if(requiredInput($name) &&  requiredInput($email) &&  requiredInput($password) )
            {
                if(minInput($name,3) && maxInput($password,20))
                {
                    if(validEmail($email))
                    {
                        $hashed_password = password_hash($password,PASSWORD_DEFAULT);
                        $sql = "INSERT INTO `users` (`user_name`,`user_email`,`user_password`)
                        VALUES ('$name','$email','$hashed_password')  ";

                        $result = mysqli_query($conn,$sql);

                        if($result)
                        {
                            $success = "Added Successfully ";
                        }
                    }
                    else 
                    {
                        $error = "Please Type Valid Email !";
                    }
                }
                else 
                {
                    $error = "Name Must Be Grater Than 3 Chars / Password Must Be Less Than 20 Chars";
                }
            }
            else 
            {
                $error =  "Please Fill All  Fields !";
            }
        }

?>

    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Add New User</h1>
    <?php if($error): ?>
        <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
    <?php endif;  ?>

    <?php if($success): ?>
        <h5 class="alert alert-success text-center"><?php echo $success; ?></h5>
    <?php endif;  ?>


    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="exampleInputName1">Full Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1" >
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email address</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
         
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
   
<?php  include('inc/footer.php'); ?>

 
  