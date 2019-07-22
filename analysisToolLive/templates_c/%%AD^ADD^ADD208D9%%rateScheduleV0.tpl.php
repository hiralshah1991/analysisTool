<?php /* Smarty version 2.6.30, created on 2019-01-09 00:43:18
         compiled from middle/rateScheduleV0.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'middle/rateScheduleV0.tpl', 127, false),array('modifier', 'in_array', 'middle/rateScheduleV0.tpl', 157, false),array('modifier', 'is_array', 'middle/rateScheduleV0.tpl', 206, false),)), $this); ?>
<html>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'middle/page_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

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
												name="rateschedule_name" value="<?php echo $this->_tpl_vars['clsRateSchedule']->rateschedule_name; ?>
" /> <span class="help-block">
												Provide name of rate schedule. </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Utility <span
											class="required"> * </span>
										</label>
										<div class="col-md-4">
											<input type="text" class="form-control" name="utility_name" value="<?php echo $this->_tpl_vars['clsRateSchedule']->utility_name; ?>
" />
											<span class="help-block"> Provide name of utility </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Rate Schedule
											Plan <span class="required"> * </span>
										</label>
										<div class="col-md-4">
											<input type="text" class="form-control"
												name="schedule_number" value="<?php echo $this->_tpl_vars['clsRateSchedule']->schedule_number; ?>
"/> <span class="help-block">
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
													data-title="Secondary" <?php if ($this->_tpl_vars['clsRateSchedule']->type == 'S'): ?>checked="checked"<?php endif; ?>/> Secondary
												</label> <label> <input type="radio" name="type" value="M"
													data-title="Mandatory" <?php if ($this->_tpl_vars['clsRateSchedule']->type == 'M'): ?>checked="checked"<?php endif; ?>/> Mandatory
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
												<input type="text" class="form-control" name="lower_threshold" value="<?php echo $this->_tpl_vars['clsRateSchedule']->lower_threshold; ?>
" /> 
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
												<input type="text" class="form-control" name="upper_threshold" value="<?php echo $this->_tpl_vars['clsRateSchedule']->upper_threshold; ?>
"/>
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
												<input type="text" size="16" readonly class="form-control form-control-inline input-medium date-picker" name="effective_date" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->effective_date)) ? $this->_run_mod_handler('date_format', true, $_tmp, '%m/%d/%Y') : smarty_modifier_date_format($_tmp, '%m/%d/%Y')); ?>
">
												
											<span class="help-block"> Provide effective date for
												this rate schedule </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Status</label>
										<div class="col-md-4">
											<select class="form-control" name="status">
												<option value="Y" <?php if ($this->_tpl_vars['clsRateSchedule']->status == 'Y'): ?>selected="selected"<?php endif; ?>>Active</option>
												<option value="N" <?php if ($this->_tpl_vars['clsRateSchedule']->status == 'N'): ?>selected="selected"<?php endif; ?>>Inactive</option>
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
												<?php $_from = $this->_tpl_vars['monthRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_date_range) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_date_range))): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option>
												<?php endforeach; endif; unset($_from); ?>
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
													value="onpeak" <?php if (((is_array($_tmp='onpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times))): ?>checked="checked"<?php endif; ?>> On Peak
												</label>
												 <label class="checkbox-inline"> <input type="checkbox"
													name="s1_usage_times[]" value="offpeak" <?php if (((is_array($_tmp='offpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times))): ?>checked="checked"<?php endif; ?>> Off Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s1_usage_times[]" value="midpeak" <?php if (((is_array($_tmp='midpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times))): ?>checked="checked"<?php endif; ?>> Mid Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s1_usage_times[]" value="partialpeak" <?php if (((is_array($_tmp='partialpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times))): ?>checked="checked"<?php endif; ?>> Partial Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s1_usage_times[]" value="criticalpeak" <?php if (((is_array($_tmp='criticalpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times))): ?>checked="checked"<?php endif; ?>>
													Critical Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s1_usage_times[]" value="superoffpeak" <?php if (((is_array($_tmp='superoffpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times))): ?>checked="checked"<?php endif; ?>> Super
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['onpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['onpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['onpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['offpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['offpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['offpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['midpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['midpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['midpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['patialpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['partialpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['partialpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['criticalpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['criticalpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['criticalpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['superoffpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['superoffpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['superoffpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['onpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['onpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['onpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['offpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['offpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['offpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['midpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['midpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['midpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['partialpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['partialpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['partialpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['criticalpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['criticalpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['criticalpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['superoffpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['superoffpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['superoffpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
												<?php $_from = $this->_tpl_vars['monthRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_date_range) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_date_range))): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option>
												<?php endforeach; endif; unset($_from); ?>
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
													value="onpeak" <?php if (((is_array($_tmp='onpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times))): ?>checked="checked"<?php endif; ?>> On Peak
												</label>
												 <label class="checkbox-inline"> <input type="checkbox"
													name="s2_usage_times[]" value="offpeak" <?php if (((is_array($_tmp='offpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times))): ?>checked="checked"<?php endif; ?>> Off Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s2_usage_times[]" value="midpeak" <?php if (((is_array($_tmp='midpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times))): ?>checked="checked"<?php endif; ?>> Mid Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s2_usage_times[]" value="partialpeak" <?php if (((is_array($_tmp='partialpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times))): ?>checked="checked"<?php endif; ?>> Partial Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s2_usage_times[]" value="criticalpeak" <?php if (((is_array($_tmp='criticalpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times))): ?>checked="checked"<?php endif; ?>>
													Critical Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s2_usage_times[]" value="superoffpeak" <?php if (((is_array($_tmp='superoffpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times))): ?>checked="checked"<?php endif; ?>> Super
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['onpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['onpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['onpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['offpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['offpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['offpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['midpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['midpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['midpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['partialpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['partialpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['partialpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['criticalpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['criticalpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['criticalpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['superoffpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['superroffpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['superroffpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['onpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['onpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['onpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['offpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['offpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['offpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['midpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['midpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['midpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
"> <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['partialpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['partialpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['partialpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['criticalpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['criticalpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['criticalpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<option value="">Select Time Range</option> <?php $_from = $this->_tpl_vars['timeRange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
													<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['superoffpeak'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['superoffpeak']) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['superoffpeak']))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
</option> <?php endforeach; endif; unset($_from); ?>
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
													<input name="s1_usage_time_energy_charge[onpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s1_usage_time_energy_charge['onpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_energy_charge['onpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s1_usage_time_energy_charge[offpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s1_usage_time_energy_charge['offpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_energy_charge['offpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s1_usage_time_energy_charge[midpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s1_usage_time_energy_charge['midpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_energy_charge['midpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s1_usage_time_energy_charge[criticalpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s1_usage_time_energy_charge['criticalpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_energy_charge['criticalpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s1_usage_time_energy_charge[superoffpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s1_usage_time_energy_charge['superoffpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_energy_charge['superoffpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s1_usage_time_energy_charge[partialpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s1_usage_time_energy_charge['partialpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_energy_charge['partialpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s1_usage_time_demand_charge[onpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s1_usage_time_demand_charge['onpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_demand_charge['onpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s1_usage_time_demand_charge[offpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s1_usage_time_demand_charge['offpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_demand_charge['offpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s1_usage_time_demand_charge[midpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s1_usage_time_demand_charge['midpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_demand_charge['midpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s1_usage_time_demand_charge[criticalpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s1_usage_time_demand_charge['criticalpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_demand_charge['criticalpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s1_usage_time_demand_charge[superoffpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s1_usage_time_demand_charge['superoffpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_demand_charge['superoffpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s1_usage_time_demand_charge[partialpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s1_usage_time_demand_charge['partialpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_demand_charge['partialpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s1_usage_time_demand_charge[NC]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s1_usage_time_demand_charge['NC'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_demand_charge['NC']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s1_fixed_charges" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s1_fixed_charges > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s1_fixed_charges; ?>
<?php else: ?>0<?php endif; ?>"/>
													
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">CPP Incentive</label>
											<div class="col-md-9">
												<div class="input-group">
													
													<input name="s1_CPP_incentive" type="text" class="form-control"  value="<?php if ($this->_tpl_vars['clsRateSchedule']->s1_CPP_incentive != ''): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s1_CPP_incentive; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s2_usage_time_energy_charge[onpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s2_usage_time_energy_charge['onpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_energy_charge['onpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s2_usage_time_energy_charge[offpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s2_usage_time_energy_charge['offpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_energy_charge['offpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s2_usage_time_energy_charge[midpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s2_usage_time_energy_charge['midpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_energy_charge['midpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s2_usage_time_energy_charge[criticalpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s2_usage_time_energy_charge['criticalpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_energy_charge['criticalpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s2_usage_time_energy_charge[superoffpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s2_usage_time_energy_charge['superoffpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_energy_charge['superoffpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s2_usage_time_energy_charge[partialpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s2_usage_time_energy_charge['partialpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_energy_charge['partialpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s2_usage_time_demand_charge[onpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s2_usage_time_demand_charge['onpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_demand_charge['onpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s2_usage_time_demand_charge[offpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s2_usage_time_demand_charge['offpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_demand_charge['offpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s2_usage_time_demand_charge[midpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s2_usage_time_demand_charge['midpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_demand_charge['midpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s2_usage_time_demand_charge[criticalpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s2_usage_time_demand_charge['criticalpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_demand_charge['criticalpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s2_usage_time_demand_charge[superoffpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s2_usage_time_demand_charge['superoffpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_demand_charge['superoffpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s2_usage_time_demand_charge[partialpeak]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s2_usage_time_demand_charge['partialpeak'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_demand_charge['partialpeak']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s2_usage_time_demand_charge[NC]" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s2_usage_time_demand_charge['NC'] > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_demand_charge['NC']; ?>
<?php else: ?>0<?php endif; ?>"/>
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
													<input name="s2_fixed_charges" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s2_fixed_charges > 0): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s2_fixed_charges; ?>
<?php else: ?>0<?php endif; ?>"/>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label col-md-3">CPP Incentive</label>
											<div class="col-md-9">
												<div class="input-group">
													
													<input name="s2_CPP_incentive" type="text" class="form-control" value="<?php if ($this->_tpl_vars['clsRateSchedule']->s2_CPP_incentive != ''): ?><?php echo $this->_tpl_vars['clsRateSchedule']->s2_CPP_incentive; ?>
<?php else: ?>0<?php endif; ?>"/>
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
											<?php if ($_GET['rsid'] != ''): ?>Update<?php else: ?>Save<?php endif; ?>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'middle/page_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</html>
<script type="text/javascript">
<?php echo ''; ?>

</script>