<div style="padding-top: 25px;">
	<div id="registerForm" class="pure-g loginContainerMain">
		<div class="pure-u-1 pure-u-sm-1-2 LoginMain">
			<?php 
				$attributes = ['class' => 'pure-form pure-form-stacked', 'id' => 'loginForm'];
				echo form_open('users/login', $attributes);
			?>
			    <fieldset>
			    <?php if ($error) { ?>
			    	<label class="error"><?=$error?></label><br />
			    <?php } ?>
			        <legend>Login</legend>

			        <input id="email" name="email" type="email" placeholder="Email">
			        <input id="password" name="password" type="password" placeholder="Password">

			        <label for="remember" class="pure-checkbox">
			            <input id="remember" name="remember" type="checkbox"> Remember me
			        </label>
			        <br />
			        <button type="submit" name="submit" value="submit" class="pure-button pure-button-primary">Sign in</button>
			        <br /><br />
			        <a href="<?php echo site_url('users/register'); ?>">Not a member? Click here.</a>
			        <br />
			        <a href="<?php echo site_url('users/forgotPassword'); ?>">Forgot Password</a>				        
			    </fieldset>
			</form>
		</div>
		<div class="pure-u-1 pure-u-sm-1-2 LoginExtension">
			<label>Want to <b>KNOW</b> what</label><br />
				<?php 
					$img_prop = [
								   'class' => 'loginTitle',
								   'alt' => 'ameriCheck',
								   'src' => 'public/images/ameriCheck.jpg'
								];
				    echo img($img_prop); 
			    ?><br />	
			<label>your REPS are up to?</label><br /><br />
			<label>LOG IN and get LIVE UPDATES</label><br />
			<label>plus convenient Contact Information</label>
		</div>
	</div>
</div>

