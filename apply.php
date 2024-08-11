<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
      <div class="card">
        <div class="card-header">
          <p>Fill the form</p>
        </div>
        <div class="card-body">
        <form action="logic/apply.php" method="POST" enctype="multipart/form-data">
              
            <div class="row">

              <div class="col-12 col-md-6 col-lg">

              <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Full name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='name' required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" name='email' required>
                    </div>
              </div>

              <div class="col-12 col-md-6 col-lg">

              <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='phone_number' required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Age</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name='age' required>
                    </div>
              </div>
           </div>

           <div class="row">
           <div class="col-12 col-md-6 col-lg">
                  <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Country</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='country' required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Region</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='region' required>
                    </div>
              </div>

              <div class="col-12 col-md-6 col-lg">

                   <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">District</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='district' required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Street</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name='street' required>
                    </div>
              </div>
              <div class="col-12 col-md-6 col-lg">
                 <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Marital Status</label>
                        <select class="form-select" aria-label="Default select example" name='marital_status' required>
                        <option value="single" selected>Single</option>
                        <option value="married">Married</option>
                        </select>
                    </div>
              </div>
              
           </div>

           <hr>

           <div class="row">
           <div class="col-12 col-md-6 col-lg">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Your highest education level</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='education_level' required>
                </div>
                
                </div>
           </div>

           <div class="row">
              <div class="col-12 col-md-6 col-lg">
              <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Are you currently working?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_working" value='Yes' id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_working"  value='No'id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                        </div>                
                    </div>
              </div>
              <div class="col-12 col-md-6 col-lg">
              <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">If Yes , where? </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='work_place'>
                </div>
                
              </div>
           </div>
           <div class="row">
              <div class="col-12 col-md-6 col-lg">
              <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Have you travelled to any country within last 5 years?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="has_traveled" value='Yes' id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="has_traveled" value='No' id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                        </div>                
                    </div>
              </div>
              <div class="col-12 col-md-6 col-lg">
              <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">If Yes , mention those countries? </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='traveled_countries'>
                </div>
                
              </div>
           </div>
           <div class="row">
              <div class="col-12 col-md-6 col-lg">
              <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Have you ever applied for a work visa in any country?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="has_applied" value='Yes' id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="has_applied" value='No' id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                        </div>                
                    </div>
              </div>
              <div class="col-12 col-md-6 col-lg">
              <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">If Yes , mention those countries you applied? </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='applied_countries'>
                </div>
                
              </div>
           </div>
           <div class="row">
             <div class="col-12 col-md-6 col-lg">
               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Fill in three countries of your preference from our list </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='preferences' placeholder='eg, tanzania, uganda, kenya'>
                </div>
             </div>
           </div>

           <div class="row">
              <div class="col-12 col-md-6 col-lg">
              <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Do you have a passport?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="has_passport" value='Yes' id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="has_passport" value='No' id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                        </div>                
                    </div>
              </div>
              <div class="col-12 col-md-6 col-lg">
              <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">If Yes , Upload your passport </label>
                    <div id="emailHelp" class="form-text">If NO , upload your National ID / introduction letter from your local government.</div>

                    <input class="form-control" type="file" id="passport" name="passport" accept=".pdf" required>
                    </div>
                
              </div>
           </div>

           <div class="row">
             <div class="col-12 col-md-6 col-lg">
             <div class="mb-3">
                        <label for="cv" class="form-label">Upload CV (PDF only)</label>
                        <input class="form-control" type="file" id="cv" name="cv" accept=".pdf" required>
                    </div>
             </div>
           </div>

           <button class='btn btn-primary' name='submit' type='submit'>Submit</button>
           </form>
        </div>
      </div>
    </div>
</body>
</html>