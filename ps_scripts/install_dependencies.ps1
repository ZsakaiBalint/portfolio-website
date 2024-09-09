# Set execution policy for scripts
Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser

# Install Scoop (only if it is not already installed)
if (!(Get-Command scoop -ErrorAction SilentlyContinue)) {
    Invoke-RestMethod -Uri https://get.scoop.sh | Invoke-Expression
} else {
    Write-Host "Scoop is already installed."
}
# add scoop to the user defined environment variables (if not already present)
if(!(echo $env:PATH | Select-String "scoop")) {
    [Environment]::SetEnvironmentVariable("PATH", $env:PATH + ";$env:USERPROFILE\scoop\shims", [EnvironmentVariableTarget]::User)
    Write-Host "Please restart powershell and start this script again!"
    Write-Host "This is important to ensure Powershell recognizes the scoop command."
    # Wait for a key press before exiting
    Write-Host "Press any key to exit..."
    $null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")
    exit
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


# Install NodeJS (only if it is not already installed)
if (!(scoop list | Select-String "nodejs")) {
    scoop install main/nodejs
} else {
    Write-Host "Composer is already installed."
}


# Install Symfony CLI (only if it is not already installed)
if (!(scoop list | Select-String "symfony-cli")) {
    scoop install symfony-cli
} else {
    Write-Host "Symfony CLI is already installed."
}