<?php include 'header.php'; ?>
<form class="form-horizontal" action="update_process.php" style="font-size: 20px;" method="post">
            <div class="form-group">
              <div class="col-xs-12">
                <input type="password" class="form-control" name="auth" placeholder="Authentication Key"/>
              </div>
            </div>
          <div class="form-group">
            <div class="col-xs-12">
              <input type="text" class="form-control" name="reason" placeholder="Transaction Reason"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <input type="number" class="form-control" name="value" placeholder="Transaction Value"/>
            </div>
          </div>
          <label class="control-label radio-inline"><input type="radio" value="deposit" name="type">Deposit</label>
          <label class="control-label radio-inline"><input type="radio" value="withdraw" name="type">Withdraw</label>
          <br/><br/>
          <button type="submit" name="submit" value="submit" class="btn btn-md bg-primary">Update</button>
        </form>
<?php include 'footer.php'; ?>