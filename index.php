<html>
	<head>
		<title>Login</title>
		<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="admin.css">
	</head>
	<body style="background-color: rgb(171,239,210);">

		<div class="top-icon">
			
		</div>

		
		<div class="content" style="margin-left: 0px; height: 48%; margin: auto; border: 1px solid white; width:300px; background-color: white; border-radius: 15px">
			<h1 style="margin-left: 90px">Login</h1>

    <form class="" action="clogin.php" method="post">
      <p style="margin-left: 50px">Username:</p>
      <input class="info" type="text" name="username">
      </br>
      <p style="margin-left: 50px">Password:</p>
      <input class="info" type="password" name="password">

			
		<p>
			<input class="btn" type="submit" value="Login" name="Login" >
		</p>
    </form>
		</div>
		<br>
	</body>
</html>
