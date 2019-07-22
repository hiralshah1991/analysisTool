<?php /* Smarty version 2.6.30, created on 2019-01-09 01:15:45
         compiled from middle/pastAnalysis.tpl */ ?>
<html>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'middle/page_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="col-md-12">
	<?php if ($this->_tpl_vars['analysisDetail']): ?>
	<div class="col-md-12">
		<label><h5>
				<strong>Site Name</strong>: <?php echo $this->_tpl_vars['analysisDetail']['site_name']; ?>

			</h5></label><br /> <label><h5>
				<strong>Site Address</strong>: <?php echo $this->_tpl_vars['analysisDetail']['site_address']; ?>

			</h5></label><br /> <label><h5>
				<strong>Load Data file</strong>: <a
					href="pastAnalysis.php?filePath=http://localhost/analysisTheme/analysisTool/uploadLoadFiles/<?php echo $this->_tpl_vars['analysisDetail']['file_name']; ?>
"><?php echo $this->_tpl_vars['analysisDetail']['file_name']; ?>
</a>
			</h5></label><br /> <label><h5>
				<strong>Analysis Type</strong>: <?php if ($this->_tpl_vars['analysisDetail']['analysis_type'] == 'C'): ?>Solar/Battery:
				<?php echo $this->_tpl_vars['analysisDetail']['analysis_custom_solarsize']; ?>
/<?php echo $this->_tpl_vars['analysisDetail']['analysis_custom_batterysize']; ?>
<?php else: ?>Full<?php endif; ?>
			</h5></label><br /> <label><h5>
				<strong>Energy Efficency</strong>:
				<?php echo $this->_tpl_vars['analysisDetail']['energy_efficiency']; ?>

			</h5></label><br /> <label><h5>
				<strong>NEM Incentive Rate</strong>: $<?php echo $this->_tpl_vars['analysisDetail']['nem_rate']; ?>

			</h5></label><br /><br/>
	</div>
	<div class="clearfix">
			</div>
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-table"></i>Analysis Table
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"> </a>
				</div>

			</div>
			<div class="portlet-body">
				<div class="table-responsive">
					<table id="analysisTable" class="table table-bordered table-hover"
						style="width: 100%">
						<thead>
							<tr>
								<th>Icon</th>
								<th>Solar Size</th>
								<th>Battery Size</th>
								<th>Month</th>
								<th>Annual Solar Generation</th>
								<th>Annual Energy procured from Grid (KWH)</th>
								<th>Total Cost</th>
								<th>Cost of Energy from Grid</th>
								<th>Cost of Demand Charges from Grid</th>
								<th>Cost of Critical PEak Charges</th>
								<th>CPP Incentive</th>
								<th>fixedCharges</th>
								<th>Annual Energy Export</th>
								<th>NEM Incentive</th>
								<th>Between Lower and Upper Threshold</th>
		       					<th>Upper Threshold Cross</th>
							</tr>
						</thead>
						<tbody>
							<?php $_from = $this->_tpl_vars['analysisDetail']['analysis_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['solarSize'] => $this->_tpl_vars['batteryArray']):
?> <?php $_from = $this->_tpl_vars['batteryArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['batterySize'] => $this->_tpl_vars['monthArray']):
?> <?php $_from = $this->_tpl_vars['monthArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['monthName'] => $this->_tpl_vars['analysisArray']):
?>
							<tr <?php if ($this->_tpl_vars['monthName'] != 'annual'): ?> style="display: none"
								data-hiddenrow="expand_<?php echo $this->_tpl_vars['solarSize']; ?>
_<?php echo $this->_tpl_vars['batterySize']; ?>
"
								<?php else: ?>id="expand_<?php echo $this->_tpl_vars['solarSize']; ?>
_<?php echo $this->_tpl_vars['batterySize']; ?>
"<?php endif; ?> >
								<td id="expandTD"><?php if ($this->_tpl_vars['monthName'] == 'annual'): ?><i
									class="fa fa-plus-circle"></i><?php endif; ?>
								</td> <?php $_from = $this->_tpl_vars['analysisArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
								<td><?php echo $this->_tpl_vars['v']; ?>
</td> <?php endforeach; endif; unset($_from); ?>
							</tr>
							<?php endforeach; endif; unset($_from); ?> <?php endforeach; endif; unset($_from); ?> <?php endforeach; endif; unset($_from); ?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
	<?php endif; ?>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'middle/page_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</html>

<script type="text/javascript">
<?php echo '
$(document).ready(function(){

	   var table = $(\'#analysisTable\').DataTable( {
	 	   	"scrollY":        "570px",
	 	   	"scrollX": true,
	        "scrollCollapse": true,
	        "paging":   false,
	        "orderCellsTop": true,
	        "fixedHeader": true,
	        "ordering" : false,
	        dom: \'Bfrtip\',
	        
	         buttons: [
	             {
	                 extend: \'excel\',
	                 text: \'Export all\',
	                 exportOptions: {
	                     modifier: {
	                         selected: null
	                     }
	                 }
	             },
	             {
	                 extend: \'excel\',
	                 text: \'Export selected\'
	             }
	         ],
	         select: true,
	        searching: true
	    } );


});
$(document).on(\'click\',\'#expandTD\',function(){
	var isVisible = true;
	var id = $(this).closest(\'tr\').attr(\'id\');
	$(\'tr\').each(function(){
		if($(this).data("hiddenrow") == id){
			$(this).toggle();
			if(!$(this).is(\':visible\')){
				isVisible = false;
			}
		}
	});
	if(isVisible){
		$(this).html(\'<i class="fa fa-minus-circle"></i>\');
		//$(this).closest(\'tr\').addClass(\'active\');
		
	}else{
		$(this).html(\'<i class="fa fa-plus-circle"></i>\');
		//$(this).closest(\'tr\').removeClass(\'active\');
	}
})
'; ?>

</script>