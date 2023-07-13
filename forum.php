<html>

    <head>
            <title> Forum </title>
            <link rel="stylesheet" href="assets/css/styles.css" />
            <link rel="stylesheet" href="forum-style.css" />

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

        <div class="forum_table" style="position: absolute; top: 100; left: 50;">
          <h1> Posts in the Forum</h1>
          <table cellpadding="4" cellspacing="4">`
            <tr>
                <th style="width: 300; height: 40;"> AUTHOR </th>
                <th style="width: 900; height: 40;"> POSTS </th>
            </tr>
            <!-- include php file to display posts -->
            <?php

              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "forumDB";

              try{

                  $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
                  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $GetTbl = "Select * from Posts"; 
                  $qGetTbl = $connection->query($GetTbl);

                  while($rGetTbl = $qGetTbl->fetch()){
                          
                      echo "<tr class=\"post\">";
                      echo "<td>". $rGetTbl[1] ."</br>[". $rGetTbl[4] ."]</td>";
                      echo "<td><strong>". $rGetTbl[2] ."</strong><br/>". $rGetTbl[3] ."</br><br/><a href=\"reply-form.php?post_id=$rGetTbl[0]\" title=\"reply post\" class=\"reply-button\"> REPLY TO THIS POST </a></td>";
                      echo "</tr>"; 

                      $GetTbl2 = "Select * from Reply WHERE Post_ID='$rGetTbl[0]'"; 
                      $qGetTbl2 = $connection->query($GetTbl2);

                      while($rGetTbl2 = $qGetTbl2->fetch()){
                              
                          echo "<tr class=\"reply\"><td></td>";
                          echo "<td> REPLY BY: ". $rGetTbl2[0] ." [". $rGetTbl2[2] ."]</br></br>";
                          echo $rGetTbl2[1] ."</td>";
                          echo "</tr>"; 
                      }
                  }
              }
              catch(PDOException $e) 
              {
                  echo "Connection failed: " . $e->getMessage();
              }
            ?>

          </table>

          <div class="newpost" style="position: absolute; left: 1000;">
            <a href="write-form.html" title="write post" class="write-button"> WRITE NEW POST </a>
          </div>

        </div>
    </body>
  </html>