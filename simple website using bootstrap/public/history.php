<?php

    // configuration
    require("../includes/config.php");
    
    // get user cash
    $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    
    // create history table from all user transactions
    $table = query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);
    
    
    // render history_portfolio
    render("history_portfolio.php", ["title" => "History", "cash" => $cash, "table" => $table]);

?>
