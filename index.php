<?php
	require "main.php";
	 
	if (isset($_SESSION['token'])) {
	  try {
          
          ?>

        <form method = "post" action = "page.php">
            <input type = "text" name = "page" placeholder="ID">
            <input type = "submit">
        </form>

        <?php
          
          
	  } catch( Facebook\Exceptions\FacebookSDKException $e ) {
	    echo $e->getMessage();
	    exit;
	  }
	}
	else{
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email', 'user_posts', 'user_likes'];
		$callback    = 'https://l1k3p4g3ik.vercel.app/app.php';
		$loginUrl    = $helper->getLoginUrl($callback, $permissions);
		echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	}
?>