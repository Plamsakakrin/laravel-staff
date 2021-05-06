<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
</head>
<body>
    <div class="container">
    
    <!-- <nav class="navbar navbar-light" style="background-color: brown;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" style="color: white;">
                    <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    พนักงาน
                </a>
            </div>
        </nav> -->
        
    <div class="row">
    <div class="col-md-8">
    
    <div class="card-header" style="background-color: DarkOrange; color:white;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
  <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
</svg>&nbsp; &nbsp;เพิ่มข้อมูลพนักงาน</div>
           <div class="card-body">
            <form action="{{url('/Staff/update/'.$staff->id)}}" method="post"    enctype="multipart/form-data"  class="row g-3">
            @csrf
        <div class="col-md-4">
       
            <label for="NameTH" class="form-label">คำนำหน้า: </label>
            <select id="NameTH" name="NameTH" class="form-select">
            <!-- <input type="text" class="form-control" name="fname" value="{{$staff->NameTH}}"> -->

           
                <option name="NameTH" value="1" {{$staff->NameTH =="1" ? 'selected' : '' }}>นาย</option>
                <option name="NameTH" value="2"{{ $staff->NameTH =="2" ? 'selected' : '' }}>นางสาว</option>
                <option name="NameTH" value="3"{{ $staff->NameTH =="3" ? 'selected' : '' }}>นาง</option>

               
            </select>
            </div>
            <input type="hidden" class="form-control"  value="" name="id">
            <div class="col-md-4">
                <label for="fname" class="form-label">ชื่อ: </label>
                <input type="text" class="form-control" name="fname" value="{{$staff->fname}}">
            </div>

            
            <div class="col-md-4">
                <label for="lname" class="form-label">นามสกุล: </label>
                <input type="text" class="form-control"  name="lname" value="{{$staff->lname}}">
            </div>
            
            <div class="col-md-4">
                <label for="department" class="form-label">แผนก: </label>
                <select id="department" name="department" class="form-select ">
                <option name="department"  value="1"{{ $staff->department =="1" ? 'selected' : '' }}>บัญชี</option>
                <option name="department" value="2"{{ $staff->department =="2" ? 'selected' : '' }}>ผู้จัดการ</option>
                <option name="department" value="3"{{ $staff->department =="3" ? 'selected' : '' }}>ผู้พัฒนาระบบ</option>
                <option name="department"value="4"{{ $staff->department =="4" ? 'selected' : '' }}>ฝ่ายขาย</option>
                <option name="department"value="5"{{ $staff->department =="5" ? 'selected' : '' }}>ผู้ดูแล</option>
                </select>
            </div>
            
            <div class="col-md-4">
                <label for="position" class="form-label">ตำแหน่ง: </label>
                <select id="position" name="position" class="form-select">
                <option name="position" value="1"{{ $staff->position =="1" ? 'selected' : '' }}>การจัดการบัญชีทั่วไป</option>
                <option name="position" value="2"{{ $staff->position =="2" ? 'selected' : '' }}>จัดการทั่วไป</option>
                <option name="position" value="3"{{ $staff->position =="3" ? 'selected' : '' }}>โปรแกรมเมอร์</option>
                <option name="position" value="4"{{ $staff->position =="4" ? 'selected' : '' }}>เซลขายของ</option>
                <option name="position" value="5"{{ $staff->position =="5" ? 'selected' : '' }}>การจัดการทรัพยากรทั่วไป</option>
                </select>
            </div>
            
           

            <!-- <div class="col-md-4">
                <label for="department" class="form-label">แผนก: </label>
                <select id="department" name="department" class="form-select">
                    <option selected>กรุณาเลือกแผนก</option>
                      
                </select>
                                
            </div> -->
                                                            
                            
                                
                                <!-- <div class="col-md-1">
                            <button style="margin-top: 32px;" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            +
                            </button>
                                </div> -->

                                <!-- Modal -->
                            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                
                                
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มแผนก</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <div class="col-md-12">
                                    <label for="Name_D" class="form-label">ชื่อแผนก: </label>
                                    <input type="text" class="form-control" id="Name_D" name="Name_D">
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="submit" class="btn btn-outline-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                    <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
                                    </svg>    
                                    บันทึก</button>
                                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>    
                                    ปิด</button>
                                </div>
                                </div>
                            </div>
                            </div> -->

                            
                    
                    
            <!-- <div class="col-md-4">
                <label for="position" class="form-label">ตำแหน่ง: </label>
                <select id="position" name="position" class="form-select">
                    <option selected>กรุณาเลือกตำแหน่ง</option>
                    
                </select>
           
            </div> -->
            <!-- <div class="col-md-1">
                            <button style="margin-top: 32px;" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            +
                            </button>
                                </div> -->

                                <!-- Modal -->
                            <!-- <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                            <div class="modal-dialog">
                            

                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel2">เพิ่มตำแหน่ง</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <div class="col-md-12">
                                    <label for="Name_P" class="form-label">ชื่อตำแหน่ง: </label>
                                    <input type="text" class="form-control" id="Name_P" name="Name_P">
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="submit"  class="btn btn-outline-success" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                    <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
                                    </svg>    
                                    บันทึก</button>
                                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>    
                                    ปิด</button>
                                </div>
                                </div>
                            </div>
                            </div> -->




           
            <div class="col-md-4">
                <label for="tel" class="form-label">เบอร์โทรศัพท์: </label>
                <input type="text" class="form-control" id="tel" name="tel"value="{{$staff->tel}}">
            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">Email: </label>
                <input type="email" class="form-control" id="email" name="email"value="{{$staff->email}}">
            </div>
            <div class="col-md-4">
            
                <label for="status" class="form-label">สถานะการใช้งาน: </label>
                <br>

                    @if($staff->status  == 1)
                    <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status" value="1"checked>
                <label class="form-check-label" >เปิด</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status" value="2">
                <label class="form-check-label" >ปิด</label>
                </div>
                        @elseif  ($staff->status  == 2)
                        <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status" value="1">
                <label class="form-check-label" >เปิด</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status" value="2"checked>
                <label class="form-check-label" >ปิด</label>
                </div>

                @else
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status" value="1">
                <label class="form-check-label" >เปิด</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status" value="2">
                <label class="form-check-label" >ปิด</label>
                </div>

                    @endif
                <!-- <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status" value="1">
                <label class="form-check-label" >เปิด</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status" value="2">
                <label class="form-check-label" >ปิด</label>
                </div> -->
                
            </div>
            <div class="form-group">
                    <label for="fileIcon"  class="control-label col-12">อัพโหลดไฟล์:</label> 
                    <div class="col-12">
                    <input type="file" class="form-control"   name="fileIcon" id="fileIcon" value="{{$staff->fileIcon}}">
                </div>
                </div> 

                                 
       
        
            </div>
    </div>
    <div class="col-md-4">
        <div class="card-header"style="background-color: DarkOrange; color:white;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
  <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
  <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z"/>
</svg>&nbsp; &nbsp;อัพโหลดรูปภาพ</div>


        <div class="card-body">
        <input type="file"  class="form-control" name="picIcon" id="picIcon" value="{{$staff->picIcon}}">

        <input type="hidden" name="old_image" value="{{$staff->picIcon}}">
        <div class="image-preview" id="imagePreview">
                        <img src="" alt="Image Preview" class="image-preview__image">
                        <img class="image-preview__default-text" src="{{ asset('image/staff/' . $staff->picIcon) }}" alt=""   height="85%"title="">
                        <!-- <img src="{{ asset('image/staff/' . $staff->picIcon) }}" alt="" width="265px" height="auto" title="">    ไว้เช็คว่า ถ้าหากจะอัพรูปใหม่ต้องทำการหารูปใหม่แทนรูปเก่า -->
                    </div>
        </div>

    </div>
    &nbsp; &nbsp;&nbsp; <div class="col-md-6">  
            <button type="submit"  name ="submit"class="btn btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
            </svg>
            บันทึกข้อมูล</button>
            <!-- <a href="department.php" class="btn btn-success">เพิ่มแผนก</a>
            <a href="position.php" class="btn btn-info">เพิ่มตำแหน่ง</a> -->
            <!-- <a href="uploadfile.php" class="btn btn-dark">อัพโหลดไฟล์</a> -->
            <a href="{{route('staff')}}" class="btn btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
            <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg>
            ย้อนกลับ</a>
            </div>
         </form>
    </div>
    </div>


    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script>
    const picIcon = document.getElementById("picIcon");
    const previewContainer = document.getElementById("imagePreview");
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");


    picIcon.addEventListener("change", function(){
        const file = this.files[0];

        if (file) {
            const reader = new FileReader()

            previewDefaultText.style.display = "none";
            previewImage.style.display = "block";

            reader.addEventListener("load", function(){
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
</script>
</body>
</html>