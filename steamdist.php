<?php

function createPsScript($directory){
	require_once 'config.php';
	$directory = substr($directory,strrpos($directory,"/") +1);
	$psScript = <<<EOF
	echo "Checking for running Steam process"
\$ProcessActive = Get-Process steam -ErrorAction SilentlyContinue
if(\$ProcessActive -ne \$null){
	echo "Stopping Steam"
	Stop-Process \$ProcessActive.Id
}
echo "Begin copying app files"
Copy-Item -path "$clientAppsPath/$directory" -dest "$clientSteamPath" -verbose -recurse

echo "Finished Copying Files"
		
Remove-Item \$MyInvocation.InvocationName
EOF;
	$filename = "temp/{$directory}.ps1";

	file_put_contents($filename, $psScript);
	return $filename;
}

if(isset($_GET['app']) && !empty($_GET['app'])){
	$psFile = createPsScript($_GET['app']);
	header('Content-Type: application/powershell');
	header('Content-Disposition: attachment; filename="' . str_replace("temp/","",$psFile) . '"');
	echo file_get_contents($psFile);
}
