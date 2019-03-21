
 <script type="text/javascript">

function redirect(button){
  var x = button.id;
  if(x==1)
  {
    var ans =  confirm("Press Ok to Cancel the Transaction");
    if (ans == true) {
      document.write();
      window.location.assign("transc.php")

    } else {

  return false
    }
  }

  if (x=='withd') {
    var ans =  confirm("<?php echo 'Press Ok to Withdraw the Amount.';?>");
    if (ans == true) {
      document.getElementById("withd").name="withdraw";
         
      return false
    }

     else {
      document.getElementById("withd").name="nowithdraw";
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

if(isset($_POST['withdraw']))
{
if(empty($_POST['amount']))
{
  $msg="Amount value cannot be left empty!";
}
else{
    
  if(is_numeric($_POST['amount']))
  {
    if($_SESSION['balance']>=$_POST['amount'])
    {
$amount = $_SESSION['balance'] - $_POST['amount'];
$sql = "UPDATE `account` SET `balance`= $amount WHERE `account`= $account;";
$result = mysqli_query($conn,$sql);
$msg = "Amount Withdrawn Successfully.";
header( "refresh:1; url=transc.php" );
    }
    elseif($_POST['amount']>$_SESSION['balance']){
      $msg="Insufficient Balance in your Account!";
    } 
}
  else{
  $msg="Amount must be in numeric format!";
  }
}
}
if(isset($_POST['nowithdraw']))
{
  $msg="Withdraw Cancelled!";
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ATM System.</title>
    <link rel="stylesheet" href="depositstyle.css">
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

      <section id="main">
      <div id="log">
<form class="" action="" method="post">

        <div id="h">
          <center>
          <h1>Withdraw money</h1>
        </center>
        </div>
<center>
        <table id="tab">

          <tr>
          <td>
          <i class="fas fa-money-bill-wave"></i> &nbsp;
          <label for="amount">Withdraw Amount</label>
          </td>
          <td></td>

          <td>
          <input type="integer" name="amount" placeholder="       1000/-" readonly="readonly" onfocus="javascript: this.removeAttribute('readonly')" minlength="3" maxlength="5" onemptied="Please Enter the Amount!" required oninvalid="Amount Must Be Value Between 3 to 5 Digits"  title="Amount Must Be Entered In 3-5 Digits Numeric Format!">
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

          <tr>
          <td>
          <i class="fas fa-piggy-bank"></i> &nbsp;
          <label for="account">Account</label>
          </td>
          <td></td>
          <td id="radio">
            <fieldset>
                <label for=""><input style="padding:0 !important;" type="radio" name="gender" value="male"/> Saving</label>  <br>
                <label  for=""><input style="padding:0 !important;" type="radio" name="gender" value="female"/> Current </label> <br>
            </fieldset>


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
            <button onclick="redirect(this)" id="1" type="" name="">Cancel Transaction &nbsp;<i class="far fa-times-circle"></i></button>
            </td>
            <td></td>
            <td id="with" style="float:right; margin-right:60px;">
              <button type="submit" name="" onclick="redirect(this)" id="withd">Withdraw &nbsp;<i class="fas fa-user-check"></i> </button>
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
    <footer>
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
