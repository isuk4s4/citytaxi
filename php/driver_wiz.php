<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>driver Wizard</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bd-wizard.css">
</head>
<body>
  <main class="my-5">
    <div class="container">
      <div id="wizard">
        <h3>
          <div class="media">
            <div class="bd-wizard-step-icon"><i class="mdi mdi-account-outline"></i></div>
            <div class="media-body">
              <div class="bd-wizard-step-title">Taxi Details</div>
              <div class="bd-wizard-step-subtitle">Step 1</div>
            </div>
          </div>
        </h3>
        <section>
          <form action="get" mwthod="GET">
          <div class="content-wrapper">
            <h4 class="section-heading">Enter your  details </h4>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="firstName" class="sr-only"> Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder=" Name">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="car" class="sr-only">car model</label>
                <input type="email" name="car" id="car" class="form-control" placeholder="car">
              </div>
              <div class="form-group col-md-6">
                <label for="car" class="sr-only">Price</label>
                <input type="price" name="price" id="price" class="form-control" placeholder="price">
              </div>
            </div>
          </div>
          </form>
         
        </section>
      
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.steps.min.js"></script>
  <script src="assets/js/bd-wizard.js"></script>
  <script>
  const tes = document.querySelector('[href="#finish"]');
  const name = document.querySelector('#name');
  const model = document.querySelector('#car');
  const price = document.querySelector('#price');
  $(document).ready(function() {   tes.addEventListener('click', () =>{
    $.ajax({
      url:"setup.php",
      method:"POST",
      data:{name:name.value,model:model.value,price:price.value}
    }).then(() =>{
      locatio.href="?page=home";
    })
  });})

  </script>
</body>
</html>
