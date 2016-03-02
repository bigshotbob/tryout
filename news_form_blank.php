<html>

   <head>
      <title>Add New Record in MySQL Database</title>
   </head>

   <body>
      <?php
         if(isset($_POST['add'])) {
            $dbhost = 'l3855uft9zao23e2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
            $dbuser = 'yx0ws0j3oorsidpn';
            $dbpass = 'raws7z6l12bz7649';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);

            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }

            if(! get_magic_quotes_gpc() ) {
               $headline = addslashes ($_POST['headline']);
               $newstext = addslashes ($_POST['newstext']);
            }else {
               $headline = $_POST['headline'];
               $newstext = $_POST['newstext'];
            }


            $sql = "INSERT INTO News ". "(Headline,NewsText,
               published) ". "VALUES('$headline','$newstext', NOW())";

            mysql_select_db('qy3mv7htz0k2i85y');
            $retval = mysql_query( $sql, $conn );

            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }

            echo "Entered data successfully\n";

            mysql_close($conn);
         }else {
            ?>

               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1"
                     cellpadding = "2">

                     <tr>
                        <td width = "100">Title</td>
                        <td><input name = "headline" type = "text"
                           id = "headline"></td>
                     </tr>

                     <tr>
                        <td width = "100">Text</td>
                        <td><input name = "newstext" type = "text"
                           id = "newstext"></td>
                     </tr>
<!--
                     <tr>
                        <td width = "100">Employee Salary</td>
                        <td><input name = "emp_salary" type = "text"
                           id = "emp_salary"></td>
                     </tr>
-->
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>

                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add"
                              value = "Add Article">
                        </td>
                     </tr>

                  </table>
               </form>

            <?php
         }
      ?>

   </body>
</html>
