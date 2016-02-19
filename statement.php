<?php include 'header.php' ?>
    <form action="show_stmt.php" class="form-inline text-center" method="post">
        <div class="form-group">
            <label for="sel" class="pull-left">Select Month:&nbsp;</label>
            <select class="form-control" id="sel" name="month">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
        <div class="form-group" style="padding: 1%;">
            <label for="year" class="pull-left">Select Year:&nbsp;</label>
            <select class="form-control" id="year" name="year">
                <option value="2016">2016</option>
            </select>
        </div>
        <div class="form-group text-center" style="padding: 1%;">
            <button type="submit" class="btn btn-primary" name="submit">Get Statement</button>
        </div>        
    </form>
<script>
    var ele = document.getElementById('year');
    var d = new Date().getFullYear();
    var start_year = 2016;
    var diff = d - start_year;
    for(var i=1; i<=diff; i++){
        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode(start_year + i));
        opt.value = (start_year + i);
        ele.appendChild(opt);
    }
</script>
<?php include 'footer.php' ?>