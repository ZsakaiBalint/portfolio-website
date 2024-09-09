# Check if the script is running with admin privileges
if (-not ([Security.Principal.WindowsPrincipal] [Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole] "Administrator"))
{
    Write-Warning "This script needs to be run as an administrator!"
    exit
}

$phpIniContent = @"
;;;;;;;;;;;;;;;;;;;;;;;;;;
; PHP Configuration File ;
;;;;;;;;;;;;;;;;;;;;;;;;;;

; Enable mbstring extension
extension=mbstring

; Enable intl extension
extension=intl

; Enable PDO and common PDO drivers
extension=pdo_mysql
extension=pdo_pgsql
; Uncomment or add any additional PDO drivers as needed
; extension=pdo_sqlite

; Enable PHP accelerator (Opcache)
zend_extension=opcache

; Opcache settings (optional, but recommended for performance)
opcache.enable=1
opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=10000
opcache.revalidate_freq=2
opcache.fast_shutdown=1

; Set realpath_cache_size to at least 5M
realpath_cache_size=5M

; Additional settings you might want to tweak based on your environment
max_execution_time=30
memory_limit=128M
error_reporting=E_ALL
display_errors=Off
log_errors=On
error_log="C:\path\to\php-error.log"

; PDO-related settings
pdo_mysql.default_socket="C:/path/to/mysql.sock"
; Adjust settings for other drivers if needed

; Enable openssl
extension=openssl

;disable short_open_tag
short_open_tag = Off
"@

$dest = scoop prefix php
$dest = $dest + "\ext"
$source = Get-Location
$source = $source.Path
$source = $source + "\php.ini"
 
$newLine = "extension_dir = $dest"
$newLine = "`n$newLine"
$phpIniContent += $newLine

$dest = scoop prefix php
# Create a new php.ini file 
# TODO
# add content to php.ini with the content defined above
Set-Content -Path $source -Value $phpIniContent -Encoding UTF8

#copy the php.ini file to it's final place
$dest = scoop prefix php
Copy-Item -Path $source -Destination $dest
# Output the path where the new php.ini was copied
Write-Host "New php.ini file created at: $dest"

# Delete any existing php.ini file in the current directory (ps_scripts dir)
if (Test-Path $source) {
    Remove-Item $source
}
