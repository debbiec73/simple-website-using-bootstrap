<ul class="nav nav-pills">
    <li><a href="quote.php">Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="addcash.php">Add Cash</a></li>
    <li><a href="logout.php"><strong>Log Out</strong></a></li>
</ul>
<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <select class="form-group" name="symbol">
            <option value =" "> </option>
            
            <?php
            foreach($stocks as $symbol)
            {
                echo("<option value = '$symbol'>" . $symbol . "</option>");
            }
            ?>
        </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Sell Shares</button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">log in</a>
</div>
