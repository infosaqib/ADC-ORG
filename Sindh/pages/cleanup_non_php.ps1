# Delete all non-PHP files

Write-Host "Removing all non-PHP files..." -ForegroundColor Yellow
Write-Host ""

# Get all files that are NOT .php files
$nonPhpFiles = Get-ChildItem -File | Where-Object { $_.Extension -ne '.php' }

Write-Host "Non-PHP files found: $($nonPhpFiles.Count)" -ForegroundColor Cyan
Write-Host ""

# Delete each non-PHP file
$deletedCount = 0
foreach ($file in $nonPhpFiles) {
    Write-Host "Deleting: $($file.Name)" -ForegroundColor Red
    Remove-Item $file.FullName -Force
    $deletedCount++
}

Write-Host ""
Write-Host "Cleanup complete!" -ForegroundColor Green
Write-Host "Non-PHP files deleted: $deletedCount" -ForegroundColor Green
Write-Host ""
Write-Host "Remaining PHP files:" -ForegroundColor Yellow
Get-ChildItem -File *.php | Select-Object Name | Format-Table -AutoSize
Write-Host "Total PHP files remaining: $((Get-ChildItem -File *.php).Count)" -ForegroundColor Cyan


