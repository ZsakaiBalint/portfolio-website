param(
    $ftpServer, 
    $ftpUser, 
    $ftpPass
)

$files = Get-ChildItem -Path '.' -File
foreach ($file in $files) {
    $ftpUri = 'ftp://'+$ftpServer+'/'+$file.Name
    $ftp = [System.Net.FtpWebRequest]::Create($ftpUri)
    $ftp.Method = [System.Net.WebRequestMethods+Ftp]::UploadFile
    $ftp.Credentials = New-Object System.Net.NetworkCredential($ftpUser, $ftpPass)

    $fileStream = [System.IO.File]::OpenRead($file.FullName)
    $requestStream = $ftp.GetRequestStream()
    $fileStream.CopyTo($requestStream)
    $requestStream.Close()
    $fileStream.Close()
}