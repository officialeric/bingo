<?php 
            include 'header.php'; 
            include 'sidebar.php';
        ?>
            
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">App Setting</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    setting
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    
                <form action="../logic/setting.php" method="post">
                    <input type="hidden" name="id" value='<?=$my_setting['id']?>'>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Heading</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='heading' required value='<?=$my_setting['heading'] ?? null?>'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Description</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='desc' required value='<?=$my_setting['description'] ?? null?>'>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Video URL</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='video' required placeholder='ed: https://youtube.com/addscsf'>
                    </div> -->

                    <button class='btn btn-primary' type='submit' name='save'>Save</button>
                </form>
                    
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->
       
        <?php
            include 'footer.php';
        ?>