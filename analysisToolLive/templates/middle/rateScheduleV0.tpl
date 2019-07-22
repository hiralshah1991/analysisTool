<html>
{include file='middle/page_header.tpl'}

<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue" id="form_wizard_1">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-reorder"></i> Rate Schedule Information
				</div>
				<div class="tools hidden-xs">
					<a href="javascript:;" class="collapse"> </a>
				</div>
			</div>
			<div class="portlet-body form">
				<form action="" method="POST" class="form-horizontal" id="submit_form" name="submit_form">
					<div class="form-wizard">
						<div class="form-body">
							<ul class="nav nav-pills nav-justified steps">
								<li><a href="#tab1" data-toggle="tab" class="step"> <span
										class="number"> 1 </span> <span class="desc"> <i
											class="fa fa-check"></i> General Information
									</span>
								</a></li>
								<li><a href="#tab2" data-toggle="tab" class="step"> <span
										class="number"> 2 </span> <span class="desc"> <i
											class="fa fa-check"></i> Season and Time Periods
									</span>
								</a></li>
								<li><a href="#tab3" data-toggle="tab" class="step active">
										<span class="number"> 3 </span> <span class="desc"> <i
											class="fa fa-check"></i> Charges
									</span>
								</a></li>
								
							</ul>
							<div id="bar" class="progress progress-striped"
								role="progressbar">
								<div class="progress-bar progress-bar-success"></div>
							</div>
							<div class="tab-content">
								<div class="alert alert-danger display-none">
									<button class="close" data-dismiss="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="alert alert-success display-none">
									<button class="close" data-dismiss="alert"></button>
									Your form validation is successful!
								</div>
								<div class="tab-pane active" id="tab1">
									<h3 class="block">Provide General Information</h3>
									<div class="form-group">
										<label class="control-label col-md-3">Rate Schedule
											Name <span class="required"> * </span>
										</label>
										<div class="col-md-4">
											<input type="text" class="form-control"
												name="rateschedule_name" value="{$clsRateSchedule->rateschedule_name}" /> <span class="help-block">
												Provide name of rate schedule. </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Utility <span
											class="required"> * </span>
										</label>
										<div class="col-md-4">
											<input type="text" class="form-control" name="utility_name" value="{$clsRateSchedule->utility_name}" />
											<span class="help-block"> Provide name of utility </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Rate Schedule
											Plan <span class="required"> * </span>
										</label>
										<div class="col-md-4">
											<input type="text" class="form-control"
												name="schedule_number" value="{$clsRateSchedule->schedule_number}"/> <span class="help-block">
												Provide plan number of rate schedule. </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Rate Schedule
											Type <span class="required"> * </span>
										</label>
										<div class="col-md-4">
											<div class="radio-list">
												<label> <input type="radio" name="type" value="S"
													data-title="Secondary" {if $clsRateSchedule->type eq 'S'}checked="checked"{/if}/> Secondary
												</label> <label> <input type="radio" name="type" value="M"
													data-title="Mandatory" {if $clsRateSchedule->type eq 'M'}checked="checked"{/if}/> Mandatory
												</label>
											</div>
											<div id="form_gender_error"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Lower Threshold Limit <span class="required"> * </span>
										</label>
										<div class="col-md-4">
											<div class="input-group">
												<input type="text" class="form-control" name="lower_threshold" value="{$clsRateSchedule->lower_threshold}" /> 
												<span class="input-group-addon"> KW </span>
											</div>

											<span class="help-block">
												Provide lower threshold limit.
											 </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Upper Threshold Limit <span class="required"> * </span>
										</label>
										<div class="col-md-4">
											<div class="input-group">
												<input type="text" class="form-control" name="upper_threshold" value="{$clsRateSchedule->upper_threshold}"/>
												<span class="input-group-addon"> KW </span>
											</div>
											 <span class="help-block">
												Provide upper threshold limit. </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Effective Date <span
											class="required"> * </span>
										</label>
										<div class="col-md-4">
												<input type="text" size="16" readonly class="form-control form-control-inline input-medium date-picker" name="effective_date" value="{$clsRateSchedule->effective_date|date_format:'%m/%d/%Y'}">
												
											<span class="help-block"> Provide effective date for
												this rate schedule </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Status</label>
										<div class="col-md-4">
											<select class="form-control" name="status">
												<option value="Y" {if $clsRateSchedule->status eq 'Y'}selected="selected"{/if}>Active</option>
												<option value="N" {if $clsRateSchedule->status eq 'N'}selected="selected"{/if}>Inactive</option>
											</select>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab2">
									<h3 class="form-section">Winter Season Information</h3>
									<input type="hidden" class="form-control" name="s1" value="winter" />

									<h4 class="block">General Information</h4>
									<div class="row">
										<div class="col-md-6 ">
											
											<label class="control-label col-md-3">Season Month Range 
												<span class="required"> * </span>
											</label>
											<div class="col-md-9">
												<select multiple name="s1_date_range[]" class="form-control">
												{foreach from=$monthRange key=k item=v}
													<option value="{$k}" {if $k|in_array:$clsRateSchedule->s1_date_range}selected="selected"{/if}>{$v}</option>
												{/foreach}
											</select>
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Usage Times <span
											class="required"> * </span>
											</label>
											<div class="col-md-9">
											<div class="checkbox-list">
												<label class="checkbox-inline"> <input type="checkbox" name="s1_usage_times[]"
													value="onpeak" {if 'onpeak'|in_array:$clsRateSchedule->s1_usage_times}checked="checked"{/if}> On Peak
												</label>
												 <label class="checkbox-inline"> <input type="checkbox"
													name="s1_usage_times[]" value="offpeak" {if 'offpeak'|in_array:$clsRateSchedule->s1_usage_times}checked="checked"{/if}> Off Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s1_usage_times[]" value="midpeak" {if 'midpeak'|in_array:$clsRateSchedule->s1_usage_times}checked="checked"{/if}> Mid Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s1_usage_times[]" value="partialpeak" {if 'partialpeak'|in_array:$clsRateSchedule->s1_usage_times}checked="checked"{/if}> Partial Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s1_usage_times[]" value="criticalpeak" {if 'criticalpeak'|in_array:$clsRateSchedule->s1_usage_times}checked="checked"{/if}>
													Critical Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s1_usage_times[]" value="superoffpeak" {if 'superoffpeak'|in_array:$clsRateSchedule->s1_usage_times}checked="checked"{/if}> Super
													Off Peak
												</label>

											</div>

											<span class="help-block"> Provide usage time periods </span>
										</div>
										</div>
									</div>
									<h4 class="block">Week Day Time Range Information</h4>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">On Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s1_usage_time_range_weekdays[onpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s1_usage_time_range_weekdays.onpeak|is_array}{if $k|in_array:$clsRateSchedule->s1_usage_time_range_weekdays.onpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Off Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s1_usage_time_range_weekdays[offpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s1_usage_time_range_weekdays.offpeak|is_array}{if $k|in_array:$clsRateSchedule->s1_usage_time_range_weekdays.offpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
									</div>
									<br/>
									
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Mid Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s1_usage_time_range_weekdays[midpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s1_usage_time_range_weekdays.midpeak|is_array}{if $k|in_array:$clsRateSchedule->s1_usage_time_range_weekdays.midpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Partial Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s1_usage_time_range_weekdays[partialpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s1_usage_time_range_weekdays.patialpeak|is_array}{if $k|in_array:$clsRateSchedule->s1_usage_time_range_weekdays.partialpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Critical Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s1_usage_time_range_weekdays[criticalpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s1_usage_time_range_weekdays.criticalpeak|is_array}{if $k|in_array:$clsRateSchedule->s1_usage_time_range_weekdays.criticalpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Super Off Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s1_usage_time_range_weekdays[superoffpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s1_usage_time_range_weekdays.superoffpeak|is_array}{if $k|in_array:$clsRateSchedule->s1_usage_time_range_weekdays.superoffpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
									</div>
						

									<h4 class="block">Weekend Time Range Information</h4>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">On Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s1_usage_time_range_weekend[onpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s1_usage_time_range_weekend.onpeak|is_array}{if $k|in_array:$clsRateSchedule->s1_usage_time_range_weekend.onpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Off Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s1_usage_time_range_weekend[offpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s1_usage_time_range_weekend.offpeak|is_array}{if $k|in_array:$clsRateSchedule->s1_usage_time_range_weekend.offpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
									</div>
									<br/>
									
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Mid Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s1_usage_time_range_weekend[midpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> 
													{foreach from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s1_usage_time_range_weekend.midpeak|is_array}{if $k|in_array:$clsRateSchedule->s1_usage_time_range_weekend.midpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Partial Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s1_usage_time_range_weekend[partialpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s1_usage_time_range_weekend.partialpeak|is_array}{if $k|in_array:$clsRateSchedule->s1_usage_time_range_weekend.partialpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Critical Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s1_usage_time_range_weekend[criticalpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s1_usage_time_range_weekend.criticalpeak|is_array}{if $k|in_array:$clsRateSchedule->s1_usage_time_range_weekend.criticalpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Super Off Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s1_usage_time_range_weekend[superoffpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s1_usage_time_range_weekend.superoffpeak|is_array}{if $k|in_array:$clsRateSchedule->s1_usage_time_range_weekend.superoffpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
									</div>
									<h3 class="form-section">Summer Season Information</h3>
									<input type="hidden" class="form-control" name="s2" value="summer" />
									
									<h4 class="block">General Information</h4>
									<div class="row">
										<div class="col-md-6 ">
											
											<label class="control-label col-md-3">Season Month Range 
												<span class="required"> * </span>
											</label>
											<div class="col-md-9">
												<select multiple name="s2_date_range[]" class="form-control">
												{foreach from=$monthRange key=k item=v}
													<option value="{$k}" {if $k|in_array:$clsRateSchedule->s2_date_range}selected="selected"{/if}>{$v}</option>
												{/foreach}
											</select>
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Usage Times <span
											class="required"> * </span>
											</label>
											<div class="col-md-9">
											<div class="checkbox-list">
												<label class="checkbox-inline"> <input type="checkbox" name="s2_usage_times[]"
													value="onpeak" {if 'onpeak'|in_array:$clsRateSchedule->s2_usage_times}checked="checked"{/if}> On Peak
												</label>
												 <label class="checkbox-inline"> <input type="checkbox"
													name="s2_usage_times[]" value="offpeak" {if 'offpeak'|in_array:$clsRateSchedule->s2_usage_times}checked="checked"{/if}> Off Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s2_usage_times[]" value="midpeak" {if 'midpeak'|in_array:$clsRateSchedule->s2_usage_times}checked="checked"{/if}> Mid Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s2_usage_times[]" value="partialpeak" {if 'partialpeak'|in_array:$clsRateSchedule->s2_usage_times}checked="checked"{/if}> Partial Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s2_usage_times[]" value="criticalpeak" {if 'criticalpeak'|in_array:$clsRateSchedule->s2_usage_times}checked="checked"{/if}>
													Critical Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s2_usage_times[]" value="superoffpeak" {if 'superoffpeak'|in_array:$clsRateSchedule->s2_usage_times}checked="checked"{/if}> Super
													Off Peak
												</label>

											</div>

											<span class="help-block"> Provide usage time periods </span>
										</div>
										</div>
									</div>
									
									<h4 class="block">Week Day Time Range Information</h4>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">On Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s2_usage_time_range_weekdays[onpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s2_usage_time_range_weekdays.onpeak|is_array}{if $k|in_array:$clsRateSchedule->s2_usage_time_range_weekdays.onpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Off Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s2_usage_time_range_weekdays[offpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s2_usage_time_range_weekdays.offpeak|is_array}{if $k|in_array:$clsRateSchedule->s2_usage_time_range_weekdays.offpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
									</div>
									<br/>
									
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Mid Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s2_usage_time_range_weekdays[midpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s2_usage_time_range_weekdays.midpeak|is_array}{if $k|in_array:$clsRateSchedule->s2_usage_time_range_weekdays.midpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Partial Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s2_usage_time_range_weekdays[partialpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s2_usage_time_range_weekdays.partialpeak|is_array}{if $k|in_array:$clsRateSchedule->s2_usage_time_range_weekdays.partialpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Critical Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s2_usage_time_range_weekdays[criticalpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s2_usage_time_range_weekdays.criticalpeak|is_array}{if $k|in_array:$clsRateSchedule->s2_usage_time_range_weekdays.criticalpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Super Off Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s2_usage_time_range_weekdays[superoffpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s2_usage_time_range_weekdays.superoffpeak|is_array}{if $k|in_array:$clsRateSchedule->s2_usage_time_range_weekdays.superroffpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
									</div>
									
									<h4 class="block">Weekend Time Range Information</h4>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">On Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s2_usage_time_range_weekend[onpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s2_usage_time_range_weekend.onpeak|is_array}{if $k|in_array:$clsRateSchedule->s2_usage_time_range_weekend.onpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Off Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s2_usage_time_range_weekend[offpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s2_usage_time_range_weekend.offpeak|is_array}{if $k|in_array:$clsRateSchedule->s2_usage_time_range_weekend.offpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
									</div>
									<br/>
									
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Mid Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s2_usage_time_range_weekend[midpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s2_usage_time_range_weekend.midpeak|is_array}{if $k|in_array:$clsRateSchedule->s2_usage_time_range_weekend.midpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Partial Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s2_usage_time_range_weekend[partialpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}"> {if $clsRateSchedule->s2_usage_time_range_weekend.partialpeak|is_array}{if $k|in_array:$clsRateSchedule->s2_usage_time_range_weekend.partialpeak}selected="selected"{/if}{/if}{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Critical Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s2_usage_time_range_weekend[criticalpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s2_usage_time_range_weekend.criticalpeak|is_array}{if $k|in_array:$clsRateSchedule->s2_usage_time_range_weekend.criticalpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Super Off Peak
											Time Range</label>
											<div class="col-md-9">
												<select multiple
													name="s2_usage_time_range_weekend[superoffpeak][]"
													class="form-control">
													<option value="">Select Time Range</option> {foreach
													from=$timeRange key=k item=v}
													<option value="{$k}" {if $clsRateSchedule->s2_usage_time_range_weekend.superoffpeak|is_array}{if $k|in_array:$clsRateSchedule->s2_usage_time_range_weekend.superoffpeak}selected="selected"{/if}{/if}>{$v}</option> {/foreach}
												</select>
											
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane active" id="tab3">
									<h3 class="form-section">Winter Season Charges</h3>
									
									<h4> Energy Charges</h4>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">On Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s1_usage_time_energy_charge[onpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s1_usage_time_energy_charge.onpeak gt 0}{$clsRateSchedule->s1_usage_time_energy_charge.onpeak}{else}0{/if}"/>
												</div>
												
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Off Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s1_usage_time_energy_charge[offpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s1_usage_time_energy_charge.offpeak gt 0}{$clsRateSchedule->s1_usage_time_energy_charge.offpeak}{else}0{/if}"/>
												</div>
												
											</div>
										</div>
										
									</div>
									<br/>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Mid Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s1_usage_time_energy_charge[midpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s1_usage_time_energy_charge.midpeak gt 0}{$clsRateSchedule->s1_usage_time_energy_charge.midpeak}{else}0{/if}"/>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Critical Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s1_usage_time_energy_charge[criticalpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s1_usage_time_energy_charge.criticalpeak gt 0}{$clsRateSchedule->s1_usage_time_energy_charge.criticalpeak}{else}0{/if}"/>
												</div>
											</div>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Super Off Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s1_usage_time_energy_charge[superoffpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s1_usage_time_energy_charge.superoffpeak gt 0}{$clsRateSchedule->s1_usage_time_energy_charge.superoffpeak}{else}0{/if}"/>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Partial Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s1_usage_time_energy_charge[partialpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s1_usage_time_energy_charge.partialpeak gt 0}{$clsRateSchedule->s1_usage_time_energy_charge.partialpeak}{else}0{/if}"/>
												</div>
											</div>
										</div>
									</div>
									<br/>
									<h4 class="block"> Demand Charges</h4>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">On Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s1_usage_time_demand_charge[onpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s1_usage_time_demand_charge.onpeak gt 0}{$clsRateSchedule->s1_usage_time_demand_charge.onpeak}{else}0{/if}"/>
												</div>
												
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Off Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s1_usage_time_demand_charge[offpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s1_usage_time_demand_charge.offpeak gt 0}{$clsRateSchedule->s1_usage_time_demand_charge.offpeak}{else}0{/if}"/>
												</div>
												
											</div>
										</div>
										
									</div>
									<br/>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Mid Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s1_usage_time_demand_charge[midpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s1_usage_time_demand_charge.midpeak gt 0}{$clsRateSchedule->s1_usage_time_demand_charge.midpeak}{else}0{/if}"/>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Critical Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s1_usage_time_demand_charge[criticalpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s1_usage_time_demand_charge.criticalpeak gt 0}{$clsRateSchedule->s1_usage_time_demand_charge.criticalpeak}{else}0{/if}"/>
												</div>
											</div>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Super Off Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s1_usage_time_demand_charge[superoffpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s1_usage_time_demand_charge.superoffpeak gt 0}{$clsRateSchedule->s1_usage_time_demand_charge.superoffpeak}{else}0{/if}"/>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Partial Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s1_usage_time_demand_charge[partialpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s1_usage_time_demand_charge.partialpeak gt 0}{$clsRateSchedule->s1_usage_time_demand_charge.partialpeak}{else}0{/if}"/>
												</div>
											</div>
										</div>
									</div>
									<br/>
									<div class="row">
											<div class="col-md-6">
											<label class="control-label col-md-3">Non-Coincidental (NC)</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s1_usage_time_demand_charge[NC]" type="text" class="form-control" value="{if $clsRateSchedule->s1_usage_time_demand_charge.NC gt 0}{$clsRateSchedule->s1_usage_time_demand_charge.NC}{else}0{/if}"/>
												</div>
												
											</div>
										</div>
									</div>
									
									<h4 class="block"> Fixed Charge and CPP Incentive</h4>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Fixed Charge/Billing Period</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s1_fixed_charges" type="text" class="form-control" value="{if $clsRateSchedule->s1_fixed_charges gt 0}{$clsRateSchedule->s1_fixed_charges}{else}0{/if}"/>
													
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">CPP Incentive</label>
											<div class="col-md-9">
												<div class="input-group">
													
													<input name="s1_CPP_incentive" type="text" class="form-control"  value="{if $clsRateSchedule->s1_CPP_incentive neq ''}{$clsRateSchedule->s1_CPP_incentive}{else}0{/if}"/>
													<span class="input-group-addon">
														%
													</span>
												</div>
											</div>
										</div>
									</div>
									
									<h3 class="form-section">Summer Season Charges</h3>
									
									<h4> Energy Charges</h4>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">On Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s2_usage_time_energy_charge[onpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s2_usage_time_energy_charge.onpeak gt 0}{$clsRateSchedule->s2_usage_time_energy_charge.onpeak}{else}0{/if}"/>
												</div>
												
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Off Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s2_usage_time_energy_charge[offpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s2_usage_time_energy_charge.offpeak gt 0}{$clsRateSchedule->s2_usage_time_energy_charge.offpeak}{else}0{/if}"/>
												</div>
												
											</div>
										</div>
										
									</div>
									<br/>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Mid Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s2_usage_time_energy_charge[midpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s2_usage_time_energy_charge.midpeak gt 0}{$clsRateSchedule->s2_usage_time_energy_charge.midpeak}{else}0{/if}"/>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Critical Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s2_usage_time_energy_charge[criticalpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s2_usage_time_energy_charge.criticalpeak gt 0}{$clsRateSchedule->s2_usage_time_energy_charge.criticalpeak}{else}0{/if}"/>
												</div>
											</div>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Super Off Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s2_usage_time_energy_charge[superoffpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s2_usage_time_energy_charge.superoffpeak gt 0}{$clsRateSchedule->s2_usage_time_energy_charge.superoffpeak}{else}0{/if}"/>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Partial Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s2_usage_time_energy_charge[partialpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s2_usage_time_energy_charge.partialpeak gt 0}{$clsRateSchedule->s2_usage_time_energy_charge.partialpeak}{else}0{/if}"/>
												</div>
											</div>
										</div>
									</div>
									<br/>
									<h4 class="block"> Demand Charges</h4>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">On Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s2_usage_time_demand_charge[onpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s2_usage_time_demand_charge.onpeak gt 0}{$clsRateSchedule->s2_usage_time_demand_charge.onpeak}{else}0{/if}"/>
												</div>
												
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Off Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s2_usage_time_demand_charge[offpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s2_usage_time_demand_charge.offpeak gt 0}{$clsRateSchedule->s2_usage_time_demand_charge.offpeak}{else}0{/if}"/>
												</div>
												
											</div>
										</div>
										
									</div>
									<br/>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Mid Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s2_usage_time_demand_charge[midpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s2_usage_time_demand_charge.midpeak gt 0}{$clsRateSchedule->s2_usage_time_demand_charge.midpeak}{else}0{/if}"/>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Critical Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s2_usage_time_demand_charge[criticalpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s2_usage_time_demand_charge.criticalpeak gt 0}{$clsRateSchedule->s2_usage_time_demand_charge.criticalpeak}{else}0{/if}"/>
												</div>
											</div>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Super Off Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s2_usage_time_demand_charge[superoffpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s2_usage_time_demand_charge.superoffpeak gt 0}{$clsRateSchedule->s2_usage_time_demand_charge.superoffpeak}{else}0{/if}"/>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Partial Peak Charges</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s2_usage_time_demand_charge[partialpeak]" type="text" class="form-control" value="{if $clsRateSchedule->s2_usage_time_demand_charge.partialpeak gt 0}{$clsRateSchedule->s2_usage_time_demand_charge.partialpeak}{else}0{/if}"/>
												</div>
											</div>
										</div>
									</div>
									<br/>
									<div class="row">
											<div class="col-md-6">
											<label class="control-label col-md-3">Non-Coincidental (NC)</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s2_usage_time_demand_charge[NC]" type="text" class="form-control" value="{if $clsRateSchedule->s2_usage_time_demand_charge.NC gt 0}{$clsRateSchedule->s2_usage_time_demand_charge.NC}{else}0{/if}"/>
												</div>
												
											</div>
										</div>
									</div>
									
									<h4 class="block"> Fixed Charge and CPP Incentive</h4>
									<div class="row">
										<div class="col-md-6">
											<label class="control-label col-md-3">Fixed Charge/Billing Period</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s2_fixed_charges" type="text" class="form-control" value="{if $clsRateSchedule->s2_fixed_charges gt 0}{$clsRateSchedule->s2_fixed_charges}{else}0{/if}"/>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">CPP Incentive</label>
											<div class="col-md-9">
												<div class="input-group">
													
													<input name="s2_CPP_incentive" type="text" class="form-control" value="{if $clsRateSchedule->s2_CPP_incentive neq ''}{$clsRateSchedule->s2_CPP_incentive}{else}0{/if}"/>
													<span class="input-group-addon">
														%
													</span>
												</div>
											</div>
										</div>
									</div>
									
								</div>
								
							</div>
						</div>
						<div class="form-actions fluid">
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-offset-3 col-md-9">
										<a href="javascript:;" class="btn default button-previous">
											<i class="m-icon-swapleft"></i> Back
										</a> <a href="javascript:;" class="btn blue button-next">
											Continue <i class="m-icon-swapright m-icon-white"></i>
										</a> <button class="btn green button-submit">
											{if $smarty.get.rsid neq ''}Update{else}Save{/if}
										</button>
										<input type="hidden" name="submit" value="1"/>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- END PAGE CONTENT-->
{include file='middle/page_footer.tpl'}
</html>
<script type="text/javascript">
{literal}{/literal}
</script>