<?php
	if(isset($_POST['signup'])){
		$screenName = $_POST['screenName'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		if(empty($screenName) || empty($email) || empty($password)){
			$error = 'all fields required';
		}
		else{
			$email = $getFromU->checkInput($email);
			$password = $getFromU->checkInput($password);
			$screenName = $getFromU->checkInput($screenName);

			if(!filter_var($email)){
				$error = 'invalid email format';
			}
			else if(strlen($screenName) > 20){
				$error = 'Length of ScreenName must be between 5 and 20';
			}
			else if(strlen($password) < 5){
				$error = 'Length of password more than 5';
			}
			else{
				if($getFromU->checkEmail($email) === true){
					$error = 'email already in use';
				}
				else{
					//$user_id = $getFromU->register($email, $password, $screenName);
					//$user_id = 
					$getFromU->create('users', array('email' => $email, 'password' => md5($password), 'screenName' => $screenName, 'profileImage' => 'assets/images/defaultProfileImage.png', 'profileCover' => 'assets/images/defaultCoverImage.png'));
					//$_SESSION['user_id'] = $user_id; 

					header('Location: includes/signup.php?step=1');
				}
			}
		}
	}
?>
<form method="post">
<div class="signup-div"> 
	<h3>Sign up </h3>
	<ul>
		<li>
		    <input type="text" name="screenName" placeholder="Full Name"/>
		</li>
		<li>
		    <input type="email" name="email" placeholder="Email"/>
		</li>
		<li>
			<input type="password" name="password" placeholder="Password"/>
		</li>
		<li>
			<input type="submit" name="signup" Value="Signup for Twitter">
		</li>
		<?php 
		if(isset($error)){
			echo '<li class="error-li">
				<div class="span-fp-error">'.$error.'</div>
		   		</li> ';
		}
	?>
	</ul>
</div>
</form>