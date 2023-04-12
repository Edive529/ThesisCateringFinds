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
           <h1 class="m-0">Order list</h1>
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
         <h3 class="box-title"><a href="addmenu.php" class="btn btn-primary" role="button">Add Food</a></h3>
      </div>

        <div class="card-body overflow-auto" >
      <!-- /.box-header -->
<!-- form start -->
        <div class="row margin">

          <div class="col-md-8">

            <table id="tablefoodmenu" class = "table table-striped">
              <thead>
                <tr>
                  <th>catering_id</th>
                  <th>order_list_id</th>
                  <th>cart_id</th>
                  <th>payment_type</th>
                  <th>user</th>
                  <th>package</th>
                  <th>restaurant</th>
                  <th>event_address</th>
                  <th>catering_style</th>
                  <th>payment_status</th>
                  <th>date_of_reservation</th>
                  <th>date_to_be_delivered</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>


              </thead>
              <tbody>
                <?php
                  $select=$pdo->prepare("select * from tbl_catering_order_details order by catering_id desc");

                  $select->execute();

                  while($row=$select->fetch(PDO::FETCH_OBJ)){

                    echo'<tr>
                    <td>
                    '.$row->catering_id.'
                    </td>
                    <td>
                    '.$row->order_list_id.'
                    </td>
                    <td>
                    '.$row->cart_id.'
                    </td>
                    <td>
                    '.$row->payment_type.'
                    </td>
                    <td>
                    '.$row->user.'
                    </td>
                    <td>
                    '.$row->package.'
                    </td>
                    <td>
                    '.$row->restaurant.'
                    </td>
                    <td>
                    '.$row->event_address.'
                    </td>
                    <td>
                    '.$row->catering_style.'
                    </td>
                    <td>
                    '.$row->payment_status.'
                    </td>
                    <td>
                    '.$row->date_of_reservation.'
                    </td>
                    <td>
                    '.$row->date_to_be_delivered.'
                    </td>
                    <td>
                    <a href = "edit_catering_order.php?id='.$row->catering_id.'"  class="btn btn-info" role = "button" ><span class = "fas fa-edit" style = "color:#ffffff" data-toggle="tooltip" title="edit"></span></a>
                    </td>
                    <td>
                    <button id='.$row->catering_id.'  class="btn btn-danger btndelete"><span class = "fas fa-trash" style = "color:#ffffff" data-toggle="tooltip" title="delete"></span></button>
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
