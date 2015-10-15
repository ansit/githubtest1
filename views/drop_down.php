<div class="form-group">
<label class="col-lg-4 control-label" for="inputStandard"> Input  Module :</label>
<div class="col-lg-8">
	<label class="field select">
	<select name="input_module" class="form-control model" onchange="showUser(this.value)">
		<option value="">-- Select --</option>
		<?php for($i=0;$i<count($get_info);$i++) { ?>
			<option value="<?php echo $get_info[$i]->Case_Sequence_ID?>">
			<?php echo $get_info[$i]->input_module?></option>
		<?php } ?>    
	</select>
	<i class="arrow double"></i>
</label>
</div>
</div>