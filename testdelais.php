<?php

if (isset($_POST['submit'])) {
    $currentDate = date('Y-m-d H:i:s');
    echo $currentDate;
} else {
    
}

?>

<form action="" method="post">
    <input type="submit" value="submit" name="submit">
</form>
<?php
session_start();
$_SESSION['login'] = "jules";
echo "<script>alert('Welcome ". $_SESSION['login'] ."');</script>";
?> 
{
    "workbench.colorCustomizations": {
        "editor.background": "#0d1117",
        "editor.foreground": "#d4fe01",
        "sideBar.background": "#161b22",
        "sideBar.foreground": "#c9d1d9",
        "sideBarSectionHeader.background": "#c9d1d9",
        "sideBarSectionHeader.foreground": "#000000",
        "statusBar.background": "#000000",               // couleur barre du bas
        /* "scrollbarSlider.activeBackground": "#00f0ff", */
        "scrollbarSlider.hoverBackground": "#2ea043",
        "toolbar.hoverBackground": "#0d1117",
        "menu.background": "#0d1117",
        "menu.selectionBackground": "#161b22",          // selection surbirance menu
        "titleBar.activeBackground": "#000000",         // couleur de la bar menu
        "button.background": "#238636",
        "input.background": "#0d1117",
        "button.foreground": "#c9d1d9",
        "button.hoverBackground": "#2ea043",
        "selection.background": "#ff0000",
        "badge.foreground": "#161b22",
        "badge.background": "#d4fe01",
        "activityBar.activeBackground": "#0d1117",
        "activityBar.activeBorder": "#d4fe01",
        "activityBar.background": "#000000",
        "activityBar.foreground":"#c9d1d9",
        "activityBarBadge.background": "#d4fe01",
        "activityBarBadge.foreground":"#0d1117",
        "tab.activeBackground": "#0d1117",
        "tab.activeForeground": "#c9d1d9",   // couleur font tab
        "tab.activeBorder":"#d4fe01",
        "tab.inactiveBackground":"#161b22",  // couleur tab incative
    },
    "code-runner.showExecutionMessage": false,
    "code-runner.clearPreviousOutput": true,
    "code-runner.runInTerminal": true,
    "workbench.colorTheme": "An Old Hope Italic",
    "debug.disassemblyView.showSourceCode": false
}