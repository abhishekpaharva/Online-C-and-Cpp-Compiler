<?php
    error_reporting(E_NOTICE^E_ALL);
    if(isset($_POST['code']))
    {
        $output = "";
        $code = "";
        $inpt = "";
        include "cpp_compiler.php";
        include "c_compiler.php";
        
        $lang = $_POST['lang'];
        switch($lang)
        {
            case "C": c_compiler();
                        break;
            case "c++": cpp_compiler();
                        break;
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Online Compiler</title>
    <style type="text/css">
        
    </style>
    <link rel="stylesheet" type="text/css" href="CSS/textbox.css">
</head>
<body>
<div>
    <form action="index.php"  method="POST">
        <b>CODE:</b><br>
        <textarea name="code" class = "box" id = "code"><?php echo $code ?></textarea><br>
        <b>INPUT:</b><br>
        <textarea name="inpt" class = "box" id = "inpt"><?php echo $inpt; ?></textarea><br>
        <select name="lang">
            <option value="C">C (gcc)</option>
            <option value="c++">C++ (g++)</option>
        </select>
        <input type="submit" value = "SUBMIT">
    </form>
        <?php echo $output; ?>
</div>
</body>
</html>