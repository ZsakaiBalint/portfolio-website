# PowerShell script to copy contents of a folder to another folder
$source = "path\to\source\folder\*"
$destination = "path\to\destination\folder\"

Copy-Item -Path $source -Destination $destination -Recurse -Force