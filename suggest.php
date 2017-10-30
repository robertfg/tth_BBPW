<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    #var_dump($_POST);
    
    $name = trim(filter_input(INPUT_POST,"name", FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST,"email", FILTER_SANITIZE_EMAIL));
    $details = trim(filter_input(INPUT_POST,"details", FILTER_SANITIZE_SPECIAL_CHARS));
  
    if($name == "" || $email == "" || $details == "") {
      echo "please fill in the required fileds";
      exit;
    }
  
  if ($_POST["address"] != ""){
    echo "bad form input";
    exit;
  }
    require("inc/phpmailer/class.phpmailer.php");   
    $mail = new PHPMailer;
    if(!$mail->ValidateAddress($email)) {
      echo "SHITΤΤΤΤΤΤΤΤΤΤΤΤΤΤΤΤΤΤΤΤΤΤΤΤΤ";
    }
    echo "<pre>";
    
    $email_body = "";
    $email_body .="Name " . $name . "\n";
    $email_body .="Email " . $email . "\n";
    $email_body .="Details " . $details . "\n";
    echo $email_body;
    echo "</pre>";

    header("location:suggest.php?status=thanks");
} 

$pageTitle = "Suggest a Media Item";
$section = "suggest";

include("inc/header.php"); ?>

<div class="section page">
  <div class="wrapper">
    <h1>Suggest a Media Item</h1>
    <?php if (isset($_GET["status"]) && $_GET["status"] == "thanks") {
    echo "  <p>Thanks HOE</p>";
}else{
    ?>
  <p>complete the form</p>
  <form method="post" action="suggest.php">
    <table>
      
      <tr>
        <th><label for="name">Name:</label></th>
        <td><input type="text" id="name" name="name" /></td>
      </tr>      
      <tr>
        <th><label for="email">Email:</label></th>
        <td><input type="text" id="email" name="email" /></td>
      </tr>      
      <tr>
        <th><label for="details">Details:</label></th>
        <td><textarea name="details" id="details"></textarea></td>
      </tr>
      <tr style="display:none">
        <th><label for="address">Address:</label></th>
        <td><input type="text" id="address" name="address" />leave this nigga blank</td>
      </tr>      
      
    </table>
    <input type="submit" value="Send"/>
  
  </form>
    <?php } ?>
</div>
</div>
<?php include("inc/footer.php"); ?>