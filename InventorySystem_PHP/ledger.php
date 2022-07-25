<?php
  $page_title = 'Balance Sheet';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  
?>
<?php
 if(isset($_POST['balance_sheet'])){
   $req_fields = array('name','category','phoneno','lend', 'paid' );
   validate_fields($req_fields);
   if(empty($errors)){
     $name  = remove_junk($db->escape($_POST['name']));
     $category   = remove_junk($db->escape($_POST['category']));
     $phoneno  = remove_junk($db->escape($_POST['phoneno']));
     $lend  = remove_junk($db->escape($_POST['lend']));
     $paid  = remove_junk($db->escape($_POST['paid']));
     

     $query  = "INSERT INTO ledger_book(";
     $query .=" name,category,phoneno,lend,paid";
     $query .=") VALUES (";
     $query .=" '{$name}', '{$category}', '{$phoneno}', '{$lend}', '{$paid}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"User added ");
       redirect('balance_sheet.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('ledger.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('ledger.php',false);
   }

 }

?>




<style>
  .ledger{
    width:1260px;
    height:100px;
    background-color:#2670AF;
    position: relative;
    top:-50px;
    left:-30px;
    color:white;
    display:flex;
    flex-grow:center;
    
  }
  .heading{
    text-align:center;
    padding-left:40%;
    font-weight:bold;
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;

  }
  
</style>


<?php include_once('layouts/header.php'); ?>



<div class="ledger">
<h1 class="heading">Ledger Sheet</h1>
</div>
<div class="row1">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Add User</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Full Name" style="width:150px";>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" name="category" placeholder="Category" style="width:150px";>
            </div>
            <div class="form-group">
                <label for="phone">Mobile Number</label>
                <input type="tel" class="form-control" name ="phoneno"  placeholder="Mobile Number" style="width:150px";>
            </div>


            <div class="form-group">
                <label for="lend">Total Lend</label>
                <input type="number" class="form-control" name ="lend"  placeholder="Lend Money" style="width:150px";>
            </div>

            <div class="form-group">
                <label for="paid">Paid</label>
                <input type="number" class="form-control" name ="paid"  placeholder="Paid" style="width:150px";>
            </div>

            <div>
                  <button id="balance" type="submit" name="balance_sheet" class="btn btn-danger">Check data </button>
               </div>
              </div>
             
        </form>
        </div>

    


<?php include_once('layouts/footer.php'); ?>



