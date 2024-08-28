# Running this script installs all developer tools on your machine

# Enable script execution
Set-ExecutionPolicy -Scope Process -ExecutionPolicy Bypass -Force

# Function to download and install a software package
function Install-Software {
    param (
        [string]$url,
        [string]$installerArgs = ""
    )
    
    $installerPath = "$env:TEMP\$(Split-Path $url -Leaf)"
    
    # Check for an existing file and delete it if it exists
    if (Test-Path $installerPath) {
        Remove-Item $installerPath -Force
    }
    
    # Download the file using WebClient
    $wc = New-Object System.Net.WebClient
    try {
        $wc.DownloadFile($url, $installerPath)
        Write-Host "Downloaded $installerPath"
    } catch {
        #Write-Host "Error downloading $url: $($_.Exception.Message)" # Corrected reference
        Write-Host "Error while downloading" # Corrected reference
        exit
    }

    # Check if the file is valid
    if (-not (Test-Path $installerPath) -or (Get-Item $installerPath).Length -eq 0) {
        Write-Host "Downloaded file is invalid or empty. Please check the URL."
        Remove-Item $installerPath -Force
        exit
    }
    
    Start-Process $installerPath -ArgumentList $installerArgs -Wait -Verbose
    Remove-Item $installerPath
}

# Function to set environment variables
function Set-EnvironmentVariable {
    param (
        [string]$variableName,
        [string]$variableValue
    )
    
    $existingValue = [System.Environment]::GetEnvironmentVariable($variableName, [System.EnvironmentVariableTarget]::Machine)
    
    if ($existingValue -notlike "*$variableValue*") {
        [System.Environment]::SetEnvironmentVariable($variableName, "$existingValue;$variableValue", [System.EnvironmentVariableTarget]::Machine)
    }
}

# Function to check if a software is installed
function Is-Installed {
    param (
        [string]$executablePath
    )
    return (Test-Path $executablePath)
}

#1. Check and Install Node.js (which includes npm)
$nodeExePath = "C:\Program Files\nodejs\node.exe"
if (-Not (Is-Installed -executablePath $nodeExePath)) {
    Write-Host "Node.js is not installed. Installing Node.js..."
    $nodeJsUrl = "https://nodejs.org/dist/v18.17.1/node-v18.17.1-x64.msi"
    Install-Software -url $nodeJsUrl -installerArgs "/quiet"
    
    # Add Node.js to system PATH
    Set-EnvironmentVariable -variableName "Path" -variableValue "C:\Program Files\nodejs"
} else {
    Write-Host "Node.js is already installed. Skipping installation."
}

# https://drive.usercontent.google.com/download?id=1zcJXtdoblj46roPbmylbQi3hzbBOZrAK&export=download&authuser=0
# https://drive.google.com/uc?export=download&id=1zcJXtdoblj46roPbmylbQi3hzbBOZrAK
# Check and Install PHP

$PHPurl = "https://drive.usercontent.google.com/download?id=1zcJXtdoblj46roPbmylbQi3hzbBOZrAK&export=download&authuser=0"
$PHPfolder = "C:\PHP8\"

# Check if the directory exists
if (-Not (Test-Path -Path $PHPfolder)) {
    # Create the directory if it does not exist
    New-Item -Path $PHPfolder -ItemType Directory
    Write-Host "Directory $PHPfolder created."
} else {
    Write-Host "Directory $PHPfolder already exists."
}

# Download the file using WebClient + google drive link
$wc = New-Object System.Net.WebClient
try {
    $wc.DownloadFile($PHPurl, $PHPfolder)
    Write-Host "Downloaded PHP"
} catch {
    #Write-Host "Error downloading $url: $($_.Exception.Message)" # Corrected reference
    Write-Host "Error while downloading" # Corrected reference
    exit
}
Expand-Archive -Path 'C:\PHP8\PHP8.zip' -DestinationPath 'C:\PHP8'

<#
$phpExePath = "C:\php\php.exe"
if (-Not (Is-Installed -executablePath $phpExePath)) {
    Write-Host "PHP is not installed. Installing PHP..."
    
    # URL and install path for PHP
    $phpUrl = "https://windows.php.net/downloads/releases/php-8.2.22-nts-Win32-vs16-x64.zip"
    $phpInstallPath = "C:\php"

    $fullTempPath = [System.IO.Path]::GetTempPath()
    $zipFilePath = "$fullTempPath\php.zip"

    # Check for existing downloaded PHP file and delete it
    if (Test-Path $zipFilePath) {
        Remove-Item $zipFilePath -Force
    }

    # Download PHP using WebClient for better performance
    $wc = New-Object System.Net.WebClient
    try {
        $wc.DownloadFile($phpUrl, $zipFilePath)
        Write-Host "Downloaded PHP to $zipFilePath"
    } catch {
        Write-Host "Error downloading PHP: $(${_.Exception.Message})" # Corrected reference
        exit
    }

    # Validate the downloaded file
    if ( (Test-Path $zipFilePath) -And ((Get-Item $zipFilePath).Length -gt 0) ) {
        Write-Host "PHP downloaded successfully. Extracting..."

        # Expand the archive
        try {
            Add-Type -assembly "System.IO.Compression.Filesystem";
            [String]$Source = #pathA ;
            [String]$Destination = #pathB ;
            [IO.Compression.Zipfile]::ExtractToDirectory($zipFilePath, $phpInstallPath);
            #Expand-Archive -Path $zipFilePath -DestinationPath $phpInstallPath -Force
        } catch {
            Write-Host "Failed to extract PHP. Please check the downloaded zip file."
            Remove-Item $zipFilePath -Force
            exit
        }

        # Remove the zip file
        Remove-Item $zipFilePath -Force

        # Add PHP to system PATH
        Set-EnvironmentVariable -variableName "Path" -variableValue $phpInstallPath
    } else {
        Write-Host "Downloaded PHP zip file is invalid or empty."
        exit
    }
} else {
    Write-Host "PHP is already installed. Skipping installation."
}

<#
# Check and Install Composer
$composerPath = "$phpInstallPath\composer.phar"
if (-Not (Is-Installed -executablePath $composerPath)) {
    Write-Host "Composer is not installed. Installing Composer..."
    $composerSetupUrl = "https://getcomposer.org/installer"
    $composerSetupPath = "$env:TEMP\composer-setup.php"

    # Check for existing Composer setup file and delete it
    if (Test-Path $composerSetupPath) {
        Remove-Item $composerSetupPath -Force
    }

    # Download Composer setup using WebClient
    $wc = New-Object System.Net.WebClient
    try {
        $wc.DownloadFile($composerSetupUrl, $composerSetupPath)
        Write-Host "Downloaded Composer setup to $composerSetupPath"
    } catch {
        Write-Host "Error downloading Composer setup: $(${_.Exception.Message})" # Corrected reference
        exit
    }

    # Check if the setup file is valid
    if (Test-Path $composerSetupPath -and (Get-Item $composerSetupPath).Length -gt 0) {
        php "$composerSetupPath" --install-dir="$phpInstallPath" --filename="composer"
    } else {
        Write-Host "Downloaded Composer setup file is invalid or empty."
        Remove-Item $composerSetupPath -Force
        exit
    }

    # Remove the Composer setup file
    Remove-Item $composerSetupPath -Force

    # Add Composer to system PATH
    Set-EnvironmentVariable -variableName "Path" -variableValue $phpInstallPath
} else {
    Write-Host "Composer is already installed. Skipping installation."
}

# Check and Install Symfony CLI
$symfonyPath = "$env:USERPROFILE\.symfony\bin\symfony.exe"
if (-Not (Is-Installed -executablePath $symfonyPath)) {
    Write-Host "Symfony CLI is not installed. Installing Symfony CLI..."
    $symfonyUrl = "https://get.symfony.com/cli/installer"
    $symfonyInstallerPath = "$env:TEMP\symfony-setup.exe"

    # Check for existing Symfony installer and delete it
    if (Test-Path $symfonyInstallerPath) {
        Remove-Item $symfonyInstallerPath -Force
    }

    # Download Symfony installer using WebClient
    $wc = New-Object System.Net.WebClient
    try {
        $wc.DownloadFile($symfonyUrl, $symfonyInstallerPath)
        Write-Host "Downloaded Symfony installer to $symfonyInstallerPath"
    } catch {
        Write-Host "Error downloading Symfony CLI: $(${_.Exception.Message})" # Corrected reference
        exit
    }

    # Check if the installer is valid
    if (Test-Path $symfonyInstallerPath -and (Get-Item $symfonyInstallerPath).Length -gt 0) {
        Start-Process "$symfonyInstallerPath" -ArgumentList "/quiet" -Wait -Verbose
    } else {
        Write-Host "Downloaded Symfony CLI installer is invalid or empty."
        Remove-Item $symfonyInstallerPath -Force
        exit
    }

    # Remove the Symfony installer
    Remove-Item $symfonyInstallerPath -Force

    # Add Symfony CLI to system PATH
    Set-EnvironmentVariable -variableName "Path" -variableValue "$env:USERPROFILE\.symfony\bin"
} else {
    Write-Host "Symfony CLI is already installed. Skipping installation."
}
#>

Write-Host "Installation complete. Please restart your computer or log out and back in for changes to take effect."
