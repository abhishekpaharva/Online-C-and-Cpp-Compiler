<?php
    function c_compiler() {
        $GLOBALS['code'] = $_POST['code'];
        $GLOBALS['inpt'] = $_POST['inpt'];

        $fp = fopen("test1.c","w+") or die("file not created");
        fwrite($fp,$GLOBALS['code']);
        fclose($fp);

        shell_exec("gcc test1.c -o test1 2> testerror.txt");

        if(filesize("testerror.txt") > 0) {
            $fp = fopen("testerror.txt","r");
            $GLOBALS['output'] = fread($fp,filesize("testerror.txt"));
            fclose($fp);
        }
        else {
            $fp = fopen("input.txt","w+");
            fwrite($fp,$GLOBALS['inpt']);
            fclose($fp);
            $GLOBALS['output'] = shell_exec("./test1 < input.txt");
        }
    }
?>
