<?php

    // configuration
    require("../includes/config.php");
    
    $positions = [];
    $rows = query("SELECT symbol, shares FROM portfolio WHERE id = ?", $_SESSION["id"]);
    foreach ($rows as $row)
    
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
            
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"],
                "total" => $row["shares"] * $stock["price"]
                
            ];
        }
    }
    
    $cashs = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    foreach ($cashs as $cash)
    {
        //echo($cash["cash"]);
    }
    
    // render portfolio
    render("portfolio.php", ["positions" => $positions, "cash" => $cash, "title" => "Portfolio"]);

?>
