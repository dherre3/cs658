#! /bin/sh
php sploit4.php $1
echo "\n Insecure Direct Object Reference Vulnerability: \n"
echo "1.) Could be authenticated or unauthenticated\n"
echo "2.)Change the id of the post in the url, i.e view.php?id=randomNumber.\n"
echo "3.)Page navigates to this non-existent/non-allowed post, make comment on this post\n"
echo "4.)Navigate again to it, the last comment made/only comment made, id=222, it does not even exist in the database, still allowed as shown in the HTML above\n"
