<!DOCTYPE html>
<html>

<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="app.css">
<script type="text/javascript" src="app.js"></script>
</head>
<h1>An API call test form</h1>
<body>
	<main>
		<div class="form-wrapper">
			<div class="form-group login">
				<code id="response"></code><br><br>
				<span id="info"></span>
				<form onsubmit="return false;" action="account-actions.php" method="post" id="login-form">

					<label>Email:<br>
						<input required="" class="input" id="email" type="text" name="email">
					</label><br>

					<label>Password:<br>
						<input required="" id="password" class="input" type="password" name="password">
					</label>

					<input type="hidden" name="login"><br>
					<button onclick="handleLogin()" type="submit">Login</button>
				</form>
			</div><br><br><br>
			<div class="form-group">
				<form id="api-form">
					<label>Authorization code:<br>
						<input class="input" type="text" id="authorization" name="authorization">
					</label>
				</form>
			</div>
			<hr>

			<div class="form-group">
				<form onsubmit="return false;" action="account-actions.php" method="post">
					<input type="hidden" name="reserve-account">
					<button onclick="reserveAccount()" type="submit">Reserve Account</button>
				</form>
			</div><br>

			<div class="form-group">
				<form onsubmit="return false" action="account-actions.php" method="post">
					<input type="hidden" name="deallocate-reserved-account">
					<button onclick="deallocateReservedAccount()" type="submit">Deallocate reserved account</button>
				</form>
			</div><br>

			<div class="form-group">
				<form onsubmit="return false" action="account-actions.php" method="post">
					<input type="hidden" name="get-transaction-status">
					<button onclick="getTransactionStatus()" type="submit">Get transaction status</button>
				</form>
			</div><br>
		</div>
	</main>
</body>
<script type="text/javascript">

</script>
</html>