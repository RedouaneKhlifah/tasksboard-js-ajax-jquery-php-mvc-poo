<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/css/login.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <title>Document</title>

  </head>
  <body>
    <section class="form my-4 mx-5">
      <div class="contianer">
        <div class="row no-gutters">
          <div class="col-lg-5 px-0">
            <img src="/assets/img/login.jpg" class="img" alt="" />
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <h1 class="font-weight-bold py-3">trelly</h1>
            <h4>sign ip to your account</h4>
            <p class="text-danger"><?php echo $validate ?></p>
            <form action="http://trelly/user/login" method="post">
              <div class="form-row px-0">
                <div class="col-lg-7">
                  <input
                    name="email"
                    placeholder="email"
                    class="form-control my-3 p-3"
                  />
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input
                    type="password"
                    name="password"
                    placeholder="password"
                    class="form-control my-3 p-3"
                  />
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <button name="login" class="btn1 mt-3 mb-5">
                    login
                  </button>
                </div>
              </div>
              <p>dont have an account <a href="http://trelly/user/signup">register here </a></p>
            </form>
          </div>
        </div>
      </div>
    </section>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
