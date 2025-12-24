# PowerShell script to rename images based on city names from pages.txt
# This script renames the first available image in each priority folder to match the city name

# Read pages.txt and filter out empty lines
$pagesContent = Get-Content "pages.txt" | Where-Object { $_.Trim() -ne "" }

# Function to extract city name and priority from a line
function Extract-CityInfo {
    param($line)
    
    if ($line -match 'href="https://services\.armydogcenter\.org\.pk/([^"]+)\.php".*\| (\d+)') {
        $cityFile = $matches[1]
        $priority = $matches[2]
        return @{
            CityFile = $cityFile
            Priority = $priority
        }
    }
    return $null
}

# Group cities by priority to track which images have been used
$priorityGroups = @{}
foreach ($entry in $pagesContent) {
    $info = Extract-CityInfo $entry
    if ($info) {
        $priority = $info.Priority
        if (-not $priorityGroups.ContainsKey($priority)) {
            $priorityGroups[$priority] = @()
        }
        $priorityGroups[$priority] += $info
    }
}

# Process each priority group
$renamedCount = 0
$skippedCount = 0

foreach ($priority in $priorityGroups.Keys) {
    $imageFolder = "images\$priority"
    Write-Host ""
    Write-Host "Processing priority folder: $priority" -ForegroundColor Cyan
    
    # Check if image folder exists
    if (-not (Test-Path $imageFolder)) {
        Write-Host "  Folder not found: $imageFolder" -ForegroundColor Red
        continue
    }
    
    # Get all available images (excluding already renamed ones)
    $allImages = Get-ChildItem -Path $imageFolder -Filter "*.jpeg" | Sort-Object Name
    $cities = $priorityGroups[$priority]
    
    # Track which images are already correctly named
    $usedImages = @()
    foreach ($cityInfo in $cities) {
        $cityFile = $cityInfo.CityFile
        $targetImage = "$imageFolder\$cityFile.jpeg"
        
        if (Test-Path $targetImage) {
            Write-Host "  Image already exists: $cityFile.jpeg" -ForegroundColor Green
            $usedImages += $targetImage
            $skippedCount++
        }
    }
    
    # Find images that need to be renamed
    $availableImages = $allImages | Where-Object { 
        $fullPath = $_.FullName
        $isUsed = $false
        foreach ($used in $usedImages) {
            if ($fullPath -eq (Resolve-Path $used).Path) {
                $isUsed = $true
                break
            }
        }
        -not $isUsed
    }
    
    # Rename images for cities that don't have their image yet
    foreach ($cityInfo in $cities) {
        $cityFile = $cityInfo.CityFile
        $targetImage = "$imageFolder\$cityFile.jpeg"
        
        if (-not (Test-Path $targetImage)) {
            if ($availableImages.Count -gt 0) {
                $firstImage = $availableImages[0]
                $sourcePath = $firstImage.FullName
                
                try {
                    Rename-Item -Path $sourcePath -NewName "$cityFile.jpeg" -ErrorAction Stop
                    Write-Host "  Renamed: $($firstImage.Name) -> $cityFile.jpeg" -ForegroundColor Green
                    $renamedCount++
                    
                    # Remove from available list
                    $availableImages = $availableImages | Where-Object { $_.FullName -ne $sourcePath }
                } catch {
                    Write-Host "  Failed to rename: $($firstImage.Name) - $_" -ForegroundColor Red
                }
            } else {
                Write-Host "  No available images for: $cityFile.jpeg" -ForegroundColor Red
            }
        }
    }
}

Write-Host ""
Write-Host "Image renaming completed!" -ForegroundColor Cyan
Write-Host "  Renamed: $renamedCount images" -ForegroundColor Green
Write-Host "  Already correct: $skippedCount images" -ForegroundColor Yellow
