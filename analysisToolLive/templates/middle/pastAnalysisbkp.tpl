<html>
{include file='middle/page_header.tpl'}
<div class="col-md-12">
	{if $analysisDetail}
	<div class="col-md-12">
		<label><h5>
				<strong>Site Name</strong>: {$analysisDetail.site_name}
			</h5></label><br /> <label><h5>
				<strong>Site Address</strong>: {$analysisDetail.site_address}
			</h5></label><br /> <label><h5>
				<strong>Load Data file</strong>: <a
					href="pastAnalysis.php?filePath=http://in.grid-scape.com:9000/analysisWI/analysisTool/uploadLoadFiles/{$analysisDetail.file_name}">{$analysisDetail.file_name}</a>
			</h5></label><br /> <label><h5>
				<strong>Analysis Type</strong>: {if $analysisDetail.analysis_type eq
				'C'}Solar/Battery:
				{$analysisDetail.analysis_custom_solarsize}/{$analysisDetail.analysis_custom_batterysize}{else}Full{/if}
			</h5></label><br /> <label><h5>
				<strong>Energy Efficency</strong>:
				{$analysisDetail.energy_efficiency}
			</h5></label><br /> <label><h5>
				<strong>NEM Incentive Rate</strong>: ${$analysisDetail.nem_rate}
			</h5></label><br/>
			<label><h5>
				<strong>Rate Schedule</strong>: {if $analysisDetail.rateschedule_name neq ''}{$analysisDetail.rateschedule_name}{else} - {/if}
			</h5></label><br /><label><h5>
				<strong>Grid Resiliency</strong>: {if $analysisDetail.grid_resiliency gt 0}{$analysisDetail.grid_resiliency}%{else} - {/if}
			</h5></label><br /><br />
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
								<th>Total Cost ($)</th>
								<th>Cost of Energy from Grid ($)</th>
								<th>Cost of Demand Charges from Grid ($)</th>
								<th>Cost of Critical Peak Charges ($)</th>
								<th>CPP Incentive ($)</th>
								<th>fixedCharges ($)</th>
								<th>Annual Energy Export (KWH)</th>
								<th>NEM Incentive ($)</th>
								<th>Between Lower ({$lower_threshold}) and Upper Threshold ({$upper_threshold})</th>
		       					<th>Upper Threshold Cross</th>
		       					<th>Time of operation from Grid Resiliency Savings (hour)</th>
							</tr>
						</thead>
						<tbody>
							{foreach from=$analysisDetail.analysis_array key=solarSize
							item=batteryArray} {foreach from=$batteryArray key=batterySize
							item=monthArray} {foreach from=$monthArray key=monthName
							item=analysisArray}
							<tr {if $monthName neq 'annual'} style="display: none"
								data-hiddenrow="expand_{$solarSize}_{$batterySize}"
								{else}id="expand_{$solarSize}_{$batterySize}"{/if} >
								<td id="expandTD">{if $monthName eq 'annual'}<i
									class="fa fa-plus-circle"></i>{/if}
								</td> {foreach from=$analysisArray key=k item=v}
								<td>{$v}</td> {/foreach}
							</tr>
							{/foreach} {/foreach} {/foreach}
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
	{/if}
</div>
{include file='middle/page_footer.tpl'}
</html>

<script type="text/javascript">
{literal}
$(document).ready(function(){

	   var table = $('#analysisTable').DataTable( {
	 	   	"scrollY":        "570px",
	 	   	"scrollX": true,
	        "scrollCollapse": true,
	        "paging":   false,
	        "orderCellsTop": true,
	        "fixedHeader": true,
	        "ordering" : false,
	        dom: 'Bfrtip',
	        
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
