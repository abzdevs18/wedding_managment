# Change the .htaccess folder directory or else you are dead
# During the setup of the admin, we need to change the folder name of the system

# JSON SQL
# SELECT concat('[{', GROUP_CONCAT( concat_ws(',', concat('"id":"',id,'"'),concat('"user_id":"',user_id,'"'),concat('"img_path":"',img_path,'"'),concat('"profile_status":"',profile_status,'"') ) SEPARATOR '},{'),'}]') AS user_profile FROM user_profile