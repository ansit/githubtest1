
<?php $length = $test_info;
for($r=0;$r<count($length);$r++){?>
<div class="col-md-6">
<div class="form-group">
<dl>
	<dt> <b> Question &nbsp; (<?php echo $r+1?>) &nbsp; </b> <?php echo $test_info[$r]->Question ?>  </dt>
	<dd>
	<?$options=explode("@", $test_info[$r]->option_list);
	//$answer_list=explode("@", $test_answer[$r]->fillling);
	if($test_info[$r]->t_a=="Text" || $test_info[$r]->t_a=="file"){?> 
	
	<?php if($test_info[$r]->t_a=="file"){?> 
	<input type="file">
	<?}elseif($test_info[$r]->t_a=="Text") {?>
		<textarea  class="gui-textarea" style="width: 500px; height: 98px;" name="data<?=$test_info[$r]->IDQuest?>[]"><?=$answer_list[0]?></textarea>
	
	<?php }}else
	{
	$total =count($options); for($s=0;$s<$total;$s++){    if($options[$s]!=''){?>	
	<p> 
	<input   <?php if(in_array($options[$s], $answer_list)){echo "checked";} ?> class="data<?=$test_info[$r]->IDQuest?>" type="<?=$test_info[$r]->t_a?>" name="data<?=$test_info[$r]->IDQuest?>[]" value="<?php echo $options[$s];?>" style="opacity:5;" ><span >&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $options[$s];?></span>
	</p>   
	<?php }}}?>
	</dd>
</dl>
</div>
</div>		
<?php }?>							
