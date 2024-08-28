@echo off

:: Get the directory of the current script
set SCRIPT_DIR=%~dp0

:: Print the current script directory for debugging
echo Current script directory: %SCRIPT_DIR%

:: Remove the trailing backslash to avoid issues
set SCRIPT_DIR_NO_TRAILING=%SCRIPT_DIR:~0,-1%

:: Attempt to change to the parent Git repository directory (portfolio-website)
set PARENT_DIR=%SCRIPT_DIR_NO_TRAILING%
echo Attempting to change directory to: %PARENT_DIR%
cd /d "%PARENT_DIR%"
if %ERRORLEVEL% NEQ 0 (
    echo Failed to change directory to portfolio-website. Please check the path.
    pause
    exit /b
)

:: Check if the script is running with admin privileges
NET SESSION >NUL 2>&1
if %ERRORLEVEL% NEQ 0 (
    :: If not running as admin, prompt for elevation
    echo Requesting administrative privileges...
    powershell.exe -Command "Start-Process '%~f0' -Verb RunAs"
    exit /b
)

:: If running as admin, execute the PowerShell script
powershell -ExecutionPolicy Bypass -File "%SCRIPT_DIR%branches.ps1"
if %ERRORLEVEL% NEQ 0 (
    echo Failed to execute branches.ps1. Please check the script for errors.
    pause
    exit /b
)

pause
