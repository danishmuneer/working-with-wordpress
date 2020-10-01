/* To select all rows in a table where a specific column value matches with some column value in another table. The limit is used 
to just check the query. Replace "SELECT *" with DELETE to delete the rows */

SELECT * FROM `wp_postmeta` WHERE `post_id` IN ( SELECT ID FROM `wp_posts` ) LIMIT 50

/* the following query builds upon the previous by finding the common data using INNER JOIN */

SELECT      `wp_postmeta`.`post_id`,`wp_postmeta`.`meta_key`,`wp_postmeta`.`meta_value`
FROM        `wp_postmeta`
INNER JOIN  `wp_posts` ON `wp_postmeta`.`post_id` = `wp_posts`.`ID`
WHERE       `wp_postmeta`.`meta_key` = "_order_total" OR `wp_postmeta`.`meta_key` = "_paid_date" 
ORDER BY	`wp_postmeta`.`post_id`	
LIMIT       50

/* select all gravity form entries uptill a certain date */

SELECT * FROM `wp_gf_entry` WHERE `date_created` < 'YYYY-MM-DD'  
ORDER BY `wp_gf_entry`.`date_created` DESC

/* select all gravity form entries metas uptill the highest entry ID in the date range returned by above query */
SELECT * FROM `wp_gf_entry_meta`
WHERE `entry_id` IN ( SELECT ID FROM `wp_gf_entry` )
AND `entry_id` <= xxx /* replace xxx by the highest entry ID number we got from the previous query*/
ORDER BY `wp_gf_entry_meta`.`entry_id`  DESC
