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
				<input name="siteName" type="text" class="form-control" value="{$clsUsageGeneration->siteName}">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-3 control-label">Upload Generation Data CSV:</label>
			<div class="custom-file col-md-4">
				<input type="file" class="custom-file-input form-control" name="generationFile" id="generationFile">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label">Upload In-Out Data From Utility CSV:</label>
			<div class="custom-file col-md-4">
				<input type="file" class="custom-file-input form-control" name="utilityFile" id="generationFile">
			</div>
		</div>
		
		<button class="btn blue btn-block" name="submit" type="submit" value="1" >Submit</button>
	</div>


</form>

{include file='middle/page_footer.tpl'}	
</html>
<script type="text/javascript">
{literal}

{/literal}
</script>

