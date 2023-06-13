<?php
include_once '../connectdb.php';
session_start();

if ($_SESSION['useremail']=="") {
  header('location:../index.php');
}



include_once 'header.php';

 ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Package Page</h1>
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

     <div class="card card-outline card-primary">

       <div class="card-header with-border">
         <h3 class="box-title"><a href="addpackage.php" class="btn btn-primary" role="button">Add Package</a></h3>
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
                  <th>Package</th>
                  <th>menu list</th>
                  <th>Sale price</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>View</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>


              </thead>
              <tbody>
                <?php
                $userid = $_SESSION['userid'];
                  $select=$pdo->prepare("select * from tbl_foodmenu where userid = $userid AND category = 'Package' order by foodid desc");

                  $select->execute();

                  while($row=$select->fetch(PDO::FETCH_OBJ)){

                    echo'<tr>
                    <td>
                    '.$row->foodid.'
                    </td>
                    <td>
                    '.$row->food.'
                    </td>
                    <td>
                    '.$row->description.'
                    </td>
                    <td>
                    '.$row->saleprice.'
                    </td>
                    <td>
                    '.$row->package_description.'
                    </td>
                    <td>
                    <img src = "../upload/'.$row->image.'" class = "img-rounded" width = "40px" height = "40px">
                    </td>
                    <td>
                    <a href = "viewmenu.php?id='.$row->foodid.'"  class="btn btn-success" role = "button" ><span class = "fas fa-eye" style = "color:#ffffff" data-toggle="tooltip" title="view"></span></a>
                    </td>
                    <td>
                    <a href = "editpackage.php?id='.$row->foodid.'"  class="btn btn-info" role = "button" ><span class = "fas fa-edit" style = "color:#ffffff" data-toggle="tooltip" title="edit"></span></a>
                    </td>
                    <td>
                    <button id='.$row->foodid.'  class="btn btn-danger btndelete"><span class = "fas fa-trash" style = "color:#ffffff" data-toggle="tooltip" title="delete"></span></button>
                    </td>

                        </tr>';


                  }
                   ?>



                </tbody>


              </tbody>

            </table>

          </div>
          </div>

          </div>




            </div>
            <!-- /.box-body -->






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
        url: 'fooddelete.php',
        type:'post',
        data:{
          foodidd:id
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






  <!-- /.content-wrapper -->
  <?php

include_once 'footer.php';

 ?>
