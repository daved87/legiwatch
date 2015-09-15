<div class="mainArea">
	<div class="pure-g">
		<div class="pure-u-1">
			<div class="pure-g">
				<div class="pure-u-1 pure-u-lg-3-5">
					<div class="upcomingBillsSection">
						<div class="pure-g">
							<div id='upcomingHeader' class="pure-u-1">
								<div>
									<?php $img_prop = [
													   'id' => 'upBillGIF',
													   'class' => 'loadingGif',
													   'alt' => 'Loading...',
													   'src' => 'public/images/loadingGIF/cogWheel.gif'
													  ];

										  echo img($img_prop); 
								    ?>
									<h3 id="title">UPCOMING BILLS</h3>
								</div>
								<hr />
							</div>
							<div id="upcomingBillsDiv" class="pure-u-1"></div>
						</div>		
					</div>
				</div>
				<div class="pure-u-1 pure-u-sm-2-5">
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo js_tag('public/js/bills.js'); ?>