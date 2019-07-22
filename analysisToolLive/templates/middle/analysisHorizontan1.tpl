
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
	
	<style>
		
	</style>
</head>

<form class="form-horizontal" method="post" name="inputData" action="" enctype="multipart/form-data">
	<div class="container">
		{if $error neq ""} 
			<p class="alert alert-danger">{$error} </p>
		{/if}
		<h2 class="text-info">Solar + Battery Analysis</h2>
		<p>Provide below information to get analysis CSV</p>
		<div class="form-group">
			<label class="control-label col-sm-2">Upload Load data CSV:</label> 
			<div class="custom-file col-sm-6">
				<input type="file" class="custom-file-input form-control" name="loadFile" id="loadFile">
			</div>
		</div>
		
		{*<div class="form-group">
			<label class="control-label col-sm-2">Fire Station#:</label> 
			<div class="col-sm-6">
				<input name="FS" type="text" class="form-control" value="{$clsAnalysis->FS}">
			</div>
		</div>*}
		<div class="form-group">
			<label class="control-label col-sm-2">Analysis Type:</label>
			<div class="col-sm-6">
				<label class="radio-inline"><input type="radio" name="analysisType" value="customAnalysis" {if $clsAnalysis->analysisType eq 'customAnalysis'}checked{/if} > Custom Analysis (Solar + Battery)</label>
				<label class="radio-inline"><input type="radio" name="analysisType" value="allAnalysis" {if $clsAnalysis->analysisType eq 'allAnalysis'}checked{/if}> All Analysis (6 solar size)</label>
   			</div>
		</div>
		<div  id="customData" style="display: none">
			<div class="form-group">
				<label class="control-label col-sm-2">Solar Size:</label>
				<div class="col-sm-6">
					<input name="solarSize" type="text" class="form-control" value="{$clsAnalysis->solarSize}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Battery Size:</label> 
				<div class="col-sm-6">
					<input name="bs" type="text" class="form-control" value="{$clsAnalysis->bs}">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Analysis Structure:</label>
			<div class="col-sm-6">
				<label class="radio-inline"><input type="radio" name="analysisStructure" value="annual"  {if $clsAnalysis->analysisStructure eq 'annual'}checked{/if}> Annual Analysis</label>
				<label class="radio-inline"><input type="radio" name="analysisStructure" value="monthly" {if $clsAnalysis->analysisStructure eq 'monthly'}checked{/if}> Monthly Analysis</label>
   			</div>
		</div>
		<div class="form-group">
  			<label class="control-label col-sm-2" for="address">Site Address:</label>
  			<div class="col-sm-6">
  				<textarea class="col-sm-6 form-control" name="address" >{$clsAnalysis->address}</textarea>
  			</div>
  			
		</div>
		<button class="btn btn-primary btn-block" name="submit" type="submit" value="1" >Submit</button>
	</div>
	
	
</form>
<div class="container">
	{if $finalSummary|@count gt 0}
	<table id="analysisTable" class="table table-bordered">
		<thead>
		      <tr>
		        <th>Solar Size</th>
		        <th>Battery Size</th>
		        <th>Annual Solar Generation</th>
		        <th>Annual Energy procured from Grid (KWH)</th>
		        <th>Cost of Energy from Grid</th>
		        <th>Annual Energy Export</th>
		        <th>NEM Incentive</th>
		        <th>Energy Saving</th>
		        <th>Net Energy Savings with NEM</th>
		      </tr>
	    </thead>
	    <tbody>
			{foreach from=$finalSummary key=solarSize item=batteryArray}
				
				   {foreach from=$batteryArray key=k item=analysisArray}
				   		<tr {if $k eq 0}class="active"{/if}>
					   		{foreach from=$analysisArray key=k item=v}
					   			<td>{$v}</td>
					   		{/foreach}
				   		</tr>
				   {/foreach}
				
			{/foreach}
	    </tbody>
	</table>
	{/if}
</div>
<script type="text/javascript">
{literal}
$(document).ready(function(){
	 $('#analysisTable thead tr').clone(true).appendTo( '#analysisTable thead' );
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
	    } );
	   var table = $('#analysisTable').DataTable( {
	 	   	"scrollY":        "570px",
	        "scrollCollapse": true,
	        "paging":         false,
	        "orderCellsTop": true,
	        "fixedHeader": true,
	       /* dom: 'Bfrtip',
	        buttons: [
	            'csv', 'excel'
	        ],*/
	        searching: false
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
{/literal}
</script>