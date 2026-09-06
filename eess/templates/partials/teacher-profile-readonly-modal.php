<?php if (!defined('ABSPATH')) exit; ?>

<!-- READ-ONLY TEACHER PROFILE MODAL -->
<div id="eess-teacher-profile-readonly-modal" class="sm-modal-overlay" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.75); backdrop-filter: blur(5px); z-index: 999999; justify-content: center; align-items: center; padding: 20px; box-sizing: border-box; font-family: 'Cairo', sans-serif; direction: rtl;">
    <div style="background: #ffffff; border-radius: 20px; max-width: 860px; width: 100%; border: 1px solid #cbd5e1; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.3); overflow: hidden; display: flex; flex-direction: column; max-height: 90vh;">

        <!-- Flush Dark Header -->
        <div style="background: #0f172a; color: #ffffff; padding: 18px 24px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #1e293b;">
            <div style="display: flex; align-items: center; gap: 12px;">
                <span class="dashicons dashicons-id" style="font-size: 22px; width: 22px; height: 22px; color: #38bdf8;"></span>
                <div>
                    <h3 style="margin: 0; font-size: 16px; font-weight: 800; color: #ffffff;">الملف الوظيفي والأكاديمي للمعلم (عرض فقط)</h3>
                    <p style="margin: 3px 0 0 0; font-size: 11.5px; color: #94a3b8; font-weight: 600;">استعراض البيانات الشخصية، التكليفات التعليمية، ومخلص إنجازات التحضير والخطط</p>
                </div>
            </div>
            <button type="button" onclick="eessCloseTeacherReadOnlyProfileModal()" style="background: none; border: none; color: #ffffff; font-size: 26px; cursor: pointer; line-height: 1;">&times;</button>
        </div>

        <!-- Modal Body Container -->
        <div id="eess-teacher-profile-body" style="padding: 24px; overflow-y: auto; flex: 1; display: flex; flex-direction: column; gap: 20px;">

            <!-- Loading Indicator -->
            <div id="tp_ro_loading" style="text-align: center; padding: 40px; color: #64748b;">
                <span class="dashicons dashicons-update spin" style="font-size: 32px; width: 32px; height: 32px; margin-bottom: 10px; color: #0284c7;"></span>
                <div style="font-size: 14px; font-weight: 800; color: #0f172a;">جاري تحميل البيانات والملف الأكاديمي للمعلم...</div>
            </div>

            <div id="tp_ro_content" style="display: none; display: flex; flex-direction: column; gap: 20px;">

                <!-- Card 1: Main Header Identity Banner -->
                <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 16px; padding: 20px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;">
                    <div style="display: flex; align-items: center; gap: 16px;">
                        <img id="tp_ro_photo" src="" style="width: 72px; height: 72px; border-radius: 50%; object-fit: cover; border: 2px solid #0284c7; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                        <div>
                            <h2 id="tp_ro_name" style="margin: 0 0 6px 0; font-size: 18px; font-weight: 900; color: #0f172a;">-</h2>
                            <div style="display: flex; align-items: center; gap: 6px; flex-wrap: wrap;">
                                <span id="tp_ro_role" style="padding: 3px 10px; border-radius: 9999px; background: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; font-size: 11px; font-weight: 800;">-</span>
                                <span id="tp_ro_emp_id" style="padding: 3px 10px; border-radius: 9999px; background: #f1f5f9; color: #334155; border: 1px solid #cbd5e1; font-size: 11px; font-weight: 800; font-family: monospace;">-</span>
                                <span id="tp_ro_school" style="padding: 3px 10px; border-radius: 9999px; background: #f0fdf4; color: #166534; border: 1px solid #bbf7d0; font-size: 11px; font-weight: 800;">-</span>
                            </div>
                        </div>
                    </div>

                    <button type="button" onclick="eessPrintTeacherProfilePDF()" class="sm-btn" style="background: #0284c7; color: #ffffff !important; height: 38px; border-radius: 9999px !important; padding: 0 20px; font-weight: 800; font-size: 12.5px; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; box-shadow: 0 4px 12px rgba(2,132,199,0.2);">
                        <span class="dashicons dashicons-printer" style="font-size: 16px; width: 16px; height: 16px;"></span>
                        <span>طباعة التقرير PDF</span>
                    </button>
                </div>

                <!-- Card 2: Professional & Academic Assignments Grid -->
                <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
                    <h4 style="margin: 0 0 14px 0; font-size: 14px; font-weight: 800; color: #881337; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                        <span class="dashicons dashicons-welcome-learn-more" style="color: #881337;"></span>
                        <span>التكليفات الأكاديمية والبيانات الشخصية</span>
                    </h4>

                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; font-size: 12.5px; color: #334155;">
                        <div style="background: #f8fafc; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0;">
                            <span style="color: #64748b; font-size: 11px; display: block; font-weight: 700;">القسم الإداري / المادة:</span>
                            <strong id="tp_ro_dept_subject" style="color: #0f172a; font-size: 13px;">-</strong>
                        </div>
                        <div style="background: #f8fafc; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0;">
                            <span style="color: #64748b; font-size: 11px; display: block; font-weight: 700;">الصفوف المسندة:</span>
                            <strong id="tp_ro_grades" style="color: #0f172a; font-size: 13px;">-</strong>
                        </div>
                        <div style="background: #f8fafc; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0;">
                            <span style="color: #64748b; font-size: 11px; display: block; font-weight: 700;">الشعب الدراسية:</span>
                            <strong id="tp_ro_sections" style="color: #0f172a; font-size: 13px;">-</strong>
                        </div>
                        <div style="background: #f8fafc; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0;">
                            <span style="color: #64748b; font-size: 11px; display: block; font-weight: 700;">رقم الهاتف والبريد:</span>
                            <strong id="tp_ro_contact" style="color: #0f172a; font-size: 13px;">-</strong>
                        </div>
                        <div style="background: #f8fafc; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0;">
                            <span style="color: #64748b; font-size: 11px; display: block; font-weight: 700;">سنة التعيين والقت الإمارة:</span>
                            <strong id="tp_ro_meta_extra" style="color: #0f172a; font-size: 13px;">-</strong>
                        </div>
                        <div style="background: #f8fafc; padding: 10px 14px; border-radius: 10px; border: 1px solid #e2e8f0;">
                            <span style="color: #64748b; font-size: 11px; display: block; font-weight: 700;">الهوية الوطنية / الإقامة:</span>
                            <strong id="tp_ro_civil_id" style="color: #0f172a; font-size: 13px; font-family: monospace;">-</strong>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Termly & Annual Plans Activity Summary -->
                <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px;">
                        <h4 style="margin: 0; font-size: 14px; font-weight: 800; color: #0284c7; display: flex; align-items: center; gap: 8px;">
                            <span class="dashicons dashicons-calendar-alt" style="color: #0284c7;"></span>
                            <span>نشاط وإنجاز الخطط الفصلية والسنوية</span>
                        </h4>
                        <span id="tp_ro_plans_badge" style="font-size: 11px; font-weight: 800; background: #e0f2fe; color: #0369a1; padding: 2px 10px; border-radius: 9999px;">0 خطط مرفوعة</span>
                    </div>

                    <div id="tp_ro_plans_list" style="display: flex; flex-direction: column; gap: 8px;">
                        <!-- Filled dynamically -->
                    </div>
                </div>

                <!-- Card 4: Lesson Preparation Activity Summary -->
                <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px;">
                        <h4 style="margin: 0; font-size: 14px; font-weight: 800; color: #16a34a; display: flex; align-items: center; gap: 8px;">
                            <span class="dashicons dashicons-text-page" style="color: #16a34a;"></span>
                            <span>نشاط وإنجاز تحضير الدروس الأسبوعية</span>
                        </h4>
                        <span id="tp_ro_preps_badge" style="font-size: 11px; font-weight: 800; background: #dcfce7; color: #15803d; padding: 2px 10px; border-radius: 9999px;">0 تحضير دروس</span>
                    </div>

                    <div id="tp_ro_preps_list" style="display: flex; flex-direction: column; gap: 8px;">
                        <!-- Filled dynamically -->
                    </div>
                </div>

            </div>

        </div>

        <!-- Footer -->
        <div style="padding: 16px 24px; background: #f8fafc; border-top: 1px solid #e2e8f0; display: flex; justify-content: flex-end;">
            <button type="button" onclick="eessCloseTeacherReadOnlyProfileModal()" class="sm-btn sm-btn-outline" style="height: 38px; font-size: 12px; font-weight: 700; border-radius: 9999px !important;">إغلاق النافذة</button>
        </div>
    </div>
</div>

<script>
var eessCurrentReadOnlyTeacherId = 0;

window.eessOpenTeacherReadOnlyProfileModal = function(userId) {
    if (!userId) return;
    eessCurrentReadOnlyTeacherId = userId;

    document.getElementById('tp_ro_loading').style.display = 'block';
    document.getElementById('tp_ro_content').style.display = 'none';
    document.getElementById('eess-teacher-profile-readonly-modal').style.display = 'flex';

    var formData = new FormData();
    formData.append('action', 'eess_get_teacher_profile_summary');
    formData.append('user_id', userId);

    fetch((typeof ajaxurl !== 'undefined' ? ajaxurl : '/wp-admin/admin-ajax.php'), { method: 'POST', body: formData })
    .then(r => r.json())
    .then(res => {
        if (res.success && res.data) {
            var data = res.data;
            document.getElementById('tp_ro_photo').src = data.photo_url || '';
            document.getElementById('tp_ro_name').innerText = data.full_name || '-';
            document.getElementById('tp_ro_role').innerText = data.role_label || 'معلم';
            document.getElementById('tp_ro_emp_id').innerText = 'كود: ' + (data.employee_number || '-');
            document.getElementById('tp_ro_school').innerText = data.school_name || '-';

            document.getElementById('tp_ro_dept_subject').innerText = (data.department || '-') + ' | ' + (data.subject || '-');
            document.getElementById('tp_ro_grades').innerText = data.assigned_grades || 'الكل';
            document.getElementById('tp_ro_sections').innerText = data.assigned_sections || 'الكل';
            document.getElementById('tp_ro_contact').innerText = (data.phone || '-') + ' | ' + (data.user_email || '-');
            document.getElementById('tp_ro_meta_extra').innerText = 'تعيين: ' + (data.appointment_year || '-') + ' | الإمارة: ' + (data.emirate || '-');
            document.getElementById('tp_ro_civil_id').innerText = data.civil_id || '-';

            // Plans Badge & List
            document.getElementById('tp_ro_plans_badge').innerText = data.term_plans_count + ' خطة مرفوعة (أحدث تقديم: ' + data.latest_term_plan_date + ')';
            var plansHtml = '';
            if (data.term_plans_summary && data.term_plans_summary.length > 0) {
                data.term_plans_summary.forEach(function(p) {
                    var stBg = '#f1f5f9', stCol = '#475569', stLbl = 'مسودة';
                    if (p.status === 'submitted') { stBg = '#e0f2fe'; stCol = '#0369a1'; stLbl = 'مرفوعة'; }
                    else if (p.status === 'approved') { stBg = '#dcfce7'; stCol = '#15803d'; stLbl = 'معتمدة'; }
                    else if (p.status === 'returned') { stBg = '#fee2e2'; stCol = '#b91c1c'; stLbl = 'طلب تعديل'; }

                    plansHtml += `
                        <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:10px; padding:10px 14px; display:flex; justify-content:space-between; align-items:center; font-size:12px;">
                            <div>
                                <strong style="color:#0f172a;">الفصل الدراسي ${p.term_number}</strong> — <small style="color:#64748b;">${p.subject} (${p.grade})</small>
                                <div style="font-size:10.5px; color:#94a3b8; margin-top:2px;">📅 ${p.date}</div>
                            </div>
                            <span style="background:${stBg}; color:${stCol}; padding:2px 10px; border-radius:9999px; font-weight:800; font-size:11px;">${stLbl}</span>
                        </div>
                    `;
                });
            } else {
                plansHtml = '<div style="color:#94a3b8; font-size:12px; text-align:center; padding:10px;">لا توجد خطط فصلية مرفوعة حالياً.</div>';
            }
            document.getElementById('tp_ro_plans_list').innerHTML = plansHtml;

            // Preps Badge & List
            document.getElementById('tp_ro_preps_badge').innerText = data.lesson_preps_count + ' تحضير دروس (' + data.weeks_covered_count + ' أسابيع تغطية)';
            var prepsHtml = '';
            if (data.lesson_preps_summary && data.lesson_preps_summary.length > 0) {
                data.lesson_preps_summary.forEach(function(lp) {
                    var stBg = '#f1f5f9', stCol = '#475569', stLbl = 'مسودة';
                    if (lp.status === 'submitted') { stBg = '#e0f2fe'; stCol = '#0369a1'; stLbl = 'مرفوع'; }
                    else if (lp.status === 'approved') { stBg = '#dcfce7'; stCol = '#15803d'; stLbl = 'معتمد'; }
                    else if (lp.status === 'revision_required' || lp.status === 'returned') { stBg = '#fee2e2'; stCol = '#b91c1c'; stLbl = 'تعديل'; }

                    prepsHtml += `
                        <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:10px; padding:10px 14px; display:flex; justify-content:space-between; align-items:center; font-size:12px;">
                            <div>
                                <strong style="color:#0f172a;">الأسبوع ${lp.week}: ${lp.title}</strong> — <small style="color:#64748b;">${lp.subject} (${lp.grade})</small>
                                <div style="font-size:10.5px; color:#94a3b8; margin-top:2px;">📅 ${lp.date}</div>
                            </div>
                            <span style="background:${stBg}; color:${stCol}; padding:2px 10px; border-radius:9999px; font-weight:800; font-size:11px;">${stLbl}</span>
                        </div>
                    `;
                });
            } else {
                prepsHtml = '<div style="color:#94a3b8; font-size:12px; text-align:center; padding:10px;">لا توجد تحضيرات دروس مسجلة حالياً.</div>';
            }
            document.getElementById('tp_ro_preps_list').innerHTML = prepsHtml;

            document.getElementById('tp_ro_loading').style.display = 'none';
            document.getElementById('tp_ro_content').style.display = 'flex';
        } else {
            alert('تعذر تحميل بيانات الملف الوظيفي.');
            eessCloseTeacherReadOnlyProfileModal();
        }
    })
    .catch(err => {
        alert('حدث خطأ في الاتصال بالسيرفر.');
        eessCloseTeacherReadOnlyProfileModal();
    });
};

window.eessCloseTeacherReadOnlyProfileModal = function() {
    document.getElementById('eess-teacher-profile-readonly-modal').style.display = 'none';
};

window.eessPrintTeacherProfilePDF = function() {
    if (!eessCurrentReadOnlyTeacherId) return;
    window.open('<?php echo admin_url("admin-ajax.php?action=sm_print&print_type=teacher_profile_report&teacher_id="); ?>' + eessCurrentReadOnlyTeacherId, '_blank');
};
</script>
