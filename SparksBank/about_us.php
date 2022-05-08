<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale = 1">
    <title>About Us page</title>
 
  </head>

  <body>
    <style type="text/css">
        body{
  min-height: 100vh;
  width: 100%;
  background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(images/transaction.jpg);
  background-position: center;
  background-size: cover;
  position: relative;
}

.maincontainer{
  position: absolute;
  width: 350px;
  height: 490px;
  background: none;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);

}

.thecard{
  position: relative;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  transform-style: preserve-3d;
  transition: all 0.8s ease;
}

.thecard:hover{
  transform: rotateY(180deg);
}

 .thefront{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  backface-visibility: hidden;
  overflow: hidden;
  background: #ffc728;

}

.theback{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  backface-visibility: hidden;
  overflow: hidden;
  background: #fafafa;
  color: #333;
  text-align: center;
  transform: rotateY(180deg);
}

.thefront h1, .theback h1{
  font-family: 'zilla slab', sans-serif;
  padding: 30px;
  font-weight: bold;
  font-size: 24px;
  text-align: center;
}

.thefront p, .theback p{
  font-family: 'zilla slab', sans-serif;
  padding: 30px;
  font-weight: normal;
  font-size: 12px;
  text-align: center;
}
h1{
  text-decoration: underline;
}
    </style>
    <div class="maincontainer">

      <div class="thecard">

        <div class="thefront"><h1>About Us</h1><hr>
          <p>
            <b>--Banking is the Core thing for Every Business. As per your Financial Strength, you can Choose your Bank’s Business Short term or Long term Finance.</b>
          </p>
          <p>
            <b>--Banking is the Very vast Field and you need an adequate knowledge about Banking Terms to get acumen in this Business.</b>
          </p>
          <p>
            <b>--Pampering your Business Needs</b>
          </p>
        </div>

        <div class="theback">

          <h1>Contact Us</h1><hr>
          <p> 
            <h3>Address:The Sparks Bank,Bangalore</h3>
            <h3>Phone:080-235418</h3>
            <h3>Email:sparks@gmail.com</h3>
            <h3>website:thesparks.com</h3>
          </p>
          <a href="home.php"><button>HOME</button></a>
        
      </div>
      </div>
      </div>
    </div>

  </body>
</html>