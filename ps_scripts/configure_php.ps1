#this script adds a configuration file (php.ini) to the downloaded php version
$dest = scoop prefix php
$dest = $dest + "\ext"
$source = Get-Location
$source = $source.Path
$source = $source + "\php.ini"
 
$extensionDir = "extension_dir = $dest"
$newLine = "`n$extensionDir"
Add-Content -Path $source -Value $newLine -Encoding UTF8

$dest = scoop prefix php
Copy-Item -Path $source -Destination $dest