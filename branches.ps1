# Fetch all remote branches
git fetch --all

# Get the list of remote branches
$remoteBranches = git branch -r | Where-Object { $_ -notmatch '\->' }

# Create local branches for each remote branch
foreach ($branch in $remoteBranches) {
    $branch = $branch.Trim()
    
    # Remove 'origin/' from the remote branch name
    $branchName = $branch -replace '^origin/', ''

    # Check if the local branch already exists
    if (-not (git branch --list $branchName)) {
        # Create the local branch and set it to track the remote branch
        git branch --track $branchName $branch
    } else {
        Write-Output "Local branch '$branchName' already exists."
    }
}