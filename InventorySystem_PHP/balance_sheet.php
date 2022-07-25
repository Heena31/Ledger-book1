<?php
  $page_title = 'All User Data';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
  $ledgers = ledgerbook();
?>


<?php include_once('layouts/header.php'); ?>

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="ledger.php" class="btn btn-primary">Add New user</a>
         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 10%;">#</th>
                <th class="text-center" style="width: 20%;">Name</th>
                <th class="text-center" style="width: 20%;"> Category</th>
                <th class="text-center" style="width: 20%;"> Phone Number </th>
                <th class="text-center" style="width: 10%;"> Lend Money </th>
                <th class="text-center" style="width: 10%;"> Paid </th>
                <th class="text-center" style="width: 20%"> Balance</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($ledgers as $ledger_book):?>
                <?php 
                $msg="Cleared";
                $cal=$ledger_book['lend']-$ledger_book['paid'];
                if($cal>=0)
                {
                  $ledger_book['balance']=$cal;
                }
               else
               $ledger_book['balance']=$msg;
                
                ?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td class="text-center"> <?php echo remove_junk($ledger_book['name']); ?></td>
                <td class="text-center"> <?php echo remove_junk($ledger_book['category']); ?></td>
                <td class="text-center"> <?php echo remove_junk($ledger_book['phoneno']); ?></td>
                <td class="text-center"> <?php echo remove_junk($ledger_book['lend']); ?></td>
                <td class="text-center"> <?php echo remove_junk($ledger_book['paid']); ?></td>
                <td class="text-center"> <?php echo remove_junk($ledger_book['balance']); ?></td>
                <td class="text-center">
               
                </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </tabel>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
