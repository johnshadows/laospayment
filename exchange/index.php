<?php 
require('__head.php');
if (!isset($_GET['type']) && !isset($_GET['broker'])) {
  header("location: ../");
  exit(0);
}
$type = '';
$currency ='';
	switch($_GET['type']){
		case 'deposit': {$type='ฝากเงิน';$currency='LAK' ;}
			break;
		case 'withdraw': {$type='ถอดเงิน'; $currency='USD';}
			break;
		default : header("location: ../");
	}

?>



 <div class="container" style="margin-top:20px">
	
          <div class="row">

            <div class="col-md">
				<div class="card">
					<div class="card-header">
					<h1 style="margin-top:20px"><? echo $type ?> <? echo $_GET['broker']; ?></h1>
					</div>
					<div class="content">
							
							
							<? if(isset($_GET['error'])) echo $_GET['error']; ?>

              <form method="post" action="" enctype="multipart/form-data" id="mainform">
				<div class="form-row">

					<div class="form-group col-md">
					<label for="f_name">ชื่อ - สกุล*</label>
					<input type="text" name="f_name" class="form-control" id="f_name" placeholder="ชื่อ - สกุล" required value="<?php echo !empty($postData['f_name'])?$postData['f_name']:''; ?>">
					</div>

					<div class="form-group col-md">
					<label for="f_emal">อีเมล Email*</label>
					<input type="email" name="f_emal" class="form-control" id="f_emal" placeholder="กรุณากรอกอีเมล" required value="<?php echo !empty($postData['f_emal'])?$postData['f_emal']:''; ?>">
					</div>

					<div class="form-group col-md">
					<label for="f_amount">จำนวนเงินฝาก*  <small style="color:red"> <? echo $currency ?></small></label>
					<input type="number" name="f_amount" class="form-control" id="f_amount" placeholder="จำนวนเงิน <? echo $currency ?>" required value="<?php echo !empty($postData['f_amount'])?$postData['f_amount']:''; ?>">
					</div>

					<div class="form-group col-md">
					<label for="f_mt4">เลข MT4*</label>
					<input type="number" name="f_mt4" class="form-control" id="f_mt4" placeholder="เลข MT4" required value="<?php echo !empty($postData['f_mt4'])?$postData['f_mt4']:''; ?>">
					</div>
					
				</div>
				<div class="form-row">
					<div class="form-group col-sm">
						<label for="f_date">วันที่*</label>
						<!-- <div id="datetimepicker12"></div> -->
						<input type="text" name="f_date" class="form-control" id="datetimepicker12">
						</div>
			
					<div class="form-group col-sm">
						<label for="f_attachment">หลักฐานการโอน* <small style="color:red">(ไฟล์ jpg , png , pdf ขนาดไม่เกิน 2 MB)</small></label>
						<input type="file" name="f_attachment" class="form-control" id="f_attachment" required>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col">
						<label for="f_message">ข้อความ</label>
						<textarea class="form-control" rows="4" cols="50" name="f_message"></textarea>
					</div>
					<input type="text" name="f_currency" hidden value="<? echo $currency ?>">
				</div>
				
				<button type="submit" id="submit" name="submit" class="btn btn-sm btn-primary btn-block">ส่งหลักฐาน</button>
				<!-- <button type="back" class="btn btn-sm btn-warning btn-block">กลับหน้าหลัก</button> -->
				</form>
				<!-- <label id="result-text" style="display:none" for="">กำลังโหลด...</label> -->
				</div>
				</div>
            </div>
		  </div>
	
        </div>
      </div>
	</div>
	

<script>
$(document).ready(function() {
    // เมื่อฟอร์มการเรียกใช้ evnet submit ข้อมูล        
    $("#mainform").on("submit",function(e){
        e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax
		$('#submit').html('กำลังส่งข้อมูล');
		$('#submit').prop('disabled',true);
        // เตรียมข้อมูล form สำหรับส่งด้วย  FormData Object
       var formData = new FormData($(this)[0]);
        // ส่งค่าแบบ POST ไปยังไฟล์ show_data.php รูปแบบ ajax แบบเต็ม
        $.ajax({
            url: 'sendmail.php',
            type: 'POST',
            data: formData,
         	cache: false,
            contentType: false,
            processData: false,
			dataType: "json"
        }).done(function(data){
			// console.log(data.success);
			let title = '';
			let text = '';
			let type = '';

			switch(data.success){
				case true: {title= 'ส่งข้อมูลสำเร็จ';  text='กรุณารอการตอบกลับทาง Email'; type='success'  }
					break;
				case false: {title= 'ล้มเหลว';  text='กรุณาลองใหม่อีกครั้ง'; type='error'  }
					break;
				case 'big': {title= 'เกิดข้อผิดพลาด';  text='ไฟล์ใหญ่เกินไป'; type='error'  }
					break;
				case 'type': {title= 'เกิดข้อผิดพลาด';  text='คุณอัปโหลดไฟล์ผิดประเภท Email'; type='error'  }
					break;						
				default:
					 return('Error');
				}  
				swal(title,text,type);
				$('#submit').html('ส่งหลักฐาน');
				$('#submit').prop('disabled',false);
	      });     
	   });
});
</script>

    <?php require('__footer.php'); ?>
