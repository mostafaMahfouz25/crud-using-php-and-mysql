<?php  include('inc/header.php'); ?>
<?php 

    $sql = "SELECT * FROM `users` ";
    $result = mysqli_query($conn,$sql);

?>


    <h1 class="text-center col-12 bg-primary py-3 text-white my-2">All Users</h1>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                <?php  if(mysqli_num_rows($result) > 0): ?>
                    <?php  while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <th><?php echo $row['user_id']; ?></th>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['user_email']; ?></td>
                        <td>
                            <a class="btn btn-info" href="edit.php?id=<?php echo $row['user_id']; ?>"> <i class="fa fa-edit"></i> </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="delete.php?id=<?php echo $row['user_id']; ?>"> <i class="fa fa-close"></i> </a>
                        </td>
                    </tr>

                    <?php endwhile; ?>
                <?php endif; ?>

            
                
                </tbody>
            </table>
        </div>
    </div>

<?php  include('inc/footer.php'); ?>

 
  