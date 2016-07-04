<ul class="nav nav-pills">
    <li><a href="quote.php">Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="logout.php"><strong>Log Out</strong></a></li>
</ul>

<form action="addcash.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="cash" placeholder="Amount ex: 100.00" type="text"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Add Cash</button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">log in</a>
</div>
