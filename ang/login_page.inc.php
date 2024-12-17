<h2>Login</h2>
			<form action ="login.php" method="post">
				
			<p><label class="label" for="email"></label>
				<input type="text" id="email" name="email" size="30" maxlength="40"
				value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>"
				placeholder="Email">
				</p>
				
				<p><label class="label" for="psword1"></label>
				<input type="password" id="psword1" name="psword1" size="20" maxlength="40"
				value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1'];?>"
				placeholder="Password">
				</p>
 				<div class="login-button">
				<p><input type="submit" id="submit" name="submit" value="Login"></p>
				</div>
			</form>
			
	</div>

			