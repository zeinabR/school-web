<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/login-school','/login-parent','/login-student','/login-teacher','/login-staff','/webAdmin','web-passwords/email','admin-passwords/email','teacher-passwords/email','student-passwords/email','staff-passwords/email','parent-passwords/email','student/student','/staffEvents','/Add_School_info/add_School_info','Add_School_Info/add_staff_info','Add_School_Info/addStudentInfo','Add_School_Info/add_teacher_info','Add_School_Info/addParentInfo','Add_School_Info/viewStudentInfo','Add_School_Info/viewStaffInfo','Add_School_Info/viewParentInfo','Add_School_Info/viewTeacherInfo','course/course','course/course/{indx}','/staffMessages','/staffTeachers','/staffCourses','/staffStudents/{id}','/staffStudentlist/{id}','/staffStudentsprim','/staffStudentsprep','/staffStudentssec'
    ];
}
