# Notes

## 22:45 - Docker

- I started at around 22:45 (normally I really don't work that late, but being vacations with my family it was the best time to focus).

- Luckily I had docker installed properly. I am really not that experienced with it, have used it a few times for some tests and to run something that required it, but I knew the basics of it, and have enough experience with other provisioning tools (vagrant, puppet et all) to get around it pretty quickly.

- First thing I built the images out of the docker files to try it out and make sure I was able to download everything, slow but ok.

- While that was happening, I started to read a bit on compose/docker, etc.

## 23:00 - Drupal

- At around 23:00 I moved to the drupal task while docker was still downloading.

- Saw a fatal php error on index.php, accessed the server through ssh and fixed index.php from the fatal error, a whiterabbit line

- Then it complained about vendor not found… something composer related

- I noticed it was a drupal-composer project, so I re-run composer install in ../

- Error gone, but now mysql access error for whiterabbit user, hmmmm

- Found settings.local.php using grep for whiterabbit, renamed it so that it’s not picked up

- Site’s loading but with some odd php comments that shouldn't be there

- Grep'ed for those comments and fixed all.settings.php, added missing php starting tag

- `` `drush sql-connect` < ~/drush-backups/20170202193132/20170202_193132.sql`` to bring the backup database up.

- site seems to load fine

## 23:15 - Docker

- This was around 23:15, back to docker

- nginx image built fine

- php image failed with an error, fixed Dockerfile.php and add a missing backslash

- Then php image failed because the composer cmd had a missing typo. Fixed that.

- both images were starting up properly, on to composer file.

- Googling a bit, apparently needing to add the dockerfiles and configure things to tied them together.

- Web ok, saw in the dockerfile config came from .docker/nginx.conf.tmpl, and that it was listening on 8080.

- Forwarded localhost:8080 to nginx container, it was loading!

- Added php to docker-compose, started OK but it wasn't communicating, although I'd added links to php.

- Following nginx config file spotted fastcgi_pass `${NGINX_FASTCGI_PASS}:9000;`, hmmm ok, added an ENV variable to Dockerfile.nginx and rebuilt the image, it worked! But I had to change the dockerfile, there should be another way.

- Found the container-entrypoint script in the nginx container that was translating the env var.

- Reset dockerfile and add the env var to drupal-composer, it worked, all good! `http://localhost:8080` was showing me the pagerduty xml

## 00:15 - Docker networking

- By now it had been working for a while, was tidying up a few things and preparing for delivery, one thing I wasn't sure about the requirement was if the static ip as per the screenshot was something I should also add (192.168.99.100) but I thought it should be perfectly possible, so on to that.

- Found about networking config and all, starting doing tests but there was no way I could make it work.

- Finally I suspected this could be an osx issue, and indeed it was: https://docs.docker.com/docker-for-mac/networking/, still documented it on the composer file but commented.


## 00:40 - Off to sleep

## 10:15 - Start to compile the notes and setup the repository for delivery

## 11:10 - Finished compiling notes and sent email!

# Thanks!
