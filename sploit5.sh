#! /bin/sh
php sploit5.php $1
echo "\n Security Misconfiguration Vulnerability: \n"
echo "1.) Download sensitive files found in the server, one of them contains database information\n"
echo "2.) Sign in as a user from the database using an sql Injection to avoid typing the SHA1 hashed password.\n"
echo "3.) Post a link on behalf of the user in the main page of the site, this time to google.ca\n"
echo "4.) Refresh, or navigate to main page, last comment made is by ssasy and its a link to google.ca as shown in the HTML above \n"
