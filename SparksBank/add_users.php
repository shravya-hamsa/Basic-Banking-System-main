<?php
	session_start();
	include('connection.php');
	if(isset($_POST['add_user']))
		{

			$name=$_POST['name'];
			$email=$_POST['email'];
			$account_no=$_POST['account_no'];
			$balance_amount=$_POST['balance_amount'];
			if(empty($name)||empty($email)||empty($account_no)||empty($balance_amount))
			{
				echo "<script>
        		alert('All fields are mandatory!!');
        		window.location.href='add_users.php';
        		</script>";
			}
			else
			{
				 //check if email exists or not
          $email_query="SELECT email from users where email='$email' ";
          $accept_email=mysqli_query($conn,$email_query);
          if(mysqli_num_rows($accept_email)>0)
          {
          	echo "<script> alert('This email address already in use!! Choose different email');
            window.location.href='add_users.php';
            </script>";
            exit();
          }
          else
          {
									if(strlen($account_no)>=3)
									{

										$query="INSERT INTO users(name,email,account_no,balance_amount) VALUES('$name','$email','$account_no','$balance_amount')" ;

										$result=mysqli_query($conn,$query);

										if($result)
										{

											echo '<script language="javascript">
					        				alert(" Registered successfully!!");
					        				</script>';
					        				header('location:users.php');
										}
										else
										{
											echo '<script language="javascript">
					        				alert("Account Number not available!!");
					        				</script>';
										}

									}
									else
									{
										echo '<script language="javascript">
					        			alert("Account no should be more than 3 !!");
					        			</script>';
									}
					}
			}
		}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
 	<title>Add user page</title>
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://kit.fontawesome.com/7c1a2a631c.js" crossorigin="anonymous"></script>
   </head>
   <style type="text/css">
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
		.container{
		  max-width: 700px;
		  width: 100%;
		  background-color: #fff;
		  padding: 25px 30px;
		  border-radius: 5px;
		  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
		}
		.container .title{
		  font-size: 25px;
		  font-weight: 500;
		  position: relative;
		}
		.container .title::before{
		  content: "";
		  position: absolute;
		  left: 0;
		  bottom: 0;
		  height: 3px;
		  width: 30px;
		  border-radius: 5px;
		  background: linear-gradient(135deg, #71b7e6, #9b59b6);
		}
		.content form .user-details{
		  display: flex;
		  flex-wrap: wrap;
		  justify-content: space-between;
		  margin: 20px 0 12px 0;
		}
		form .user-details .input-box{
		  margin-bottom: 15px;
		  width: calc(100% / 2 - 20px);
		}
		form .input-box span.details{
		  display: block;
		  font-weight: 500;
		  margin-bottom: 5px;
		}
		.user-details .input-box input{
		  height: 45px;
		  width: 100%;
		  outline: none;
		  font-size: 16px;
		  border-radius: 5px;
		  padding-left: 15px;
		  border: 1px solid #ccc;
		  border-bottom-width: 2px;
		  transition: all 0.3s ease;
		}
		.user-details .input-box input:focus,
		.user-details .input-box input:valid{
		  border-color: #9b59b6;
		}
		 form{
		  font-size: 20px;
		  font-weight: 500;
		 }
		 form .category{
		   display: flex;
		   width: 80%;
		   margin: 14px 0 ;
		   justify-content: space-between;
		 }
		 form .category label{
		   display: flex;
		   align-items: center;
		   cursor: pointer;
		 }
		 form .category label .dot{
		  height: 18px;
		  width: 18px;
		  border-radius: 50%;
		  margin-right: 10px;
		  background: #d9d9d9;
		  border: 5px solid transparent;
		  transition: all 0.3s ease;
		}
		 form .button{
		   height: 45px;
		   margin: 40px 0px;
		 }
		 form .button input{
		   height: 100%;
		   width: 100%;
		   border-radius: 5px;
		   border: none;
		   color: #fff;
		   font-size: 18px;
		   font-weight: 500;
		   letter-spacing: 1px;
		   cursor: pointer;
		   transition: all 0.3s ease;
		   background: linear-gradient(135deg, #71b7e6, #9b59b6);
		 }
		 form .button input:hover{
		  /* transform: scale(0.99); */
		  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
		  }
		}
		form .user-details .input-box{
		    margin-bottom: 15px;
		    width: 100%;
		  }
		  form .category{
		    width: 100%;
		  }
		  .content form .user-details{
		    max-height: 300px;
		    overflow-y: scroll;
		  }
		  .user-details::-webkit-scrollbar{
		    width: 5px;
		  }
		 }

   </style>
<body>
  <div class="container">
    <div class="title"><b>Add User</b></div>
    	<div class="content">
      		<form method="post" onsubmit="return validateForm()">
        		<div class="user-details">
	          		<div class="input-box">
	            		<span class="details">Full Name:</span>
	            		<input type="text" placeholder="Enter your name" name="name" required>
	          		</div>
		         	<div class="input-box">
		            	<span class="details">Email:</span>
		            	<input type="email"  name="email" placeholder="Enter your email" required>
		          	</div>
			          	<div class="input-box">
				            <span class="details">Account Number:</span>
				            <input type="number" placeholder="Enter your Account number" name="account_no" required>
			          	</div>
			          	<div class="input-box">
				            <span class="details">Account Balance:</span>
				            <input type="number" placeholder="Enter your Account Balance" name="balance_amount" min="100" required>
			          	</div>
		        </div>
		        <div class="button">
		          	<input type="submit" value="Add User" name="add_user">
		        </div>
     		</form>
    	</div>
  </div>

</body>
</html>


