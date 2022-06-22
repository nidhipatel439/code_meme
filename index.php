<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>code_meme</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    $connect = mysqli_connect(
        "sql203.epizy.com",
        "epiz_31641832",
        "H7cqtgynMmPWXiA",
        "epiz_31641832_instagram"
    );
    $query = 'SELECT id, image, comment, likes, posted_at FROM instagram_posts ORDER BY posted_at';
    $result = mysqli_query($connect, $query);
    ?>
    <header id="header">
        <div class="container">
            <div class="header-inr">
                <div class="header-logo">
                    <a href="#"></a>
                </div>
                <div class="search">
                    <form action="index.php">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><img src="images/search.png"></button>
                    </form>
                </div>
                <nav id="menu">
                    <ul>
                        <li><a href="#"><img src="images/home.png"></a></li>
                        <li><a href="#"><img src="images/messenger.png"></a></li>
                        <li><a href="#"><img src="images/plus.png"></a></li>
                        <li><a href="#"><img src="images/direction.png"></a></li>
                        <li><a href="#"><img src="images/heart.png"></a></li>
                        <li class="menu-profile"><a href="#"><img src="images/menu-profile.jpg"></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main id="main">
        <div class="container">
            <section id="profile">
                <div class="profile-icon">
                    <img src="images/menu-profile.jpg">
                </div>
                <div class="profile-detail">
                    <div class="profile-header">
                        <h1>code_meme</h1>
                        <a href="#" class="edit-profile">Edit profile</a>
                        <button class="options"><img src="images/setting.png"></button>
                    </div>
                    <div class="profile-information">
                        <ul>
                            <li><span>
                                    <?php
                                    echo mysqli_num_rows($result)
                                    ?>
                                </span> posts</li>
                            <li><span>220</span> followers</li>
                            <li><span>275</span> following</li>
                        </ul>
                    </div>
                    <div class="profile-name">
                        <h2>Code Blue Memes</h2>
                    </div>
                </div>
            </section>
            <section id="posts">
                <div class="post-link">
                    <ul>
                        <li class="link1 active"><a href="#">Posts</a></li>
                        <li class="link2"><a href="#">Saved</a></li>
                        <li class="link3"><a href="#">Tagged</a></li>
                    </ul>
                </div>
                <div class="row">
                    <?php
                    while ($record = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-3">';
                        echo '<img src="images/' . $record["image"] . '">';
                        echo '<div class="post-overlay">';
                        echo '<ul>';
                        if ($record["likes"] > 0) {
                            echo '<li class="post-like">' . $record["likes"] . '</li>';
                        }
                        if ($record["comment"] > 0) {
                            echo '<li class="post-comment">' . $record["comment"] . '</li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </section>
        </div>
    </main>
    <footer id="footer">
        <div class="container">
            <p>© 2022 Instagram from Nidhi</p>
        </div>
    </footer>
</body>

</html>