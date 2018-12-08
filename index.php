<?php if ( ! isset($_SESSION))
{
    session_start();
} ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Karma:400,500,600" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="./public/css/style.css">
    <title>Book Store</title>
</head>

<body>

<?php if ( ! isset($_SESSION['user_email'])): ?>
<?php $auth = "false"; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-5 col-md-6">
            <form action="./app/controllers/login.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control"
                           placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="password" class="form-control"
                           placeholder="Password" required>
                </div>
                <button type="submit" name="submit" value="login" class="btn btn-success">
                    Login
                </button>
            </form>
        </div>

        <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
            <form action="./app/controllers/register.php" method="post" class="form-horizontal">
                <div class="form-group">

                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username"
                           minlength="4" maxlength="16" required>

                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Email"
                           required>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="password" class="form-control"
                           placeholder="Password" minlength="4" maxlength="8" required>
                </div>
                <button type="submit" name="submit" value="register" class="btn btn-success">
                    Register
                </button>
            </form>
        </div>
    </div>

    <?php else: ?>

        <?php $auth = "true"; ?>

        <a href="./app/controllers/logout.php" class="btn btn-danger active logout" role="button" aria-pressed="true">Logout</a>

        <a href="./app/controllers/mybooks.php" class="btn btn-secondary active mybooks float-right" role="button" aria-pressed="true">My Books</a>

    <?php endif; ?>

    <hr>


    <main id="booksPage">
        <section>
            <h2>Search for books here</h2>
            <form>
                <label for="search"></label><input type="search" id="search">
                <input type="button" class="btn btn-success btn-sm" id="searchButton" value="Search">
            </form>
            <label for="search_type"></label>
            <select id="search_type" onchange="search_val()">
                <option value="inauthor" selected="selected">author</option>
                <option value="inpublisher">publisher</option>
                <option value="subject">category</option>
            </select>
            <button class="btn btn-warning btn-sm hidden clear">Clear search</button>
            <br>
            <p id="totalItems"></p>
            <ul id="resultList">
            </ul>
            <button type="button" class="btn btn-primary btn-sm" id="fetchMoreButton">Show 10 more titles</button>
            <button class="btn btn-warning btn-sm hidden clear">Clear search</button>
        </section>
    </main>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript">var auth = "<?= $auth ?>";</script>
<script src="./public/js/main.js"></script>

</body>
</html>

