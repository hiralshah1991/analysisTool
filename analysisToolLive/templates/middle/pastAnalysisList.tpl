{literal}
<style>
table#analysisListTable td{
    word-break: break-word;
}
</style>
{/literal}
<html>
	{include file='middle/page_header.tpl'}
	<div class="col-md-12">
	{if $analysisList}
	<table class="table table-bordered table-hover" id="analysisListTable">
	<thead>
		<th>Site Name</th>
		<th>Rate Schedule</th>
		<th>Date of Analysis</th>
		<th>Analysis Type</th>
		<th>Energy Efficiency</th>
		<th>Grid Resiliency</th>
		<th>Action</th>
	</thead>
	
	<tbody>
	{foreach from=$analysisList key=k item=vArray}
		<tr>
			<td>{$vArray.site_name}</td>
			<td>{$vArray.rateschedule_name}</td>
			<td data-sort="{$vArray.date_added|date_format:'%Y%m%d%H%M%s'}">{$vArray.date_added|date_format}</td>
			<td>{if $vArray.analysis_type eq 'C'}Solar/Battery:{$vArray.analysis_custom_solarsize}/{$vArray.analysis_custom_batterysize}{else}Full{/if}</td>
			<td>{$vArray.energy_efficiency}</td>
			<td>{$vArray.grid_resiliency}</td>
			<td><a href="pastAnalysis.php?aid={$vArray.analysis_id}" class="btn btn-primary" target="_blank">View <i class="fa fa-eye"></i></a></td>
		</tr>
	{/foreach}
	</tbody>
	
	
	</table>
	{else}
		<span>There is no records to display</span>
	{/if}
	</div>
	{include file='middle/page_footer.tpl'}
</html>
<script>
{literal}
$(document).ready(function(){

	   var table = $('#analysisListTable').DataTable( {
	 	   	"scrollY":        "570px",
	 	   	"scrollX": true,
	        "scrollCollapse": true,
	        "paging":   true,
	        "orderCellsTop": true,
	        //"fixedHeader": true,
	         "sorting": false,
	        "order": [[ 2, "desc" ]],
	        /*"columnDefs": [
    { "orderable": false, "targets": [7] }
  ],*/
	        searching: true
	    } );


});
{/literal}
</script>