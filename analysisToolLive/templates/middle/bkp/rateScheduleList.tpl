<html>
	{include file='middle/page_header.tpl'}
	<div class="col-md-12">
	{if $error neq ""}
			<p class="alert alert-danger">{$error} </p>
	{/if}
	{if $msg neq ""}
			<p class="alert alert-success">{$msg} </p>
	{/if}
	{if $rateScheduleList}
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
					<th>Record Logs</th>
					<th>Status</th>
					<th>Action</th>
				</thead>

				<tbody>
					{foreach from=$rateScheduleList key=k item=vArray}
					<tr>
						<td><input type="checkbox" class="checkboxes" name="rateSchedule[]" value="{$vArray.rsid}"/></td>
						<td>{$vArray.rateschedule_name} {if $vArray.type eq 'S'}(Secondary){elseif $vArray.type eq 'M'}(Mandatory){/if}</td>
						<td>{$vArray.lower_threshold}KW - {$vArray.upper_threshold}KW</td>
						<td>{$vArray.effective_date|date_format}</td>
						<td>{if $vArray.date_added neq ''}Date Added: {$vArray.date_added|date_format:"%m/%d/%Y %H:%M:%S"}<br/> Added By: {$vArray.added_fname} {$vArray.added_lname} <br/>{/if}
							{if $vArray.date_modified neq ''}Date Modified: {$vArray.date_modified|date_format:"%m/%d/%Y %H:%M:%S"}<br/> Modified By: {$vArray.modified_fname} {$vArray.modified_lname} <br/>{/if}
						</td>
						<td>{if $vArray.status eq 'Y'}Active
							{elseif $vArray.status eq 'N'}Inactive
							{else}Deleted{/if}</td>
						<td>
						<a href="rateSchedule.php?rsid={$vArray.rsid}" class="btn red" target="_blank"> <i class="fa fa-edit"></i></a>
						
						</td>
					</tr>
					{/foreach}
				</tbody>


			</table>
		</div>
	</div>

	{else}
		<span>There is no records to display</span>
	{/if}
	</form>
	</div>
	{include file='middle/page_footer.tpl'}
</html>
<script>
{literal}
$(document).ready(function(){
	$('a[name="actionBtn"]').click(function(){
		$('input[name="activeRows"]').val(0);
		$('input[name="inactiveRows"]').val(0);
		$('input[name="deleteRows"]').val(0);
		$('input[name="copyRows"]').val(0);
		if($(this).attr('id') == 'activeRows'){
			$('input[name="activeRows"]').val(1);
		}else if($(this).attr('id') == 'inactiveRows'){
			$('input[name="inactiveRows"]').val(1);
		}else if($(this).attr('id') == 'deleteRows'){
			$('input[name="deleteRows"]').val(1);
		}else if($(this).attr('id') == 'copyRows'){
			$('input[name="copyRows"]').val(1);
		}
	
		var flagChecked = false;
	
		   $("input[type='checkbox'][name='rateSchedule[]']").each(function(){
				if($(this).is(':checked')){
					flagChecked = true;
				}
			});

	   if(flagChecked){
		   $('input[name="submit"]').click();
	   		/*$.ajax({
	   		  method: "POST",
	   		  url: "rateScheduleList.php?action=ajax",
	   		  data: $('#rateScheduleList').serialize()
	   		}).done(function( data ) {
		   		  if(data == 'successful'){
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
{/literal}
</script>