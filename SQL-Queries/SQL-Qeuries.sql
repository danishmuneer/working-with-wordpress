/* To select all rows in a table where a specific column value matches with some column value in another table. The limit is used 
to just check the query. Replace "SELECT *" with DELETE to delete the rows */

SELECT * FROM `wp_postmeta` WHERE `post_id` IN ( SELECT ID FROM `wp_posts` ) LIMIT 50
