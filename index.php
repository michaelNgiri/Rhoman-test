<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
    	.input{
    		padding: 0.4em;
    		margin-bottom: 10px;
  clear: both;
 
  border-radius: 4px;
    	}
    	button{
    		padding: 8px;
    	}
    	body{
    		background: #deebff;
    		color: blue;
    	}
    	.form-wrapper{
    		 margin-left: 120px;
    	}
    </style>
</head>
<h1>An API call test form</h1>
<body>
    <main>
    	<div class="form-wrapper">
    		<div class="form-group login">
		    	<form action="account-actions.php" method="post">

			    	<label>Email:
			    	<input required="" class="input" type="text" name="email">
			    	</label><br>

			    	<label>Password:
			    		<input required="" class="input" type="password" name="password">
			    	</label>

			        <input type="hidden" name="login"><br>
			        <button type="submit">Login</button>
			    </form>
		    </div><hr>

		    <div class="form-group">
		    	<form action="account-actions.php" method="post">
		        <input type="hidden" name="reserve-account">
		        <button type="submit">Reserve Account</button>
		    </form>
		    </div>
   </div>
    </main>
</body>
</html>
