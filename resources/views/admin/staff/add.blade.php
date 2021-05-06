<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('asset/css/dataTables.bootstrap5.min.css')}}">

    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">

</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-md-8">
                @if(session("success"))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <div class="card-header" style="background-color: DarkOrange; color:white;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                        <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                    </svg>&nbsp; &nbsp;เพิ่มข้อมูลพนักงาน</div>
                <div class="card-body">

                    <!-- <form action="{{route('addstaff')}}" method="post" enctype="multipart/form-data" class="row g-3"> -->
                    
                    @if(!isset($staffs->id))
                    <form method="post" action="{{route('addstaff')}}" enctype="multipart/form-data" class="row g-3 was-validated">
                        @else
                        <form method="post" action="{{url('/Staff/update/'.$staffs->id)}}" enctype="multipart/form-data" class="row g-3">
                            @endif

                            @csrf

                            <div class="col-md-4">
                                <label for="NameTH" class="form-label">คำนำหน้า: </label>
                                <select id="NameTH" name="NameTH" class="form-select" required>
                                    <option value="" selected>กรุณาเลือก</option>
                                    @foreach($names as $row)

                                    @if ($type == "edit")

                                    @if ($staffs->NameTH)
                                    <option value="{{$row->id}}" {{ $staffs->NameTH == $row->id ? 'selected' : '' }}>{{$row->NameTH}}</option>
                                    @endif


                                    @else
                                    <option value="{{$row->id}}">{{$row->NameTH}}
                                        @endif

                                        @endforeach
                                </select>

                                <!-- @error('NameTH')
                                <span class="text-danger">{{$message}}</span>
                                @enderror -->

                                <div class="invalid-feedback">
                                    กรุณาเลือก คำนำหน้า
                                </div>

                            </div>
                            <input type="hidden" class="form-control" value="" name="id">
                            <div class="col-md-4">
                                <label for="fname" class="form-label">ชื่อ: </label>
                                <input type="text" class="form-control" name="fname" value="{{ $type == 'edit' ? $fristname : "" }}" required>
                                <!-- @error('fname')
                                <span class="text-danger">{{$message}}</span>
                                @enderror -->
                                <div class="invalid-feedback">
                                    กรุณากรอก ชื่อ
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="lname" class="form-label">นามสกุล: </label>
                                <input type="text" class="form-control" id="lname" name="lname" value="{{ $type == 'edit' ? $lastname : "" }}" required>
                                <!-- @error('lname')
                                <span class="text-danger">{{$message}}</span>
                                @enderror -->
                                <div class="invalid-feedback">
                                    กรุณากรอก นามสกุล
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="department" class="form-label">แผนก: </label>
                                <select id="department" name="department" class="form-select" required>
                                    <option value="" selected>กรุณาเลือก</option>
                                    @foreach($named as $row)

                                    @if ($type == "edit")

                                    @if ($staffs->department)
                                    <option value="{{$row->id}}" {{ $staffs->department == $row->id ? 'selected' : '' }}>{{$row->Name_D}}</option>
                                    @endif


                                    @else
                                    <option value="{{$row->id}}">{{$row->Name_D}}</option>

                                    @endif

                                    @endforeach

                                </select>
                                <!-- @error('department')
                                <span class="text-danger">{{$message}}</span>
                                @enderror -->
                                <div class="invalid-feedback">
                                    กรุณาเลือก แผนก
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="position" class="form-label">ตำแหน่ง: </label>
                                <select id="position" name="position" class="form-select" required>
                                    <option value="" selected>กรุณาเลือก</option>
                                    @foreach($namep as $row)

                                    @if ($type == "edit")

                                    @if ($staffs->position)
                                    <option value="{{$row->id}}" {{ $staffs->position == $row->id ? 'selected' : '' }}>{{$row->Name_P}}</option>
                                    @endif


                                    @else
                                    <option value="{{$row->id}}">{{$row->Name_P}}
                                        @endif

                                        @endforeach
                                </select>
                                <!-- @error('position')
                                <span class="text-danger">{{$message}}</span>
                                @enderror -->

                                <div class="invalid-feedback">
                                    กรุณาเลือก แผนก
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="tel" class="form-label">เบอร์โทรศัพท์: </label>
                                <input type="text" class="form-control" id="tel" name="tel" value="{{ $type == 'edit' ? $tel : "" }}">
                                <!-- @error('tel')
                                <span class="text-danger">{{$message}}</span>
                                @enderror -->
                                <!-- <div class="invalid-feedback">
                                กรุณากรอก เบอร์โทรศัพท์
                                </div> -->

                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">Email: </label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $type == 'edit' ? $email : "" }}">
                                <!-- @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror -->
                                <!-- <div class="invalid-feedback">
                                กรุณากรอก Email
                                </div> -->
                            </div>
                            <div class="col-md-4">

                                <label for="status" class="form-label">สถานะการใช้งาน: </label>
                                <br>
                                @if ($type == "edit")


                                @if($staffs->status == 1)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="1" checked>
                                    <label class="form-check-label">เปิด</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="2">
                                    <label class="form-check-label">ปิด</label>
                                </div>
                                @elseif ($staffs->status == 2)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="1">
                                    <label class="form-check-label">เปิด</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="2" checked>
                                    <label class="form-check-label">ปิด</label>
                                </div>

                                @else
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="1">
                                    <label class="form-check-label">เปิด</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="2">
                                    <label class="form-check-label">ปิด</label>
                                </div>
                                @endif

                                @else
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="1" checked>
                                    <label class="form-check-label">เปิด</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="2">
                                    <label class="form-check-label">ปิด</label>
                                </div>
                                @endif
                            </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-header" style="background-color: DarkOrange; color:white;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                        <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                        <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z" />
                    </svg>&nbsp; &nbsp;อัพโหลดรูปภาพ</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="picIcon" id="picIcon">
                    <div class="image-preview" id="imagePreview">
                        <img src="" alt="Image Preview" class="image-preview__image">
                        @if ($type == "edit")
                        @if($staffs->picIcon)
                        <img class="image-preview__default-text" src="{{ asset('image/staff/' . $staffs->picIcon) }}" alt="" height="85%" title="">
                        @else
                        <img class="image-preview__default-text" src="https://cdn.icon-icons.com/icons2/1879/PNG/512/iconfinder-8-avatar-2754583_120515.png" width="180px" height="200px"></img>
                        @endif

                        @else
                        <img class="image-preview__default-text" src="https://cdn.icon-icons.com/icons2/1879/PNG/512/iconfinder-8-avatar-2754583_120515.png" width="180px" height="200px"></img>
                        @endif
                    </div>
                </div>
            </div>
            <center>
                &nbsp; &nbsp;&nbsp; <div class="col-md-6">
                    <button type="submit" name="submit" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                        </svg>
                        บันทึก</button>
                    <a href="{{route('staff')}}" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                            <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                        ปิด</a>
                </div>
                <hr>
                </form>
        </div><br>
        </center>
        @if($type == "edit")
        <div class="card-header" style="background-color: DarkOrange; color:white;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
            </svg>&nbsp; &nbsp;อัพโหลดไฟล์</div>
        <div class="card-body">
            <div class="col-mx-8">
                <div class="form-group">
                    <form action="{{url('/Staff_page/uploadfile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="uploadfile" class="control-label col-12">อัพโหลดไฟล์:</label>
                        <div class="col-12">
                            <!-- <input type="hidden" class="form-control" name="id" value="{{ $type == 'add' ? $upload : "" }}" > -->
                            <input type="file" class="form-control" name="uploadfile" id="uploadfile" multiple="multiple">

                            <!--  ตัวส่งค่าอัพโหลดไฟล์-->
                            <input type="hidden" name="hdid" id="hdid" class="form-control" value="{{$id}}">
                        </div>
                        <br>
                        <center><button type="submit" name="submit" class="btn btn-info" style="color: white;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                    <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                                </svg>
                                อัพโหลด</button></center>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="card-header" style="background-color: DarkOrange; color:white;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
            </svg>&nbsp; &nbsp;ตารางแสดงข้อมูลไฟล์</div>
        <div class="card-body">

            <!-- table form add -->
            <table class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อไฟล์</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($upload as $row)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$row->Uploadfile}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.jquery.min.js"></script>
    <script src="{{asset('asset/js/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script>
        const picIcon = document.getElementById("picIcon");
        const previewContainer = document.getElementById("imagePreview");
        const previewImage = previewContainer.querySelector(".image-preview__image");
        const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");
        picIcon.addEventListener("change", function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader()
                previewDefaultText.style.display = "none";
                previewImage.style.display = "block";

                reader.addEventListener("load", function() {
                    console.log(this);
                    previewImage.setAttribute("src", this.result);
                });
                reader.readAsDataURL(file);
            } else {
                previewDefaultText.style.display = null;
                previewImage.style.display = null;
                previewImage.setAttribute("src", "");
            }
        });
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>