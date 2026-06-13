# Extract all base64-encoded images from ckr.html and save to public/assets/web/
$ErrorActionPreference = 'Stop'

$source = "_design_source\ckr.html"
$content = Get-Content $source -Raw

# Pattern: "assets/PATH/filename.ext":"data:image/TYPE;base64,DATA"
# Note: forward slashes in source are escaped as \u002F
$normalized = $content -replace '\\u002F', '/'

$pattern = '\\"assets/([^"\\]+\.(?:png|jpg|jpeg|webp))\\"\s*:\s*\\"data:image/[a-z]+;base64,([A-Za-z0-9+/=]+)\\"'
$matches = [regex]::Matches($normalized, $pattern)

Write-Host "Found $($matches.Count) image assets`n"

$baseOut = "public\assets\web"

foreach ($m in $matches) {
    $relativePath = $m.Groups[1].Value   # e.g. logo/cke-logomark.png  or  photos/batching-plant.png
    $base64Data = $m.Groups[2].Value

    $targetPath = Join-Path $baseOut $relativePath
    $targetDir  = Split-Path -Parent $targetPath

    if (-not (Test-Path $targetDir)) {
        New-Item -ItemType Directory -Path $targetDir -Force | Out-Null
    }

    $bytes = [Convert]::FromBase64String($base64Data)
    [IO.File]::WriteAllBytes($targetPath, $bytes)

    Write-Host ("  -> {0,-45} {1,8} bytes" -f $relativePath, $bytes.Length)
}

Write-Host "`nDone. Assets saved to $baseOut\"
