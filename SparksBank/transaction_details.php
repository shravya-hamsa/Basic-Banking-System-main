<?php
      include('connection.php');


     if(isset($_POST['transfer']))
  {
      //getting data
      $sender_acc_no=$_POST['sender_acc_no'];
      $receiver_acc_no=$_POST['receiver_acc_no'];
      $amount=$_POST['amount'];

      if(empty($sender_acc_no)||empty($receiver_acc_no)||empty($amount))
      {
        echo '<script language="javascript">
            alert("All fields are mandatory!!");
            </script>';
      }
      else
      {
          //check if payer exists or not
          $payer_query="SELECT account_no from users where account_no='$sender_acc_no' ";
          $accept_payer=mysqli_query($conn,$payer_query);
          if(mysqli_num_rows($accept_payer)>0)
          {
                  //check if payee exists or not
                  $payee_query="SELECT account_no from users where account_no='$receiver_acc_no' ";
                  $accept_payee=mysqli_query($conn,$payee_query);
                  if(mysqli_num_rows($accept_payee)>0)
                  {
                              //check if payer has sufficient balance
                              $accept_balance="SELECT * from users where account_no='$sender_acc_no' ";
                              if($result= $conn -> query($accept_balance))
                              {
                                  $row = $result -> fetch_array();
                                  if($row['balance_amount']<$amount)
                                  {

                                        echo "<script> alert('Payer does not have required balance !!');
                                         window.location.href='transfer.php';
                                        </script>";

                                        exit();

                                  } 
                                  else
                                  {
                                        //selecting payer details
                                        $sql1="SELECT * from users where account_no='$sender_acc_no' ";
                                        if($result=$conn -> query($sql1)){
                                          $row1=$result -> fetch_array();
                                          $PayerCurrentBalance=$row1['balance_amount'];
                                        }

                                        //selecting payee details
                                        $sql2="SELECT * from users where account_no='$receiver_acc_no' ";
                                        if($result=$conn -> query($sql2)){
                                          $row2=$result -> fetch_array();
                                          $PayeeCurrentBalance=$row2['balance_amount'];
                                        }
                                        $PayerCurrentBalance -= $amount;
                                        $PayeeCurrentBalance += $amount;

                                        //Updating Payer details
                                        $updatepayer="UPDATE users set balance_amount='$PayerCurrentBalance' where account_no='$sender_acc_no' ";
                                        //Updating Payee details
                                         $updatepayee="UPDATE users set balance_amount='$PayeeCurrentBalance' where account_no='$receiver_acc_no' ";

                                         if($conn -> query($updatepayer) == true){
                                               //echo "<script> alert('PAYER DETAILS UPDATED !!');
                                                //</script>"; 
                                         } else{
                                              echo "<script> alert('PAYER DETAILS NOT UPDATED !!');
                                              </script>"; 
                                         }
                                         if($conn -> query($updatepayee) == true){
                                              //echo "<script> alert('PAYEE DETAILS UPDATED !!');
                                                //</script>"; 
                                         } else{
                                              echo "<script> alert('PAYEE DETAILS NOT UPDATED !!');
                                                </script>"; 
                                         }

                                         //Updating Transaction history Table
                                          date_default_timezone_set('Asia/Kolkata');           
                                          $date = date('Y-m-d H:i:s',time());
                                          $inserttable ="INSERT into transaction(sender, sender_acc_no, receiver, receiver_acc_no, amount, date_time) values ('$row1[name]','$row1[account_no]','$row2[name]','$row2[account_no]','$amount','$date')";
                                          if($conn -> query($inserttable) == true){
                                                echo "<script> alert('TRANSACTION TABLE UPDATED !!');
                                                </script>"; 
                                          } else{
                                                echo "<script> alert('TRANSACTION TABLE NOT UPDATED !!');
                                                </script>"; 
                                          }     
                                       
                                  }  
                              }
                              
                  }   
                  else
                  {
                      echo "<script> alert('Payee does not exists !!');
                       window.location.href='transfer.php';
                       </script>";
                       exit();
                  }
          }
          else
          {
              echo "<script> alert('Payer does not exists !!');
              window.location.href='transfer.php';
              </script>";
              exit();  
          }
      }

  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
  <style type="text/css">
    /* trabsaction details print */
     *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins',sans-serif;
    }
    body{
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 10px;
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }
     .center{
background: #FC5C7D;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #6A82FB, #FC5C7D);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #6A82FB, #FC5C7D); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        padding-top:5px;
        display: block;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
        height: 70%;    
    }
    .center2{
        font-size:15px;
        width:100%;
    }
    table {
    margin: 0 auto; /* or margin: 0 auto 0 auto */
  }
    td,th { border: 1px solid #ddd; padding: 8px;}
    #Table{ font-family: Arial,Helvetica, sans-serif; border-collapse: collapse;}
    #Table tr:nth-child(even){ background-color: #d2d3d4; }
    #Table tr:nth-child(odd){ background-color: #dee2e3; }
    #Table tr:hover{ background-color: #b5d0eb; }
    #Table th { padding-top: 12px; padding-bottom: 12px; text-align:left; background-color:  #6A82FB; color:white; }
    .button-align{
  margin: auto;
  width: 60%;
  align-items: center;
}
a{
  position: relative;
  display: inline-block;
  padding: 12px 10px;
  margin: 10px 0px 20px 10px;
  color: #fff;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 15px;
  letter-spacing: 2px;
  border-radius: 40px;
  background: linear-gradient(90deg,#0162c8,#55e7fc);
}
a:nth-child(2){
  background: linear-gradient(90deg,#755bea,#ff72c0);
  align-content: left;
  </style>
<body>
    <?php
            echo "<div class ='center'>";
        echo "<div class ='center2'>";
        echo "<h1 style='text-align: center'>Transaction Successfully Completed</h1>
        <p  style='text-align: center; font-size:25px;'>Details of payer and payee are as  follows</p>
        <table id = 'Table'>
        <tr>
        <th></th>
        <th>Name</th>
        <th>Email</th>
        <th>Account No</th>
        </tr>";
        echo "<tr> 
            <td> Payer </td>
            <td>".$row1['name']."</td>
            <td>".$row1['email']."</td>
            <td>".$row1['account_no']."</td>
            </tr>";
        echo "<tr> 
            <td> Payee </td>
            <td>".$row2['name']."</td>
            <td>".$row2['email']."</td>
            <td>".$row2['account_no']."</td>
            </tr>";
        echo "<br>";
        echo "<table id = 'Table' style='margin-bottom:15px;'>
              <tr>
              <th></th>
              <th>Old Balance</th>
              <th>New Balance</th>
              </tr>
              <tr>
              <th>Payer</th>
              <td style='color:black'>".$row1['balance_amount']."</td>                        
              <td style='color:black'>".$PayerCurrentBalance."</td>
              </tr>
              <tr>
              <th>Payee</th>
              <td style='color:black'>".$row2['balance_amount']."</td>                        
              <td style='color:black'>".$PayeeCurrentBalance."</td>
              </tr>";
        echo "</table>";
        echo "<br>";
      ?>
      <div class="button-align">
        <a href="transaction.php"><b>Transaction Page</b></a>
        <a href="#" id="print-button" onclick="window.print(); return false;"><b>Print Receipt</b></a>
      </div>
      <?php
        echo "</div>";
        echo "</div>"; 
    ?>
</html>