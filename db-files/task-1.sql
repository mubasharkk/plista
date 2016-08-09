/**
 * Author:  mubasharkk
 * Created: Aug 9, 2016
 */

/**
* TASK #1A
* showing all campaigns of advertiser #100 that have more than 50 ads
*/

SELECT 
    c.*, COUNT(ads.id) AS ads_count
FROM
    campaigns c
        LEFT JOIN
    advertisements ads ON ads.campaign_id = c.id
WHERE
    c.advertiser_id = 100 /* Advertiser #100*/
GROUP BY 
	c.id
HAVING ads_count > 50 /* have more than 50 ads */;

/**
* TASK #1B
* showing all campaigns that do not have any ads
*/

SELECT 
    c.*, COUNT(ads.id) AS ads_count
FROM
    campaigns c
        LEFT JOIN
    advertisements ads ON ads.campaign_id = c.id
GROUP BY 
    c.id
HAVING ads_count = 0;


/*** Alternative Way **/

SELECT 
    c.*
FROM
    campaigns c
        LEFT JOIN
    advertisements ads ON ads.campaign_id = c.id
WHERE 
    ads.id IS NULL;


/** Or a bad alternative way :P ***/
SELECT 
    *
FROM
    campaigns
WHERE
    id NOT IN (SELECT 
            campaign_id
        FROM
            advertisements)