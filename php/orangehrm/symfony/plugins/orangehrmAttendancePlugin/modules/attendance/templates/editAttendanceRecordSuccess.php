<?php echo stylesheet_tag('../orangehrmAttendancePlugin/css/editAttendanceRecordSuccess'); ?>
<?php echo javascript_include_tag('editAttendanceRecordSuccess'); ?>

<link href="<?php echo public_path('../../themes/orange/css/ui-lightness/jquery-ui-1.7.2.custom.css') ?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo public_path('../../scripts/jquery/ui/ui.core.js') ?>"></script>
<script type="text/javascript" src="<?php echo public_path('../../scripts/jquery/ui/ui.datepicker.js') ?>"></script>
<?php echo stylesheet_tag('orangehrm.datepicker.css') ?>
<?php echo javascript_include_tag('orangehrm.datepicker.js') ?>

<script type="text/javascript" src="<?php echo public_path('../../scripts/jquery/ui/ui.core.js')?>"></script>
<script type="text/javascript" src="<?php echo public_path('../../scripts/jquery/ui/ui.datepicker.js')?>"></script>
<script type="text/javascript" src="<?php echo public_path('../../scripts/jquery/ui/ui.draggable.js')?>"></script>
<script type="text/javascript" src="<?php echo public_path('../../scripts/jquery/ui/ui.resizable.js')?>"></script>
<script type="text/javascript" src="<?php echo public_path('../../scripts/jquery/ui/ui.dialog.js')?>"></script>
<script type="text/javascript" src="<?php echo public_path('../../scripts/jquery/jquery.autocomplete.js')?>"></script>

<div class="outerbox">
    <div class="maincontent">
        <form action="" id="employeeRecordsForm" method="post">
            <table  border="0" cellpadding="5" cellspacing="0" class="employeeTable">
                <thead id="tableHead">
                    <tr>
                        <td style="width: 900px;"><?php echo __("Punch In"); ?></td>
                        <td><?php echo __("Punch In Note"); ?></td>
                        <td style="width: 900px;"><?php echo __("Punch Out"); ?></td>
                        <td><?php echo __("Punch Out Note"); ?></td>
                        <td style="width: 100px;"><?php echo __("Duration(Hours)"); ?></td>
                    </tr></thead> 
                <?php $i = 1; ?>
                <?php echo $editAttendanceForm['_csrf_token']; ?>

                <?php foreach ($records as $record): ?>

                    <tr> <?php if ($editPunchIn[$i]): ?>
                            <td> <?php echo $editAttendanceForm['punchInDate_' . $i]->render((array("class" => "inDate"))); ?> &nbsp;<?php echo $editAttendanceForm['punchInTime_' . $i]->render(array("class" => "time")); ?></td>
                            <td><table cellspacing="0" cellpadding="0" border="0">
                                    <tr>
                                        <?php
                                        $comments = trim($record->getPunchInNote());
                                        if (strlen($comments) > 25) {
                                            $comments = substr($comments, 0, 25) . "...";
                                        }
                                        ?>
                                         <input type="hidden" id="<?php echo "attendanceNote_1_3"."_".$record->getId();?>" value="<?php echo $record->getPunchInNote();?>">
                                        <td id="commentLabel" align="left" width="200"><?php echo htmlspecialchars($comments); ?></td>
                                        <td class="dialogInvoker" id="pen_request"><?php echo image_tag('callout.png', 'id=' . $record->getId()."_1" . "_3"." class=icon") ?></td>
                                    </tr>
                                </table>
                            </td>

                        <?php else: ?>
                            <td> <?php echo $editAttendanceForm['punchInDate_' . $i]->render((array("class" => "nonEditable", "id" => "non"))); ?> &nbsp;<?php echo $editAttendanceForm['punchInTime_' . $i]->render(array("class" => "nonEditable")); ?></td>
                            <td><table cellspacing="0" cellpadding="0" border="0">
                                    <tr>
                                        <?php
                                        $comments = trim($record->getPunchInNote());
                                        if (strlen($comments) > 25) {
                                            $comments = substr($comments, 0, 25) . "...";
                                        }
                                        ?>
                                         <input type="hidden" id="<?php echo "attendanceNote_2_3"."_".$record->getId();?>" value="<?php echo $record->getPunchInNote();?>">
                                        <td id="commentLabel" align="left" width="200"><?php echo htmlspecialchars($comments); ?></td>
                                        <td class="dialogInvoker" id="pen_request"><?php echo image_tag('callout.png', 'id=' . $record->getId()."_2" ."_3". " class=icon") ?></td>
                                    </tr>
                                </table></td>
                        <?php endif; ?>
                        <?php if ($editPunchOut[$i]): ?>
                            <td><?php echo $editAttendanceForm['punchOutDate_' . $i]->render(array("class" => "outDate")); ?>&nbsp;<?php echo $editAttendanceForm['punchOutTime_' . $i]->render(array("class" => "time")); ?></td>
                            <td><table cellspacing="0" cellpadding="0" border="0">
                                    <tr>
                                        <?php
                                        $comments = trim($record->getPunchOutNote());
                                        if (strlen($comments) > 25) {
                                            $comments = substr($comments, 0, 25) . "...";
                                        }
                                        ?>
                                        <input type="hidden" id="<?php echo "attendanceNote_1_4"."_".$record->getId();?>" value="<?php echo $record->getPunchOutNote();?>">
                                        <td id="commentLabel" align="left" width="200"><?php echo htmlspecialchars($comments); ?></td>
                                        <td class="dialogInvoker" id="pen_request"><?php echo image_tag('callout.png', 'id=' . $record->getId()."_1" ."_4". " class=icon") ?></td>
                                    </tr>
                                </table></td>

                        <?php else: ?>
                            <td><?php echo $editAttendanceForm['punchOutDate_' . $i]->render(array("class" => "nonEditable")); ?>&nbsp;<?php echo $editAttendanceForm['punchOutTime_' . $i]->render(array("class" => "nonEditable")); ?></td>
                            <td><table cellspacing="0" cellpadding="0" border="0">
                                    <tr>
                                        <?php
                                        $comments = trim($record->getPunchOutNote());
                                        if (strlen($comments) > 25) {
                                            $comments = substr($comments, 0, 25) . "...";
                                        }
                                        ?> <input type="hidden" id="<?php echo "attendanceNote_2_4"."_".$record->getId();?>" value="<?php echo $record->getPunchOutNote();?>">
                                        <td id="commentLabel" align="left" width="200"><?php echo htmlspecialchars($comments); ?></td>
                                        <td class="dialogInvoker" id="pen_request"><?php echo image_tag('callout.png', 'id=' . $record->getId()."_2" ."_4"." class=icon") ?></td>
                                    </tr>
                                </table></td>

                        <?php endif; ?>
                        <?php if ($record->getPunchOutUtcTime() == null): ?>
                            <td><?php echo "0"; ?></td>
                        <?php else: ?>
                            <td><?php echo round((strtotime($record->getPunchOutUtcTime()) - strtotime($record->getPunchInUtcTime())) / 3600, 2); ?></td>
                            <?php echo $editAttendanceForm->renderHiddenFields(); ?>
                        <?php endif; ?>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </table>

            <div class="formbuttons">

                &nbsp;&nbsp;&nbsp; <input type="button" class="save" name="button" id="btnEdit"
                                          onmouseover="moverButton(this);" onmouseout="moutButton(this); "
                                          value="<?php echo __('Save'); ?>" />
                <input type="button" class="cancel" name="button" id="btnCancel"
                       onmouseover="moverButton(this);" onmouseout="moutButton(this); "
                       value="<?php echo __('Cancel'); ?>" />

            </div>
        </form>
    </div>


</div>

<!-- comment dialog -->

<div id="commentDialog" title="<?php echo __('Punch in/out note'); ?>">
    <form action="updateComment" method="post" id="frmCommentSave">
    
        <textarea name="punchInOutNote" id="punchInOutNote" cols="40" rows="10" class="commentTextArea"></textarea>
        <br class="clear" />
        <div class="error" id="noteError"></div>
        <div><input type="button" id="commentSave" class="plainbtn" value="<?php echo __('Save'); ?>" />
            <input type="button" id="commentCancel" class="plainbtn" value="<?php echo __('Cancel'); ?>" /></div>
    </form>
</div>


<script type="text/javascript">
    var dateFormat        = '<?php echo $sf_user->getDateFormat(); ?>';
    var jsDateFormat = '<?php echo get_js_date_format($sf_user->getDateFormat()); ?>';
    var dateDisplayFormat = dateFormat.toUpperCase();
    var employeeId='<?php echo $employeeId; ?>';
    var date='<?php echo $date; ?>';
    var linkToView='<?php echo url_for('attendance/viewAttendanceRecord'); ?>'
    var linkToEdit='<?php echo url_for('attendance/editAttendanceRecord'); ?>'
     
</script>