<?php
// See also README.md

// Key from https://trello.com/1/appKey/generate
$key = 'your_Key';

// Your Application Token (set $key only, then run the trello-backup.php to obtain your application_token to set below)
$application_token = 'your_app_token';

// By default we don't backup closed boards (less clutter)
$backup_closed_boards = true;

// Backup all Trello Boards from the organizations that the user has read access to
$backup_all_organization_boards = true;

// Backup all cards' attachments in a subfolder for each Trello board
$backup_attachments = true;

// Where to store the backup files (by default, trello boards JSON files will be stored in this directory)
$path = dirname('/Users/xxx/Doc/trello-data-backup/script-export/temp.md');

// HTTP proxy, if one is required, in the format 'host:port', e.g. 'proxy.example.com:80' or '192.168.1.254:8080'
$proxy= '';

// Array of boards to not backup regardless of other settings
$ignore_boards = array('Welcome Board');

// Array of boards to download only regardless of other settings
// NO other boards will be downloaded
$boards_to_download = array();

// Timestamp format, e.g. 'Y-m-d_H-i-s'
$filename_append_datetime = false;

//Timezone, e.g. UTC
$timezone = 'UTC';
