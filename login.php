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


<?php
session_start();
if(isset($_SESSION['user_id'])){
    header('Location: dashboard.php');
}

require_once 'conn/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validate = isset($_POST['login']) && $_POST['login']? true : false;
    if($validate) {
    $email = filter_var($_POST['eMail'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php"); 
        exit;
    } else {
        $loginError = "Invalid email or password. Please try again.";
    }
    }
}
?>  

<section class="background-radial-gradient overflow-hidden" style="height: 100vh;">
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
                border-radius: 0; 
                margin: 0; 
                padding: 0; 
            }
            .card {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%;
                width
            }
        </style>
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5 justify-content-center">
            <div class="col-lg-6 mb-5 mb-lg-0 position-relative ">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass ">
                    <div class="card-body px-4 py-5 px-md-5">
                        <form action="login.php" method="POST">
                            <input type="hidden" name="login" value="true">
                            <div class="form-outline mb-4">
                                <input type="eMail" id="form3Example3" class="form-control" name="eMail">
                                    <label class="form-label" for="form3Example3">Email address</label>
                                </input>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="form3Example4" class="form-control" name="password" />
                                <label class="form-label" for="form3Example4">Password</label>
                            </div>

                            <div class="d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-danger btn-block mb-4">
                                    Login
                                </button>
                            </div>

                            <div class="text-center">
                                <p>Don't have an account?</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="register.php" class="btn btn-danger btn-block mb-4">
                                        Sign Up
                                    </a>
                                </div>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</body>
</html>
