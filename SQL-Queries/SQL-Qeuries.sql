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
