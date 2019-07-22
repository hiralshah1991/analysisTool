<?php /* Smarty version 2.6.30, created on 2018-12-21 23:36:48
         compiled from middle/pastAnalysisList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'middle/pastAnalysisList.tpl', 22, false),)), $this); ?>
<html>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'middle/page_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="col-md-12">
	<?php if ($this->_tpl_vars['analysisList']): ?>
	<table class="table table-bordered table-hover" id="analysisListTable">
	<thead>
		<th>Site Name</th>
		<th>Site Address</th>
		<th>Date of Analysis</th>
		<th>Analysis Type</th>
		<th>Energy Efficiency</th>
		<th>NEM Incentive Rate</th>
		<th>Status</th>
		<th>Action</th>
	</thead>
	
	<tbody>
	<?php $_from = $this->_tpl_vars['analysisList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vArray']):
?>
		<tr>
			<td><?php echo $this->_tpl_vars['vArray']['site_name']; ?>
</td>
			<td><?php echo $this->_tpl_vars['vArray']['site_address']; ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['vArray']['date_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
			<td><?php if ($this->_tpl_vars['vArray']['analysis_type'] == 'C'): ?>Solar/Battery: <?php echo $this->_tpl_vars['vArray']['analysis_custom_solarsize']; ?>
/<?php echo $this->_tpl_vars['vArray']['analysis_custom_batterysize']; ?>
<?php else: ?>Full<?php endif; ?></td>
			<td><?php echo $this->_tpl_vars['vArray']['energy_efficiency']; ?>
</td>
			<td><?php echo $this->_tpl_vars['vArray']['nem_rate']; ?>
</td>
			<td><?php if ($this->_tpl_vars['vArray']['status'] == 'Y'): ?>Active<?php elseif ($this->_tpl_vars['vArray']['status'] == 'N'): ?>Inactive<?php else: ?>Deleted<?php endif; ?></td>
			<td><a href="pastAnalysis.php?aid=<?php echo $this->_tpl_vars['vArray']['analysis_id']; ?>
" class="btn btn-primary" target="_blank">View <i class="fa fa-eye"></i></a></td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	</tbody>
	
	
	</table>
	<?php else: ?>
		<span>There is no records to display</span>
	<?php endif; ?>
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

	   var table = $(\'#analysisListTable\').DataTable( {
	 	   	"scrollY":        "570px",
	 	   	"scrollX": true,
	        "scrollCollapse": true,
	        "paging":   true,
	        "orderCellsTop": true,
	        //"fixedHeader": true,
	        "columnDefs": [
    { "orderable": false, "targets": [7] }
  ],
	        searching: true
	    } );


});
'; ?>

</script>