param(
    [string]$ftpServer, 
    [string]$ftpUser, 
    [string]$ftpPass
)

# Function to upload a file
function Upload-File {
    param(
        [string]$filePath,
        [string]$ftpUri
    )
    $ftp = [System.Net.FtpWebRequest]::Create($ftpUri)
    $ftp.Method = [System.Net.WebRequestMethods+Ftp]::UploadFile
    $ftp.Credentials = New-Object System.Net.NetworkCredential($ftpUser, $ftpPass)

    $fileStream = [System.IO.File]::OpenRead($filePath)
    $requestStream = $ftp.GetRequestStream()
    $fileStream.CopyTo($requestStream)
    $requestStream.Close()
    $fileStream.Close()
    Write-Output "Uploaded file: $filePath"
}

# Function to create a directory on the FTP server
function Create-FtpDirectory {
    param(
        [string]$ftpUri
    )
    $ftp = [System.Net.FtpWebRequest]::Create($ftpUri)
    $ftp.Method = [System.Net.WebRequestMethods+Ftp]::MakeDirectory
    $ftp.Credentials = New-Object System.Net.NetworkCredential($ftpUser, $ftpPass)
    try {
        $response = $ftp.GetResponse()
        $response.Close()
    } catch {
        Write-Output "Directory already exists or could not be created: $ftpUri"
    }
}

# Recursively upload files and directories
function Upload-Directory {
    param(
        [string]$localPath,
        [string]$ftpBaseUri
    )

    # Process directories first
    Get-ChildItem -Path $localPath -Directory | ForEach-Object {
        $localDir = $_.FullName
        $relativePath = $localDir.Substring($localPath.Length).TrimStart('\')
        $ftpDirUri = "$ftpBaseUri/$relativePath".Replace('\', '/')
        Create-FtpDirectory -ftpUri $ftpDirUri
        Upload-Directory -localPath $localDir -ftpBaseUri $ftpDirUri
    }

    # Process files
    Get-ChildItem -Path $localPath -File | ForEach-Object {
        $filePath = $_.FullName
        $relativePath = $filePath.Substring($localPath.Length).TrimStart('\')
        $ftpFileUri = "$ftpBaseUri/$relativePath".Replace('\', '/')
        Upload-File -filePath $filePath -ftpUri $ftpFileUri
    }
}

# Main script
$baseUri = "ftp://$ftpServer"
Upload-Directory -localPath '.' -ftpBaseUri $baseUri
