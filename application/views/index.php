<div class="mainArea">
	<div class="pure-g upcomingBillsSection">
		<div class="pure-u-1">
			<strong>Floor Updates</strong>
			<strong style="float:right;"><?=date('m-d-Y');?></strong>
			<hr />
		</div>
		<div class="pure-u-1">
		<?php if ($floor_updates) { ?>
			<div id="floorUpdatesAccordian">
		<?php foreach($floor_updates as $update) { ?>						
				<h3><span><?=date("g:i a T", strtotime($update['timestamp']));?></span><span style="float:right;"><?=ucwords($update['chamber']);?></span></h3>
					<div class="accordianOverride">
						<p><?=$update['update']; ?></p>
					</div>
		<?php } ?> 
			</div>
		<?php } else { ?>
			<div><strong>Congress Not In Session.</strong></div>
		<?php } ?>
		</div>
	</div>
</div>

<script>

  $(function() {
    $("#floorUpdatesAccordian").accordion({
    	animate: false
    });
  });
</script>
