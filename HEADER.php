<!DOCTYPE html>
<html>

<head>
    <title>Wishflix</title>
    <link href="style.css" rel="stylesheet">
    <script src="movie.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="background-header">
        <div class="header-box">
            <div class="wishflix">
        <a href="Home.php"><img src="assets/426f0513b5ab028ed26e1fd86ad03c68.png" alt="Wisflix"></a>
        </div>
        <div class="full-nav-bar">
            <div class="nav-bar-left">
                <a href="FILMS.php">FILMS</a>
                <a href="user.php">USER</a>
                <div class="search">
                <form method="post" action="search-user.php">
                <input type="text" name="user" placeholder="First or Lastname">
                
            </form>
            </div>
            </div>
            <div class="search">
                <form method="get" action="FILMS.php">
                    <input type="text" name="movie" placeholder="Search your movie">
                </form>
                <select>
                        <option>PROFILE</option>
                        <option><a href="#">My subsription</option>
                        <option><a href="#">My History</a></option>
                    </select>
               
            </div>
         
            
            
            </div>
        </div>
    </div>
        
</body>

</html>
