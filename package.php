<?php

/* vim: set noexpandtab tabstop=4 shiftwidth=4 foldmethod=marker: */

require_once 'PEAR/PackageFileManager2.php';

$version = '1.11.2-so1';
$api_version = '1.11.2';
$notes = <<<EOT
No release notes for you!
EOT;

$description =<<<EOT
jQuery is a fast, small, and feature-rich JavaScript library. It makes things
like HTML document traversal and manipulation, event handling, animation, and
Ajax much simpler with an easy-to-use API that works across a multitude of
browsers. With a combination of versatility and extensibility, jQuery has
changed the way that millions of people write JavaScript.

This package provides jQuery in a manner compatibile with silverorange PEAR
packages.
EOT;

$package = new PEAR_PackageFileManager2();
PEAR::setErrorHandling(PEAR_ERROR_DIE);

$result = $package->setOptions(
	array(
		'filelistgenerator' => 'file',
		'simpleoutput'      => true,
		'baseinstalldir'    => '/',
		'packagedirectory'  => './',
		'dir_roles'         => array(
			'www'          => 'data',
			'/'            => 'data',
		),
		'exceptions'              => array(
			'LICENSE'             => 'doc',
			'README.md'           => 'doc',
		),
	)
);

$package->setPackage('jQuery');
$package->setSummary('A fast, small, and feature-rich JavaScript library.');
$package->setDescription($description);
$package->setChannel('pear.silverorange.com');
$package->setPackageType('php');
$package->setLicense(
	'MIT License',
	'http://www.opensource.org/licenses/mit-license.html'
);

$package->setReleaseVersion($version);
$package->setReleaseStability('stable');
$package->setAPIVersion($api_version);
$package->setAPIStability('stable');
$package->setNotes($notes);

$package->addIgnore('package.php');

$package->addMaintainer('lead', 'gauthierm', 'Mike Gauthier', 'mike@silverorange.com');

$package->setPearinstallerDep('1.4.0');
$package->generateContents();

if (isset($_GET['make']) || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')) {
	$package->writePackageFile();
} else {
	$package->debugPackageFile();
}

?>
