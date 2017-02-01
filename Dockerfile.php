FROM amazeeio/docker-centos7-php:php70

ADD . /app

ENV PAGERDUTY_API_TOKEN=QyBQTjsB2dNdysV6ETPZ \
    PAGERDUTY_DOMAIN=amazeelabs \
    PAGERDUTY_SCHEDULE_ID=PAJFGDW \
    PHONEDUTY_ANNOUNCE_TIME=false 
    PHONEDUTY_CALLER_ID='+1 325-718-2216' \
    PHONEDUTY_ANNOUNCE_GREETING='You reached the Amazee IO Emergency Phoneline' \
    PAGERDUTY_SERVICE_API_TOKEN=b33f8a47a0cf41d1bdccc210c49ca0bd

RUN cd /app && compose install --no-dev --prefer-dist --optimize-autoloader --no-interaction