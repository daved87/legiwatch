<style>
	
.ui-widget-header {
    background: transparent;
    float: right;
    border: none;
}

</style>


<div class="registerArea">
	<div class="pure-g">
		<div class="pure-u-1 pure-u-lg-1-2">
			<?php 
				$attributes = ['class' => 'pure-form pure-form-stacked defaultForm', 'id' => 'profileForm'];
				echo form_open('users/updateProfile', $attributes);
			?>
			<fieldset>
				<Legend><strong>Profile</strong></Legend>

				<div class="pure-g">
					<div class="pure-u-1 pure-u-sm-1-2">
						<label for="firstname">First Name</label>
						<?=form_input(array('type'=>'text', 'value' => $this->session->userdata('firstname'), 'id'=>'firstname', 'name'=>'firstname', 'placeholder'=>'First Name', 'required'=>'required'))?>
					</div>
					<div class="pure-u-1 pure-u-sm-1-2">
						<label for="lastname">Last Name</label>
						<?=form_input(array('type'=>'text', 'value' => $this->session->userdata('lastname'), 'id'=>'lastname', 'name'=>'lastname', 'placeholder'=>'Last Name', 'required'=>'required'))?>
					</div>		
				</div>
				<div class="pure-g">
					<div class="pure-u-1 pure-u-sm-1-2">
						<label for="email">E-mail</label>
							<?=form_input(array('type'=>'email', 'value' => $this->session->userdata('email'), 'id'=>'email', 'name'=>'email', 'placeholder'=>'Email', 'required'=>'required', 'style'=>'float:left;'))?>
							<?php $img_prop = [
											   'id' => 'emailCheckGIF',
											   'class' => 'emailCheckLoadingGif',
											   'alt' => 'Loading...',
											   'src' => 'public/images/loadingGIF/turquiseLoader.gif'
											  ];
							  echo img($img_prop); 
						    ?>
					</div>
					<div class="pure-u-1 pure-u-sm-1-2">
						<label for="password">Password</label>
						<?=form_input(array('type'=>'password', 'id'=>'password', 'name'=>'password', 'placeholder'=>'Password', 'required'=>'required'))?>
					</div>									
				</div>		
			</fieldset>
			<br />
		    <?=form_submit(array('id'=>'submitForm', 'class'=>'pure-button pure-button-primary', 'name'=>'submit', 'value'=>'Save'))?>

			<?=form_close()?>
		</div>

		<div class="pure-u-1 pure-u-lg-1-2" style="padding-top: 5px; padding-bottom: 5px;">
			<table class="pure-table zipCodeTable">
				<thead>
					<tr>
						<th colspan="4" class="zipCodeTableHeader">Saved Zip Codes <i class="fa fa-plus-circle imgLink" id="addZip" onclick="addZip();"></i></th>	
					</tr>
					<tr>
						<th>Zip Code</th>
						<th>Date Added</th>
						<th>Default</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody id="zipTableProfile">
					<?php foreach ($locations->result() as $row) { ?>
						<tr>
							<td><?=$row->zipcode;?></td>
							<td><?=date_format(date_create($row->dte_created), 'm-d-Y');?></td>
							<td><?=($row->default) ? '<i class="fa fa-check-circle"></i>' : '<i class="fa fa-hand-o-up imgLink"></i>';?></td>
							<td><i class="fa fa-minus-circle imgLink"></i></td>
						</tr>
					<?php }	?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div id="dialogZip" style="display: none; padding: 5px;">
	<?php 
		$attributes = ['class' => 'pure-form pure-form-stacked defaultForm'];
		echo form_open('users/addUserLocation');
	?>
		<fieldset>
			<Legend><strong>Zipcode</strong></Legend>	
			<table>
				<tr>
					<td style="padding:10px;">
						<?=form_input(array('id'=>'zipText', 'name'=>'zipText', 'placeholder'=>'Zipcode', 'required' => 'required'))?>
					</td>
					<td>
						<?=form_submit(array('id'=>'AddZipButton', 'class'=>'pure-button pure-button-primary', 'name'=>'submit', 'value'=>'Add'))?>
					</td>
				</tr>
				<tr colspan="2">
					<td>
						<?php $img_prop = [
						   'id' => 'districtGetGIF',
						   'class' => 'LoadingGif',
						   'alt' => 'Loading...',
						   'src' => 'public/images/loadingGIF/turquiseLoader.gif'
						];
						  	echo img($img_prop); 
					    ?>
					    <label id="zipChk" style="display:none; color:red;font-size:10pt;font-weight:bold;" class="error">Invalid zip code</label>
					</td>			
				</tr>
			</table>
			<?=form_input(array('type'=>'hidden', 'value' => $this->session->userdata('user_id'), 'id'=>'userID', 'name'=>'userID'))?>
		</fieldset>
	<?=form_close()?>    
</div>
<?php echo js_tag('public/js/profile.js'); ?>