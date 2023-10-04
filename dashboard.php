<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mamooth Community | Dashboard</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<style>

.btn-txt {
    color: #FFFFFF !important;
    text-decoration: none !important;
}

</style>


<?php
session_start();
if (!$_SESSION['user_id']) {
    header("Location: login.php");
    exit;
}
?>

<body>
<?php require_once 'navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <div class="post-box">
            <h2>Create a Post</h2>
            <form method="POST" action="post.php">
                <div class="form-group d-flex justify-content-between">
                    <textarea name="content" class="form-control" rows="4" placeholder="What's on your mind?" required></textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-danger">Post</button>
                </div>
            </form>
        </div>


                <div class="timeline">
                    
                    <h2>Timeline</h2>
                    <?php
                    require_once 'conn/Database.php';
                    $userID = $_SESSION['user_id'];
                    $stmt = $pdo->prepare("SELECT first_name FROM users WHERE id = :user_id");
                    $stmt->bindParam(':user_id', $userID);
                    $stmt->execute();
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    $stmt = $pdo->query("SELECT topics.*, users.first_name FROM topics INNER JOIN users ON topics.user_id = users.id ORDER BY topics.create_date DESC");

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                        if (isset($row['id'])) {
                            $topic_id = $row['id'];
                            ?>

                            <div class="media" style="padding: 10px;">
                                <img src="images/default-avatar.jpg" style="width:20%;" alt="User Image">
                                <div class="media-body" style="padding-left: 10px;" >
                                    <h5 class="mt-0"><?= $row['first_name'] ?></h5>
                                    <?php echo htmlspecialchars($row['body']); ?> 
                                </div>
                                <button type="button" class="btn btn-danger">
                                    <a href="expanded_post.php?id=<?= $topic_id ?>" class="btn-txt">
                                        <i class="fas fa-comment"></i>
                                    </a>
                                </button>
                            </div>

                        <?php
                        }
                    }
                    ?>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="images/default-avatar.jpg" alt="Default Avatar" class="profile-image">
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            require_once 'conn/Database.php';
                            $userID = $_SESSION['user_id'];
                            $stmt = $pdo->prepare("SELECT first_name, email, about, avatar FROM users WHERE id = :user_id");
                            $stmt->bindValue(':user_id', $userID);
                            $stmt->execute();
                            $user = $stmt->fetch(PDO::FETCH_ASSOC);

                            $userName = $user['first_name'];
                            $userEmail = $user['email'];
                            $userAbout = $user['about'];
                            ?>
                            <h5 class="card-title"><?= $userName ?></h5>
                            <p class="card-text">Email: <?= $userEmail ?></p>
                            <?php
                        } else {
                            echo "<p>Please log in to view your profile.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
