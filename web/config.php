<?php
/* This string indicates where the SQL credentials (connections.php) are stored.
If the connection strings are stored elsewhere, you will need to adjust this
string as necessary.

Borrowed from http://webtips.dan.info/url.html:

A URL with no slashes, like "junk.html", references another page in the same directory as the current page.
A URL with a single dot at the start, like "./stuff.html", references another file in the same directory, just like a URL with no slashes.
A URL with no leading slashes, but slashes within, like "subdir/test.html", references a subdirectory beneath the current one. 
A URL with double dots at the start, like "../another.html", references the parent directory of the current one.
A URL with a slash at the start, like "/dir1/dir2/stuff.html", references a page at a path starting from the root of the server. 

You can stack these context modifiers.
By default it is a relative URL that points 3 directories upwards (using 3x ../).
*/
include("../../../connections.php");
?>