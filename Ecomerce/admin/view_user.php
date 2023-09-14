<h1 class="text-center text-success">All Users</h1>

<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Sl No</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>User Address</th>
            <th>User Contact</th>
            <!-- <th>Edit</th>-->
            <!-- <th>Delete</th> -->
        </tr>
    </thead>
    <tbody class="bg-secondary text-light text-center">
        <?php 
        $get_user="Select * from `user_table`";
        $result_user=mysqli_query($con,$get_user);
        $number=0;
        while($row=mysqli_fetch_assoc($result_user)){
              $user_id=$row['user_id'];
              $username=$row['username'];
              $user_email=$row['user_email'];
              $user_address=$row['user_address'];
              $user_mobile=$row['user_mobile'];

              $number++;
              ?>
              <tr>
              <td><?php echo"$number"?></td>
              <td><?php echo"$username"?></td>
              <td><?php echo"$user_email"?></td>
              <td><?php echo"$user_address"?></td>
              <td><?php echo"$user_mobile"?></td>
              

              <!-- edit and delete logic from view products if required -->
          </tr>
          <?php
        }
        
        ?>
        

    </tbody>

</table>
<br>
