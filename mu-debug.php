<?php
/**
 * Plugin Name: Local Debug Utility.
 */

/**
 * Pretty Debug Data
 * @link http://chrisbratlien.com/prettier-php-debug-messages-continued/
 */
function ccdd( $obj, $label = '' ) {
	$data = json_encode( print_r($obj,true) );
	?>
	<style type="text/css">
		#bsdLogger {
		position: inherit;
		bottom:0;
		border: 3px solid #ffa601;
		padding: 6px;
		background: white;
		color: #444;
		z-index: 999;
		font-size: 1.25em;
		width: 980px;
		overflow: scroll;
		margin: 50px auto 0 auto;
		}
	</style>
	<script type="text/javascript">
	var doStuff = function(){
		var obj = <?php echo $data; ?>;
		var logger = document.getElementById('bsdLogger');
		if (!logger) {
			logger = document.createElement('div');
			logger.id = 'bsdLogger';
			document.body.appendChild(logger);
		}
		////console.log(obj);
		var pre = document.createElement('pre');
		var h2 = document.createElement('h2');
		pre.innerHTML = obj;

		h2.innerHTML = '<?php echo addslashes($label); ?>';
		logger.appendChild(h2);
		logger.appendChild(pre);
	};
	window.addEventListener ("DOMContentLoaded", doStuff, false);

	</script>
	<?php
}