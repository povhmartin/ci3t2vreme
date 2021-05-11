<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
	<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">T2 Vreme</a>
	<ul class="navbar-nav px-3">
		<li class="nav-item text-nowrap">
			<?php
				echo '<a class="nav-link" href="'.base_url().'index.php/welcome/logout">Izpiši se</a>';
			?>
		</li>
	</ul>
</header>
<div class="container-fluid">
	<div class="row">
		<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
			<div class="position-sticky pt-3">
				<ul class="nav flex-column">
					<?php
					if($this->session->userdata('access_token'))
					{
						$user_data = $this->session->userdata('user_data');
						echo '<li class="nav-item"><img src="'.$user_data['profile_picture'].'" class="img-responsive img-circle img-thumbnail" /></li>';
						echo '<li class="nav-item"><b>Name : </b>'.$user_data["first_name"].' '.$user_data['last_name']. '</h3>';
						echo '<li class="nav-item"><b>Email :</b> '.$user_data['email_address'].'</li>';
					}
					?>
					<li class="nav-item">
					</li>
				</ul>
			</div>
		</nav>
		<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			<div class="border-bottom">
				<h1 class="h2 pull-down text-center">Izberite kraj za katerega želite spremljati temperaturo zraka</h1>
			</div>
			<div class="row">
				<div class="pull-down">
					<script>
						new Vue({
							el: '...',
							data: {
								selected: ''
							}
						})
					</script>
					<form name="selectedCity">
						<select v-model="selected">
							<option disabled value="">Izberite kraj</option>
							<?php if(isset($citys))
								foreach ($citys as $city){
							?>
								<option value="<?php echo $city['id_city'] ?>"><?php echo $city['name'] ?></option>
							<?php }
							?>
						</select>
						<span>Izbran kraj: {{ selected }}</span>

					</form>
				</div>
			</div>
		</main>
	</div>
</div>
</body>
</html>
