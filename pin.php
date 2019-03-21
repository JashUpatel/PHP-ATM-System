
  <script type="text/javascript">
   

   function redirect(button){
     var x = button.id;
     if(x==1)
     {
       var ans =  confirm("Press Ok to Cancel");
       if (ans == true) {
         document.write();
         window.location.assign("transc.php")
   
       } 
       else {

     return false
       }
     }
   
     if (x=='ch') {
       var ans =  confirm("<?php echo 'Press Ok to Change your Pin';?>");
       if (ans == true) {
         document.getElementById("ch").name="change";

   return false
       } else {
     
      document.getElementById("ch").name="nochange";

     return false
       }
     }
   }
   
       </script>

   


<?php 
session_start();
if(!isset($_SESSION['name']))
{
  header("Location:sry.php");
  exit();
}

include_once 'dbh.php';
$account = $_SESSION['account'];
if(isset($_POST['change']))
{

  if(empty($_POST['pin'])||empty($_POST['cpin']))
  {
    $msg = "Pin value cannot be set empty!";
  }
  else{
    if(is_numeric($_POST['pin'])||is_numeric($_POST['cpin']))
    {
if($_POST['pin']==$_POST['cpin'])
{
$pin = $_POST['pin'];
$sql = "UPDATE `account` SET `pin`= $pin WHERE `account`= $account;";
$result = mysqli_query($conn,$sql);
$msg = "Pin Changed Sucessfully.";
header( "refresh:3; url=transc.php" ); 

}
else{
    $msg = "Pin value Doesn't  Match!";
}
    }
    else {
      
      $msg="Pin must be in numeric format!";
    }
    }
  }


if (isset($_POST['nochange'])) {
  # code...
  $msg="pin not changed!";
}


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ATM System.</title>
    <link rel="stylesheet" href="indexstyle.css">
    <link rel="stylesheet" href="all.css">
  </head>
  <body>


      <header>
        <div class="logo">
<i class="fa fa-university fa-5x" id="img" style="color:#ac9766; text-shadow:3px 3px 3px #fff;"></i>
        </div>
        <div class="brand">
          <h1>People's Bank</h1>
          <p>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp kyuki apna time aayega !</p>

        </div>
      </header>

      <section id="mainpin">
      <div id="log">
<form class="" action="" method="post">

        <div id="h">
          <center>
          <h1>Change Pin</h1>
        </center>
        </div>
<center>
        <table id="tab">

          <tr>
          <td id="td">
            <i class="fas fa-shield-alt"></i> &nbsp;
          <label for="pin">set new pin</label>
            </td>
          <td></td>

          <td>
          <input type="password" name="pin" placeholder="      XXXX" readonly="readonly" onfocus="javascript: this.removeAttribute('readonly')" required minlength="4" maxlength="4"  title="Pin Entered Must Be In Numeric Format!" oninput="">
          </td>
          </tr>

          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>

          <tr id="td">
          <td>
            <i class="fas fa-check-double"></i> &nbsp;
          <label for="pin">confirm Pin</label>
          </td>
          <td></td>
          <td>
          <input  type="password" name="cpin" placeholder="       XXXX" required readonly="readonly" onfocus="javascript: this.removeAttribute('readonly')" minlength="4" maxlength="4" onemptied="Please Enter the Pin!" oninvalid="Pin Must Be 4 Digits Long" title="Pin Entered Must Be In Numeric Format!">
          </td>
          </tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>

          <tr>
            <td style="" id="cancel">
            <button type="button" onclick="redirect(this)" id="1" name="submit">Cancel &nbsp;<i class="far fa-times-circle"></i></button>
            </td>
            <td></td>
            <td id="confirm" style="float:right; margin-right:60px;">
              <button type="submit" onclick="redirect(this)" id="ch"  name="">Change &nbsp;<i class="fas fa-user-lock"></i> </button>
            </td>
          </tr>
        </table>
        <h3 style="color:#fff;text-decoration:underline;text-shadow: 1.5px 1.5px 5px #0c1f31;font-size: 1.45em;">
         <?php if (isset($msg)) {
            # code...
            echo $msg;
          } ?>
          </h3>
</center>

</form>
      </div>

    </section>
    <footer style="height:85px">
      <div id="foot">
      <center>
      <br>
        <p>&copy; 2019 people's bank</p>
        <p>all right Reserved</p>
      </center>
      </div>
    </footer>
  </body>
</html>
