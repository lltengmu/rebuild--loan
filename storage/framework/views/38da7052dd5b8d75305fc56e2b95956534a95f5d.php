<div class="modal fade bd-example-modal-lg" id="exampleModalLong">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">編輯</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container mt-4">

                    <div class="card">

                        <div class="card-body">
                            <form id="mxForm" class="form-valide">
                                <input type="hidden" setid>
                                <label for="exampleInputEmail1">基本個人資料</label>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="exampleInputEmail1">稱謂</label><span style="color: red">*</span>
                                            <select disabled class="form-control" id="donationtitle">
                                                <option value="0">小姐</option>
                                                <option value="0">女士</option>
                                                <option value="0">先生</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="firs_tname">姓氏</label><span style="color: red">*</span>
                                            <input type="text" readonly id="firstname" name="first_name" class="form-control">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="last_name">名字</label><span style="color: red">*</span>
                                            <input type="text" readonly id="lastname" name="last_name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="mobile">電話號碼</label><span style="color: red">*</span>
                                            <input type="tel" readonly id="mobile" name="mobile" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="email">電郵地址</label><span style="color: red">*</span>
                                            <input type="tel" readonly id="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="nationality">國籍</label><span style="color: red">*</span>
                                            <input type="tel" readonly id="nationality" name="nationality"
                                                class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="date_of_birth">出生日期（日/月/年 輸入）</label><span style="color: red">*</span>
                                            <input type="tel" id="date_of_birth" readonly name="date_of_birth" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <label for="exampleInputEmail1">住宅地址</label><span style="color: red">*</span>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-2">
                                            <label for="unit">單位</label><span style="color: red">*</span>
                                            <input type="tel" readonly id="unit" name="unit" class="form-control">
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="floor">樓層</label><span style="color: red">*</span>
                                            <input type="tel" id="floor" readonly name="floor" class="form-control">
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="mobile4">座數</label><span style="color: red">*</span>
                                            <input type="tel" readonly id="mobile4" name="mobile4" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-2">
                                            <label for="mobile">地址第一行</label><span style="color: red">*</span>
                                            <input type="tel" readonly id="mobile3" name="mobile3" class="form-control">
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="mobile">地址第二行</label><span style="color: red">*</span>
                                            <input type="tel" readonly id="mobile2" name="mobile2" class="form-control">
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="area">地區</label><span style="color: red">*</span>
                                            <select class="form-control" id="area" disabled>
                                                <?php $__currentLoopData = $lbo_district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option id="area-<?php echo e($item->id); ?>" value="<?php echo e($item->id); ?>"><?php echo e($item->label_tc); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-2">
                                            <label for="HKID">身分證明</label><span style="color: red">*</span>
                                            <input type="text" readonly id="HKID" name="HKID" class="form-control" value="" style="background-color:rgba(248,249,254);" readonly>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="service_providers">服務提供商</label><span style="color: red">*</span>
                                            
                                            <select class="form-control" id="company" name="company">
                                                <?php $__currentLoopData = $companys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option id="company-<?php echo e($item->company_id); ?>" value="<?php echo e($item->company_id); ?>"><?php echo e($item->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <label for="exampleInputEmail1">就業資料</label><span style="color: red">*</span>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="job_status">職業</label><span style="color: red">*</span>
                                            <select class="form-control" id="job_status" disabled>
                                                <option id="job_status-0" value="0">職業</option>
                                                <?php $__currentLoopData = $lbo_employment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option id="job_status-<?php echo e($item->id); ?>" value="<?php echo e($item->id); ?>"><?php echo e($item->label_tc); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="mobile">HK$每月收入</label><span style="color: red">*</span>
                                            <input type="tel" readonly id="mobile1" name="mobile1" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="company_name">公司名稱</label><span style="color: red">*</span>
                                            <input type="tel" readonly id="company_name" name="company_name" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="company_contact">公司電話</label><span style="color: red">*</span>
                                            <input type="tel" readonly id="company_contact" name="company_contact" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <label for="company_addres">公司地址</label><span style="color: red">*</span>
                                        <input type="tel" readonly id="company_addres" name="company_addres" class="form-control">
                                    </div>
                                </div>

                                <br>
                                <label for="exampleInputEmail1">貸款資料</label>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="loan_amount">欲申請之貸款額</label><span style="color: red">*</span>
                                            <input type="tel" id="loan_amount" changeable name="loan_amount" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="repayment_period">還款期</label><span style="color: red">*</span>
                                            <input type="tel" id="repayment_period" name="repayment_period"
                                                   changeable
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <label for="lbo_loan_purpose">貸款用途</label><span style="color: red">*</span>
                                        <select class="form-control" id="lbo_loan_purpose">
                                            <option changeable id="purpose-0" value="0">請選擇貸款用途</option>
                                            <?php $__currentLoopData = $lbo_loan_purpose; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option changeable id="purpose-<?php echo e($item->id); ?>" value="<?php echo e($item->id); ?>"><?php echo e($item->label_tc); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <label for="case_remark">備注</label><span style="color: red">*</span>
                                        <textarea changeable name="case_remark" class="form-control" rows="4" id="case_remark" readonly></textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="form-row">
                                        <input class="form-check-input" type="checkbox">
                                        <label for="exampleInputEmail1">同意xxxxxx</label>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                    <button id="EditOnclick" type="submit" class="btn btn-primary">保存</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/customer/www/fullygreatasia.admatrix-ai.com/public_html/laravel3/resources/views/common/viewCaseDeatailForm.blade.php ENDPATH**/ ?>