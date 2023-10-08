# SIDAuth
SIDAuth is for Session Identity Authorization.

Access authorization system through pairing, using the generation of a five-character code based on PHP session identification. The user receives a code and remains in a waiting state. If this code is subsequently entered into the list of authorized sessions, the protected content is displayed.
# Usage
```
The content of the page must be placed between the first two lines
and the last two lines of the "secret.php" file. Example:

  <?php
  /*
  <HTML>
  <BODY>
  <a> Hidden message </a>
  </BODY>
  </HTML>
  */ 
  ?> 

The first and last two lines must not be removed under any circumstances.
Even if the hidden program is PHP, it will not be affected.

The generated session code must be included (to grant access) in "codigos.php"
as follows:

<?php
/*
12345
9A022
42124
*/ 
?>

To enter a code, use:

<?php
/*
12345 
*/ 
?>

The first and last two lines must not be removed under any circumstances.

It is possible to delete the content of the code file after access has been
granted ONLY if it is an application that does not require reloading the
hidden page. Simply leave the code file like this:

<?php
/* 
*/ 
?>
```
