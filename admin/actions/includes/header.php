<?php
// session_start();
// if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] === "3e6405ebeb13a7e240de6b5c3c441316")
// {
//   if(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)
//   {
        $servername = "localhost";
        $username = "me";
        $password = "amx";
        $dbname = "lc";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error)
        {
          $te = convert_error_2str($conn->connect_error);
          show_result("error","$te","","","Database Error","current");
        }

//   }
// }
// else
// {
//   ><script> window.location = "login.php"; </script><?php
// }


function show_result($mode="error",$text="result text",$button="",$target="",$title="LC Melody",$window="current")
{
    ?>
        <script>
            window.location=('http://localhost/lc/admin/result.php?mode=<?php echo $mode;?>&text=<?php echo $text;?>&button=<?php echo $button;?>&target=<?php echo $target;?>&title=<?php echo $title;?>');
        </script>
     <?php

}


function convert_error_2str($text="") //sql errors've some special charecters can make problem in js.window.location strings and parameters
{
  $text2 = str_replace( array( '\'', '"', '\"' , '\`' , ',' , ';', '<', '>' ), '', $text);
  return $text2;
}
?>