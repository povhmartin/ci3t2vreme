<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
	<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">T2 Vreme</a>

</header>
<div class="container-fluid">
	<div class="row">
		<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			<div class="border-bottom">
				<h1 class="h2 pull-down text-center">Dobrodošli na strani za spremljanje temperature zraka in napovedi</h1>
			</div>
			<div class="row">
				<h2 class="h5 pull-down text-center">Za pregled napovedi za izbran kraj se vpišite z vašim Google računom</h2>
				<div class="pull-down">
					<!--div class="centered g-signin2" data-onsuccess="onSignIn" style="width: fit-content;"></div-->
					<?php
					if(!isset($login_button))
					{

						$user_data = $this->session->userdata('user_data');
						echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
						echo '<img src="'.$user_data['profile_picture'].'" class="img-responsive img-circle img-thumbnail" />';
						echo '<h3><b>Name : </b>'.$user_data["first_name"].' '.$user_data['last_name']. '</h3>';
						echo '<h3><b>Email :</b> '.$user_data['email_address'].'</h3>';
						echo '<h3><a href="'.base_url().'index.php/welcome/logout">Logout</h3></div>';
					}
					else
					{
						echo '<div align="center">'.$login_button . '</div>';
					}
					?>
				</div>
			</div>
		</main>
	</div>
</div>
</body>
</html>
