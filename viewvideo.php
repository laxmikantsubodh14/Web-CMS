<?php 
extract($_REQUEST);
?>
<table width="100" border="0">
  <tr>
    <td>
	
	<object data="flvplayer.swf?file=<?php echo $file;?>" type="application/x-shockwave-flash" name="Video Stories FlashUnit" width="280" height="270" vspace="5" class="flashobj"  title="Video Stories FlashUnit" wmode="transparent">
<param name="movie" value="flvplayer.swf?file=<?php echo $file;?>" /><param name="quality" value="high" /><param name="wmode" value="transparent" /></object>
	
	</td>
  </tr>
</table>
