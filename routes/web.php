<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|   
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//user's home routes 
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home_parent', 'ParentHomeController@index')->name('homeParent');
Route::get('/home_staff', 'StaffHomeController@index')->name('homeStaff');
Route::get('/home_student', 'StudentHomeController@index')->name('homeStudent');
Route::get('/home_teacher', 'TeacherHomeController@index')->name('homeTeacher');
Route::get('/home_web', 'WebController@index')->name('homeWeb');
//controlling user's home routes
Route::get('/Home', 'ControlHome@show')->name('Home');
//web admin login routes 
Route::get('webAdmin', 'webAdmin\Auth\LoginController@showLoginForm')->name('webAdmin');
Route::post('webAdmin', 'webAdmin\Auth\LoginController@login');
//controlling user's login routes
Route::get('login-admin', 'ControlLogin@showLoginForm')->name('login.admin');
Route::post('login-admin', 'ControlLogin@login');
//user's login routes 
Route::get('login-school', 'schoolAdmin\Auth\LoginController@showLoginForm')->name('school.login');
Route::post('login-school', 'schoolAdmin\Auth\LoginController@login');

Route::get('login-parent', 'Parent\Auth\LoginController@showLoginForm')->name('login.parent');
Route::post('login-parent', 'Parent\Auth\LoginController@login');

Route::get('login-student', 'Student\Auth\LoginController@showLoginForm')->name('login.student');
Route::post('login-student', 'Student\Auth\LoginController@login');

Route::get('login-staff', 'Staff\Auth\LoginController@showLoginForm')->name('login.staff');
Route::post('login-staff', 'Staff\Auth\LoginController@login');

Route::get('login-teacher', 'Teacher\Auth\LoginController@showLoginForm')->name('login.teacher');
Route::post('login-teacher', 'Teacher\Auth\LoginController@login');
//////////////////////////////////////////////

//forgot and reset pass
Route::get('forgotPass', 'ControlForgotPass@showEmail')->name('forgotPass');
Route::post('forgotPass', 'ControlForgotPass@reset');

//web admin routes
Route::post('web-passwords/email', 'webAdmin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('web-passwords.email');
Route::get('web-passwords/reset', 'webAdmin\Auth\ForgotPasswordController@showLinkRequestForm')->name('web-passwords.request');
Route::post('web-passwords/reset', 'webAdmin\Auth\ResetPasswordController@reset');
Route::post('web-passwords/reset/{token}', 'webAdmin\Auth\ResetPasswordController@showResetForm')->name('web-passwords.reset');
/////////////////////////////////////////////////

//school admin routes
Route::post('admin-passwords/email', 'schoolAdmin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin-passwords.email');
Route::get('admin-passwords/reset', 'schoolAdmin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin-passwords.request');
Route::post('admin-passwords/reset', 'schoolAdmin\Auth\ResetPasswordController@reset');
Route::post('admin-passwords/reset/{token}', 'schoolAdmin\Auth\ResetPasswordController@showResetForm')->name('admin-passwords.reset');
/////////////////////////////////////////////////

//teacher routes
Route::post('teacher-passwords/email', 'Teacher\Auth\ForgotPasswordController@sendResetLinkEmail')->name('teacher-passwords.email');
Route::get('teacher-passwords/reset', 'Teacher\Auth\ForgotPasswordController@showLinkRequestForm')->name('teacher-passwords.request');
Route::post('teacher-passwords/reset', 'Teacher\Auth\ResetPasswordController@reset');
Route::post('teacher-passwords/reset/{token}', 'Teacher\Auth\ResetPasswordController@showResetForm')->name('teacher-passwords.reset');
/////////////////////////////////////////////////

//student routes
Route::post('student-passwords/email', 'Student\Auth\ForgotPasswordController@sendResetLinkEmail')->name('student-passwords.email');
Route::get('student-passwords/reset', 'Student\Auth\ForgotPasswordController@showLinkRequestForm')->name('student-passwords.request');
Route::post('student-passwords/reset', 'Student\Auth\ResetPasswordController@reset');
Route::post('student-passwords/reset/{token}', 'Student\Auth\ResetPasswordController@showResetForm')->name('student-passwords.reset');
/////////////////////////////////////////////////

//parent routes
Route::post('parent-passwords/email', 'Parent\Auth\ForgotPasswordController@sendResetLinkEmail')->name('parent-passwords.email');
Route::get('parent-passwords/reset', 'Parent\Auth\ForgotPasswordController@showLinkRequestForm')->name('parent-passwords.request');
Route::post('parent-passwords/reset', 'Parent\Auth\ResetPasswordController@reset');
Route::post('parent-passwords/reset/{token}', 'Parent\Auth\ResetPasswordController@showResetForm')->name('parent-passwords.reset');
/////////////////////////////////////////////////

// staff routes
Route::post('staff-passwords/email', 'Staff\Auth\ForgotPasswordController@sendResetLinkEmail')->name('staff-passwords.email');
Route::get('staff-passwords/reset', 'Staff\Auth\ForgotPasswordController@showLinkRequestForm')->name('staff-passwords.request');
Route::post('staff-passwords/reset', 'Staff\Auth\ResetPasswordController@reset');
Route::post('staff-passwords/reset/{token}', 'Staff\Auth\ResetPasswordController@showResetForm')->name('staff-passwords.reset');
/////////////////////////////////////////////////


Route::get('register-admin', 'schoolAdmin\Auth\RegisterController@showRegistrationForm')->name('register-admin');
Route::post('register-admin', 'schoolAdmin\Auth\RegisterController@register');


// Route::get('/add_Admin', 'HomeController@index')->name('add_Admin');

Route::resource('add_admin', 'add_school_admin');



// Settings Routes
Route::get('/settings','Settings@index')->name('settings');
Route::get('/student-settings','StudentSettings@index');
Route::post('/student-settings','StudentSettings@update');
Route::get('/staff-settings','StaffSettings@index');
Route::post('/staff-settings','StaffSettings@update');//->name('settings');
Route::get('/parent-settings','ParentSettings@index');//->name('settings');
Route::post('/parent-settings','ParentSettings@update');
Route::get('/teacher-settings','TeacherSettings@index');//->name('settings');
Route::post('/teacher-settings','TeacherSettings@update');
Route::get('/admin-settings','SchoolAdminSettings@index');//->name('settings');
Route::post('/admin-settings','SchoolAdminSettings@update');
Route::get('/web-settings','WebAdminSettings@index');//->name('settings');
Route::post('/web-settings','WebAdminSettings@update');



//staff routes
Route::get('/staffEvents', 'StaffPagesController@staffEvents');
Route::post('/staffEvents','EventController@store');
Route::get('/staffMessages', 'StaffPagesController@staffMessages');
Route::get('/staffTeachers', 'StaffPagesController@staffTeachers');
Route::get('/staffCourses', 'StaffPagesController@staffCourses');
Route::post('/staffCourses','CourseController@store');
// Route::post('/staffStudents/{id}','studentController@index');
Route::post('/staffStudents/{id}', 'staffStudentController@edit');
Route::get('/staffStudentlist/{id}', 'staffStudentController@show');
Route::get('/staffStudentsprim', 'staffStudentController@index');
Route::get('/staffStudentsprep', 'staffStudentController@index');
Route::get('/staffStudentssec', 'staffStudentController@index');
Route::get('/staffClasses','ClassesController@index');
Route::post('/staffClasses','ClassesController@store');
Route::get('staffSchedules','ScheduleController@index');
Route::post('staffSchedules','ScheduleController@update');
Route::put('staffSchedules','ScheduleController@edit');
Route::get('staffTeachers','TeacherScheduleController@index');
//Route::post('staffTeachers','TeacherScheduleController@update');
Route::get('staffTeachers/{id}','TeacherScheduleController@indexSchedule');
Route::post('staffTeachers/{id}','TeacherScheduleController@store');
Route::get('DeleteClass/{id}','ClassesController@indexTeacher');
Route::delete('DeleteClass/{id}','ClassesController@destroy');



//parent routes
Route::get('parent/parent', 'Parent\ParentController@index');
Route::get('/parent/parentTeacher', 'PagesController@parentTeacher');

// student routes
Route::get('student/student', 'Student\StudentController@index')->name('StudentHome');
Route::get('course/course/{indx}', 'Course\CourseController@index')->name('course');
Route::get('course/course', 'Course\CourseController@get_grade');

//school info routes
Route::resource('/Add_School_Info/add_School_info', 'schoolAdmin\addSchoolInfoController');
Route::resource('/Add_School_Info/add_staff_info', 'schoolAdmin\addStaffInfo');
Route::resource('/Add_School_Info/add_teacher_info','schoolAdmin\addTeacherInfoController');
Route::resource('/Add_School_Info/addStudentInfo','schoolAdmin\addStudentInfoController');
Route::resource('/Add_School_Info/addParentInfo','schoolAdmin\addParentInfoController');
Route::get('/Add_School_Info/viewStaffInfo','schoolAdmin\staffInfo@index');
Route::get('/Add_School_Info/viewTeacherInfo','schoolAdmin\viewTeacherInfoController@index');
Route::get('/Add_School_Info/viewParentInfo','schoolAdmin\viewParentInfoController@index');
Route::get('/Add_School_Info/viewStudentInfo','schoolAdmin\viewStudentInfoController@index');
Route::get('/Add_School_Info/viewParentInfo/{id}','schoolAdmin\viewParentInfoController@destroy');
Route::get('/Add_School_Info/viewStudentInfo/{id}','schoolAdmin\viewStudentInfoController@destroy');
Route::get('/Add_School_Info/viewTeacherInfo/{id}','schoolAdmin\viewTeacherInfoController@destroy');
Route::get('/Add_School_Info/viewStaffInfo/{id}','schoolAdmin\staffInfo@destroy');
Route::post('/Add_School_Info/add_School_info/{id}', 'schoolAdmin\addSchoolInfoController@edit');

//events route
Route::get('events','Eventcontroller@index')->name('event');

Route::get('/deleteSchool/{id}','WebController@delete');

//teacher
Route::get('Teacher/teacher','Teacher\TeacherController@index')->name('TeacherHome');
Route::post('Teacher/teacher','Teacher\TeacherController@upload')->name('uploading');

Route::get('Teacher/AddGrades/{classID}/{courseID}','Teacher\TeacherController@AddGrades')->name('Grades');
Route::post('Teacher/AddGrades/{classID}/{courseID}','Teacher\TeacherController@store')->name('addGrades');


Route::get('events','Eventcontroller@index')->name('event');

Route::get('student/student/{indx}/{ExId}', 'student\studentController@DownLoadExercise')->name('courseEX');

Route::get('Parent/parent/{indx}/{ExId}', 'Parent\ParentController@DownLoadExercise')->name('PcourseEX');
