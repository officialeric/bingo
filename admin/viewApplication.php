<?php 
            include 'header.php'; 
            include 'sidebar.php';
        ?>
            
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Single Application</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Single Application
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                <div class="card">
            <div class="card-header">
                <h5>Applicant Details</h5>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Full Name:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['name']); ?></dd>
                    
                    <dt class="col-sm-3">Email Address:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['email']); ?></dd>
                    
                    <dt class="col-sm-3">Phone Number:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['phone_number']); ?></dd>
                    
                    <dt class="col-sm-3">Age:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['age']); ?></dd>
                    
                    <dt class="col-sm-3">Country:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['country']); ?></dd>
                    
                    <dt class="col-sm-3">Region:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['region']); ?></dd>
                    
                    <dt class="col-sm-3">District:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['district']); ?></dd>
                    
                    <dt class="col-sm-3">Street:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['street']); ?></dd>
                    
                    <dt class="col-sm-3">Marital Status:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['marital_status']); ?></dd>
                    
                    <dt class="col-sm-3">Highest Education Level:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['education_level']); ?></dd>
                    
                    <dt class="col-sm-3">Currently Working:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['is_working']); ?></dd>
                    
                    <dt class="col-sm-3">Work Place (if working):</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['work_place']); ?></dd>
                    
                    <dt class="col-sm-3">Traveled in Last 5 Years:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['has_traveled']); ?></dd>
                    
                    <dt class="col-sm-3">Traveled Countries:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['traveled_countries']); ?></dd>
                    
                    <dt class="col-sm-3">Applied for Work Visa:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['has_applied']); ?></dd>
                    
                    <dt class="col-sm-3">Applied Countries:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['applied_countries']); ?></dd>
                    
                    <dt class="col-sm-3">Preferred Countries:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['preferences']); ?></dd>
                    
                    <dt class="col-sm-3">Has Passport:</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($applicant['has_passport']); ?></dd>
                    
                    <dt class="col-sm-3">Passport/National ID:</dt>
                    <dd class="col-sm-9">
                        <?php if ($applicant['has_passport'] === 'Yes'): ?>
                            <a href="view_pdf.php?file=<?php echo $applicant['passport']; ?>" target="_blank">View Passport</a>
                        <?php else: ?>
                            <a href="view_pdf.php?file=<?php echo $applicant['passport']; ?>" target="_blank">View National ID</a>
                        <?php endif; ?>
                    </dd>
                    
                    <dt class="col-sm-3">CV:</dt>
                    <dd class="col-sm-9">
                    <a href="view_pdf.php?file=<?php echo $applicant['cv']; ?>" target="_blank">View CV </a>
                    </dd>
                </dl>
                <a href="applications.php" class="btn btn-secondary">Back to Applications</a>
            </div>
        </div>
    </div>
                    
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->
