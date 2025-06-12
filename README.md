# web-cyradm
Web GUI for cyrus-imap + EXIM or postfix

This is a fork of the non-maintained web-cyradm project (web-cyradm.org - Luc de Louw) now compatibile to modern PHP > 8.x

## Installation
[mini HOWTO]

### install PHP environment
php-mysql / php-mysqli, php-pear, php-pear-db

### install web-cyradm

```
tar -xzvf web-cyradm.tar.gz
mv web-cyradm /srv/www/htdocs/
cd /srv/www/htdocs/
chown -Rv wwwrun:www web-cyradm/

cd /srv/www/htdocs/web-cyradm/scripts/
mysql -u root -p < /srv/www/htdocs/web-cyradm/scripts/insertuser_mysql.sql
mysql mail -u root -p < /srv/www/htdocs/web-cyradm/scripts/create_mysql.sql
/etc/init.d/mysql restart

cd /srv/www/htdocs/web-cyradm/config
vi conf.php.dist
mv conf.php.dist conf.php
```
Initial web credentials:
```
user: admin
password: password
```

### PAM config
Depending from your OS, you have to change some or all of this files:
/etc/pam.d/imap
/etc/pam.d/imaps
/etc/pam.d/imap4
/etc/pam.d/imap4s
/etc/pam.d/pop3
/etc/pam.d/pop3s
/etc/pam.d/pops
/etc/pam.d/smtp
/etc/pam.d/exim
/etc/pam.d/sieve
/etc/pam.d/sievelocal
/etc/pam.d/misc

to a new content like:

```
auth            sufficient      pam_mysql.so user=root passwd=MYSQLPASSWD host=localhost db=mail table=accountuser usercolumn=username passwdcolumn=password crypt=1 logtable=log logmsgcolumn=msg logusercolumn=user loghostcolumn=host logpidcolumn=pid logtimecolumn=time verbose=0
auth            sufficient      pam_unix.so

account         sufficient      pam_unix.so
account         required        pam_mysql.so user=root passwd=MYSQLPASSWD host=localhost db=mail table=accountuser usercolumn=username passwdcolumn=password crypt=1 logtable=log logmsgcolumn=msg logusercolumn=user loghostcolumn=host logpidcolumn=pid logtimecolumn=time verbose=0
auth            include         system-auth
```

### enable PAM authentication in saslauthd
configure / start saslauthd with option "-a pam". Where to configure this depend from os / distribution.
```
SASLAUTHD_OPTS="-a pam"
```
Then restart saslauthd.
You may test the authentication now per testsaslauthd command.


### configure SMTP in EXIM
[under work]
mysql functionality must be compiled in / enabled
use saslauthd authenticators
config MySQL routers
...

### configure SMTP in Postfix
[under work]
...

## Changelog
* Compatibility to PHP 8.3
  
## ToDo
* more modern crypto options for password storage
* New documentation

# useful links / external docs
* http://www.web-cyradm.org/ - former project website (obsolete)
* https://tldp.org/HOWTO/html_single/Postfix-Cyrus-Web-cyradm-HOWTO/ - installation for cyrus-imap + postfix
* https://dokuwiki.nausch.org/doku.php/centos:mail_c6:web-cyradm - [german] installation 
