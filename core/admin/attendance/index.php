<?php
/*
 Copyright (c) 2018 [Glacies UG, Berlin, Germany] (http://glacies.de)
 Developer: Thilina Hasantha (http://lk.linkedin.com/in/thilinah | https://github.com/thilinah)
 */

$moduleName = 'attendance_monitor';
define('MODULE_PATH',dirname(__FILE__));
include APP_BASE_PATH.'header.php';
include APP_BASE_PATH.'modulejslibs.inc.php';
$photoAttendance = \Classes\SettingsManager::getInstance()->getSetting('Attendance: Photo Attendance');
?><div class="span9">

	<ul class="nav nav-tabs" id="modTab" style="margin-bottom:0px;margin-left:5px;border-bottom: none;">
		<li class="active"><a id="tabAttendance" href="#tabPageAttendance"><?=t('Monitor Attendance')?></a></li>
        <li class=""><a id="tabAttendanceStatus" href="#tabPageAttendanceStatus"><?=t('Current Clocked In Status')?></a></li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane active" id="tabPageAttendance">
			<div id="Attendance" class="reviewBlock" data-content="List" style="padding-left:5px;">

			</div>
			<div id="AttendanceForm" class="reviewBlock" data-content="Form" style="padding-left:5px;display:none;">

			</div>
		</div>
        <div class="tab-pane" id="tabPageAttendanceStatus">
            <div id="AttendanceStatus" class="reviewBlock" data-content="List" style="padding-left:5px;">

            </div>
            <div id="AttendanceStatusForm" class="reviewBlock" data-content="Form" style="padding-left:5px;display:none;">

            </div>
        </div>

	</div>

</div>
<div class="modal" id="attendancePhotoModel" tabindex="-1" role="dialog" aria-labelledby="messageModelLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><li class="fa fa-times"/></button>
				<h3 style="font-size: 17px;">Attendance Details</h3>
			</div>
			<div class="modal-body">
				<div class="row" style="background: #f3f4f5; padding: 10px;text-align: center;">
					<h4 id="attendnaceCanvasEmp"></h4>
				</div>
				<div class="row" style="background: #f3f4f5; padding: 10px;">
					<div class="col-sm-6" style="text-align: center;">
						<canvas id="attendnaceCanvasIn" height="156" width="208" style="border: 1px #222 dotted;"></canvas>
						<hr/>
						<span id="attendnaceCanvasPunchInTime"></span>
					</div>
					<div class="col-sm-6" style="text-align: center;">
						<canvas id="attendnaceCanvasOut" height="156" width="208" style="border: 1px #222 dotted;"></canvas>
						<hr/>
						<span id="attendnaceCanvasPunchOutTime"></span>
					</div>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
<script>
var modJsList = new Array();
modJsList['tabAttendance'] = new AttendanceAdapter('Attendance','Attendance','','in_time desc');
modJsList['tabAttendance'].setRemoteTable(true);
modJsList['tabAttendance'].setPhotoAttendance(<?=$photoAttendance == '1'?>);
modJsList['tabAttendanceStatus'] = new AttendanceStatusAdapter('AttendanceStatus','AttendanceStatus','','');
modJsList['tabAttendanceStatus'].setShowAddNew(false);
var modJs = modJsList['tabAttendance'];

</script>
<?php include APP_BASE_PATH.'footer.php';?>
