<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Edit profile</div>
                <div class="card-body">
                        
                    <form action="api/v1/user/update" method="POST">
                        @method('PUt')
                
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" name="fname" id="inputFirstName" type="text" placeholder="Enter your first name">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" name="lname" id="inputLastName" type="text" placeholder="Enter your last name">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <!-- Form Group (email address)-->
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Role</label>
                                <select name="role">
                                    <option value="-1" selected>Choose</option>
                                    <option value="1">Writer</option>
                                    <option value="2">Editor</option>
                                </select>
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>