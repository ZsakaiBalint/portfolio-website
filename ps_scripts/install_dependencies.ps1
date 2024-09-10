# Set execution policy for scripts
Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser

# Install Scoop (only if it is not already installed)
if (!(Get-Command scoop -ErrorAction SilentlyContinue)) {
    Invoke-RestMethod -Uri https://get.scoop.sh | Invoke-Expression
} else {
    Write-Host "Scoop is already installed."
}

# Install PHP (only if it is not already installed)
if (!(scoop list | Select-String "php")) {
    scoop install main/php
} else {
    Write-Host "PHP is already installed."
}

# Install Composer (only if it is not already installed)
if (!(scoop list | Select-String "composer")) {
    scoop install main/composer
} else {
    Write-Host "Composer is already installed."
}

# Install MySQL (only if it is not already installed)     
if (!(scoop list | Select-String "mysql")) {
    scoop install main/mysql
} else {
    Write-Host "MySQL is already installed."
}

# Install xampp (only if it is not already installed)     
if (!(scoop list | Select-String "xampp")) {
    scoop bucket add extras
    scoop install extras/xampp
} else {
    Write-Host "XAMPP is already installed."
}

