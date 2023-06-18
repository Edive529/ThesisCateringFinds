<?php
include_once '../connectdb.php';
session_start();

if ($_SESSION['useremail']=="") {
  header('location:../index.php');
}



include_once 'headerAdmin.php';

 ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Restaurant Logs</h1>
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



        <div class="card-body overflow-auto" >
      <!-- /.box-header -->
<!-- form start -->
        <div class="row margin">

          <div class="col-md-12">

            <table id="tablefoodmenu" class = "table table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Catering_id</th>

                  <th>Restaurant</th>
                  <th>User</th>

                  <th>Status</th>
                  <th>Action</th>
                  <th>Date</th>
                </tr>


              </thead>
              <tbody>
                <?php

                  $select=$pdo->prepare("select * from tbl_order_logs order by id desc");

                  $select->execute();

                  while($row=$select->fetch(PDO::FETCH_OBJ)){

                    echo'<tr>
                    <td>
                    '.$row->id.'
                    </td>
                    <td>
                    '.$row->catering_id.'
                    </td>
                    <td>
                    '.$row->restaurant.'
                    </td>
                    <td>
                    '.$row->user.'
                    </td>
                    <td>
                    '.$row->status.'
                    </td>
                    <td>
                    '.$row->action.'
                    </td>
                    <td>
                    '.$row->cdate.'
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






      </section>
      <!-- /.content -->
    </div>





    <script>
     $(document).ready(function() {
       $('#tablefoodmenu').DataTable({

         "order":[[0,"desc"]]




       });
    });
    </script>


  <?php

include_once 'footerAdmin.php';

 ?>
