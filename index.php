<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
     body{
       font: 0.9em Tahoma,sans-serif;
     }
     .title{
       font-weight: normal;
     }
     .container{
       width: 100%;
       max-width: 700px;
       text-align: center;
       margin:0 auto;
     }
     input{
       padding: 10px;
       background-color: #fff;
       border: 1px solid #ccc;
       margin: 0;
     }
   </style>
  </head>
  <body>
    <div class="container">
    <h1>Url Shortner</h1>
<form class="" action="index.php" method="post">
  <input type="text" name="url_value" value="">
  <input type="submit" name="" value="Short Link">
</form>

    <?php
    // Include database configuration file
    require_once 'dbConfig.php';

    // Include URL Shortener library file
    require_once 'Shortener.class.php';

    // Initialize Shortener class and pass PDO object
    $shortener = new Shortener($db);
    // Long URL
    $longURL = $_POST["url_value"];

    // Prefix of the short URL
    $shortURL_Prefix = 'https://localhost/short/'; // with URL rewrite
    $shortURL_Prefix = 'https://localhost/short/r.php?c='; // without URL rewrite

    try{
        // Get short code of the URL
        $shortCode = $shortener->urlToShortCode($longURL);

        // Create short URL
        $shortURL = $shortURL_Prefix.$shortCode;

        // Display short URL
        echo 'Short URL: <a href="'.$shortURL.'" target="_blank">'.'htpp://localhost/r.php?'.$shortCode.'</a>';
    }catch(Exception $e){
        // Display error
        echo $e->getMessage();
    }

    ?>
  </div>
  </body>
</html>
