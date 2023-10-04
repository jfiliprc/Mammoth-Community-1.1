<?php
require_once 'conn/Database.php';


if (isset($_POST['go_back'])) {
    header("Location: dashboard.php"); 
    exit();
}

if (isset($_GET['id'])) {
    $topic_id = $_GET['id'];

    // Fetch the specific post by topic_id
    $post_sql = "SELECT topics.*, users.first_name FROM topics 
                 INNER JOIN users ON topics.user_id = users.id 
                 WHERE topics.id = :topic_id";

    $stmt = $pdo->prepare($post_sql);
    $stmt->bindParam(':topic_id', $topic_id);
    $stmt->execute();

    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($post)  {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Social Media Post</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .post-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-name {
            font-weight: bold;
            font-size: 16px;
        }

        .post-content {
            padding: 20px;
            font-size: 16px;
        }

        .comment-container {
            background-color: #fff;
            border-radius: 5px;
            margin-top: 20px;
            padding: 10px;
        }

        .comment {
            padding: 15px 0;
            display: flex;
        }

        .comment-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }

        .comment-content {
            flex-grow: 1;
        }

        .comment-header {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .comment-date {
            font-size: 12px;
            color: #999;
            margin-left: auto;
        }

        .comment-text {
            font-size: 14px;
            margin-top: 5px;
        }

        .comment-actions {
            margin-top: 10px;
            display: flex;
            align-items: center;
        }

        .comment-actions button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            margin-right: 10px;
            font-size: 12px;
        }

        .add-comment {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .add-comment textarea {
            width: 100%;
            resize: none;
            border: none;
            padding: 10px;
            border-radius: 5px;
        }

        .add-comment button {
            margin-top: 10px;
        }

        .go-back-icon {
            margin-right: 5px;
        }
    </style>
    </head>
    <body>
    <?php require_once 'navbar.php'; ?>
    <form method="POST">
    <div class="text-left mt-3 ml-3">
        <form method="POST">
            <button type="submit" class="btn btn-danger" name="go_back">
                    <i class="fas fa-arrow-left go-back-icon"></i> Go Back
            </button>
        </form>
    </div>
    </form>
        <div class="post-container">
            <div class="post-header">
                <img src="images/default-avatar.jpg" alt="User Image" class="user-avatar">
                <div>
                    <div class="user-name"><?=$post['first_name']?></div>
                </div>
            </div>
            <div class="post-content">
                <?=htmlspecialchars($post['body'])?>
        </div>

        <div class="comment-container">
            <h4>Comments</h4>

            <?php
            $stmt = $pdo->prepare("SELECT replies.*, users.first_name FROM replies 
            INNER JOIN users ON replies.user_id = users.id 
            WHERE replies.topic_id = :topic_id 
            ORDER BY replies.create_date DESC");
            $stmt->bindParam(':topic_id', $topic_id);
            $stmt->execute();


            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="comment">
                    <img src="images/default-avatar.jpg" alt="User Avatar" class="comment-avatar">
                    <div class="comment-content">
                        <div class="comment-header">
                            <span class="user-name"><?= htmlspecialchars($row['first_name']) ?></span>
                            <span class="comment-date"><?= htmlspecialchars($row['create_date']) ?></span>
                        </div>
                        <div class="comment-text"><?= htmlspecialchars($row['body']) ?></div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

                <div class="add-comment">
                    <h5>Add a Comment</h5>
                    <form method="post" name="reply" action="add_comment.php">
                        <input type="hidden" name="topic_id" value="<?=$topic_id?>">
                        <div class="form-group">
                            <textarea class="form-control" name="reply" rows="3" placeholder="Write your comment here"></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger float-right">Post Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
    } else {
        echo "Post not found.";
    }
} else {
    echo "Topic ID not found in the URL.";
}
?>
