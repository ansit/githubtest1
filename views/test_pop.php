<div class="col-md-12">   
   <div class="row form-horizontal">
		<div class="col-md-6">
			<div class="admin-form" id="frmaddmodule">

				<div class="form-group">
				<label class="col-lg-4 control-label" for="inputStandard"> Question : </label>
				<div class="col-lg-8">
				<textarea class="gui-textarea" name="question[]" id="form-field-8" data-validetta="required"></textarea>
				<input id="form-field-6" type="hidden" name="IDQuest[]" value="0">
				<input id="form-field-6" type="hidden" name="iDAlternativa[]" value="0"  >
				</div>
				</div>
				
				<div class="form-group">
				<label class="col-lg-4 control-label" for="inputStandard"> Response type:</label>
				<div class="col-lg-8">
				<label class="field select">
					<select class="t_a" name="t_a[]"  data-validetta="required">
						<option value="" selected disabled>Select any</option>
						<option value="Radio"  >Radio Group</option>
						<option value="Checkbox" >Check Box</option>
						<option value="Text" >Text Box</option>
						<option value="file">Upload</option>
					</select>
					<i class="arrow double"></i>
				</label>
				
				</div>
				<div class="option_set"></div>
				</div>
				
			</div>
		</div>
		
		<div class="col-md-6" align="right">
			<div class="admin-form">
				<div class="form-group">
				
				<div class="col-lg-4">
				<button class="btn btn-primary btn-sm removequestion"> <i class="fa fa-power-off"></i> Remove </button>
				</div>
				</div>
			</div>
		</div>
	</div>
	<hr/>
	</div>
	
<script>

//$(".t_a").change(function(){
//    
//  if($(this).val()=="Radio"){
//
//$(this).parent().parent().parent().find(".option_set").load("<?=$this->config->base_url();?>index.php/jquery_pop/option_checkbox");
//  
//                 }
//  else if($(this).val()=="Checkbox"){
//  $(this).parent().parent().parent().find(".option_set").load("<?=$this->config->base_url();?>index.php/jquery_pop/option_checkbox");
//                               
//        }
//        
//        else if($(this).val()=="Text"){
//  $(this).parent().parent().parent().find(".option_set").html("<input type='hidden'name='options[]'><input type='hidden'name='options[]'><input type='hidden'name='options[]'><input type='hidden'name='options[]'>");
//                               
//        }
//		
//		else if($(this).val()=="file"){
//  $(this).parent().parent().parent().find(".option_set").html("<input type='hidden'name='options[]'><input type='hidden'name='options[]'><input type='hidden'name='options[]'><input type='hidden'name='options[]'>");
//                               
//        }
//});
</script>

<script src="<?php echo base_url()."assets/js/lightbox.min.js"?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/validate/validetta.min.js"></script>




<!--<script>-->
<!-- 	$.validator.setDefaults({-->
<!--		submitHandler: function(form) {-->
<!--			form.submit();-->
<!--		}-->
<!--	});-->
<!--       -->
<!--</script>-->

   <script type="text/javascript">
    $(document).ready(function() {
    //$('#role_name').multiselect();
	
	$("#frmaddmodule").validetta({
	   realTime : true,
	    display : 'inline',
        errorTemplateClass : 'validetta-inline'
	  });	
	
    });
	
    </script>
        <!-- End: Content-Wrapper -->