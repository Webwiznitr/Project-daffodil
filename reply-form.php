<html>

    <head>
            <title> Forum </title>
            <link rel="stylesheet" href="assets/css/styles.css" />
            <link rel="stylesheet" href="assets/css/forum-style.css" />

    </head>
    <body>
        <div class="large-wrapper">
            <div class="wrapper">
                <header>
                  <nav>
                    <div class="menu-icon">
                      <i class="fa fa-bars fa-2x"></i>
                    </div>
                    <div class="logo">
                      <a href="https://webwiznitr.xyz"><img src="assets/img/logo.ico"></a>
                    </div>
                    <div class="menu">
                      <ul>
                        <li><a href="index.html">HOME</a></li>
                        <li><a href="index.html#aboutid">ABOUT</a></li>
                        <li><a href="index.html#materialid">MATERIALS</a></li>
                        <li><a href="forum.php">FORUM</a></li>
                        <li><a href="https://chat.whatsapp.com/EVROMYW4i163CcMQkW0bmO"><button class="btnn">JOIN US!</button></a></li>
                        <li>
                          <button style="display: none;" id="dark" type="button" class="btn btn-outline-dark">
                            Dark Mode
                          </button>
                        </li>
                      </ul>
                    </div>
                  </nav>
                </header>
            </div>
        </div>

        <?php
          //define the database connection variables
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "forumDB";

          try{
              //create a connection object
              $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
                  
              //set the PDO error mode to exception
              $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
              //get post_id which fetch from forum.php when the reply button is clicked
              $post_id=$_GET['post_id'];

          }
          catch(PDOException $e) 
          {
              echo "Connection failed: " . $e->getMessage();
          }
        ?>

        <div class="inputform" style="position: absolute; top: 100; left: 50;">
            <h1> Reply Post</h1><br/><br/>
            <form method="post" action="replyDB.php?post_id=<?php echo $post_id ?>" name="reply_post">

                <label for="email">Email Address:</label> <br/>
                <div class="inputbox">
                    <input type="email" name="email" placeholder="abcd@hotmail.com" required />  
                </div>

                <br/><br/>
                <label for="contents">Reply Contents:</label> <br/>
                <div class="inputbox">
                    <textarea name="contents" rows="20" placeholder="Write your reply here..."></textarea> <br /> <br />
                </div>

                <div class="inputbox">
                    <input type="submit" name="reply" value="Reply Post" style="width: 150;"/> 
                </div>

            </form>    
        </div>

    </body>
</html>