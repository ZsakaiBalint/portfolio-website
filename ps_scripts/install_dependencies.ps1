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

# Install Symfony CLI (only if it is not already installed)
if (!(scoop list | Select-String "symfony-cli")) {
    scoop install symfony-cli
} else {
    Write-Host "Symfony CLI is already installed."
}