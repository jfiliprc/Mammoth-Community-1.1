<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Mammoth Community</title>
  </head>
  <body>


<section class="background-radial-gradient overflow-hidden">
    <style>
    .background-radial-gradient {
        background-color: hsl(0, 0%, 10%);
        background-image: radial-gradient(650px circle at 0% 0%,
            hsl(0, 100%, 10%) 15%,
            hsl(0, 0%, 5%) 35%,
            hsl(0, 0%, 2%) 75%,
            hsl(0, 0%, 2%) 80%,
            transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
            hsl(0, 100%, 20%) 15%,
            hsl(0, 0%, 10%) 35%,
            hsl(0, 0%, 2%) 75%,
            hsl(0, 0%, 2%) 80%,
            transparent 100%);
    }

    #radius-shape-1 {
        height: 220px;
        width: 220px;
        top: -60px;
        left: -130px;
        background: radial-gradient(black, darkred);
        overflow: hidden;
    }

    #radius-shape-2 {
        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
        bottom: -60px;
        right: -110px;
        width: 300px;
        height: 300px;
        background: radial-gradient(black, darkred);
        overflow: hidden;
    }

    .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.9) !important;
        backdrop-filter: saturate(200%) blur(25px);
    }
    </style>

<?php
session_start();
if(isset($_SESSION['user_id'])){
  header('Location: dashboard.php');
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $errors = [];
    if (empty($_POST["firstName"])) {
        $errors[] = "First name is required.";
    }
    if (empty($_POST["lastName"])) {
        $errors[] = "Last name is required.";
    }
    if (empty($_POST["eMail"])) {
        $errors[] = "Email address is required.";
    }
    if (empty($_POST["password"])) {
        $errors[] = "Password is required.";
    }

    $email = filter_var($_POST["eMail"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    $pdo = new PDO('mysql:host=localhost;dbname=forum', 'root', '', [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        $errors[] = "Email address is already registered.";
    }

    if (empty($errors)) {
        $firstName = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING);
        $lastName = filter_var($_POST["lastName"], FILTER_SANITIZE_STRING);
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$firstName, $lastName, $email, $password]);

        header("Location: login.php");
    }

    $email = filter_var($_POST["eMail"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($errors)) {
        $firstName = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING);
        $lastName = filter_var($_POST["lastName"], FILTER_SANITIZE_STRING);
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

        $pdo = new PDO('mysql:host=localhost;dbname=forum', 'root', '', [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$firstName, $lastName, $email, $password]);

        header("Location: login.php");
    }
}
?>

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Welcome to the <br />
          <span style="color: red;">Mammoth Community</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
        Nestled deep within the annals of prehistoric history, 
        the Ancient Mammoth Community stands as a testament to the endurance and resilience of a bygone era. 
        This extraordinary community flourished during a time when colossal woolly mammoths roamed the earth, 
        shaping an existence intricately connected to the rhythms of the natural world.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form method="POST">
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="firstName" name="firstName" class="form-control" />
                      <label class="form-label" for="firstName">First name</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="lastName" name="lastName" class="form-control" />
                      <label class="form-label" for="lasttName">Last name</label>
                    </div>
                  </div>
                </div>
                <div class="form-outline mb-4">
                  <input type="email" id="eMail" name="eMail" class="form-control" />
                  <label class="form-label" for="eMail">Email address</label>
                </div>
                <div class="form-outline mb-4">
                  <input type="password" id="password" name="password" class="form-control" />
                  <label class="form-label" for="password">Password</label>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                      <button type="submit" class="btn btn-danger btn-block mb-4">
                          Sign Up
                      </button>
              </div>
          </form>

              <div class="text-center">
                <p>Already have an account?</p>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="login.php" class="btn btn-danger btn-block mb-4">
                        Log in
                    </a>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>