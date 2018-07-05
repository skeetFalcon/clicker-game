<div id="playerEdit">
	<div class="form">

		<div class="tab-content">

			<div id="signup"> 
				<h1>Edit your profile</h1>

				<form action="updateProfile.php" method="post" autocomplete="off" enctype="multipart/form-data">

					<div class="top-row">
						<div class="field-wrap">
							<input type="text" required autocomplete="off" name='firstname' placeholder="First Name" value="<?= $firstname ?>" />
						</div>

						<div class="field-wrap">
							<input type="text" required autocomplete="off" name='lastname' placeholder="Last Name" value="<?= $lastname ?>"/>
						</div>
					</div>

					<div class="field-wrap">
						<input type="text" name="username" required autocomplete="off" placeholder="Username" value="<?= $username ?>">
					</div>
					<!-- <div class="field-wrap">
					<input type="email" required autocomplete="off" name='email' placeholder="Email Address" />
					</div> -->

					<div class="field-wrap">
						<input type="password" autocomplete="off" name='password' placeholder="Set A Password" value="<?= $password ?>"/>
					</div>

					<!-- <div class="field-wrap">
						<input type="file" name='file'/>
					</div> -->

					<button type="submit" class="button button-block" name="edit" />Edit</button>

				</form>

			</div>
		</div><!-- tab-content -->

	</div>
</div>