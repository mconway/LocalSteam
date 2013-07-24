LocalSteam
==========

This is a system I got the idea for attending a Lan event (http://pdxlan.net). 
They had a local server available with copies of steam games, and an interface 
to download the games to your local steam folder to save on bandwidth.

LocalSteam is quite simple, it lists all folders in a directory, and autogenerates a powershell script when the download link is clicked.
When the script is run on a client computer, the files are downloaded to the steam directory.

Configuration
=============
Modify config.php and change the paths. The steam files need to be accessible to the client PCs

```php
$serverAppsPath = "/media/data/Software/Games/Steam"; //location of steam files on the server the script is on
$clientAppsPath = "Z:\\Software\Games\Steam"; //network location for clients
$clientSteamPath = "C:\\Program Files (x86)\\Steam\\SteamApps\\common\\"; //path steam is installed to on client machines
```

In The Works
============
- [ ] allow unc paths for client machines (currently requires a mapped drive)
- [ ] revisit the powershell script and make it more user friendly
- [ ] allow steam login to the page, and display a filtered list by what the user owns
- [ ] allow box art in the list
- [ ] create file sync script to allow users to upload files to the server
- [ ] possibly make a desktop app to allow push installs and file install progress

