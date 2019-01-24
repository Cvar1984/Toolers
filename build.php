#!/usr/bin/env php
<?php
define('SRC',__DIR__.'/src');
define('BUILD',__DIR__.'/build');

$phar = new Phar(BUILD.'/main.phar',FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::KEY_AS_FILENAME, 'main.phar');

$phar['main.php'] = file_get_contents(SRC."/main.php");
$phar['main.class.php'] = file_get_contents(SRC.'/main.class.php');
$phar->setStub( "#!/usr/bin/env php\n".$phar->createDefaultStub('main.php'));
chmod(BUILD.'/main.phar',0777);