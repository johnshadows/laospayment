<?php 
    require_once('./__head.php');

$string = '';

    switch($_GET['page']){
        case 'deposit' : $string='ฝาก';
            break;
        case 'withdraw': $string ='ถอน';
    }
  
?>


<div class="container-fluid" style="margin-top:50px">
    <div class="row">
        <div class="col">
        
       
        <div class="card text-center">
            <div class="card-header">
            <h1>การ<?echo $string ?>เงิน <? echo $_GET['broker'] ?> </h1>

            
            
            </div>

            <? if($_GET['page']=='deposit' && $_GET['broker']=='xm'){ ?>
            <div class="content">
                    
                    <ul>
                        <li id="how-to">ให้ท่านล็อคอินไปยังหน้าสมาชิก <a href="https://www.xm.com/">WWW.XM.COM</a></li>
                        <li id="how-to">จากนั้นเลือกเมนู “บัญชี” และคลิกที่ตัวเลือก “สมัครสมาชิกกับผู้ฝากเงินท้องถิ่น” ตามภาพ</li>
                           <img class="card-img" src="../assets/images/howto/depositxm1.png" alt=""> 
                        <hr/>
                        <p style="margin-top:20px; text-align:left; font-size:20px"> ให้ท่านกรอกหมายเลข  <strong style="color:green">IB 12012361 Jirat Thongrod</strong></p>
                        <img class="card-img" src="../assets/images/howto/depositxm2.png" alt="">
                        
                        <hr/>
                        <li id="how-to">การดำเนินการยืนยันการฝากเงินเสร็จสมบูรณ์</li>
                        <img class="card-img" src="../assets/images/howto/depositxm3.png" alt="">
                        
                    </ul>
                    


            </div> 

                <div class="card-footer">
                    <div class="row text-center">
                        <div class="col">
                            <a href="../" class="btn btn-primary">กลับหน้าหลัก</a>
                        </div>
                        <div class="col">
                            <a href="../exchange?broker=xm&type=deposit"" class="btn btn-success">ไปยังหน้าฟอร์มแจ้งฝากเงิน</a>
                        </div>
                    </div>
                </div>
            <?}?>


            
            <? if($_GET['page']=='deposit' && $_GET['broker']=='exness'){ ?>
            <div class="content">
                deposit exness
            </div>  <?}?>

            

            <? if($_GET['page']=='withdraw' && $_GET['broker']=='xm'){ ?>
            <div class="content">

                    <ul>
                        <li id="how-to">ให้ท่านล็อคอินไปยังหน้าสมาชิก <a href="https://www.xm.com/">WWW.XM.COM</a></li>
                        <li id="how-to">จากนั้นให้ท่านเลือกเมนู โอนเงิน ลูกค้า -> IB</li>
                           <img class="card-img" src="../assets/images/howto/withdraw1.png" alt=""> 
                        <hr/>
                        <p style="margin-top:20px; font-size:20px"> เลือก IB และใส่จำนวนเงินที่ต้องการถอน กรอก IB หมายเลข <strong>12012361 Jirat Thongr</strong></p>
                        <br>
                        <img class="card-img" src="../assets/images/howto/withdraw2.png" alt="">
                        
                        <hr/>
                        <li id="how-to">ตรวจสอบความถูกต้องและคลิกยืนยัน</li>
                        <img class="card-img" src="../assets/images/howto/withdraw3.png" alt="">
                        <hr/>
                        <li id="how-to">การดำเนินการของท่านเสร็จสิ้นจากนั้นให้ท่านแจ้งถอนเงินที่ฟอร์มการถอนเงินได้เลยค่ะ</li>
                        <img class="card-img" src="../assets/images/howto/withdraw4.png" alt="">
                    </ul>
                    
                    
                    

            </div> 
            
            <div class="card-footer">
                        <div class="row text-center">
                            <div class="col">
                                <a href="../" class="btn btn-primary">กลับหน้าหลัก</a>
                            </div>
                            <div class="col">
                                <a href="../exchange?broker=xm&type=withdraw"" class="btn btn-danger">ไปยังหน้าฟอร์มแจ้งถอนเงิน</a>
                            </div>
                        </div>
                    </div>
            <?}?>






            <? if($_GET['page']=='withdraw' && $_GET['broker']=='exness'){ ?>
            <div class="content">
                        
                    <ul>
                        <li id="how-to">ขั้นแรกให้ท่านล็อคอินเข้าได้ยังพื้นที่สมาชิกของทาง Exness <a href="https://www.exness.com/intl/th/member/">https://www.exness.com/intl/th/member/</a></li>
                        <li id="how-to">จากนั้นให้ท่านเลือกเมนูโอนจากบัญชีที่ท่านต้องการถอนเงิน</li>
                        <br>
                           <img class="card-img" src="../assets/images/howto/withdrawexness1.png" alt=""> 
                        <hr/>
                        
                        <hr/>
                        <li id="how-to">จากนั้นให้ท่านเลือก การโอนเงินไปยังบัญชีอื่น โดยให้โอนเงินไปที่บัญชี <strong style="color:red">858342</strong> และกรอกอีเมล <strong style="color:red">forexacademy39@gmail.com</strong> <br> จากนั้นเลือกจำนวนเงินที่ท่านต้องการถอน</li>
                        <img class="card-img" src="../assets/images/howto/withdrawexness2.png" alt="">
                        <li id="how-to">เมื่อดำเนินการโอนเรียบร้อยแล้วให้ท่านแจ้งข้อมูลการโอนไปยังฟอร์มแจ้งการถอนเงิน</li>
                    </ul>
                    
            </div>  
            
            <div class="card-footer">
                <div class="row text-center">
                    <div class="col">
                        <a href="../" class="btn btn-primary">กลับหน้าหลัก</a>
                    </div>
                    <div class="col">
                        <a href="../exchange?broker=exness&type=withdraw"" class="btn btn-success">ไปยังหน้าฟอร์มแจ้งฝากเงิน</a>
                    </div>
                </div>
            </div>

            <?}?>


            </div>
            

        </div>
    </div>
</div>

<style>
    
img{
    max-width:620px !important;
}

    </style>

<?php 
    require_once('./__footer.php');
?>
