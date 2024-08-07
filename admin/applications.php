<?php 
            include 'header.php'; 
            include 'sidebar.php';
        ?>
            
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Applications</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    applications
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->
                        <div class="container">
                        <div class="card my-4">
         <!-- <div class="card-header">
            <h3 class="card-title">Striped Full Width Table</h3>
         </div> -->
         <div class="card-body p-0">
            <table class="table table-striped">
                  <thead>
                     <tr>
                        <th style="">#</th>
                        <th>Name</th>
                        <th>Phone number</th>
                        <th style="">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i=1; foreach($applications as $application) :?>
                     <tr class="align-middle">
                        <td><?=$i++?></td>
                  
                        <td><?='email'?></td>
                        <td><?='number'?></td>
                        <td>
                           <a href="editMember.php?id=<?=$application['id']?>&table=members">
                               <button class='text-white btn btn-success'><i class="bi bi-pencil-square"></i></button>
                           </a>
                           <a href="../../../logic/deletion.php?id=<?=$application['id']?>&table=members">
                              <button class='text-white btn btn-danger'><i class="bi bi-trash3"></i></button>
                           </a>                        
                        </td>
                     </tr>
                     <?php endforeach ?>
                  </tbody>
            </table>
         </div> <!-- /.card-body -->
      </div> 
                        </div>
                    </div> <!--end::Row--> <!--begin::Row-->
                    
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->
       
        <?php
            include 'footer.php';
        ?>