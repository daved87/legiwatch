<div class="registerArea">
	<?php 
		$attributes = ['class' => 'pure-form pure-form-stacked defaultForm', 'id' => 'registerForm'];
		echo form_open('users/register', $attributes);
	?>
		<fieldset>
			<Legend><strong>Register</strong></Legend>

			<div class="pure-g">
				<div class="pure-u-1 pure-u-sm-1-2">
					<label for="firstname">First Name</label>
					<?=form_input(array('type'=>'text', 'id'=>'firstname', 'name'=>'firstname', 'placeholder'=>'First Name', 'required'=>'required'))?>
				</div>
				<div class="pure-u-1 pure-u-sm-1-2">
					<label for="lastname">Last Name</label>
					<?=form_input(array('type'=>'text', 'id'=>'lastname', 'name'=>'lastname', 'placeholder'=>'Last Name', 'required'=>'required'))?>
				</div>		
			</div>
			<div class="pure-g">
				<div class="pure-u-1 pure-u-sm-1-2">
					<label for="email">E-mail</label>
						<?=form_input(array('type'=>'email', 'id'=>'email', 'name'=>'email', 'placeholder'=>'Email', 'required'=>'required', 'style'=>'float:left;'))?>
						<?php $img_prop = [
										   'id' => 'emailCheckGIF',
										   'class' => 'emailCheckLoadingGif',
										   'alt' => 'Loading...',
										   'src' => 'public/images/loadingGIF/turquiseLoader.gif'
										  ];

						  echo img($img_prop); 
					    ?>
					<label id="emailChk"></label>    						
				</div>
				<div class="pure-u-1 pure-u-sm-1-2">
					<label for="emailAgain">Verify E-mail</label>
					<?=form_input(array('type'=>'email', 'id'=>'emailAgain', 'name'=>'emailAgain', 'placeholder'=>'Email Again', 'required'=>'required'))?>				
				</div>										
			</div>
			<div class="pure-g">
				<div class="pure-u-1 pure-u-sm-1-2">
					<label for="password">Password</label>
					<?=form_input(array('type'=>'password', 'id'=>'password', 'name'=>'password', 'placeholder'=>'Password', 'required'=>'required'))?>
				</div>
				<div class="pure-u-1 pure-u-sm-1-2">
					<label for="passwordAgain">Verify Password</label>
					<?=form_input(array('type'=>'password', 'id'=>'passwordAgain', 'name'=>'passwordAgain', 'placeholder'=>'Password Again', 'required'=>'required'))?>
				</div>										
			</div>		
		</fieldset>
		<fieldset>
			<legend><strong>To obtain local rep information</strong></legend>
				<div class="pure-g">														
					<div class="pure-u-1 pure-u-sm-1-3">
						<label for="zipcode">Zip Code</label>
						<?=form_input(array('type'=>'text', 'id'=>'zipcode', 'name'=>'zipcode', 'placeholder'=>'Zip Code', 'required'=>'required', 'style'=>'width:100px;float:left;'))?>
						<?php $img_prop = [
								   'id' => 'districtGetGIF',
								   'class' => 'districtGetLoadingGif',
								   'alt' => 'Loading...',
								   'src' => 'public/images/loadingGIF/turquiseLoader.gif'
								];

						  	echo img($img_prop); 
					    ?>
					    <label id="zipChk" style="display:none;" class="error">Invalid zip code</label>						
					</div>
					<div class="pure-u-1 pure-u-sm-2-3">
						<table class="pure-table" id="repsTable">
						<thead>
							<tr>
								<th colspan="3" id="districtTitle"></th>
							</tr>
							<tr>
								<th>Title</th>
								<th>Name</th>
								<th>Party</th>
							</tr>
						</thead>
							<tbody id="repsBody"></tbody>
						</table>
					</div>												
				</div>
		</fieldset>
	    <br />
	    <?=form_submit(array('id'=>'submitForm', 'class'=>'pure-button pure-button-primary', 'name'=>'submit', 'value'=>'Submit'))?>
	<?=form_close()?>
</div>
<?php echo js_tag('http://jqueryvalidation.org/files/dist/jquery.validate.min.js'); ?>
<?php echo js_tag('http://jqueryvalidation.org/files/dist/additional-methods.min.js'); ?>
<?php echo js_tag('public/js/register.js'); ?>
