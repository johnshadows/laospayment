<?php 
include_once('./include/connect.php');
require('__head.php');

$query = "SELECT * FROM `rate` where id = 1";
$result =mysqli_query($conn,$query) or die(mysql_error());

$ratenow = mysqli_fetch_array( $result );

?>
  <div class="container">

  

               <header class="masthead">
                         <div class="container">
                    
                         <div class="intro-text">
                              <div class="intro-lead-in">LAOS PAYMENT</div>
                              <div class="text-small">บริการของเรา</div>
                              <div class="col" style="padding:20px;">
                                   <img src="assets/images/BCELLOGO.png" alt="" style="max-height:50px;">
                                   <img src="assets/images/XM.png" alt="" style="max-height:50px;">
                                   <img src="assets/images/Exness.png" alt="" style="max-height:50px;">
                              </div>

                              <a href=""  data-toggle="modal" data-target="#modaldeposit" class="btn btn-primary">แจ้งฝากเงินตอนนี้ !</a>
                              <a href=""  data-toggle="modal" data-target="#modalwithdraw" class="btn btn-danger">แจ้งถอนเงินตอนนี้ !</a>
                         </div>
                         </div>
                    
                    
                    </header>
<hr />
<div class="container-fluid">

<div class="row">

<div class="col-md-4">
  <div class="card">
    <div class="content">
            <h1 style="margin-top:20px">เครื่องคำนวณ</h1>
            <div class="form-group">
                <label for="base">จำนวนเงิน</label>
                <input class="form-control" type="number" id="cal_amount" min="0">
            </div>
            <div class="form-group">
                <label for="base">แปลงจาก</label>
                  <select class="form-control" name="" id="cal_base" disabled>
                      <option value="USD">USD</option>
                      <option value="LAK">LAK</option>
                  </select>
            </div>


            <div class="form-group">
      		<label for="base">ไปเป็น</label>
                       <select class="form-control" name="" id="cal_to" disabled>
                            <option value="LAK">LAK</option>
                            <option value="USD">USD</option>
                       </select>
             </div>
             <div class="form-row">
                  <div class="col form-group">
                       <button id="colculate" class="btn btn-success form-control">แปลง</button>
                  </div>
                  <div class="col form-group">
                       <input class="inp-cal form-control" type="number" id="res" />
                  </div>
             </div>
    		</div>
      </div>
   </div>


   <div class="col-md">
     <div class="card">
       <div class="content">
            <h1 style="margin-top:20px">Rate ตอนนี้</h1>
        <strong>1$ = <? echo $ratenow[1] ?> LAK</strong>    
      </div>
     </div>
    </div>
    <!-- COL -->

  </div>
  <!-- ROW -->
</div>

   

<script>
     var base = null;
     var to = null;
     var res = 0;
     $(document).ready(function(){
          base = $('#cal_base').val();
          to = $('#cal_to').val();
     })

     $('#cal_base').on('change', function() {
          base = this.value;
     });

     $('#cal_to').on('change', function() {
          to = this.value;
     });

     $( "#colculate" ).click(function() {
     if(base=='USD' && to == 'LAK'){
       res = $('#cal_amount').val() * <? echo $ratenow[1] ?>;
       $('#res').val(res);
     }else if(base=='LAK' && to == 'USD'){

      res = <? echo $ratenow[1] ?> / $('#cal_amount').val();
       $('#res').val(res);
     }
     });

</script>


          <!-- Modal: modalCart -->
<div class="modal fade" id="modaldeposit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <!--Header-->
    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">เลือกโบรกเกอร์</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <!--Body-->
    <div class="modal-body">

      <table class="table table-hover">
        <thead>
          <tr>
            <th>โบรกเกอร์</th>
            <th>ฝากขั้นต่ำ</th>
            <th>ถอดขั้นต่ำ</th>
            <th>ทำรายการ</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><img style="max-height:50px" src="assets/images/XM.png" alt=""></td>
            <td>5$</td>
            <td>5$</td>
            <td><a class="btn btn-success" id="first" href="exchange?broker=xm&type=deposit">ฝาก</a></td>
          </tr>
          <tr>
            <td><img style="max-height:50px" src="assets/images/Exness.png" alt=""></td>
            <td>5$</td>
            <td>5$</td>
            <td><a class="btn btn-success" href="exchange?broker=exness&type=deposit">ฝาก</a></td>
          </tr>
        </tbody>
      </table>

    </div>
    <!--Footer-->
    <div class="modal-footer">
      <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
<!-- Modal: modalCart -->







      <!-- Modal: modalCart -->
      <div class="modal fade" id="modalwithdraw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <!--Header-->
    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">เลือกโบรกเกอร์</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <!--Body-->
    <div class="modal-body">

      <table class="table table-hover">
        <thead>
          <tr>
            <th>โบรกเกอร์</th>
            <th>ฝากขั้นต่ำ</th>
            <th>ถอดขั้นต่ำ</th>
            <th>ทำรายการ</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><img style="max-height:50px" src="assets/images/XM.png" alt=""></td>
            <td>5$</td>
            <td>5$</td>
            <td><a class="btn btn-danger" id="first" href="exchange?broker=xm&type=withdraw">ถอน</a></td>
          </tr>
          <tr>
            <td><img style="max-height:50px" src="assets/images/Exness.png" alt=""></td>
            <td>5$</td>
            <td>5$</td>
            <td><a class="btn btn-danger" href="exchange?broker=exness&type=withdraw">ถอน</a></td>
          </tr>
        </tbody>
      </table>

    </div>
    <!--Footer-->
    <div class="modal-footer">
      <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
<!-- Modal: modalCart -->





 
  
</div>

</div>
<?php require('__footer.php'); ?>
