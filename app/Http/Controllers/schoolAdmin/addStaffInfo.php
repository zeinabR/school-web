<?php


namespace App\Http\Controllers\schoolAdmin;
use App\Http\Controllers\Controller;
use App\Models\Users\staff;
use App\Models\Users\school_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use View;
use DB;

class addStaffInfo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $school = school_admin::find(Auth::id())->school;
        $classes = $school->classes;
    
        $students = array();       
        foreach ($classes as $class) {
            $students[] = $class->students;
        }
        
        $stuNumber=0;
        foreach($students as $student)
        {
            for($j=0;$j<40;$j++)
            {
                if(empty($student[$j]))
                    break;
                else
                    $stuNumber++;

            }

        }

        $pResults =$school->parents;
        $pNumber= count($pResults);


    

        $staffResults =$school->staff;
        $staNumber=count($staffResults);


        $tResults =$school->teachers;
        $tNumber= count($tResults);
        $s="n";

              return view('Add_School_info.add_staff_info',compact('s','school','pNumber','stuNumber','tNumber','staNumber'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Add_School_info.add_staff_info');    }


 public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staff=new staff;
          $this->validate($request,[
            "name"=>'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:staff',
            'password' => 'required|string|min:6',
            'inputPhone' => 'required|regex:/[0-9]/|max:11|min:8',
            'inputAddress' => 'required|string|min:3',
        ]);

        // $adminID=Auth::id();
        // $school_id=DB::table('schools')->where('admin_id',$adminID)->value('id');
           $school = school_admin::find(Auth::id())->school;
        $school_id=$school['id'];
        $staff ->name = $request ->name;
        $staff ->phone = $request ->inputPhone ;
        $staff ->email = $request ->email ;
        $staff ->password = Hash::make($request->input('password'));
        $staff ->address = $request ->inputAddress;
        $staff ->school_id=$school_id;;
        $staff->image='../images/defaultProfile.jpg';
        $staff -> save();
        return redirect('Add_School_Info/add_staff_info');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
