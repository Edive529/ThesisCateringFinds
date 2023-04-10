<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail']=="") {
  header('location:index.php');
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
           <h1 class="m-0">Category Page</h1>
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

        
      </div>

        <div class="card-body">
      <!-- /.box-header -->
<!-- form start -->
        <div class="row margin">

          <div class="col-md-12">

            <table id="tablecategory" class = "table table-striped">
              <thead>


              </thead>
              <tbody>


              </tbody>

            </table>

          </div>
          </div>

          </div>




            </div>
            <!-- /.box-body -->



          </form>


      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->





  <!-- /.content-wrapper -->
  <?php

include_once 'footer.php';

 ?>
