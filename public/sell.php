<?php

    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // lookup to get current stock info
        $stock = lookup($_POST["symbol"]);
    
    // select shares to sell and get value of those stocks
    $shares_to_sell = query("SELECT shares FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
    $sell_value = $stock["price"] * $shares_to_sell[0]["shares"];
    
    // update users cash
    query("UPDATE users SET cash = cash + $sell_value WHERE id = ?", $_SESSION["id"]);
    
    // delete from users portfolio
    query("DELETE FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
    
    // add transaction to history
    $transaction = 'Sell';
    query("INSERT INTO history (id, transaction, symbol, shares, price) VALUES (?, ?, ?, ?, ?)", $_SESSION["id"], $transaction, $_POST["symbol"], $shares_to_sell[0]["shares"], $stock["price"]);
    redirect("/");   
    }   
    else
    {
    $rows = query("SELECT * FROM portfolio WHERE id = ?", $_SESSION["id"]);
    $stocks = [];
    foreach ($rows as $row)
    
    {
        $stock = $row["symbol"];
        $stocks[] = $stock;
    }
    
    // render sell form
    render("sell_form.php", ["title" => "Sell Form", "stocks" => $stocks]);
    
    }
?>

