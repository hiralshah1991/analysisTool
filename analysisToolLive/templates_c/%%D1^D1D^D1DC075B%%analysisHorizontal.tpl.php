<?php /* Smarty version 2.6.30, created on 2019-01-03 23:49:59
         compiled from middle/analysisHorizontal.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'middle/analysisHorizontal.tpl', 102, false),)), $this); ?>
<html>
<style>
<?php echo '
div.container{
width:100%;
}
'; ?>

</style>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'middle/page_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<form class="form-horizontal" method="post" name="inputData" action="" enctype="multipart/form-data">
	<div class="form-body">
		<?php if ($this->_tpl_vars['error'] != ""): ?>
			<p class="alert alert-danger"><?php echo $this->_tpl_vars['error']; ?>
 </p>
		<?php endif; ?>
		<div class="form-group">
			<label class="col-md-3 control-label">Site Name:</label>
			<div class="col-md-4">
				<input name="siteName" type="text" class="form-control" value="<?php echo $this->_tpl_vars['clsAnalysis']->siteName; ?>
">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Rate Schedule:</label>
			<div class="col-md-4">
				<select name="rateSchedule" class="form-control">
				<?php $_from = $this->_tpl_vars['allRateSchedule']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
					<option value="<?php echo $this->_tpl_vars['v']['rsid']; ?>
"><?php echo $this->_tpl_vars['v']['rateschedule_name']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Upload Load data CSV:</label>
			<div class="custom-file col-md-4">
				<input type="file" class="custom-file-input form-control" name="loadFile" id="loadFile">
			</div>
		</div>

		
		<div class="form-group">
			<label class="col-md-3 control-label">Analysis Type:</label>
			<div class="radio-list">
				<label class="radio-inline"><input type="radio" name="analysisType" value="customAnalysis" <?php if ($this->_tpl_vars['clsAnalysis']->analysisType == 'customAnalysis'): ?>checked<?php endif; ?> > Custom Analysis (Solar + Battery)</label>
				<label class="radio-inline"><input type="radio" name="analysisType" value="allAnalysis" <?php if ($this->_tpl_vars['clsAnalysis']->analysisType == 'allAnalysis'): ?>checked<?php endif; ?>> All Analysis (6 solar size)</label>
   			</div>
		</div>
		<div  id="customData" style="display: none">
			<div class="form-group">
				<label class="col-md-3 control-label">Solar Size:</label>
				<div class="col-md-4">
					<input name="solarSize" type="text" class="form-control" value="<?php echo $this->_tpl_vars['clsAnalysis']->solarSize; ?>
">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Battery Size:</label>
				<div class="col-md-4">
					<input name="bs" type="text" class="form-control" value="<?php echo $this->_tpl_vars['clsAnalysis']->bs; ?>
">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Analysis Structure:</label>
			<div class="radio-list">
				<label class="radio-inline"><input type="radio" name="analysisStructure" value="annual"  <?php if ($this->_tpl_vars['clsAnalysis']->analysisStructure == 'annual'): ?>checked<?php endif; ?>> Annual Analysis</label>
				<label class="radio-inline"><input type="radio" name="analysisStructure" value="monthly" <?php if ($this->_tpl_vars['clsAnalysis']->analysisStructure == 'monthly'): ?>checked<?php endif; ?>> Monthly Analysis</label>
   			</div>
		</div>
		<div class="form-group">
  			<label class="col-md-3 control-label" for="address">Site Address:</label>
  			<div class="col-md-4">
  				<textarea class="form-control" name="address" ><?php echo $this->_tpl_vars['clsAnalysis']->address; ?>
</textarea>
  			</div>

		</div>
		<div class="form-group">
  			<label class="col-md-3 control-label" for="address">energy efficiency %:</label>
  			<div class="col-md-4">
  				<input type="text" class="form-control" name="energyeffeciency" value="<?php if ($this->_tpl_vars['clsAnalysis']->energyeffeciency > 0): ?><?php echo $this->_tpl_vars['clsAnalysis']->energyeffeciency; ?>
<?php else: ?>0<?php endif; ?>">
  			</div>

		</div>
		<div class="form-group">
  			<label class="col-md-3 control-label" for="address">NEM Incentive Rate:</label>
  			<div class="col-md-4">
  				<input type="text" class="form-control" name="incomeRate" value="<?php if ($this->_tpl_vars['clsAnalysis']->incomeRate > 0): ?><?php echo $this->_tpl_vars['clsAnalysis']->incomeRate; ?>
<?php else: ?>0<?php endif; ?>">
  			</div>

		</div>
		<div class="form-group">
  			<label class="col-md-3 control-label" for="address">KWH to KW ratio:</label>
  			<div class="col-md-4">
  				<input type="text" class="form-control" name="kwhtokwratio" value="<?php if ($this->_tpl_vars['clsAnalysis']->kwhtokwratio != ''): ?><?php echo $this->_tpl_vars['clsAnalysis']->kwhtokwratio; ?>
<?php else: ?>1600<?php endif; ?>">
  			</div>

		</div>
		<button class="btn blue btn-block" name="submit" type="submit" value="1" >Submit</button>
	</div>


</form>
<div class="container">

	<?php if (count($this->_tpl_vars['finalSummary']) > 0): ?>
	exce time = <?php echo $this->_tpl_vars['execution_time']; ?>

	<table id="analysisTable" class="table table-bordered table-hover" style="width:100%">
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
			<?php $_from = $this->_tpl_vars['finalSummary']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['solarSize'] => $this->_tpl_vars['batteryArray']):
?>
				   <?php $_from = $this->_tpl_vars['batteryArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['batterySize'] => $this->_tpl_vars['monthArray']):
?>
				   		<?php $_from = $this->_tpl_vars['monthArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['monthName'] => $this->_tpl_vars['analysisArray']):
?>
    				   		<tr  <?php if ($this->_tpl_vars['monthName'] != 'annual'): ?> style="display:none" data-hiddenrow="expand_<?php echo $this->_tpl_vars['solarSize']; ?>
_<?php echo $this->_tpl_vars['batterySize']; ?>
"<?php else: ?>id="expand_<?php echo $this->_tpl_vars['solarSize']; ?>
_<?php echo $this->_tpl_vars['batterySize']; ?>
"<?php endif; ?> >
    				   			<td id="expandTD"><?php if ($this->_tpl_vars['monthName'] == 'annual'): ?><i class="fa fa-plus-circle"></i><?php endif; ?></td>
    					   		<?php $_from = $this->_tpl_vars['analysisArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
    					   			<td><?php echo $this->_tpl_vars['v']; ?>
</td>
    					   		<?php endforeach; endif; unset($_from); ?>
    				   		</tr>
				   		<?php endforeach; endif; unset($_from); ?>
				 <?php endforeach; endif; unset($_from); ?>
			<?php endforeach; endif; unset($_from); ?>
	    </tbody>
	</table>
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
	 /*$(\'#analysisTable thead tr\').clone(true).appendTo( \'#analysisTable thead\' );
	    $(\'#analysisTable thead tr:eq(1) th\').each( function (i) {

	        var title = $(this).text();
	        $(this).html(\'<input type="text" placeholder="Search \'+title+\'" style="width:100%"/>\' );

	        $( \'input\', this ).on( \'keyup change\', function () {
	            if ( table.column(i).search() !== this.value ) {
	                table
	                    .column(i)
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );*/
	   var table = $(\'#analysisTable\').DataTable( {
	 	   	"scrollY":        "570px",
	 	   	"scrollX": true,
	        "scrollCollapse": true,
	        "paging":   false,
	        "orderCellsTop": true,
	        "fixedHeader": true,
	        "ordering" : false,
	        dom: \'Bfrtip\',
	        /* "buttons": [
		         { extend: \'csv\', text: \'CSV\', exportOptions: { modifier: { search: \'applied\' }}}, 
		         { extend: \'excel\', text: \'Excel\', exportOptions: { modifier: { search: \'applied\' }}},
		         { extend: \'pdf\', text: \'PDF\', exportOptions: { modifier: { search: \'applied\' }}},
		         { extend: \'print\', text: \'Print visible\', exportOptions: { modifier: { search: \'applied\' }}} 
	         ],*/
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


})
$(\'input[name="analysisType"]\').click(function(){
	 	$(\'#customData\').hide();
	 	var at = $(this).val();
	 	if(at == \'customAnalysis\'){
	 		$(\'#customData\').show();
	 	}
	 })
	 $(\'#load\').on(\'click\', function() {
	     var $this = $(this);
	   	$this.button(\'loading\');
	   	setTimeout(function() {
	         $this.button(\'reset\');
	     }, 8000);

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
