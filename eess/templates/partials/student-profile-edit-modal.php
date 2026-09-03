<?php if (!defined('ABSPATH')) exit; ?>
<!-- REUSABLE UNIFIED 4-STEP STUDENT PROFILE EDIT MODAL -->
<div id="edit-student-modal" class="sm-modal-overlay" style="display: none; z-index: 999999;">
    <div class="sm-modal-content" style="max-width: 820px; width: 95%; border-radius: 20px; padding: 30px; background: #ffffff; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); font-family: 'Cairo', sans-serif;">
        <div class="sm-modal-header" style="border-bottom: 1px solid #e2e8f0; padding-bottom: 16px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center;">
            <h3 style="margin: 0; font-size: 18px; font-weight: 800; color: #0f172a; display: flex; align-items: center; gap: 10px;">
                <span class="dashicons dashicons-admin-users" style="color: #881337; font-size: 22px; width: 22px; height: 22px;"></span>
                تعديل الملف المعلوماتي الأكاديمي للطالب
            </h3>
            <button type="button" class="sm-modal-close" onclick="closeUnifiedEditStudentModal()" style="background: none; border: none; font-size: 26px; color: #94a3b8; cursor: pointer;">&times;</button>
        </div>

        <!-- Wizard Step Progress Indicator (4 Steps) -->
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 28px; position: relative;">
            <div style="position: absolute; top: 50%; left: 10%; right: 10%; height: 2px; background: #e2e8f0; z-index: 1;"></div>

            <!-- Step 1 Node: Identity -->
            <div id="eess-wiz-node-1" onclick="goUnifiedEditStep(1)" style="position: relative; z-index: 2; width: 38px; height: 38px; border-radius: 50%; background: #881337; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 14px; cursor: pointer; border: 2px solid #881337; transition: all 0.25s;">
                1
            </div>

            <!-- Step 2 Node: Academic Placement -->
            <div id="eess-wiz-node-2" onclick="goUnifiedEditStep(2)" style="position: relative; z-index: 2; width: 38px; height: 38px; border-radius: 50%; background: #fff; color: #64748b; border: 2px solid #cbd5e1; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 14px; cursor: pointer; transition: all 0.25s;">
                2
            </div>

            <!-- Step 3 Node: Parent & Contact -->
            <div id="eess-wiz-node-3" onclick="goUnifiedEditStep(3)" style="position: relative; z-index: 2; width: 38px; height: 38px; border-radius: 50%; background: #fff; color: #64748b; border: 2px solid #cbd5e1; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 14px; cursor: pointer; transition: all 0.25s;">
                3
            </div>

            <!-- Step 4 Node: Review & Confirm -->
            <div id="eess-wiz-node-4" onclick="goUnifiedEditStep(4)" style="position: relative; z-index: 2; width: 38px; height: 38px; border-radius: 50%; background: #fff; color: #64748b; border: 2px solid #cbd5e1; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 14px; cursor: pointer; transition: all 0.25s;">
                4
            </div>
        </div>

        <form id="edit-student-form">
            <?php wp_nonce_field('sm_add_student', 'sm_nonce'); ?>
            <input type="hidden" name="student_id" id="edit_stu_id">

            <!-- STEP 1: Student Identity & Photo -->
            <div id="eess-wiz-step-1" class="eess-wiz-panel" style="display: block;">
                <div style="background: #f8fafc; padding: 22px; border-radius: 16px; border: 1px solid #e2e8f0; margin-bottom: 24px;">
                    <div style="border-bottom: 1px solid #e2e8f0; padding-bottom: 10px; margin-bottom: 18px; color: #881337; font-weight: 800; font-size: 14px; display: flex; align-items: center; gap: 8px;">
                        <span>الخطوة 1: هويّة الطالب والبيانات الشّخصيّة</span>
                    </div>

                    <!-- Photo Upload Section -->
                    <div style="display: flex; gap: 20px; align-items: center; margin-bottom: 20px; padding: 18px; background: #ffffff; border-radius: 14px; border: 1px dashed #cbd5e1;">
                        <div id="edit_stu_photo_preview_box" style="width: 85px; height: 85px; border-radius: 12px; overflow: hidden; background: #f1f5f9; display: flex; align-items: center; justify-content: center; border: 2px solid #cbd5e1; flex-shrink: 0; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                            <svg id="edit_stu_default_icon" width="40" height="40" fill="#94a3b8" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                            <img id="edit_stu_photo_img" src="" style="width: 100%; height: 100%; object-fit: cover; display: none;" />
                        </div>

                        <div>
                            <div style="display: flex; gap: 10px; align-items: center; margin-bottom: 8px;">
                                <label for="edit_stu_photo_file" class="sm-btn" style="background: #881337; color: #ffffff; height: 34px; padding: 0 16px; font-size: 12px; border-radius: 8px; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                                    <span class="dashicons dashicons-upload" style="font-size: 14px;"></span>
                                    رفع / تغيير الصورة
                                </label>
                                <input type="file" id="edit_stu_photo_file" accept="image/*" style="display: none;" onchange="handleStudentPhotoSelected(this)">
                            </div>
                            <p style="margin: 0; font-size: 11.5px; color: #64748b; font-weight: 600;">
                                يوصى باختيار صورة مربّعة بخلفيّة بيضاء رسميّة (JPG أو PNG).
                            </p>
                        </div>
                    </div>

                    <!-- Fields Grid -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div class="sm-form-group">
                            <label class="sm-label" style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 5px; display: block;">الاسم الكامل للطالب: <span style="color: #dc2626;">*</span></label>
                            <input type="text" name="name" id="edit_stu_name" class="sm-input" required placeholder="مثال: محمد أحمد العلي" style="height: 40px; border-radius: 8px; border: 1px solid #cbd5e1; padding: 0 12px; font-size: 13px; width: 100%;">
                        </div>

                        <div class="sm-form-group">
                            <label class="sm-label" style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 5px; display: block;">الرقم التسلسلي / الأكاديمي: <span style="color: #dc2626;">*</span></label>
                            <input type="text" name="student_code" id="edit_stu_code" class="sm-input" required style="height: 40px; border-radius: 8px; border: 1px solid #cbd5e1; padding: 0 12px; font-size: 13px; width: 100%; background: #f8fafc; font-weight: 800; color: #881337;">
                        </div>

                        <div class="sm-form-group">
                            <label class="sm-label" style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 5px; display: block;">رقم الهوية الوطنية / الإقامة:</label>
                            <input type="text" name="national_id" id="edit_stu_national_id" class="sm-input" placeholder="10xxxxxxxx / 20xxxxxxxx" style="height: 40px; border-radius: 8px; border: 1px solid #cbd5e1; padding: 0 12px; font-size: 13px; width: 100%;">
                        </div>

                        <div class="sm-form-group">
                            <label class="sm-label" style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 5px; display: block;">الجنسية:</label>
                            <input type="text" name="nationality" id="edit_stu_nationality" class="sm-input" placeholder="سعودي" style="height: 40px; border-radius: 8px; border: 1px solid #cbd5e1; padding: 0 12px; font-size: 13px; width: 100%;">
                        </div>

                        <div class="sm-form-group">
                            <label class="sm-label" style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 5px; display: block;">تاريخ الميلاد:</label>
                            <input type="date" name="dob" id="edit_stu_dob" class="sm-input" style="height: 40px; border-radius: 8px; border: 1px solid #cbd5e1; padding: 0 12px; font-size: 13px; width: 100%;">
                        </div>

                        <div class="sm-form-group">
                            <label class="sm-label" style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 5px; display: block;">تاريخ التسجيل بالمنظومة:</label>
                            <input type="date" name="registration_date" id="edit_stu_reg_date" class="sm-input" style="height: 40px; border-radius: 8px; border: 1px solid #cbd5e1; padding: 0 12px; font-size: 13px; width: 100%;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 2: Academic Placement & Centralized Organizational Scope -->
            <div id="eess-wiz-step-2" class="eess-wiz-panel" style="display: none;">
                <div style="background: #f8fafc; padding: 22px; border-radius: 16px; border: 1px solid #e2e8f0; margin-bottom: 24px;">
                    <div style="border-bottom: 1px solid #e2e8f0; padding-bottom: 10px; margin-bottom: 18px; color: #881337; font-weight: 800; font-size: 14px; display: flex; align-items: center; gap: 8px;">
                        <span>الخطوة 2: التنسيق الأكاديمي والتبعية للمؤسسة والمدارس</span>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <!-- Central Organizational Structure Dynamic Dropdowns -->
                        <div class="sm-form-group">
                            <label class="sm-label" style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 5px; display: block;">المؤسسة التعليمية التابعة:</label>
                            <select name="institution_id" id="edit_stu_inst_id" class="sm-select" style="height: 40px; border-radius: 8px; border: 1px solid #cbd5e1; padding: 0 12px; font-size: 13px; width: 100%;">
                                <option value="">-- اختر المؤسسة المركزية --</option>
                                <?php
                                $insts = EESS_Org_Helper::get_all_institutions();
                                foreach ($insts as $inst): ?>
                                    <option value="<?php echo $inst->id; ?>"><?php echo esc_html($inst->name); ?> (<?php echo esc_html($inst->code); ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="sm-form-group">
                            <label class="sm-label" style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 5px; display: block;">المدرسة التابعة: <span style="color: #dc2626;">*</span></label>
                            <select name="school_id" id="edit_stu_school_id" class="sm-select" required style="height: 40px; border-radius: 8px; border: 1px solid #cbd5e1; padding: 0 12px; font-size: 13px; width: 100%;">
                                <option value="">-- اختر المدرسة التابعة --</option>
                                <?php
                                $schools = EESS_Org_Helper::get_all_schools();
                                foreach ($schools as $sch): ?>
                                    <option value="<?php echo $sch->id; ?>"><?php echo esc_html($sch->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="sm-form-group">
                            <label class="sm-label" style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 5px; display: block;">الصف الدراسي: <span style="color: #dc2626;">*</span></label>
                            <input type="text" name="class" id="edit_stu_class" class="sm-input" required placeholder="مثال: الصف التاسع" style="height: 40px; border-radius: 8px; border: 1px solid #cbd5e1; padding: 0 12px; font-size: 13px; width: 100%;">
                        </div>

                        <div class="sm-form-group">
                            <label class="sm-label" style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 5px; display: block;">الشعبة الدراسية: <span style="color: #dc2626;">*</span></label>
                            <input type="text" name="section" id="edit_stu_section" class="sm-input" required placeholder="مثال: أ أو 1" style="height: 40px; border-radius: 8px; border: 1px solid #cbd5e1; padding: 0 12px; font-size: 13px; width: 100%;">
                        </div>

                        <div class="sm-form-group" style="grid-column: span 2;">
                            <label class="sm-label" style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 5px; display: block;">المعلم المربّي / المشرف الأكاديمي:</label>
                            <select name="teacher_id" id="edit_stu_teacher_id" class="sm-select" style="height: 40px; border-radius: 8px; border: 1px solid #cbd5e1; padding: 0 12px; font-size: 13px; width: 100%;">
                                <option value="">-- اختر المعلم --</option>
                                <?php foreach (get_users(array('role' => 'sm_teacher')) as $t): ?>
                                    <option value="<?php echo $t->ID; ?>"><?php echo esc_html($t->display_name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 3: Parent & Contact Information -->
            <div id="eess-wiz-step-3" class="eess-wiz-panel" style="display: none;">
                <div style="background: #f8fafc; padding: 22px; border-radius: 16px; border: 1px solid #e2e8f0; margin-bottom: 24px;">
                    <div style="border-bottom: 1px solid #e2e8f0; padding-bottom: 10px; margin-bottom: 18px; color: #881337; font-weight: 800; font-size: 14px; display: flex; align-items: center; gap: 8px;">
                        <span>الخطوة 3: معلومات ولي الأمر ووسائل التواصل المباشرة</span>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div class="sm-form-group">
                            <label class="sm-label" style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 5px; display: block;">بريد ولي الأمر الإلكتروني:</label>
                            <input type="email" name="parent_email" id="edit_stu_email" class="sm-input" placeholder="parent@example.com" style="height: 40px; border-radius: 8px; border: 1px solid #cbd5e1; padding: 0 12px; font-size: 13px; width: 100%;">
                        </div>

                        <div class="sm-form-group">
                            <label class="sm-label" style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 5px; display: block;">رقم هاتف ولي الأمر (واتساب):</label>
                            <input type="text" name="guardian_phone" id="edit_stu_phone" class="sm-input" placeholder="0501234567" style="height: 40px; border-radius: 8px; border: 1px solid #cbd5e1; padding: 0 12px; font-size: 13px; width: 100%;">
                        </div>

                        <div class="sm-form-group" style="grid-column: span 2;">
                            <label class="sm-label" style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 5px; display: block;">حساب ولي الأمر المرتبط:</label>
                            <select name="parent_user_id" id="edit_stu_parent_user" class="sm-select" style="height: 40px; border-radius: 8px; border: 1px solid #cbd5e1; padding: 0 12px; font-size: 13px; width: 100%;">
                                <option value="">-- بلا ربط حلياً --</option>
                                <?php foreach (get_users(array('role' => 'sm_parent')) as $p): ?>
                                    <option value="<?php echo $p->ID; ?>"><?php echo esc_html($p->display_name); ?> (<?php echo esc_html($p->user_email); ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 4: Review & Final Confirmation -->
            <div id="eess-wiz-step-4" class="eess-wiz-panel" style="display: none;">
                <div style="background: #f8fafc; padding: 22px; border-radius: 16px; border: 1px solid #e2e8f0; margin-bottom: 24px;">
                    <div style="border-bottom: 1px solid #e2e8f0; padding-bottom: 10px; margin-bottom: 18px; color: #881337; font-weight: 800; font-size: 14px; display: flex; align-items: center; gap: 8px;">
                        <span>الخطوة 4: مراجعة البيانات واعتماد التعديلات</span>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; font-size: 13px; color: #334155; background: #ffffff; padding: 18px; border-radius: 12px; border: 1px solid #cbd5e1;">
                        <div><strong>اسم الطالب:</strong> <span id="rev_stu_name" style="font-weight: 800; color: #0f172a;">-</span></div>
                        <div><strong>الرقم الأكاديمي:</strong> <span id="rev_stu_code" style="font-weight: 800; color: #881337;">-</span></div>
                        <div><strong>الصف والشعبة:</strong> <span id="rev_stu_class" style="font-weight: 700;">-</span></div>
                        <div><strong>المدرسة:</strong> <span id="rev_stu_school" style="font-weight: 700;">-</span></div>
                        <div><strong>هاتف ولي الأمر:</strong> <span id="rev_stu_phone" style="font-weight: 700;">-</span></div>
                        <div><strong>البريد الإلكتروني:</strong> <span id="rev_stu_email" style="font-weight: 700;">-</span></div>
                    </div>
                </div>
            </div>

            <!-- Wizard Navigation Actions Footer -->
            <div style="display: flex; gap: 12px; justify-content: flex-end; align-items: center; border-top: 1px solid #e2e8f0; padding-top: 18px;">
                <button type="button" onclick="closeUnifiedEditStudentModal()" class="sm-btn" style="background: #f1f5f9; color: #64748b; height: 40px; padding: 0 18px; border-radius: 8px; font-weight: 700; border: 1px solid #cbd5e1; cursor: pointer;">إلغاء</button>
                <button type="button" id="eess-wiz-prev-btn" onclick="goUnifiedEditStep(currentUnifiedStep - 1)" class="sm-btn" style="background: #e2e8f0; color: #334155; height: 40px; padding: 0 20px; border-radius: 8px; font-weight: 700; border: none; display: none; cursor: pointer;">السابق</button>
                <button type="button" id="eess-wiz-next-btn" onclick="goUnifiedEditStep(currentUnifiedStep + 1)" class="sm-btn" style="background: #0f172a; color: #ffffff; height: 40px; padding: 0 24px; border-radius: 8px; font-weight: 800; border: none; cursor: pointer;">التالي</button>
                <button type="submit" id="eess-wiz-submit-btn" class="sm-btn" style="background: #881337; color: #ffffff; height: 40px; padding: 0 26px; border-radius: 8px; font-weight: 800; border: none; display: none; cursor: pointer; box-shadow: 0 4px 12px rgba(136,19,55,0.25);">حفظ التعديلات المعتمدة</button>
            </div>
        </form>
    </div>
</div>

<script>
let currentUnifiedStep = 1;

function goUnifiedEditStep(step) {
    if (step < 1) step = 1;
    if (step > 4) step = 4;
    currentUnifiedStep = step;

    document.querySelectorAll('.eess-wiz-panel').forEach(p => p.style.display = 'none');
    document.getElementById('eess-wiz-step-' + step).style.display = 'block';

    for (let i = 1; i <= 4; i++) {
        const node = document.getElementById('eess-wiz-node-' + i);
        if (node) {
            if (i === step) {
                node.style.background = '#881337';
                node.style.color = '#ffffff';
                node.style.borderColor = '#881337';
            } else if (i < step) {
                node.style.background = '#16a34a';
                node.style.color = '#ffffff';
                node.style.borderColor = '#16a34a';
            } else {
                node.style.background = '#ffffff';
                node.style.color = '#64748b';
                node.style.borderColor = '#cbd5e1';
            }
        }
    }

    if (step === 4) {
        document.getElementById('rev_stu_name').textContent = document.getElementById('edit_stu_name').value || '-';
        document.getElementById('rev_stu_code').textContent = document.getElementById('edit_stu_code').value || '-';
        document.getElementById('rev_stu_class').textContent = (document.getElementById('edit_stu_class').value || '') + ' (' + (document.getElementById('edit_stu_section').value || 'أ') + ')';
        const schSel = document.getElementById('edit_stu_school_id');
        document.getElementById('rev_stu_school').textContent = schSel.options[schSel.selectedIndex] ? schSel.options[schSel.selectedIndex].text : '-';
        document.getElementById('rev_stu_phone').textContent = document.getElementById('edit_stu_phone').value || '-';
        document.getElementById('rev_stu_email').textContent = document.getElementById('edit_stu_email').value || '-';
    }

    document.getElementById('eess-wiz-prev-btn').style.display = (step > 1) ? 'inline-flex' : 'none';
    document.getElementById('eess-wiz-next-btn').style.display = (step < 4) ? 'inline-flex' : 'none';
    document.getElementById('eess-wiz-submit-btn').style.display = (step === 4) ? 'inline-flex' : 'none';
}

function closeUnifiedEditStudentModal() {
    const modal = document.getElementById('edit-student-modal');
    if (modal) modal.style.display = 'none';
}

function handleStudentPhotoSelected(input) {
    if (!input.files || !input.files[0]) return;
    const file = input.files[0];
    const studentId = document.getElementById('edit_stu_id').value;

    if (!studentId) {
        alert('يرجى تحديد الطالب أولاً قبل رفع الصورة');
        return;
    }

    const formData = new FormData();
    formData.append('action', 'sm_update_student_photo');
    formData.append('student_id', studentId);
    formData.append('student_photo', file);
    formData.append('sm_photo_nonce', '<?php echo wp_create_nonce("sm_photo_action"); ?>');

    const previewImg = document.getElementById('edit_stu_photo_img');
    const defaultIcon = document.getElementById('edit_stu_default_icon');

    fetch('<?php echo admin_url('admin-ajax.php'); ?>', { method: 'POST', body: formData })
    .then(r => r.json())
    .then(res => {
        if (res.success && res.data.photo_url) {
            previewImg.src = res.data.photo_url;
            previewImg.style.display = 'block';
            if (defaultIcon) defaultIcon.style.display = 'none';
            if (typeof smShowNotification === 'function') smShowNotification('تم تحديث صورة الطالب بنجاح');
        } else {
            alert('فشل رفع الصورة: ' + (res.data || 'خطأ غير معروف'));
        }
    });
}

(function() {
    window.editSmStudent = function(s) {
        if (!s) return;
        document.getElementById('edit_stu_id').value = s.id || s.student_id || '';
        document.getElementById('edit_stu_name').value = s.name || s.student_name || '';
        document.getElementById('edit_stu_class').value = s.class_name || s.class || '';
        document.getElementById('edit_stu_section').value = s.section || '';
        document.getElementById('edit_stu_email').value = s.parent_email || '';
        document.getElementById('edit_stu_phone').value = s.guardian_phone || '';
        document.getElementById('edit_stu_nationality').value = s.nationality || '';
        document.getElementById('edit_stu_code').value = s.student_code || s.student_id || '';
        if (document.getElementById('edit_stu_national_id')) document.getElementById('edit_stu_national_id').value = s.national_id || '';
        if (document.getElementById('edit_stu_dob')) document.getElementById('edit_stu_dob').value = s.dob || '';
        if (document.getElementById('edit_stu_reg_date')) document.getElementById('edit_stu_reg_date').value = s.registration_date || '';
        if (document.getElementById('edit_stu_parent_user')) document.getElementById('edit_stu_parent_user').value = s.parent_user_id || s.parent_id || '';
        if (document.getElementById('edit_stu_school_id') && s.school_id) document.getElementById('edit_stu_school_id').value = s.school_id;
        if (document.getElementById('edit_stu_inst_id') && s.institution_id) document.getElementById('edit_stu_inst_id').value = s.institution_id;
        if (document.getElementById('edit_stu_teacher_id') && s.teacher_id) document.getElementById('edit_stu_teacher_id').value = s.teacher_id;

        const previewImg = document.getElementById('edit_stu_photo_img');
        const defaultIcon = document.getElementById('edit_stu_default_icon');
        if (s.photo_url) {
            previewImg.src = s.photo_url;
            previewImg.style.display = 'block';
            if (defaultIcon) defaultIcon.style.display = 'none';
        } else {
            previewImg.src = '';
            previewImg.style.display = 'none';
            if (defaultIcon) defaultIcon.style.display = 'block';
        }

        goUnifiedEditStep(1);
        const modal = document.getElementById('edit-student-modal');
        if (modal) modal.style.display = 'flex';
    };

    window.editSmStudentFromStats = window.editSmStudent;

    const editForm = document.getElementById('edit-student-form');
    if (editForm) {
        editForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            formData.append('action', 'sm_update_student_ajax');

            fetch('<?php echo admin_url('admin-ajax.php'); ?>', { method: 'POST', body: formData })
            .then(r => r.json())
            .then(res => {
                if (res.success) {
                    if (typeof smShowNotification === 'function') smShowNotification('تم تحديث بيانات الطالب بنجاح');
                    closeUnifiedEditStudentModal();

                    const filterForm = document.getElementById('violation-filter-form');
                    if (filterForm && typeof fetchViolationsData === 'function') {
                        fetchViolationsData();
                    } else {
                        setTimeout(() => location.reload(), 500);
                    }
                } else {
                    alert('خطأ أثناء التحديث: ' + res.data);
                }
            });
        });
    }
})();
</script>
