<?php

    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a stock symbol.");
        }

        $stock = lookup($_POST["symbol"]);
        
        if($stock === false)
        {
            apologize("Please enter a valid stock symbol.");
        }
        
        else
        {
            render("quote.php", ["title" => "Display Quote", "symbol" => $stock["symbol"], "name" => $stock["name"], "price" => $stock["price"]]);
        }
            
     }
     
      else
    {
        // else render form
        render("quote_form.php", ["title" => "Look up Quote"]);
    }// TODO
   
    
?>
