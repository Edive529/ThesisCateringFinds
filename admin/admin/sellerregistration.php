<?php
include_once '../connectdb.php';
session_start();

include_once 'headerAdmin.php';



// $id = $_GET['id'];
//
// $delete=$pdo->prepare("delete from tbl_user where userid=".$id);
//
// if($delete->execute()){
//
//   echo'<script type ="text/javascript">
//   jQuery(function validation(){
//
//     swal({
//     title: "Good Job!",
//     text: "Account has been deleted!",
//     icon: "success",
//     button: "Ok",
//   });
//
//
//
//   });
//
//   </script>';
//
// }
// mao ni=====
//
// if(isset($_POST['btnsave'])){
//
//   $username = $_POST['txtusername'];
//   $useremail = $_POST['txtemail'];
//   $restaurant = $_POST['txtrestaurant'];
//   $address = $_POST['txtaddress'];
//   $latitude = $_POST['txtlatitude'];
//   $longitude = $_POST['txtlongitude'];
//
//   $password = $_POST['txtpassword'];
//
//   $hashed_password = password_hash($password, PASSWORD_DEFAULT);
//
// $file_name = $_FILES['file']['name'];
// $file_type = $_FILES['file']['type'];
// $file_size = $_FILES['file']['size'];
// $file_tem_loc = $_FILES['file']['tmp_name'];
// $file_store = "../upload/".$file_name;
// $f_extension = explode('.',$file_name);
// $f_extension = strtolower(end($f_extension));
//
// $f_newfile = uniqid().'.'.$f_extension;
// $file_store = "../upload/".$f_newfile;

// if(isset($_POST['txtemail'])){
//
//   $row=$select=$pdo->prepare("select useremail from tbl_user where useremail='$useremail'");
//   $select->execute();
//
//   if($select->rowCount() > 0){
//     echo'<script type ="text/javascript">
//     jQuery(function validation(){
//
//       swal({
//       title: "Warning!",
//       text: "Email Already Exists!",
//       icon: "warning",
//       button: "Ok",
//     });
//
//
//
//     });
//
//     </script>';
//   }
// }
// if ($f_extension == 'jpg' || $f_extension == 'png' || $f_extension == 'gif' || $f_extension == 'jpeg') {
//
//   if($file_size>=5000000) {
//     $error ='<script type ="text/javascript">
//     jQuery(function validation(){
//
//       swal({
//       title: "Warning!",
//       text: "Max file should be 5MB!",
//       icon: "warning",
//       button: "Ok",
//     });
//
//
//
//     });
//
//     </script>';
//     echo $error;
//
//   }else{
//     if (move_uploaded_file($file_tem_loc, $file_store)) {
//
//       $upload = $f_newfile;
//
//
//
//         $insert=$pdo->prepare("insert into tbl_user(username,useremail,restaurant,address,password,latitude,longitude,image)
//         values(:username,:useremail,:restaurant,:address,:password,:latitude,:longitude,:image)");
//
//
//         $insert->bindParam(':username',$username);
//         $insert->bindParam(':useremail',$useremail);
//         $insert->bindParam(':restaurant',$restaurant);
//
//         $insert->bindParam(':address',$address);
//         $insert->bindParam(':password',$hashed_password);
//         $insert->bindParam(':latitude',$latitude);
//         $insert->bindParam(':longitude',$longitude);
//
//         $insert->bindParam(':image',$upload);
//
//
//
//
//         if($insert->execute()){
//
//           echo'<script type ="text/javascript">
//           jQuery(function validation(){
//
//             swal({
//             title: "Good Job!",
//             text: "Image is successfuly uploaded!",
//             icon: "success",
//             button: "Ok",
//           });
//
//
//
//           });
//
//           </script>';
//
//         }else{
//           echo'<script type ="text/javascript">
//           jQuery(function validation(){
//
//             swal({
//             title: "Error!",
//             text: "Upload failed!",
//             icon: "error",
//             button: "Ok",
//           });
//
//
//
//           });
//
//           </script>';
//
//         }
//
//         }
//     }
//   }else{
//     $error = '<script type ="text/javascript">
//     jQuery(function validation(){
//
//       swal({
//       title: "Warning!",
//       text: "Only Jpg, Jpeg, Png and Gif file is allowed!",
//       icon: "warning",
//       button: "Ok",
//     });
//
//
//
//     });
//
//     </script>';
//     echo $error;
//   }
//
// }




 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Seller Registration Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content container-fluid">




    <!--------------------------
      | Your Page Content Here |
      -------------------------->
      <!-- general form elements -->



      <div class="card card-outline">
        <div class="card-header with-border">
          <div class="modal fade" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- <div class="modal-header bg-info text-white">
                  Register new member

                </div> -->
                <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="txtusername" placeholder="Enter name" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="txtemail" placeholder="Enter name" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="txtaddress" placeholder="Enter name" required>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="txtpassword" placeholder="Enter name" required>
                  </div>

                    <div class="form-group">
                      <label>Restaurant</label>
                      <input type="text" class="form-control" name="txtrestaurant" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                      <label >Latitude</label>
                      <input type="text" class="form-control" name="txtlatitude" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                      <label >Longitude</label>
                      <input type="text" class="form-control" name="txtlongitude" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                      <label >Upload menu</label>
                      <input type="file" class="input-group" name="file" required>

                    </div>








                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info" name="btnsave">Register</button>
                  <button class="btn btn-danger" data-dismiss="modal" value="Close" >Close</button>

                </div>

              </div>

            </div>

          </div>
          <!-- <h3 class="card-title"><a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-info" role="button">Add new member</a></h3> -->
        </div>

          <div class="card-body">
        <!-- /.box-header -->
        <!-- form start -->
        <div class="row margin">



        <div class="col-md-12">


          <table id="tablefoodmenu" class = "table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Restaurant</th>
                <th>Address</th>
                <th>Menu</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>View</th>
                <th>EDIT</th>
                <th>DELETE</th>
              </tr>

            </thead>
            <tbody>
              <?php

              $phrase='Seller';

              $select = $pdo->prepare("select * from tbl_user where role ='$phrase'  order by userid desc");

              $select->execute();

              while ($row=$select->fetch(PDO::FETCH_OBJ)) {
                echo'
                <tr>
                <td>'.$row->userid.'</td>
                <td>'.$row->username.'</td>
                <td>'.$row->useremail.'</td>
                <td>'.$row->status.'</td>
                <td>'.$row->restaurant.'</td>
                <td>'.$row->address.'</td>
                <td>
                <img src = "../upload/'.$row->image.'" class = "img-rounded" width = "40px" height = "40px">
                </td>
                <td>'.$row->latitude.'</td>
                <td>'.$row->longitude.'</td>





                <td>
                <a href = "viewmenu.php?id='.$row->userid.'"  class="btn btn-primary" role = "button" ><span class = "fas fa-eye" style = "color:#ffffff" data-toggle="tooltip" title="view"></span></a>
                </td>
                <td>
                <a href = "sellereditreg.php?id='.$row->userid.'"  class="btn btn-success" role = "button" ><span class = "fas fa-trash" style = "color:#ffffff" data-toggle="tooltip" title="edit"></span></a>
                </td>
                <td>
                <button id='.$row->userid.'  class="btn btn-danger btndelete"><span class = "fas fa-trash" style = "color:#ffffff" data-toggle="tooltip" title="delete"></span></button>
                </td>
                </tr>';
              }







               ?>

            </tbody>

          </table>

        </div>
        </div>

        </div>




          </div>
          <!-- /.box-body -->



        </form>

      <!-- /.box -->




          <!-- /.col-md-6 -->


        <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
  $(document).ready(function(){
      $("#tablefoodmenu").on('click','.btndelete', function(event){

      var tdh = $(this);
      var id= $(this).attr("id");

      swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
  })
  .then((willDelete) => {
  if (willDelete) {

    $.ajax({
      url: 'userdelete.php',
      type:'post',
      data:{
        useridd:id
      },
      success: function(data){
        tdh.parents('tr').hide();
      }



    });
    swal("Your file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your file is safe!");
  }
  });
      // alert(id);


    });
  });


</script>


  <!-- Main Footer -->
  <?php

include_once'footerAdmin.php';

   ?>
