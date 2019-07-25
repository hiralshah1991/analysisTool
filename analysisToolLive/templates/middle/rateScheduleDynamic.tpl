<html>
{include file='middle/page_header.tpl'}
{literal}
<style>
div.row .col-md-6 .col-md-9 .col-md-4 {padding: 0px 0px 0px 0px;}
div.row .col-md-6 .col-md-9 .col-md-1 {padding: 8px 8px 8px 8px;}
div.row label.col-md-3 {padding: 3px 0px 0px 0px;}
div.row .col-md-6 .col-md-9 div{float:left; padding:0px 0px 8px 0px;}
</style>
{/literal}
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
											<span class="help-block">
												Select Rate Schedule Type. </span>
											<div id="form_type_error"></div>
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
									<div class="row">
										<span name="addSeason" class="col-md-12" style="text-align: right;">Add Season+</span>
									</div>
									
									<div class="row" id="season_1">
										<h3 class="col-md-12 form-section">Season 1</h3>
										<h4 class="col-md-12 block"> Season Info</h4>
										<div class="form-group col-md-6">
											<label class="control-label col-md-3">Season Name
												<span class="required"> * </span>
											</label>
											<div class="col-md-9">
												<input name="name_season_1" type="text">
												<div id="form_error_season_1_name"></div>
											</div>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label col-md-3">Season Month Range
												<span class="required"> * </span>
											</label>
											<div class="col-md-9">
												<select multiple name="date_range_season_1[]" class="form-control">
													{foreach from=$monthRange key=k item=v}
														<option value="{$k}" {if $clsRateSchedule->date_range_season_1|is_array}{if $k|in_array:$clsRateSchedule->date_range_season_1}selected="selected"{/if}{/if}>{$v}</option>
													{/foreach}
												</select>
												<div id="form_error_date_range_season_1"></div>
											</div>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label col-md-3">Season Abbrevation</label>
											<div class="col-md-9">
												<input name="abbrevation_season_1" type="text">
											</div>
										</div>
										<div class="form-group col-md-6">
											
											<div class="col-md-12">
												<input type="checkbox" name="tou_season_1"> Has Time OF Use
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
											<label class="control-label col-md-3">Billing Period</label>
											<div class="col-md-9">
												<div class="radio-inline">
												<label> <input type="radio" name="s1_fixed_charge_cycle" value="D"
													data-title="Per Day" {if $clsRateSchedule->s1_fixed_charge_cycle eq 'D'}checked="checked"{/if}/> Per Day
												</label> <label> <input type="radio" name="s1_fixed_charge_cycle" value="B"
													data-title="Per Billing Period" {if $clsRateSchedule->s1_fixed_charge_cycle eq 'B'}checked="checked"{/if}/> Per Billing Period
												</label>
											</div>
											<div id="form_type_error"></div>
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">Fixed Charge</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-dollar"></i>
													</span>
													<input name="s1_fixed_charges" type="text" class="form-control" value="{if $clsRateSchedule->s1_fixed_charges gt 0}{$clsRateSchedule->s1_fixed_charges}{else}0{/if}"/>
													
												</div>
											</div>
										</div>
										
										
									</div>
									<div class="row">
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
										</div></div>
									
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
											<label class="control-label col-md-3">Billing Period</label>
											<div class="col-md-9">
												<div class="radio-inline">
												<label> <input type="radio" name="s2_fixed_charge_cycle" value="D"
													data-title="Per Day" {if $clsRateSchedule->s2_fixed_charge_cycle eq 'D'}checked="checked"{/if}/> Per Day
												</label> <label> <input type="radio" name="s2_fixed_charge_cycle" value="B"
													data-title="Per Billing Period" {if $clsRateSchedule->s1_fixed_charge_cycle eq 'B'}checked="checked"{/if}/> Per Billing Period
												</label>
											</div>
											<div id="form_type_error"></div>
											</div>
										</div>
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
										</div>
										<div class="row">
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
{literal}

$(document).ready(function(){
	$('input[name="s1_usage_times[]"]').each(function(){
		var tp = $(this).val();
		var usageTimeName = 's1_usagetime_'+tp;
		if($(this).is(':checked')){
			$('div[name="'+usageTimeName+'"]').show();
		}else{
			$('div[name="'+usageTimeName+'"]').hide();
		}
	});
	$('input[name="s2_usage_times[]"]').each(function(){
		var tp = $(this).val();
		var usageTimeName = 's2_usagetime_'+tp;
		if($(this).is(':checked')){
			$('div[name="'+usageTimeName+'"]').show();
		}else{
			$('div[name="'+usageTimeName+'"]').hide();
		}
	});
})


$('input[name="s1_usage_times[]"]').change(function(){
	var tp = $(this).val();
	var usageTimeName = 's1_usagetime_'+tp;
	if($(this).is(':checked')){
		$('div[name="'+usageTimeName+'"]').show();
	}else{
		$('div[name="'+usageTimeName+'"]').hide();
	}
});


$('input[name="s2_usage_times[]"]').change(function(){
	var tp = $(this).val();
	var usageTimeName = 's2_usagetime_'+tp;
	if($(this).is(':checked')){
		$('div[name="'+usageTimeName+'"]').show();
	}else{
		$('div[name="'+usageTimeName+'"]').hide();
	}
})

var currentRowNumber = 0;
var nextRowNumber = 0;
var detachRowNum = '';
var detachRowElement='';
$(document).on('click','[name^=add_]',function(){
	var currentRowNumber = parseInt($(this).attr('name').split('_')[1]);
	if(nextRowNumber == ''){
		nextRowNumber = currentRowNumber+1;
	}else{
		nextRowNumber++;
	}
	var elementName = $(this).data('name');
	var elementTp = $(this).data('tp');
	var elementFullNameFrom = elementName+'['+elementTp+'][from][]';
	var elementFullNameTo = elementName+'['+elementTp+'][to][]';
	var nextRowIDAdd = 'add_'+nextRowNumber;
	var nextRowIDRemove = 'remove_'+nextRowNumber;
	
	if(detachRowElement != ""){
		alert(detachRowElement)
		detachRowElement.appendTo($(this).parent('div').parent('div').parent('div'));
	}else{
		detachRowNum = '';
		detachRowElement = '';
		//add new row
		var html = '<div  data-rownum="'+nextRowNumber+'"><div class="col-md-4" style="padding:0px;"><div class="input-icon"><i class="fa fa-clock-o"></i><input type="text" class="form-control timepicker timepicker-24" name="'+elementFullNameFrom+'" ></div></div><label class="control-label col-md-2">To</label><div class="col-md-4" style="padding:0px;"><div class="input-icon"><i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="'+elementFullNameTo+'" ></div></div><div class="col-md-2" style="padding:8px;"><span  name="'+nextRowIDAdd+'" data-name="s1_usage_time_range_weekdays" data-tp="onpeak"><i class="fa fa-plus"></i></span>&nbsp;<span  name="'+nextRowIDRemove+'"><i class="fa fa-minus"></i></span></div></div>';
		$(this).parent('div').parent('div').parent('div').append(html);
		ComponentsPickers.init();
	}
	//$(this).hide();
	
})
$(document).on('click','[name^=remove_]',function(){
	$(this).parent('div').parent('div').remove();
	 //detachRowNum = parseInt($(this).attr('id').split('_')[1]);
	 //previousRowNumber = detachRowNum - 1;
	 //detachRowElement = $(this).parent('div').parent('div').detach();
	 //$('[id^=add_]').hide();
	 //$('#add_'+previousRowNumber).show();
})
{/literal}
</script>