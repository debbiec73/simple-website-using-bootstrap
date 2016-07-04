<?php

    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["symbol"]) || empty($_POST["shares"]))
        {
            apologize("Please enter a stock symbol and the number of shares you would like to purchase");
        }
        
        if(lookup($_POST["symbol"]) === false)
        {
            apologize("Please enter a valid stock symbol");
        }
        
        if(preg_match("/^\d+$/", $_POST["shares"]) === false)
        {
            apologize("Please enter a positive number of stocks to buy");
        }
        
        else
        {
            // lookup current stock price and define transaction type
            $transaction = 'Buy';
            $stock = lookup($_POST["symbol"]);
            
            // find the cost of shares
            $cost_of_shares = $stock["price"] * $_POST["shares"];
            
            // make sure user has the money to purchase stocks
             $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
             
            if($cash < $cost_of_shares)
            {
                apologize("You don't have enough money for that transaction.");
            }
            else
            {
                // capitalize stock symbol for database
                $_POST["symbol"] = strtoupper($_POST["symbol"]);
            }
            
            
            // insert into portfolio
            query("INSERT INTO portfolio (id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", 
            $_SESSION["id"], $_POST["symbol"], $_POST["shares"]);
            
            // update cash balance
            query("UPDATE users SET cash = cash - ? WHERE id = ?", $cost_of_shares, $_SESSION["id"]);
            
            // add transaction to history
            
            query("INSERT INTO history (id, transaction, symbol, shares, price) VALUES (?, ?, ?, ?, ?)", $_SESSION["id"], $transaction, $_POST["symbol"], $_POST["shares"], $stock["price"]);
            redirect("/");
           
        }
   }
   else
    {     
       
    // render buy form
    render("buy_form.php", ["title" => "Buy Form"]);
        }
   
?>

