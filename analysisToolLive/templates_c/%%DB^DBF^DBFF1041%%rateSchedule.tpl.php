<?php /* Smarty version 2.6.30, created on 2019-01-25 00:40:42
         compiled from middle/rateSchedule.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'middle/rateSchedule.tpl', 127, false),array('modifier', 'is_array', 'middle/rateSchedule.tpl', 157, false),array('modifier', 'in_array', 'middle/rateSchedule.tpl', 157, false),array('modifier', 'count', 'middle/rateSchedule.tpl', 200, false),)), $this); ?>
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
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_date_range)) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_date_range) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_date_range))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
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
													value="onpeak" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_times)) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp='onpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times))): ?>checked="checked"<?php endif; ?><?php endif; ?>> On Peak
												</label>
												 <label class="checkbox-inline"> <input type="checkbox"
													name="s1_usage_times[]" value="offpeak" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_times)) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp='offpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times))): ?>checked="checked"<?php endif; ?><?php endif; ?>> Off Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s1_usage_times[]" value="midpeak" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_times)) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp='midpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times))): ?>checked="checked"<?php endif; ?><?php endif; ?>> Mid Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s1_usage_times[]" value="partialpeak" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_times)) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp='partialpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times))): ?>checked="checked"<?php endif; ?><?php endif; ?>> Partial Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s1_usage_times[]" value="criticalpeak" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_times)) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp='criticalpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times))): ?>checked="checked"<?php endif; ?><?php endif; ?>>
													Critical Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s1_usage_times[]" value="superoffpeak" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s1_usage_times)) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp='superoffpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s1_usage_times))): ?>checked="checked"<?php endif; ?><?php endif; ?>> Super
													Off Peak
												</label>

											</div>

											<span class="help-block"> Provide usage time periods </span>
										</div>
										</div>
									</div>
									<h4 class="block">Week Day Time Range Information</h4>
									<div class="row">
										<div class="col-md-6" name="s1_usagetime_onpeak" style="display:none">
											<label class="control-label col-md-3">On Peak Time Range</label>
												<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['onpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['onpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[onpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['onpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[onpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['onpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s1_usage_time_range_weekdays" data-tp="onpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[onpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[onpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s1_usage_time_range_weekdays" data-tp="onpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
										</div>
										<div class="col-md-6" name="s1_usagetime_offpeak" style="display:none">
											<label class="control-label col-md-3">Off Peak
											Time Range</label>
												<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['offpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['offpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[offpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['offpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[offpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['offpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s1_usage_time_range_weekdays" data-tp="offpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[offpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[offpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s1_usage_time_range_weekdays" data-tp="offpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<br/>
									
									<div class="row">
										<div class="col-md-6" name="s1_usagetime_midpeak" style="display:none">
											<label class="control-label col-md-3">Mid Peak
											Time Range</label>
												
												<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['midpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['midpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[midpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['midpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[midpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['midpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s1_usage_time_range_weekdays" data-tp="midpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[midpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[midpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s1_usage_time_range_weekdays" data-tp="midpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
											</div>
										<div class="col-md-6" name="s1_usagetime_partialpeak" style="display:none">
											<label class="control-label col-md-3">Partial Peak
											Time Range</label>
												
												<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['partialpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['partialpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[partialpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['partialpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[partialpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['partialpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s1_usage_time_range_weekdays" data-tp="partialpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[partialpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[partialpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s1_usage_time_range_weekdays" data-tp="partialpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
											</div>
										</div>
									<br/>
									<div class="row">
										<div class="col-md-6" name="s1_usagetime_criticalpeak" style="display:none">
											<label class="control-label col-md-3">Critical Peak
											Time Range</label>
											<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['criticalpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['criticalpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[criticalpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['criticalpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[criticalpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['criticalpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s1_usage_time_range_weekdays" data-tp="criticalpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[criticalpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[criticalpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s1_usage_time_range_weekdays" data-tp="criticalpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
										</div>
										<div class="col-md-6" name="s1_usagetime_superoffpeak" style="display:none">
											<label class="control-label col-md-3">Super Off Peak
											Time Range</label>
											<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['superoffpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['superoffpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[superoffpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['superoffpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[superoffpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekdays['superoffpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s1_usage_time_range_weekdays" data-tp="superoffpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[superoffpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekdays[superoffpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s1_usage_time_range_weekdays" data-tp="superoffpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
						

									<h4 class="block">Weekend Time Range Information</h4>
									<div class="row">
										<div class="col-md-6" name="s1_usagetime_onpeak" style="display:none">
											<label class="control-label col-md-3">On Peak
											Time Range</label>
											
											
											
											
											<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['onpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['onpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[onpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['onpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[onpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['onpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s1_usage_time_range_weekend" data-tp="onpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[onpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[onpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s1_usage_time_range_weekend" data-tp="onpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
											
										</div>
										<div class="col-md-6" name="s1_usagetime_offpeak" style="display:none">
											<label class="control-label col-md-3">Off Peak
											Time Range</label>
											
											
											<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['offpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['offpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[offpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['offpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[offpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['offpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s1_usage_time_range_weekend" data-tp="offpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[offpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[offpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s1_usage_time_range_weekend" data-tp="offpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
											
										</div>
									</div>
									<br/>
									
									<div class="row">
										<div class="col-md-6" name="s1_usagetime_midpeak" style="display:none">
											<label class="control-label col-md-3">Mid Peak
											Time Range</label>
											<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['midpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['midpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[midpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['midpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[midpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['midpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s1_usage_time_range_weekend" data-tp="midpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[midpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[midpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s1_usage_time_range_weekend" data-tp="midpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
										</div>
										<div class="col-md-6" name="s1_usagetime_partialpeak" style="display:none">
											<label class="control-label col-md-3">Partial Peak
											Time Range</label>
											<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['partialpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['partialpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[partialpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['partialpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[partialpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['partialpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s1_usage_time_range_weekend" data-tp="partialpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[partialpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[partialpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s1_usage_time_range_weekend" data-tp="partialpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-md-6" name="s1_usagetime_criticalpeak" style="display:none">
											<label class="control-label col-md-3" >Critical Peak
											Time Range</label>
												<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['criticalpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['criticalpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[criticalpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['criticalpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[criticalpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['criticalpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s1_usage_time_range_weekend" data-tp="criticalpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[criticalpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[criticalpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s1_usage_time_range_weekend" data-tp="criticalpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
										</div>
										<div class="col-md-6" name="s1_usagetime_superoffpeak" style="display:none">
											<label class="control-label col-md-3">Super Off Peak
											Time Range</label>
											<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['superoffpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['superoffpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[superoffpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['superoffpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[superoffpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s1_usage_time_range_weekend['superoffpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s1_usage_time_range_weekend" data-tp="superoffpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[superoffpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s1_usage_time_range_weekend[superoffpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s1_usage_time_range_weekend" data-tp="superoffpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
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
" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_date_range)) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_date_range) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_date_range))): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
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
													value="onpeak" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_times)) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp='onpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times))): ?>checked="checked"<?php endif; ?><?php endif; ?>> On Peak
												</label>
												 <label class="checkbox-inline"> <input type="checkbox"
													name="s2_usage_times[]" value="offpeak" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_times)) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp='offpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times))): ?>checked="checked"<?php endif; ?><?php endif; ?>> Off Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s2_usage_times[]" value="midpeak" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_times)) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp='midpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times))): ?>checked="checked"<?php endif; ?><?php endif; ?>> Mid Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s2_usage_times[]" value="partialpeak" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_times)) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp='partialpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times))): ?>checked="checked"<?php endif; ?><?php endif; ?>> Partial Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s2_usage_times[]" value="criticalpeak" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_times)) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp='criticalpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times))): ?>checked="checked"<?php endif; ?><?php endif; ?>>
													Critical Peak
												</label> 
												<label class="checkbox-inline"> <input type="checkbox"
													name="s2_usage_times[]" value="superoffpeak" <?php if (((is_array($_tmp=$this->_tpl_vars['clsRateSchedule']->s2_usage_times)) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if (((is_array($_tmp='superoffpeak')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times) : in_array($_tmp, $this->_tpl_vars['clsRateSchedule']->s2_usage_times))): ?>checked="checked"<?php endif; ?><?php endif; ?>> Super
													Off Peak
												</label>

											</div>

											<span class="help-block"> Provide usage time periods </span>
										</div>
										</div>
									</div>
									
									
									<h4 class="block">Week Day Time Range Information</h4>
									
									
									<div class="row">
										<div class="col-md-6" name="s2_usagetime_onpeak" style="display:none">
											<label class="control-label col-md-3">On Peak Time Range</label>
												<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['onpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['onpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[onpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['onpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[onpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['onpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s2_usage_time_range_weekdays" data-tp="onpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[onpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[onpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s2_usage_time_range_weekdays" data-tp="onpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
										</div>
										<div class="col-md-6" name="s2_usagetime_offpeak" style="display:none">
											<label class="control-label col-md-3">Off Peak
											Time Range</label>
												<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['offpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['offpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[offpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['offpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[offpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['offpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s2_usage_time_range_weekdays" data-tp="offpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[offpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[offpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s2_usage_time_range_weekdays" data-tp="offpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<br/>
									
									<div class="row">
										<div class="col-md-6" name="s2_usagetime_midpeak" style="display:none">
											<label class="control-label col-md-3">Mid Peak
											Time Range</label>
												
												<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['midpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['midpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[midpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['midpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[midpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['midpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s2_usage_time_range_weekdays" data-tp="midpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[midpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[midpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s2_usage_time_range_weekdays" data-tp="midpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
											</div>
										<div class="col-md-6" name="s2_usagetime_partialpeak" style="display:none">
											<label class="control-label col-md-3">Partial Peak
											Time Range</label>
												
												<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['partialpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['partialpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[partialpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['partialpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[partialpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['partialpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s2_usage_time_range_weekdays" data-tp="partialpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[partialpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[partialpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s2_usage_time_range_weekdays" data-tp="partialpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
											</div>
										</div>
									<br/>
									<div class="row">
										<div class="col-md-6" name="s2_usagetime_criticalpeak" style="display:none">
											<label class="control-label col-md-3">Critical Peak
											Time Range</label>
											<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['criticalpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['criticalpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[criticalpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['criticalpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[criticalpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['criticalpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s2_usage_time_range_weekdays" data-tp="criticalpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[criticalpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[criticalpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s2_usage_time_range_weekdays" data-tp="criticalpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
										</div>
										<div class="col-md-6" name="s2_usagetime_superoffpeak" style="display:none">
											<label class="control-label col-md-3">Super Off Peak
											Time Range</label>
											<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['superoffpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['superoffpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[superoffpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['superoffpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[superoffpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekdays['superoffpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s2_usage_time_range_weekdays" data-tp="superoffpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[superoffpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekdays[superoffpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s2_usage_time_range_weekdays" data-tp="superoffpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
									
									
									
									<h4 class="block">Weekend Time Range Information</h4>
									<div class="row">
										<div class="col-md-6" name="s2_usagetime_onpeak" style="display:none">
											<label class="control-label col-md-3">On Peak
											Time Range</label>
											<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['onpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['onpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[onpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['onpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[onpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['onpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s2_usage_time_range_weekend" data-tp="onpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[onpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[onpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s2_usage_time_range_weekend" data-tp="onpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
											
										</div>
										<div class="col-md-6" name="s2_usagetime_offpeak" style="display:none">
											<label class="control-label col-md-3">Off Peak
											Time Range</label>
											<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['offpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['offpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[offpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['offpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[offpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['offpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s2_usage_time_range_weekend" data-tp="offpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[offpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[offpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s2_usage_time_range_weekend" data-tp="offpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
											
										</div>
									</div>
									<br/>
									
									<div class="row">
										<div class="col-md-6" name="s2_usagetime_midpeak" style="display:none">
											<label class="control-label col-md-3">Mid Peak
											Time Range</label>
											<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['midpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['midpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[midpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['midpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[midpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['midpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s2_usage_time_range_weekend" data-tp="midpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[midpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[midpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s2_usage_time_range_weekend" data-tp="midpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
										</div>
										<div class="col-md-6" name="s2_usagetime_partialpeak" style="display:none">
											<label class="control-label col-md-3">Partial Peak
											Time Range</label>
											<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['partialpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['partialpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[partialpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['partialpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[partialpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['partialpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s2_usage_time_range_weekend" data-tp="partialpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[partialpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[partialpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s2_usage_time_range_weekend" data-tp="partialpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-md-6" name="s2_usagetime_criticalpeak" style="display:none">
											<label class="control-label col-md-3" >Critical Peak
											Time Range</label>
												<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['criticalpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['criticalpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[criticalpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['criticalpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[criticalpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['criticalpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s2_usage_time_range_weekend" data-tp="criticalpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[criticalpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[criticalpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s2_usage_time_range_weekend" data-tp="criticalpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
											</div>
										</div>
										<div class="col-md-6" name="s2_usagetime_superoffpeak" style="display:none">
											<label class="control-label col-md-3">Super Off Peak
											Time Range</label>
											<div class="col-md-9">
												<?php if (count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['superoffpeak']['from']) > 0): ?>
													<?php $this->assign('fromCnt', count($this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['superoffpeak']['from'])); ?>
													<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fromCnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
														<?php $this->assign('id', $this->_sections['i']['index']); ?>
														<div data-rownum="<?php echo $this->_tpl_vars['id']; ?>
">
                                                            <div class="col-md-5" >
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> 
                                                            		<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[superoffpeak][from][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['superoffpeak']['from'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                            <label class="control-label col-md-1">To</label>
                                                            <div class="col-md-5">
                                                            	<div class="input-icon">
                                                            		<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[superoffpeak][to][]" value="<?php echo $this->_tpl_vars['clsRateSchedule']->s2_usage_time_range_weekend['superoffpeak']['to'][$this->_tpl_vars['id']]; ?>
">
                                                            	</div>
                                                            </div>
                                                        	<div class="col-md-1">
                                                        		<span name="add_<?php echo $this->_tpl_vars['id']; ?>
" data-name="s2_usage_time_range_weekend" data-tp="superoffpeak">+</span>
                                                        		<span name="remove_<?php echo $this->_tpl_vars['id']; ?>
" style="display:none">+</span>
                                                        	</div>
                                                        	<br/><br/>
                                                         </div>
													<?php endfor; endif; ?>
												<?php else: ?>
													<div  data-rownum="0">
														<div class="col-md-5">
    														<div class="input-icon">
    															<i class="fa fa-clock-o"></i> 
    															<input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[superoffpeak][from][]" >
    														</div>
														</div>
														<label class="control-label col-md-1">To</label>
														<div class="col-md-5">
															<div class="input-icon">
																<i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="s2_usage_time_range_weekend[superoffpeak][to][]" >
															</div>
														</div>
														<div class="col-md-1">
    														<span name="add_0" data-name="s2_usage_time_range_weekend" data-tp="superoffpeak">+</span>
    														<span name="remove_0" style="display:none">+</span>
    													</div>
														<br/><br/>
													</div>
												<?php endif; ?>
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
<?php echo '

$(document).ready(function(){
	$(\'input[name="s1_usage_times[]"]\').each(function(){
		var tp = $(this).val();
		var usageTimeName = \'s1_usagetime_\'+tp;
		if($(this).is(\':checked\')){
			$(\'div[name="\'+usageTimeName+\'"]\').show();
		}else{
			$(\'div[name="\'+usageTimeName+\'"]\').hide();
		}
	});
	$(\'input[name="s2_usage_times[]"]\').each(function(){
		var tp = $(this).val();
		var usageTimeName = \'s2_usagetime_\'+tp;
		if($(this).is(\':checked\')){
			$(\'div[name="\'+usageTimeName+\'"]\').show();
		}else{
			$(\'div[name="\'+usageTimeName+\'"]\').hide();
		}
	});
})


$(\'input[name="s1_usage_times[]"]\').change(function(){
	var tp = $(this).val();
	var usageTimeName = \'s1_usagetime_\'+tp;
	if($(this).is(\':checked\')){
		$(\'div[name="\'+usageTimeName+\'"]\').show();
	}else{
		$(\'div[name="\'+usageTimeName+\'"]\').hide();
	}
});


$(\'input[name="s2_usage_times[]"]\').change(function(){
	var tp = $(this).val();
	var usageTimeName = \'s2_usagetime_\'+tp;
	if($(this).is(\':checked\')){
		$(\'div[name="\'+usageTimeName+\'"]\').show();
	}else{
		$(\'div[name="\'+usageTimeName+\'"]\').hide();
	}
})

var currentRowNumber = 0;
var nextRowNumber = 0;
var detachRowNum = \'\';
var detachRowElement=\'\';
$(document).on(\'click\',\'[name^=add_]\',function(){
	var currentRowNumber = parseInt($(this).attr(\'name\').split(\'_\')[1]);
	if(nextRowNumber == \'\'){
		nextRowNumber = currentRowNumber+1;
	}else{
		nextRowNumber++;
	}
	var elementName = $(this).data(\'name\');
	var elementTp = $(this).data(\'tp\');
	var elementFullNameFrom = elementName+\'[\'+elementTp+\'][from][]\';
	var elementFullNameTo = elementName+\'[\'+elementTp+\'][to][]\';
	var nextRowIDAdd = \'add_\'+nextRowNumber;
	var nextRowIDRemove = \'remove_\'+nextRowNumber;
	
	if(detachRowElement != ""){
		alert(detachRowElement)
		detachRowElement.appendTo($(this).parent(\'div\').parent(\'div\').parent(\'div\'));
	}else{
		detachRowNum = \'\';
		detachRowElement = \'\';
		//add new row
		var html = \'<div  data-rownum="\'+nextRowNumber+\'"><div class="col-md-5" ><div class="input-icon"><i class="fa fa-clock-o"></i><input type="text" class="form-control timepicker timepicker-24" name="\'+elementFullNameFrom+\'" ></div></div><label class="control-label col-md-1">To</label><div class="col-md-5"><div class="input-icon"><i class="fa fa-clock-o"></i> <input type="text" class="form-control timepicker timepicker-24" name="\'+elementFullNameTo+\'" ></div></div><div class="col-md-1"><span  name="\'+nextRowIDAdd+\'" data-name="s1_usage_time_range_weekdays" data-tp="onpeak">+</span><span  name="\'+nextRowIDRemove+\'">-</span></div><br/><br/></div>\';
		$(this).parent(\'div\').parent(\'div\').parent(\'div\').append(html);
		ComponentsPickers.init();
	}
	//$(this).hide();
	
})
$(document).on(\'click\',\'[name^=remove_]\',function(){
	$(this).parent(\'div\').parent(\'div\').remove();
	 //detachRowNum = parseInt($(this).attr(\'id\').split(\'_\')[1]);
	 //previousRowNumber = detachRowNum - 1;
	 //detachRowElement = $(this).parent(\'div\').parent(\'div\').detach();
	 //$(\'[id^=add_]\').hide();
	 //$(\'#add_\'+previousRowNumber).show();
})
'; ?>

</script>