<html>
<style>
{literal}
div.container{
width:100%;
}
{/literal}
</style>
{include file='middle/page_header.tpl'}
	<form class="form-horizontal" method="post" name="inputData" action="" enctype="multipart/form-data">
	<div class="form-body">
		{if $error neq ""}
			<p class="alert alert-danger">{$error} </p>
		{/if}
		<div class="form-group">
			<label class="col-md-3 control-label">Site Name:</label>
			<div class="col-md-4">
				<input name="siteName" type="text" class="form-control" value="{$clsAnalysis->siteName}">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Rate Schedule:</label>
			<div class="col-md-4">
				<select name="rateSchedule" class="form-control">
				<option value="">Select rate schedule</option>
				{foreach from=$allRateSchedule key=k item=v}
					<option value="{$v.rsid}" {if $v.rsid eq $clsAnalysis->rateSchedule}selected="selected"{/if}>{$v.rateschedule_name}</option>
				{/foreach}
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
				<label class="radio-inline"><input type="radio" name="analysisType" value="customAnalysis" {if $clsAnalysis->analysisType eq 'customAnalysis'}checked{/if} > Custom Analysis (Solar + Battery)</label>
				<label class="radio-inline"><input type="radio" name="analysisType" value="allAnalysis" {if $clsAnalysis->analysisType eq 'allAnalysis'}checked{/if}> All Analysis (6 solar size)</label>
   			</div>
		</div>
		
		<div  id="customData" style="display: none">
			<div class="form-group">
				<label class="col-md-3 control-label">Solar Size:</label>
				<div class="col-md-4">
					<input name="solarSize" type="text" class="form-control" value="{$clsAnalysis->solarSize}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Battery Size:</label>
				<div class="col-md-4">
					<input name="bs" type="text" class="form-control" value="{$clsAnalysis->bs}">
				</div>
			</div>
		</div>
		{*<div class="form-group">
			<label class="col-md-3 control-label">Analysis Structure:</label>
			<div class="radio-list">
				<label class="radio-inline"><input type="radio" name="analysisStructure" value="annual"  {if $clsAnalysis->analysisStructure eq 'annual'}checked{/if}> Annual Analysis</label>
				<label class="radio-inline"><input type="radio" name="analysisStructure" value="monthly" {if $clsAnalysis->analysisStructure eq 'monthly'}checked{/if}> Monthly Analysis</label>
   			</div>
		</div>*}
		<input type="hidden" name="analysisStructure" value="annual"/>
		<div class="form-group">
  			<label class="col-md-3 control-label" for="address">Site Address:</label>
  			<div class="col-md-4">
  				<textarea class="form-control" name="address" >{$clsAnalysis->address}</textarea>
  			</div>

		</div>
		<div class="form-group">
  			<label class="col-md-3 control-label">Grid Resiliency %:</label>
  			<div class="col-md-4">
  				<input type="text" class="form-control" name="gridresiliency" value="{if $clsAnalysis->gridresiliency gt 0}{$clsAnalysis->gridresiliency}{else}0{/if}">
  			</div>

		</div>
		<div class="form-group">
  			<label class="col-md-3 control-label" for="address">energy efficiency %:</label>
  			<div class="col-md-4">
  				<input type="text" class="form-control" name="energyeffeciency" value="{if $clsAnalysis->energyeffeciency gt 0}{$clsAnalysis->energyeffeciency}{else}0{/if}">
  			</div>

		</div>
		<div class="form-group">
  			<label class="col-md-3 control-label" for="address">NEM Incentive Rate:</label>
  			<div class="col-md-4">
  				<input type="text" class="form-control" name="incomeRate" value="{if $clsAnalysis->incomeRate gt 0}{$clsAnalysis->incomeRate}{else}0{/if}">
  			</div>

		</div>
		<div class="form-group">
  			<label class="col-md-3 control-label" for="address">KWH to KW ratio:</label>
  			<div class="col-md-4">
  				<input type="text" class="form-control" name="kwhtokwratio" value="{if $clsAnalysis->kwhtokwratio neq ''}{$clsAnalysis->kwhtokwratio}{else}1600{/if}">
  			</div>

		</div>
		<button class="btn blue btn-block" name="submit" type="submit" value="1" >Submit</button>
	</div>


</form>
<div class="container">

	{if $finalSummary|@count gt 0}
	exce time = {$execution_time}
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
		        <th>Between Lower{if $lowerThreshold neq ''} ({$lowerThreshold}KW){/if} and Upper Threshold {if $upperThreshold neq ''} ({$upperThreshold}KW){/if}</th>
		        <th>Upper Threshold Cross {if $upperThreshold neq ''} (>={$upperThreshold}KW){/if}</th>
		        <th>Time of operation from Grid Resiliency Savings (hour)</th>
		      </tr>
	    </thead>
	    <tbody>
			{foreach from=$finalSummary key=solarSize item=batteryArray}
				   {foreach from=$batteryArray key=batterySize item=monthArray}
				   		{foreach from=$monthArray key=monthName item=analysisArray}
    				   		<tr  {if $monthName neq 'annual'} style="display:none" data-hiddenrow="expand_{$solarSize}_{$batterySize}"{else}id="expand_{$solarSize}_{$batterySize}"{/if} >
    				   			<td id="expandTD">{if $monthName eq 'annual'}<i class="fa fa-plus-circle"></i>{/if}</td>
    					   		{foreach from=$analysisArray key=k item=v}
    					   			<td>{$v}</td>
    					   		{/foreach}
    				   		</tr>
				   		{/foreach}
				 {/foreach}
			{/foreach}
	    </tbody>
	</table>
	{/if}
</div>

{include file='middle/page_footer.tpl'}	
</html>
<script type="text/javascript">
{literal}
$(document).ready(function(){
	 /*$('#analysisTable thead tr').clone(true).appendTo( '#analysisTable thead' );
	    $('#analysisTable thead tr:eq(1) th').each( function (i) {

	        var title = $(this).text();
	        $(this).html('<input type="text" placeholder="Search '+title+'" style="width:100%"/>' );

	        $( 'input', this ).on( 'keyup change', function () {
	            if ( table.column(i).search() !== this.value ) {
	                table
	                    .column(i)
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );*/
	   var table = $('#analysisTable').DataTable( {
	 	   	"scrollY":        "570px",
	 	   	"scrollX": true,
	        "scrollCollapse": true,
	        "paging":   false,
	        "orderCellsTop": true,
	        "fixedHeader": true,
	        "ordering" : false,
	        dom: 'Bfrtip',
	        /* "buttons": [
		         { extend: 'csv', text: 'CSV', exportOptions: { modifier: { search: 'applied' }}}, 
		         { extend: 'excel', text: 'Excel', exportOptions: { modifier: { search: 'applied' }}},
		         { extend: 'pdf', text: 'PDF', exportOptions: { modifier: { search: 'applied' }}},
		         { extend: 'print', text: 'Print visible', exportOptions: { modifier: { search: 'applied' }}} 
	         ],*/
	         buttons: [
	             {
	                 extend: 'excel',
	                 text: 'Export all',
	                 exportOptions: {
	                     modifier: {
	                         selected: null
	                     }
	                 }
	             },
	             {
	                 extend: 'excel',
	                 text: 'Export selected'
	             }
	         ],
	         select: true,
	        searching: true
	    } );


})
$('input[name="analysisType"]').click(function(){
	 	$('#customData').hide();
	 	var at = $(this).val();
	 	if(at == 'customAnalysis'){
	 		$('#customData').show();
	 	}
	 })
	 $('#load').on('click', function() {
	     var $this = $(this);
	   	$this.button('loading');
	   	setTimeout(function() {
	         $this.button('reset');
	     }, 8000);

	 });

$(document).on('click','#expandTD',function(){
	var isVisible = true;
	var id = $(this).closest('tr').attr('id');
	$('tr').each(function(){
		if($(this).data("hiddenrow") == id){
			$(this).toggle();
			if(!$(this).is(':visible')){
				isVisible = false;
			}
		}
	});
	if(isVisible){
		$(this).html('<i class="fa fa-minus-circle"></i>');
		//$(this).closest('tr').addClass('active');
		
	}else{
		$(this).html('<i class="fa fa-plus-circle"></i>');
		//$(this).closest('tr').removeClass('active');
	}
})
{/literal}
</script>

