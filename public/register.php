<?php

    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide a username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide a password.");
        }
        
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apolgize("Your passwords did not match.");
        }
        
        $result = query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]));
        
        if($result === false)
        {
            apologize("That username is already being used.  Please choose a different username.");
        }
        
        else
        {
            $rows = query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];

            // remember that user's now logged in by storing user's ID in session
            $_SESSION["id"] = $rows[0]["id"];

            // redirect to portfolio
            redirect("index.php");
            
        }// TODO
    }
    
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }
    
    ?>
