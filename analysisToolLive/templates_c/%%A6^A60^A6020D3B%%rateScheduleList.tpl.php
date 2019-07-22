<?php /* Smarty version 2.6.30, created on 2019-01-08 22:22:09
         compiled from middle/rateScheduleList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'middle/rateScheduleList.tpl', 64, false),)), $this); ?>
<html>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'middle/page_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="col-md-12">
	<?php if ($this->_tpl_vars['error'] != ""): ?>
			<p class="alert alert-danger"><?php echo $this->_tpl_vars['error']; ?>
 </p>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['msg'] != ""): ?>
			<p class="alert alert-success"><?php echo $this->_tpl_vars['msg']; ?>
 </p>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['rateScheduleList']): ?>
	<form action="" name="rateScheduleList" method="post">
	
	<div class="portlet box grey">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-money"></i>All Rate Schedule
			</div>
			<div class="actions">
				<a href="rateSchedule.php" class="btn blue"> <i class="fa fa-pencil"></i> Add
				</a>
				<div class="btn-group">
					<a class="btn green" href="#" data-toggle="dropdown"> <i
						class="fa fa-cogs"></i> Tools <i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu pull-right">
						
						<li><a id="deleteRows" name="actionBtn"> <i class="fa fa-trash-o"></i> Delete
						</a>
						<input type="hidden" name="deleteRows" value="0"/>
						</li>
						<li><a  id="inactiveRows" name="actionBtn"> <i class="fa fa-ban"></i> Inactive
						</a>
						<input type="hidden" name="inactiveRows" value="0"/></li>
						<li><a  id="activeRows" name="actionBtn"><i class="fa fa-check-circle-o"></i> Active
						</a><input type="hidden" name="activeRows" value="0"/></li>
						</li>
						<li><a  id="copyRows" name="actionBtn"><i class="fa fa-copy"></i>Copy</a>
						<input type="hidden" name="copyRows" value="0"/></li>
						</li>
						<input name="submit" type="submit" value="1" style="display:none"/>
					</ul>
				</div>
			</div>
		</div>
		<div class="portlet-body">
			<table class="table table-bordered table-hover"
				id="sample_2">
				<thead>
					<th style="width1: 8px;"><input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes"/></th>
					<th>Rate Schedule Name</th>
					<th>Threshold Range</th>
					<th>Effective Date</th>
					<th>Date Added</th>
					<th>Status</th>
					<th>Action</th>
				</thead>

				<tbody>
					<?php $_from = $this->_tpl_vars['rateScheduleList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vArray']):
?>
					<tr>
						<td><input type="checkbox" class="checkboxes" name="rateSchedule[]" value="<?php echo $this->_tpl_vars['vArray']['rsid']; ?>
"/></td>
						<td><?php echo $this->_tpl_vars['vArray']['rateschedule_name']; ?>
 <?php if ($this->_tpl_vars['vArray']['type'] == 'S'): ?>(Secondary)<?php elseif ($this->_tpl_vars['vArray']['type'] == 'M'): ?>(Mandatory)<?php endif; ?></td>
						<td><?php echo $this->_tpl_vars['vArray']['lower_threshold']; ?>
KW - <?php echo $this->_tpl_vars['vArray']['upper_threshold']; ?>
KW</td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['vArray']['effective_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['vArray']['date_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
						<td><?php if ($this->_tpl_vars['vArray']['status'] == 'Y'): ?>Active
							<?php elseif ($this->_tpl_vars['vArray']['status'] == 'N'): ?>Inactive
							<?php else: ?>Deleted<?php endif; ?></td>
						<td>
						<a href="rateSchedule.php?rsid=<?php echo $this->_tpl_vars['vArray']['rsid']; ?>
" class="btn red" target="_blank"> <i class="fa fa-edit"></i></a>
						
						</td>
					</tr>
					<?php endforeach; endif; unset($_from); ?>
				</tbody>


			</table>
		</div>
	</div>

	<?php else: ?>
		<span>There is no records to display</span>
	<?php endif; ?>
	</form>
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'middle/page_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</html>
<script>
<?php echo '
$(document).ready(function(){
	$(\'a[name="actionBtn"]\').click(function(){
		$(\'input[name="activeRows"]\').val(0);
		$(\'input[name="inactiveRows"]\').val(0);
		$(\'input[name="deleteRows"]\').val(0);
		$(\'input[name="copyRows"]\').val(0);
		if($(this).attr(\'id\') == \'activeRows\'){
			$(\'input[name="activeRows"]\').val(1);
		}else if($(this).attr(\'id\') == \'inactiveRows\'){
			$(\'input[name="inactiveRows"]\').val(1);
		}else if($(this).attr(\'id\') == \'deleteRows\'){
			$(\'input[name="deleteRows"]\').val(1);
		}else if($(this).attr(\'id\') == \'copyRows\'){
			$(\'input[name="copyRows"]\').val(1);
		}
	
		var flagChecked = false;
	
		   $("input[type=\'checkbox\'][name=\'rateSchedule[]\']").each(function(){
				if($(this).is(\':checked\')){
					flagChecked = true;
				}
			});

	   if(flagChecked){
		   $(\'input[name="submit"]\').click();
	   		/*$.ajax({
	   		  method: "POST",
	   		  url: "rateScheduleList.php?action=ajax",
	   		  data: $(\'#rateScheduleList\').serialize()
	   		}).done(function( data ) {
		   		  if(data == \'successful\'){
		   			alert( "Selected rows are inactivated");
			   		  }else{
			   			alert( "Selected rows are not inactivated");
				   	}
	   		    
	   		  });*/
	   	}else{
	   		alert("Please select atleast one record to perform action");
		}
	});
	  
});
'; ?>

</script>