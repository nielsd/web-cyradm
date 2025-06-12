<?php

########################################################################################
#                                                                                       
#             This is web-cyradm Version 1.8.20 CVS                                      
#                                                                                       
#                                                                                       
#########################################################################################

// Set Default language

$DEFAULTLANG = "en_EN";

// The Cyrus login stuff
$CYRUS = [
	'HOST'    => '127.0.0.1',
	'PORT'    => '143',
	'ADMIN' => 'cyrus',
	'PASS'  => 'CYRUSPASSWD'
];

/* DB_TYPE

 Possible Values are:
 o mysql
 o pgsql

 To operate a mailsystem with postgreSQL you will need a patch for
 Postfix.

 Other Databases need to be supported by PAM and postfix
*/

$DB = [
    'TYPE'    => 'mysqli',
    'USER'    => 'MYSQLUSER',
    'PASS'    => 'MYSQLPASSWORD',
    'PROTO'    => 'socket',
    // set to "tcp" for TCP/IP
    'HOST'    => '127.0.0.1',
    'NAME'    => 'mail',
];

$DB['DSN'] = sprintf(
    '%s://%s:%s@%s+%s/%s',     $DB['TYPE'], $DB['USER'],
    $DB['PASS'], $DB['PROTO'],
    $DB['HOST'], $DB['NAME']
);


# Where should web-cyradm write its log to?
$LOG_DIR = "/var/log/web-cyradm/";

/* Log level
Possible values are (from quiet to verbose):
 ERR	- only internal errors
 WARN	- failed login, security violation
 INFO	- all login and logout
 DEBUG	- all possible information
*/
$LOG_LEVEL = "INFO";

# The default timeout in seconds for a session, after that you have to login again
$SESS_TIMEOUT = 1000;

# The default quota sets the default quota for new accounts
$DEFAULT_QUOTA = 50000000;

# The default domain quota sets the quota for new domains
# 0 = No quota
$DEFAULT_DOMAIN_QUOTA = 0;

# On what quota level mark accounts on accounts list (in %)
$QUOTA_WARN_LEVEL = 90;

# Defines if passwords are encrypted or not.
# Valid Values:
#  - plain 0 No encription is used
#  - crypt 1 (shadow compatible encription)
#  - mysql 2 (MySQL PASSWORD function)
#  - md5 3 (MD5 digest - outdated)
$CRYPT = "1";


# web-cyradm is compatible with cyrus-imapd-2.0.16 (and earlier?)
# however, if you are using 2.1.x and wish to use email addresses 
# with .'s in them such as 'john.doe@mydomain.com' you can set this
# option DOMAIN_AS_PREFIX to '1'.  NOTE: you also have to add this
# line to your imapd.conf file:
#### imapd.conf: ####
# unixhierarchysep: yes

####
$DOMAIN_AS_PREFIX = 1;

# EXPERIMENTAL
# If you are using cyrus imap 2.2.x and wish to use usernames like
# email addresses you can set option DOMAIN_AS_PREFIX to '1' and
# FQUN to '1'. NOTE: you also have to add this lines to your
# imapd.conf file:
#### imapd.conf: ####
# unixhierarchysep: yes
# virtdomains: yes
####
$FQUN = 0;

# At the moment, web-cyradm supports two methods of password change:
# - through sql
# - poppassd
# sql is the default
$PASSWORD_CHANGE_METHOD = "sql"; 

# Turn up error reporting level. This overrides settings in your php.ini
#
# E_ALL             - All errors and warnings
# E_ERROR           - fatal run-time errors
# E_WARNING         - run-time warnings (non-fatal errors)
# E_PARSE           - compile-time parse errors
# E_NOTICE          - run-time notices (these are warnings which often result
#                     from a bug in your code, but it's possible that it was
#                     intentional (e.g., using an uninitialized variable and
#                     relying on the fact it's automatically initialized to an
#                     empty string)
# E_CORE_ERROR      - fatal errors that occur during PHP's initial startup
# E_CORE_WARNING    - warnings (non-fatal errors) that occur during PHP's
#                     initial startup
# E_COMPILE_ERROR   - fatal compile-time errors
# E_COMPILE_WARNING - compile-time warnings (non-fatal errors)
# E_USER_ERROR      - user-generated error message
# E_USER_WARNING    - user-generated warning message
# E_USER_NOTICE     - user-generated notice message

error_reporting(E_WARNING);

$VERSION="2.0.0-Beta1";

# Define reserved Emailadresses (Separated by comma):
$RESERVED="root,root@localhost";

$TEMPLATE[0]="default";
$TEMPLATE[1]="green";
