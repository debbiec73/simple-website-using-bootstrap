<?php

    // configuration
    require("../includes/config.php");
    $transaction = 'Add Cash';
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["cash"]))
        {
            apologize("You must provide an amount of cash to add to your portfolio.");
        }
        else
        {
        // get user cash
        $cash = query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["cash"], $_SESSION["id"]);
    
        // add to history table
        query("INSERT INTO history (id, transaction, price) VALUES (?, ?, ?)", $_SESSION["id"], $transaction, $_POST["cash"]);
       
        }
    }
    // render history_portfolio
    render("addcash_form.php", ["title" => "Add Cash Form"]);

?>
