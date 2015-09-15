
<div class="pure-menu navTab menuVertical largeMenu">
	<span class="pure-menu-heading menuHeader">
		<a href="<?php echo base_url() ?>">
			<?php 
				$img_prop = [
							   'class' => 'imgTitle',
							   'alt' => 'Title',
							   'src' => 'public/images/ameriCheck.jpg'
							];
			    echo img($img_prop); 
		    ?>	
			LegiWatch
		</a>
	</span>
	<?php if ($this->session->has_userdata('user_id')) {  ?>
		<span class="welcomeName">Welcome <a href="<?php echo site_url('users/profile/'.$this->session->userdata('user_id')); ?>"><?php echo $this->session->userdata('firstname')?></a></span><br />
		<a class="logout" href="<?php echo site_url('users/logout'); ?>">Log out</a>
	<?php } else { ?>
		<span class="loginButton" onclick="openLoginDialog('<?php echo site_url('users/loginDialog'); ?>');">Login</span>
	<?php } ?>
	<hr />
	<ul class="pure-menu-list custom-restricted-width">
		<?php echo nav('', 'pure-menu-item', $title); ?>
	</ul>
</div>

<div class="pure-menu pure-menu-horizontal pure-menu-scrollable navTab menuHorizontal">
	<div>
		<span class="pure-menu-heading menuHeader">
			<a href="<?php echo site_url('main'); ?>">
				<?php 
					$img_prop = [
								   'class' => 'imgTitle',
								   'alt' => 'Title',
								   'src' => 'public/images/ameriCheck.jpg'
							    ];

					echo img($img_prop); 
			    ?>	
				LegiWatch
			</a>
		</span>
		<?php if ($this->session->has_userdata('user_id')) {  ?>
			<span class="welcomeName">Welcome <a href="<?php echo site_url('users/profile/'.$this->session->userdata('user_id')); ?>"><?php echo $this->session->userdata('firstname')?></a></span>
			<br />
			<a class="logout" href="<?php echo site_url('users/logout'); ?>">Log out</a>
		<?php } else { ?>
			<span class="loginButton" onclick="openLoginDialog('<?php echo site_url('users/loginDialog'); ?>');">Login</span>
		<?php } ?>
		<hr />
	</div>
	<div>	
	<ul class="pure-menu-list custom-restricted-width">
		<?php echo nav('', 'pure-menu-item', $title); ?>
	</ul>
	</div>
</div>

<div id="loginDialog"></div>