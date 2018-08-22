<?php
	function cpp_compiler() {
        $GLOBALS['code'] = $_POST['code'];
        $GLOBALS['inpt'] = $_POST['inpt']; 

        $fp = fopen("test.cpp","w+") or die("file not created");
        fwrite($fp,$GLOBALS['code']);
        fclose($fp);

        shell_exec("g++ test.cpp -o test 2> testerror.txt");

        if(filesize("testerror.txt") > 0) {
        	$fp = fopen("testerror.txt","r");
            $GLOBALS['output'] = fread($fp,filesize("testerror.txt"));
            fclose($fp);
        }
        else {
        	$fp = fopen("input.txt","w+");
        	fwrite($fp,$GLOBALS['inpt']);
        	fclose($fp);

        	$GLOBALS['output'] = shell_exec("./test < input.txt");
        }
	}
?>
