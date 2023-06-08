<?php
include_once '../connectdb.php';
session_start();

include_once 'headerAdmin.php';


 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View menu</h1>
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

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="card card-outline card-success">
          <div class="card-header with-border">
            <h3 class="box-title"><a href="menu.php" class="btn btn-primary" role="button">Back to Menu list</a></h3>
          </div>

            <div class="card-body">

              <?php
              $id= isset($_GET['id']) ? $_GET['id'] : '';

              $select = $pdo->prepare("select * from tbl_user where userid=$id");

              $select->execute();

              while($row=$select->fetch(PDO::FETCH_OBJ)){

                echo'<div class="row"> <div class = "col-md-6">

                <center><p class="list-group-item list-group-item-success" ><b>food Details</b></p></center>

                <ul class="list-group">
                 <li class="list-group-item"><b>ID:  </b><span class="label">'.$row->userid.'</span></li>
                 <li class="list-group-item"><b>Name:  </b><span class="label label-info pull-right">'.$row->username.'</span></li>
                 <li class="list-group-item"><b>Email:  </b><span class="label label-success pull-right">'.$row->useremail.'</span></li>
                 <li class="list-group-item"><b>Status:  </b><span class="label label-warning pull-right">'.$row->status.'</span></li>
                 <li class="list-group-item"><b>Restaurant:  </b><span class="">'.$row->restaurant.'</span></li>
                 <li class="list-group-item"><b>Latitude:  </b><span class="">'.$row->latitude.'</span></li>
                 <li class="list-group-item"><b>Longitude:  </b><span class="">'.$row->longitude.'</span></li>
                </ul>

                </div>
                <div class = "col-md-6">

                <center><p class="list-group-item list-group-item-success"><b>food image</b></p></center>

                <ul class="list-group">
                <center><img src = "../upload/'.$row->image.'" class = "img-responsive" width="80%" height="80%"></center>

                </ul>
                </div>
                </div>





                ';




              }




               ?>



            </div>
            </div>




    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php

include_once 'footer.php';

 ?>
