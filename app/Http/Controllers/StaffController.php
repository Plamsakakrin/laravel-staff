<?php

namespace App\Http\Controllers;

// Use Model ที่ตั้ง
use App\Models\Staff;
use App\Models\Upload;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    // ส่วนของหน้า view (index)
    public function index()
    {

        // เรียกjoin 2 ตาราง โดยอิงตารางstaffเป็นtableหลัก
        $staffs = DB::table('db_staff')
            ->select('db_staff.id', 'db_staff.fname', 'db_staff.lname', 'dep.Name_D', 'db_staff.status', 'db_staff.position', 'pos.Name_P')
            ->Join('db_d as dep', 'db_staff.department', 'dep.id')
            ->Join('db_p as pos', 'db_staff.position', 'pos.id')
            ->get();

        // ดึงข้อมูลแบบ querry
        $names = DB::table('db_name')->get();
        $named = DB::table('db_d')->get();
        $namep = DB::table('db_p')->get();
        $statuss = DB::table('status')->get();

        // return view ไปยังหน้า index (ระบุตัวแปรที่ตั้งไว้)
        return view('admin.staff.index', compact('staffs', 'names', 'named', 'namep', 'statuss'));
    }

    // --------------------------------------------------------------------------------------------------------------------------------------------

    // ส่วนของหน้า view (add)
    public function formadd(Request $request)
    {
        // ดึงข้อมูลแบบ querry
        $staffs = DB::table('db_staff')->get();
        $names = DB::table('db_name')->get();
        $named = DB::table('db_d')->get();
        $namep = DB::table('db_p')->get();
        $upload = DB::table('upload_file')->get();
        // $staffs=Staff::paginate(3);  // แสดงข้อมูลตามที่ทำกำหนด

        // กำหนดid โดย id ที่ถูกส่งมานั้นจะแสดง type เป็น  hidden ไว้
        $id = $request->input("id");
        $staffid = Staff::find($id);
        // $staffs=Staff::all(); // ดึงข้อมูลแบบระบุtableที่ model มาทั้งหมด

        // กำหนดให้หน้าPageนี้ เป็นหน้าadd 
        $type = "add";

        // ให้ส่งค่า id เป็นลำดับแรก
        $numID = DB::table('db_staff')->where('id')->first();


        // return view ไปยังหน้า add (ระบุตัวแปรที่ตั้งไว้)
        return view('admin.staff.add', compact('staffs', 'names', 'named', 'namep', 'type', 'numID', 'upload'));
    }

    // --------------------------------------------------------------------------------------------------------------------------------------------


    // Insertข้อมูลเข้า
    public function store(Request $request)
    {
        // ระบุตัวแปรให้ตรงตามTB
        $staff = new Staff;
        $staff->NameTH = $request->NameTH;
        $staff->fname = $request->fname;
        $staff->lname = $request->lname;
        $staff->department = $request->department;
        $staff->position = $request->position;
        $staff->tel = $request->tel;
        $staff->email = $request->email;
        $staff->status = $request->status;



        // การอัพโหลดไฟล์
        $test = "";
        $fileIcon = $request->file('fileIcon');    // การเข้ารหัสไฟล์
        if ($fileIcon != "") {
            $file_ext = strtolower($fileIcon->getClientOriginalName());  // ดึงนามสกุลไฟล์
            $file_name = $file_ext;

            // อัพโหลดและบันทึกข้อมูล
            $uploadfile_location = 'file/staff';
            $full_path = $file_name;
            $test = $full_path;
            $fileIcon->move($uploadfile_location, $file_name);  // ดึงไฟล์ที่อัพโหลดมาอย่ใน path
        }
        $staff->fileIcon = $test;


        // การอัพโหลดรูปภาพ
        $test1 = "";
        $picIcon = $request->file('picIcon'); // การเข้ารหัสรูป
        if ($picIcon != "") {
            $file_ext = strtolower($picIcon->getClientOriginalName()); // ดึงนามสกุลไฟล์
            $file_name = $file_ext;

            // อัพโหลดและบันทึกข้อมูล
            $uploadimage_location = 'image/staff'; // อัพโหลดและบันทึกข้อมูล
            $full_path = $file_name;
            $test1 = $full_path;
            $picIcon->move($uploadimage_location, $file_name);  // ดึงไฟล์ที่อัพโหลดมาอยู่ใน path
        }
        $staff->picIcon = $test1;


        // การเขียนเงื่อนไข การแจ้งเตือน
        $request->validate(
            [
                // 'NameTH'=>'required|not_in:0',
                // 'fname'=>'required|max:255',
                // 'lname'=>'required|max:255',
                // 'position'=>'required|not_in:0',
                // 'department'=>'required|not_in:0',
                // 'tel'=>'required|unique:db_staff|max:10',
                // 'email'=>'required|unique:db_staff|max:225'  // unique -> เช็คการทำซ้ำ

            ],
            // เปลี่ยนภาษาการแจ้งเตือน
            [
                'NameTH.required' => "กรุณาเลือก คำนำหน้า",
                'fname.required' => "กรุณากรอก ชื่อ",
                'lname.required' => "กรุณากรอก นามสกุล",
                'position.required' => "กรุณาเลือก ตำแหน่ง",
                'department.required' => "กรุณาเลือก แผนก",

                'fname.max' => "ห้ามกรอกเกิน 255 ตัวอักษร",
                'lname.max' => "ห้ามกรอกเกิน 255 ตัวอักษร",
                'tel.max' => "ห้ามกรอกเกิน 10 ตัวเลข",
                // 'tel.unique'=>"มีการใช้ เบอร์โทรศัพท์นี้ไปแล้ว",
                // 'email.unique'=>"มีการใช้ Emailนี้ไปแล้ว",
            ]
        );

        // การSaveข้อมูล
        $staff->save();

        // การ return กลับไปหน้าที่บันทึกพร้อมกับแจ้งเตือน
        return redirect()
            ->to('/Staff_page/edit?id=' . $staff->id)
            ->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }

    // --------------------------------------------------------------------------------------------------------------------------------------------

    // ฟอร์มแก้ไขข้อมูล
    public function edit(Request $request)
    {
        // การส่งidตารางมาแสดงและใช้
        $id = $request->input("id");
        $staffs = Staff::find($id);


        // การส่ง request จากform
        $fristname = $staffs['fname'];
        $lastname = $staffs['lname'];
        $position = $staffs['position'];
        $NameTH = $staffs['NameTH'];
        $department = $staffs['department'];
        $email = $staffs['email'];
        $tel = $staffs['tel'];
        $picIcon = $staffs['picIcon'];


        // ดึงข้อมูลแบบ querry
        $named = DB::table('db_d')->get();
        $namep = DB::table('db_p')->get();
        $names = DB::table('db_name')->get();
        $upload = DB::table('upload_file')

            // กำหนดidเสร็จแล้ว ให้ไปแสดงไอดี1 2 3 4  ที่อีกตารางที่ชื่อว่า staffID เพื่ออัพโหลดไฟล์
            ->where('staffID', $id)
            ->get();

        // กำหนดให้ page นี้ เป็น edit
        $type = "edit";

        // ให้ส่งค่า id เป็นลำดับแรก
        $numID = DB::table('db_staff')->where('id')->first();

        // return ไปยังหน้าadd
        return view('admin.staff.add', compact(
            'upload',
            'numID',
            'type',
            'names',
            'named',
            'namep',
            'staffs',
            'fristname',
            'lastname',
            'position',
            'department',
            'email',
            'tel',
            'picIcon',
            'NameTH',
            'id'
        ));
    }

    // --------------------------------------------------------------------------------------------------------------------------------------------



    // การอัพเดตข้อมูล
    public function update(Request $request, $id)
    {

        $picIcon = $request->file('picIcon'); // ส่งที่อยู่ของรูป
        if ($picIcon) {

            // การอัพโหลดรูปภาพ
            $test1 = "";
            $picIcon = $request->file('picIcon'); // การเข้ารหัสรูป

            if ($picIcon != "") {
                $file_ext = strtolower($picIcon->getClientOriginalName()); // ดึงนามสกุลไฟล์
                $file_name = $file_ext;
                $uploadimage_location = 'image/staff'; // อัพโหลดและบันทึกข้อมูล
                $full_path = $file_name;
                $test1 = $full_path;
                $picIcon->move($uploadimage_location, $file_name);  // ดึงไฟล์ที่อัพโหลดมาอย่ใน path
            }

            $update = Staff::find($id)->update([
                'picIcon' => $test1,
            ]);
            return redirect()->route('staff')->with('success', "อัพเดตข้อมูลเรียบร้อย"); // returnให้ไปที่routeแล้วตามด้วยrouteที่เราต้องการให้ไป




        } elseif ($fileIcon = $request->file('fileIcon')) {

            // การอัพโหลดรูปภาพ
            $test = "";
            $fileIcon = $request->file('fileIcon'); // การเข้ารหัสรูป

            if ($fileIcon != "") {
                $file_ext = strtolower($fileIcon->getClientOriginalName()); // ดึงนามสกุลไฟล์
                $file_name = $file_ext;
                $uploadfile_location = 'file/staff'; // อัพโหลดและบันทึกข้อมูล
                $full_path = $file_name;
                $test = $full_path;
                $fileIcon->move($uploadfile_location, $file_name);  // ดึงไฟล์ที่อัพโหลดมาอย่ใน path
            }

            $update = Staff::find($id)->update([
                'fileIcon' => $test,
            ]);
            return redirect()->route('staff')->with('success', "อัพเดตข้อมูลเรียบร้อย"); // returnให้ไปที่routeแล้วตามด้วยrouteที่เราต้องการให้ไป



        } else {

            //  ส่วนของการอัพเดต
            $update = Staff::find($id)->update([
                'NameTH' => $request->NameTH,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'department' => $request->department,
                'position' => $request->position,
                'tel' => $request->tel,
                'email' => $request->email,
                'status' => $request->status,
            ]);
            return redirect()->route('staff')->with('success', "อัพเดตข้อมูลเรียบร้อย"); // returnให้ไปที่routeแล้วตามด้วยrouteที่เราต้องการให้ไป
        }
    }

     // --------------------------------------------------------------------------------------------------------------------------------------------

    //  ส่วนของการลบข้อมูลแบบถาวร
    public function delete($id)
    {
        $delete = Staff::find($id)->forceDelete(); // การลบตามid
        return redirect()->route('staff')->with('success', "ลบข้อมูลเรียบร้อย"); // returnให้ไปที่routeแล้วตามด้วยrouteที่เราต้องการให้ไป
    }

     // --------------------------------------------------------------------------------------------------------------------------------------------

    // การค้นหาตา ชื่อ-นามสกุล  ตำแหน่ง แผนก สถานะ
    public function search(Request $request)
    {
        // สร้างตัวแปรเพื่อกำหนด Loopให้กับข้อมูล
        $DepID = $request->input('department');
        $PosID = $request->input('position');
        $names = $request->input('fname');
        $Sta = $request->input('status');


        if (!empty($DepID)) {
            $staffs = DB::table('db_staff')
                ->select('db_staff.id', 'db_staff.fname', 'db_staff.lname', 'dep.Name_D', 'db_staff.status', 'db_staff.position', 'pos.Name_P')
                ->Join('db_d as dep', 'db_staff.department', 'dep.id')
                ->Join('db_p as pos', 'db_staff.position', 'pos.id')
                ->where('dep.id', $DepID)
                ->get();
        } elseif (!empty($PosID)) {
            $staffs = DB::table('db_staff')
                ->select('db_staff.id', 'db_staff.fname', 'db_staff.lname', 'dep.Name_D', 'db_staff.status', 'db_staff.position', 'pos.Name_P')
                ->Join('db_d as dep', 'db_staff.department', 'dep.id')
                ->Join('db_p as pos', 'db_staff.position', 'pos.id')
                ->where('pos.id', $PosID)
                ->get();
        } elseif (!empty($names)) {
            if (!empty($names)) {
                $staffs = DB::table('db_staff')
                    ->select('db_staff.id', 'db_staff.fname', 'db_staff.lname', 'dep.Name_D', 'db_staff.status', 'db_staff.position', 'pos.Name_P')
                    ->Join('db_d as dep', 'db_staff.department', 'dep.id')
                    ->Join('db_p as pos', 'db_staff.position', 'pos.id')
                    ->where('db_staff.fname', 'LIKE', '%' . $names . '%')
                    ->get();
            } else {
                ("ไม่ได้กรอกข้อมูล");
            }
        } elseif ($Sta) {
            $staffs = DB::table('db_staff')
                ->select('db_staff.id', 'db_staff.fname', 'db_staff.lname', 'dep.Name_D', 'db_staff.status', 'db_staff.position', 'pos.Name_P')
                ->Join('db_d as dep', 'db_staff.department', 'dep.id')
                ->Join('db_p as pos', 'db_staff.position', 'pos.id')
                ->join('status as sta', 'db_staff.status', 'sta.id')
                ->where('sta.id', $Sta)
                ->get();
        } else {
            $DepID = $request->input('department');
            $PosID = $request->input('position');
            $staffs = DB::table('db_staff')
                ->select('db_staff.id', 'db_staff.fname', 'db_staff.lname', 'dep.Name_D', 'db_staff.status', 'db_staff.position', 'pos.Name_P')
                ->Join('db_d as dep', 'db_staff.department', 'dep.id')
                ->Join('db_p as pos', 'db_staff.position', 'pos.id')
                ->join('status as sta', 'db_staff.status', 'sta.id')
                ->get();
        }

        // ดึงข้อมูลแบบ querry
        $names = DB::table('db_name')->get();
        $named = DB::table('db_d')->get();
        $namep = DB::table('db_p')->get();
        $statuss = DB::table('status')->get();

        // return กลับไปหน้า index
        return view('admin.staff.index', compact('statuss', 'names', 'named', 'namep', 'staffs'));
    }

     // --------------------------------------------------------------------------------------------------------------------------------------------

    //  ส่วนของกราอัพโหลดไฟล์ 1 ไอดีสามารถระบุ ได้หลายไฟล์ เก็บตามไอดี
    public function uploadfile(Request $request)
    {
        // รับค่า request มาจากinput hdid
        $id = $request->input("hdid"); 

        // อัพโหลดไฟล์
        $upload = new Upload;
        $test = "";
        $uploadfile = $request->file('uploadfile');    // การเข้ารหัสไฟล์
        if ($uploadfile != "") {
            $file_ext = strtolower($uploadfile->getClientOriginalName());  // ดึงนามสกุลไฟล์
            $file_name = $file_ext;

            // อัพโหลดและบันทึกข้อมูล
            $uploadfile_location = 'file/staff';
            $full_path = $file_name;
            $test = $full_path;
            $uploadfile->move($uploadfile_location, $file_name);  // ดึงไฟล์ที่อัพโหลดมาอย่ใน path
        }

        // อััพโหลดไฟล์และใช้ไอดีของตารางที่จะเก็บ
        $upload->uploadfile = $test;
        $upload->staffID = $id;


        // การ saveข้อมูล
        $upload->save();

        // การreturnผลการแสดงหน้าที่เพิ่มข้อมูล
        return redirect()
            // ->route('staff')
            ->back()
            ->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
}
