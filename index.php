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
    	button{
    		color: #fff;
    		background: blue;
    		border-radius: 2px;
    		cursor: pointer;
    	}
    	h1{
    		text-align: center;
    	}
    </style>
</head>
<h1>An API call test form</h1>
<body>
    <main>
    	<div class="form-wrapper">
    		<div class="form-group login">
		    	<form action="account-actions.php" method="post">

			    	<label>Email:<br>
			    	<input required="" class="input" type="text" name="email">
			    	</label><br>

			    	<label>Password:<br>
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
		    </div><br>

		    <div class="form-group">
		    	<form action="account-actions.php" method="post">
		        <input type="hidden" name="deallocate-reserved-account">
		        <button type="submit">Deallocate reserved account</button>
		    </form>
		    </div><br>

		    <div class="form-group">
		    	<form action="account-actions.php" method="post">
		        <input type="hidden" name="get-transaction-status">
		        <button type="submit">Get transaction status</button>
		    </form>
		    </div><br>
   </div>
    </main>
</body>
</html>
