<!-- Modal -->
<div id="notimodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Notification</h4>
      </div>
      <div class="modal-body">
		 <div class=pull-left>
			<div><strong>Created on </strong><span id="notcreattime"></span></div>
			<div><strong>Notification ID</strong> <span id="notid"></span></div>
			</div>
		 <div class="pull-right">
			<div><strong>Created By:</strong> <span id="notcreater"></span></div>
			<div><strong>Role </strong><span id="role"></span></div>
		 
		 </div>
		 <div class=clear></div>
        <strong>Message: </strong><p class="mbpara"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="chgsta" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change status for steps</h4>
      </div>
      <div class="modal-body">
		<div class="centerag">
			<p>&nbsp;</p>
		<div>
			<?php
			$attributes = array('id'=>'frmcasesteps');
			echo form_open('manager_dashboard/chgcasestepstat',$attributes);?>
  <strong>Reviewed</strong> <input type="checkbox" name="review" value="1" checked>
</div>
		<p>&nbsp;</p>
		<div><strong>Status: </strong>
					 <select id="casesta" name="casesta">
			<?php
			foreach($case_stat as $stat):
			echo "<option value='".$stat->id."'>".$stat->status_text."</option>";
			endforeach;
			
			?>
		 </select>
		</div>
		<p>&nbsp;</p>
		<?php
		echo form_hidden('caseno',$caseid) ;
		echo form_hidden('stepno');
		echo form_hidden('partyno');
		?>
		<div>
		<button type="submit" class="btn btn-info btn-md">Change Status</button>
		</div>
		
		<?php echo form_close();?>
		<p>&nbsp;</p>
		</div>
		<div class="showmsg"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!--modal ends-->