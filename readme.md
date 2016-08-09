# Plista Interview Task

## Data Product challenge

### Requires PHP7 + Laravel5

## MySQL

Assume the following scenario: 

- There are ads, each belonging to exactly one campaign. 
- A campaign can have multiple ads. Each campaign belongs to exactly one advertiser. 
- An advertiser can have multiple campaigns. 
- For the following tasks only the ad's properties are relevant: *title,text, image, sponsoredBy, trackingUrl*


Please produce the mysql queries to fulfill the following tasks:
- showing all campaigns of advertiser #100 that have more than 50 ads
- showing all campaigns that do not have any ads 

**SQL files can be found in:**
> db-files/db-schema.sql
> db-files/db-data-import.sql
> db-files/task-1.sql

## API

Assume the data structure from the mysql task. Please produce rest-ful API calls for the following actions. For each action provide the URL , HTTP method and the request body .

- selecting a specific ad
```
/get/ad/{ad-id}
```
- selecting all ads of a specific campaign
```
/get/campaign/{campaign-id}/ads
```
- selecting all ads of a specific advertiser (Sponsor)
```
/get/advertiser/{advertiser-id}/ads
```
- creating an ad 
```
[POST] /ads/

title:Funny Advertise
text:eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, 
image_url:http://gmail.com
campaign_id:519
sponsored_by:48

```
- modifying a specific ad

```
[PUT] /ads/{ad-id}

title:Funny Advertise Updated Title
text:eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, 
image_url:http://gmail.com
campaign_id:519
sponsored_by:95

```


## PHP

produce PHP code for a device detector which can classify a device based on its user agent. The detection should be able to classify the device
at least by its type (tablet, phablet, phone, desktop) and its operating system. Don't reinvent the wheel but use an existing open-source project,
only code a wrapper project. Provide unit tests to prove the detection is working. For pulling in the dependencies use composer .

**Browser Agent Detection**
```
/device/detect/
```

### Unit test for browser detection

> tests/DeviceDetectTest.php

```
./vendor/bin/phpunit
```
> https://deviceatlas.com/blog/list-of-user-agent-strings